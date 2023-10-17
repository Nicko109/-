<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\FilterRequest;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $role = $request->input('role', 'selected');

        $sort = $request->input('sort', 'asc');

        $column = $request->input('column', 'name');

        $userQuery = User::query();

        if (isset($data['name']) || isset($data['email'])) {
            $userQuery->where(function ($query) use ($data) {
                if (isset($data['name'])) {
                    $query->orWhere('name', 'like', "%{$data['name']}%");
                }
                if (isset($data['email'])) {
                    $query->orWhere('email', 'like', "%{$data['email']}%");
                }
            });
        }

        if ($role !== 'selected') {
            $userQuery->where('role', $role);
        }

        $userQuery->orderBy($column, $sort);

        $users = $userQuery->paginate(3);

        $roles = User::getRoles();

        return view('admin.user.index', compact('users', 'roles'));
    }

    public function show(User $user)
    {
        $taskQuery = Task::where('user_id', $user->id);
        $tasks = $taskQuery->paginate(6);
        $projects = Project::all();
        return view('admin.user.show', compact('user', 'tasks', 'projects'));
    }

    public function create()
    {
        $roles = User::getRoles();

        return view('admin.user.create', compact('roles' ));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        User::firstOrcreate(['email' => $data['email']], $data);

        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {

        $roles = User::getRoles();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(User $user, UpdateRequest $request)
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('admin.user.show', compact('user'));
    }

    public function delete(User $user)
    {

        $user->delete();

        return redirect()->route('admin.user.index');
    }

}

