<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
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
    public function index(Request $request)
    {
        $query = User::orderByDesc('id');
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }
        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'LIKE', '%' . $value . '%');
        }
        if (!empty($value = $request->get('email'))) {
            $query->where('email', $value);
        }
        if (!empty($value = $request->get('role'))) {
            $query->where('role', $value);
        }
        $roles = User::getRoles();
        $users = $query->paginate(20);
        return view('admin.users.index', compact('users', 'roles'));
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
    public function store(CreateUserRequest $request)
    {
        // if (!$request->input('password')) {
        //     $request['password'] = 'secret';
        // }

        $user = User::create($request->only('name', 'email', 'role', 'password'));
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


    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update($request->only(['name', 'email', 'password']));
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

    public function verifyUser(User $user)
    {
        $user->update(['email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        return redirect()->route('admin.users.show', $user);
    }
}
