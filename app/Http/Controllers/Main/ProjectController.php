<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Project\StoreRequest;
use App\Http\Requests\Main\Project\UpdateRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public function create()
    {
        $user = Auth::user();

        $projects = Project::where('user_id', $user->id)->paginate(5);

        return view('personal.project.create', compact('projects'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        Project::firstOrcreate($data);


        return redirect()->route('personal.main.index');
    }


}

