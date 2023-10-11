<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Http\Requests\Admin\Project\UpdateRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('admin.project.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

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

