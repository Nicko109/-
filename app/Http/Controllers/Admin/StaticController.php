<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index()
    {



        return view('admin.static.index');
    }
}

