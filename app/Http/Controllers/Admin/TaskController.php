<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Task\FilterRequest;
use App\Http\Requests\Admin\Task\StoreRequest;
use App\Http\Requests\Admin\Task\UpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $sort = $request->input('sort', 'asc');
        $taskQuery = Task::query();

        if (isset($data['title']) ) {
            $taskQuery->where('title', 'like', "%{$data['title']}%");
        }


        $taskQuery->orderBy('title', $sort);

        $tasks = $taskQuery->paginate(6);
        $projects = Project::all();
        return view('admin.task.index', compact('tasks', 'projects'));
    }

    public function show(Task $task)
    {
        $projects = Project::all();
        return view('admin.task.show', compact('task', 'projects'));
    }

    public function create()
    {
        $users = User::all();
        $projects = Project::all();
        return view('admin.task.create', compact('projects', 'users'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();


        if (isset($data['file'])) {
            $data['file'] = Storage::disk('public')->put('/files', $data['file']);
        }
        Task::firstOrcreate($data);
        return redirect()->route('admin.task.index');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();

        return view('admin.task.edit', compact('task', 'projects'));
    }

    public function update(Task $task, UpdateRequest $request)
    {
        $data = $request->validated();

        if (isset($data['file'])) {
            $data['file'] = Storage::disk('public')->put('/files', $data['file']);
        }
        $task->update($data);

        return redirect()->route('admin.task.show', compact('task'));
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.task.index');
    }

}

