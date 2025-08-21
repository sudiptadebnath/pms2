<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    public function index()
    {
        $user = $this->getUserObj();
        $jobs = Task::with("project")
            ->orderBy('sort_order')
            ->get();
        if (!hasRole("sa")) $jobs = $jobs->where("user_id", $user->id);
        return view('user.jobs', compact('jobs'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) return $this->err("No such job");

        $data = $request->all();
        $err = $this->validate($data, [
            'stat' => 'required',
        ]);
        if ($err) return $err;

        $user = User::find($task->user_id);

        if ($data['stat'] === 's') {
            $user->tasks()
                ->where('status', 's')
                ->where('id', '!=', $task->id)
                ->get()
                ->each(function ($t) {
                    $t->status = 'p';  // paused/stopped
                    $t->end_date = now();
                    $t->used_hour = $t->used_hour1;
                    $t->save();
                });
            // start the current task
            $task->status = 's';
            $task->start_date = now();
            $task->end_date = null;
        } else {
            // stopping/closing this task
            $task->status = $data["stat"];
            $task->end_date = now();
            $task->used_hour = $task->used_hour1;
        }

        $task->save();

        return $this->ok('Task updated successfully');
    }
}
