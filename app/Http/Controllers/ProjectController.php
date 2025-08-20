<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{

    private $validateRules =  [
        'name' => 'required|string|max:200|unique:projects,name',
        'description' => 'nullable|string',
        'status' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ];

    public function withhr(Request $request)
    {
        return $this->raw(Project::where('status', 'a')->orderBy('id')
            ->where('name', 'like', "%{$request->get("q", '')}%")
            ->get()->map->getWithHr());
    }

    public function withhrUsr(Request $request)
    {
        $user = $this->getUserObj();
        $projects = hasRole("sa")
            ? Project::where('status', 'a')->orderBy('id')
            : $user->projects()->orderBy('id');
        return $this->raw($projects
            ->where('name', 'like', "%{$request->get("q", '')}%")
            ->get()->map->getWithHr());
    }

    public function index()
    {
        return view('user.projects');
    }

    private function mapObj($project, $typ = 0)
    {
        return [
            'id' => $project->id,
            'name' => $project->name,
            'description' => $project->description,
            'status' => $typ == 1 ?
                $project->status : (projStatDict()[$project->status] ?? $project->status),
            'start_date' => optional($project->start_date)->format('d-m-Y'),
            'end_date' => optional($project->end_date)->format('d-m-Y'),
            'created_at' => optional($project->created_at)->format('d-m-Y H:i:s'),
            'users' => $typ == 1 ?
                $project->users->pluck('id') :
                $project->users->pluck('uid')->implode('<br>'),
        ];
    }

    public function getall(Request $request)
    {
        $projects = Project::orderBy('created_at', 'desc')->get()->map(fn($p) => $this->mapObj($p));
        return DataTables::of($projects)
            ->rawColumns(['users', 'description']) // prevent escaping
            ->make(true);
    }

    public function get($id)
    {
        $project = Project::with('users')->find($id);
        if (!$project) {
            return $this->err("No such project");
        }
        return $this->ok("Project details", ['data' => $this->mapObj($project, 1)]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        if (!empty($data['start_date'])) $data["start_date"] = dtsql($data["start_date"]);
        if (!empty($data['end_date'])) $data["end_date"] = dtsql($data["end_date"]);
        $err = $this->validate($data, $this->validateRules);
        if ($err) return $err;
        $userIds = $data['users'] ?? [];
        unset($data['users']);
        $project = Project::create($data);
        if (!empty($userIds)) {
            $project->users()->sync($userIds);
        }
        return $this->ok('Project created successfully');
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        if (!$project) {
            return $this->err("No such project");
        }
        $data = $request->all();
        if (!empty($data['start_date'])) $data["start_date"] = dtsql($data["start_date"]);
        if (!empty($data['end_date'])) $data["end_date"] = dtsql($data["end_date"]);
        $validateRules2 = $this->validateRules;
        $validateRules2['name'] = [
            'required',
            'string',
            'max:200',
            Rule::unique('projects', 'name')->ignore($id),
        ];
        $err = $this->validate($data, $validateRules2);
        if ($err) return $err;
        $userIds = $data['users'] ?? [];
        unset($data['users']);
        $project->update($data);
        $project->users()->sync($userIds);
        return $this->ok('Project updated successfully');
    }

    public function delete($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return $this->err("No such project");
        }
        $project->delete();
        return $this->ok('Project deleted successfully');
    }

    public function users($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return $this->err("No such project");
        }
        return $this->ok("User Lists", ["data" => $project->users()->select('user.id', 'user.uid')->get()]);
    }
}
