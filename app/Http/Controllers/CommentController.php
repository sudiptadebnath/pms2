<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    private function getcomments(Request $request)
    {
        $data = $request->all();
        $err = $this->validate($data, [
            'cmnt_pid' => 'nullable|integer|exists:projects,id',
            'cmnt_tid' => 'nullable|integer|exists:tasks,id',
            'cmnt_uid' => 'nullable|integer|exists:user,id',
        ]);
        if ($err) return $err;
        $usrid = $this->getUserObj()->id;
        $comments = Comment::with(['project', 'task', 'fromUser', 'toUser'])
            ->where('project_id', $data['cmnt_pid'])
            ->where('task_id', $data['cmnt_tid'])
            ->orderBy('created_at');
        if ($request->filled('cmnt_uid')) {
            $uid = $data['cmnt_uid'];
            $comments->where(function ($q) use ($uid) {
                $q->where('frm_user_id', $uid)
                    ->orWhere('to_user_id', $uid);
            });
        } else {
            $comments->where(function ($q) use ($usrid) {
                $q->whereNull('to_user_id')
                    ->orWhere('to_user_id', $usrid);
            });
        }
        return $comments;
    }

    public function getall(Request $request)
    {
        $comments = $this->getcomments($request);
        if ($comments instanceof \Illuminate\Http\JsonResponse) return $comments;
        return $this->ok("Comments", ['data' => $comments->get()]);
    }

    public function cnts(Request $request)
    {
        $comments = $this->getcomments($request);
        if ($comments instanceof \Illuminate\Http\JsonResponse) return $comments;
        return $this->ok("Comments Count", ['data' => $comments->count()]);
    }

    public function add(Request $request)
    {
        $data = $request->all();
        // Log::info("comment add :",$data);
        $err = $this->validate($data, [
            'msg' => 'required|string|max:1000',
            'cmnt_pid' => 'nullable|integer|exists:projects,id',
            'cmnt_tid' => 'nullable|integer|exists:tasks,id',
            'cmnt_uid' => 'nullable|integer|exists:user,id',
            'files.*' => 'nullable|file|max:5120', // 5MB each
        ]);
        if ($err) return $err;

        $usrid = $this->getUserObj()->id;

        $newIds = [];

        if ($request->filled('msg')) {
            $cmt = Comment::create([
                'project_id' => $data['cmnt_pid'] ?? null,
                'task_id' => $data['cmnt_tid'] ?? null,
                'frm_user_id' => $usrid,
                'to_user_id' => $data['cmnt_uid'] ?? null,
                'message' => $data['msg']
            ]);
            $newIds[] = $cmt->id;
        }

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploaded) {
                $folder =  $usrid . '_'
                    . ($data['cmnt_pid'] ?? 0) . '_' . ($data['cmnt_tid'] ?? 0)
                    . '_' . ($data['cmnt_uid'] ?? 0);
                $filename = $uploaded->getClientOriginalName();
                $uploaded->storeAs('comments/' . $folder, $filename, 'public');
                $cmt = Comment::create([
                    'project_id' => $data['cmnt_pid'] ?? null,
                    'task_id' => $data['cmnt_tid'] ?? null,
                    'frm_user_id' => $usrid,
                    'to_user_id' => $data['cmnt_uid'] ?? null,
                    'message' => $folder . "/" . $filename,
                    'typ' => 'att',
                ]);
                $newIds[] = $cmt->id;
            }
        }

        $comments =  Comment::with(['project', 'task', 'fromUser', 'toUser'])
            ->whereIn('id', $newIds)->get();

        return $this->ok("Comment", ["data" => $comments]);
    }
}
