<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Crypt;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::new($request['name'], $request['email']);
        return redirect()->route('admin.users.index')->with('success', 'Пользователь добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }


    public function edit(User $user)
    {
        $roles = User::getRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,id,' . $user->id,
            'role' => ['required', 'string', Rule::in([User::ROLE_ADMIN, User::ROLE_USER])],
        ]);
        $user->update($data);
        return redirect()->route('admin.users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', "Пользователь {$user->name} удален");
    }
}
