<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Task\FilterRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(FilterRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        $taskQuery = Task::query()->where('user_id', $user->id)->with('project');


        if (isset($data['title'])) {
            $taskQuery->where('title', 'like', "%{$data['title']}%");
        }

        if ($request->has('project')) {
            $projectID = $request->input('project');
            $taskQuery->where('project_id', $projectID);
        }



            $filter = $request->input('filter');

            if ($filter) {
                if ($filter == 'today') {
                    $taskQuery->whereDate('deadline', now()->toDateString());
                } elseif ($filter == 'tomorrow') {
                    $taskQuery->whereDate('deadline', now()->addDay()->toDateString());
                } elseif ($filter == 'overdue') {
                    $taskQuery->whereDate('deadline', '<', now()->toDateString());
                } elseif ($filter == 'completed') {
                    $taskQuery->where('status', 1);
                }
            }

        $tasks = $taskQuery->paginate(6);


        $projects = Project::where('user_id', $user->id)->get();

        return view('personal.main.index', compact('projects', 'tasks', 'user'));
    }



}

