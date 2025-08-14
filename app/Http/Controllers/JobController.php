<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;

class JobController extends Controller
{
    public function index()
    {
        $user = $this->getUserObj();
        $projects = $user->projects()->orderBy('name')->pluck('name', 'projects.id');
        $jobsP = Task::with("project")
            ->where("user_id", $user->id)
            ->where("status", "p")
            ->orderBy('updated_at', 'desc')
            ->get();
        $jobsS = Task::with("project")
            ->where("user_id", $user->id)
            ->where("status", "s")
            ->orderBy('updated_at', 'desc')
            ->get();
        $jobsC = Task::with("project")
            ->where("user_id", $user->id)
            ->whereNotIn('status', ['p', 's'])
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('user.jobs', compact('projects', 'jobsP', 'jobsS', 'jobsC'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) return $this->err("No such job");
        $data = $request->all();
        $err = $this->validate($data,  [
            'stat' => 'required',
        ]);
        if ($err) return $err;

        $task->status = $data["stat"];
        if ($task->status == "s") $task->start_date = now();
        if (in_array($task->stat, ["c", "f", "a"])) {
            $task->end_date = now();
            $task->used_hour = 5.63;
        }

        $task->save();

        return $this->ok('Task updated successfully');
    }
}
