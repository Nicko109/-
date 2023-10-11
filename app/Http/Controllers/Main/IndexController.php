<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Получаем текущего пользователя

        $projects = Project::where('user_id', $user->id)->paginate(5);

        $tasks = Task::where('user_id', $user->id)->paginate(5);

        return view('personal.main.index', compact('projects', 'tasks', 'user'));
    }
}

