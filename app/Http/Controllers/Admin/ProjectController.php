<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\FilterRequest;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Http\Requests\Admin\Project\UpdateRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $projectQuery = Project::query();

        $sort = $request->input('sort', 'asc');

        if (isset($data['title'])) {
            $projectQuery->where('title', 'like', "%{$data['title']}%");
        }

        $projectQuery->orderBy('title', $sort);

        $projects = $projectQuery->paginate(7);

        return view('admin.project.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    public function create()
    {
        $users = User::all();


        return view('admin.project.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();


        Project::firstOrcreate($data);

        return redirect()->route('admin.project.index');
    }

    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    public function update(Project $project, UpdateRequest $request)
    {
        $data = $request->validated();
        $project->update($data);

        return redirect()->route('admin.project.show', compact('project'));
    }

    public function delete(Project $project)
    {

        $project->delete();

        return redirect()->route('admin.project.index');
    }

}

