<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class JobController extends Controller
{
    public function index()
    {
        $user = $this->getUserObj();
        $projects = hasRole("sa") ?
            Project::orderBy('name')->pluck("name", "id") :
            $user->projects()->orderBy('name')->pluck('name', 'projects.id');
        $projectIds = $projects->keys();
        $users = User::whereHas('projects',function($q) use($projectIds) {
            $q->whereIn('projects.id', $projectIds);
        })->distinct()->orderBy('uid')->pluck('uid', 'id');
        $jobs = Task::with("project")
            ->orderBy('updated_at', 'desc')
            ->get();
        if(!hasRole("sa")) $jobs = $jobs->where("user_id",$user->id);
        return view('user.jobs', compact('projects', 'users', 'jobs'));
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
            $task->used_hour = $task->used_hour1;
        }

        $task->save();

        return $this->ok('Task updated successfully');
    }
}
