<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['projectsCount'] = Project::all()->count();
        $data['tasksCount'] = Task::all()->count();

        $startDate = $request->input('start_date', Carbon::now()->subDays(5));
        $endDate = $request->input('end_date', Carbon::now());


        $data['projectsCreatedInPeriod'] = Project::whereBetween('created_at', [$startDate, $endDate])->count();
        $data['tasksCreatedInPeriod'] = Task::whereBetween('created_at', [$startDate, $endDate])->count();
        $data['usersCreatedInPeriod'] = User::whereBetween('created_at', [$startDate, $endDate])->count();

        return view('admin.main.index', compact('data'));
    }
}

