<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Task\StoreRequest;
use App\Http\Requests\Admin\Task\UpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{


    public function create()
    {
        $user = Auth::user();

        $projects = Project::where('user_id', $user->id)->paginate(8);

        return view('personal.task.create', compact('projects', 'user'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        if (isset($data['file'])) {
            $data['file'] = Storage::disk('public')->put('/files', $data['file']);
        }
        Task::firstOrcreate($data);
        return redirect()->route('personal.main.index');
    }


    public function toggleStatus(Task $task)
    {
        $currentStatus = $task->status;

        $task->status = $currentStatus === 0 ? 1 : 0;

        $task->save();


        return redirect()->back();
    }

}

