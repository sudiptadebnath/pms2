<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{

    public function getall(Request $request)
    {
        $data = $request->all();
        // Log::info("comment getall :",$data);
        $err = $this->validate($data, [
            'pid' => 'nullable|integer|exists:projects,id',
            'tid' => 'nullable|integer|exists:tasks,id',
            'uid' => 'nullable|integer|exists:user,id',
        ]);
        if ($err) return $err;
        $usrid = $this->getUserObj()->id;
        $comments = Comment::with(['project', 'task', 'fromUser', 'toUser'])
            ->where('project_id',$data['pid'])
            ->where('task_id',$data['tid'])
            ->orderBy('created_at');
        if ($request->filled('uid')) {
            // Log::info("comment getall uid :",$data);
            $uid = $data['uid'];
            $comments->where(function($q) use ($uid) {
                $q->where('frm_user_id', $uid)
                ->orWhere('to_user_id', $uid);
            });
        } else {
            $comments->where(function($q) use ($usrid) {
                $q->whereNull('to_user_id')
                ->orWhere('to_user_id', $usrid);
            });
        }
        return $this->ok("Comments", ['data' => $comments->get()]);
    }

    public function add(Request $request)
    {
        $data = $request->all();
        // Log::info("comment add :",$data);
        $err = $this->validate($data, [
            'msg' => 'required|string|max:1000',
            'pid' => 'nullable|integer|exists:projects,id',
            'tid' => 'nullable|integer|exists:tasks,id',
            'uid' => 'nullable|integer|exists:user,id',
            'files.*' => 'nullable|file|max:5120', // 5MB each
        ]);
        if ($err) return $err;

        $usrid = $this->getUserObj()->id;

        $newIds = [];

        if ($request->filled('msg')) {
            $cmt = Comment::create([
                'project_id' => $data['pid'] ?? null,
                'task_id' => $data['tid'] ?? null,
                'frm_user_id' => $usrid,
                'to_user_id' => $data['uid'] ?? null,
                'message' => $data['msg']
            ]);
            $newIds[] = $cmt->id;
        }

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $uploaded) {
                $folder =  $usrid . '_' 
                    . ($data['pid'] ?? 0) . '_' . ($data['tid'] ?? 0) 
                    . '_' . ($data['uid'] ?? 0);
                $filename = $uploaded->getClientOriginalName();
                $uploaded->storeAs('comments/'.$folder, $filename, 'public');
                $cmt = Comment::create([
                    'project_id' => $data['pid'] ?? null,
                    'task_id' => $data['tid'] ?? null,
                    'frm_user_id' => $usrid,
                    'to_user_id' => $data['uid'] ?? null,
                    'message' => $folder."/".$filename,
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

