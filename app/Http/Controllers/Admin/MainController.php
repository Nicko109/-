<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['projectsCount'] = Project::all()->count();
        $data['tasksCount'] = Task::all()->count();


        return view('admin.main.index', compact('data'));
    }
}

