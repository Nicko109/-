<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function create()
    {
        $roles = User::getRoles();

        return view('admin.user.create', compact('roles'));
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

