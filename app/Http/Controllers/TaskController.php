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

class TaskController extends Controller
{
    private $validateRules = [
        'project_id' => 'required|exists:projects,id',
        'user_id' => 'required|exists:user,id',
        'description' => 'nullable|string',
        'status' => 'nullable',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'target_hour'  => 'nullable|numeric|min:0',
        'used_hour'    => 'nullable|numeric|min:0',
    ];

    public function index()
    {
        $user = $this->getUserObj();
        $projects = hasRole("sa") ?
            Project::orderBy('name')->pluck("name", "id") :
            $user->projects()->orderBy('name')->pluck('name', 'projects.id');
        $users = User::orderBy('uid')->pluck("uid", "id");
        return view('user.tasks', compact('projects', 'users'));
    }

    private function mapObj($task, $typ = 0)
    {
        return [
            'id' => $task->id,
            'project_id' => $typ == 1 ? $task->project_id : ($task->project ? $task->project->name : '-'),
            'user_id' =>  $typ == 1 ? $task->user_id : ($task->user ? $task->user->uid : '-'),
            'title' => $task->title,
            'description' => $task->description,
            'status' => $typ == 1 ?
                $task->status : (taskStatDict()[$task->status] ?? $task->status),
            'start_date' => optional($task->start_date)->format('d-m-Y'),
            'end_date' => optional($task->end_date)->format('d-m-Y'),
            'target_hour' => number_format($task->target_hour ?? 0, 2),
            'used_hour' => number_format($task->used_hour1 ?? 0, 2),
            'created_at' => optional($task->created_at)->format('d-m-Y H:i:s'),
            'updated_at' => optional($task->updated_at)->format('d-m-Y H:i:s'),
        ];
    }

    public function getall(Request $request)
    {
        $tasks = Task::with('project')->with('user')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(fn($j) => $this->mapObj($j));

        return DataTables::of($tasks)->make(true);
    }

    public function get($id)
    {
        $task = Task::with('project')->find($id);
        if (!$task) {
            return $this->err("No such Task");
        }
        return $this->ok("Task details", ['data' => $task]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $validateRules2 = $this->validateRules;
        $validateRules2['title'] = [
            'required',
            'string',
            'max:200',
            Rule::unique('tasks', 'title')
                ->where(fn($query) => $query->where('project_id', $request->project_id)),
        ];
        $err = $this->validate($data, $validateRules2);
        if ($err) return $err;
        Task::create($data);
        return $this->ok('Task created successfully');
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) return $this->err("No such job");
        $data = $request->all();

        $validateRules2 = $this->validateRules;
        $validateRules2['title'] = [
            'required',
            'string',
            'max:200',
            Rule::unique('tasks', 'title')
                ->where(fn($query) => $query->where('project_id', $request->project_id))
                ->ignore($id),
        ];
        $err = $this->validate($data, $validateRules2);
        if ($err) return $err;

        $task->update($data);

        return $this->ok('Task updated successfully');
    }

    public function delete($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return $this->err("No such Task");
        }
        $task->delete();
        return $this->ok('Task deleted successfully');
    }
}
