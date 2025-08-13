<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('name')->pluck("name", "id");
        $jobs = Task::with("project")->orderBy('updated_at', 'desc')->get();
        return view('user.jobs', compact('projects', 'jobs'));
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

        $task->stat = $data["stat"];
        if ($task->stat == "s") $task->start_date = now();
        if (in_array($task->stat, ["c", "f", "a"])) {
            $task->end_date = now();
        }

        $task->save();

        return $this->ok('Task updated successfully');
    }
}
