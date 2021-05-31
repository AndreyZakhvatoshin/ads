@extends('layouts.app')
@section('content')
    <div class="container">
        @include('admin.users._nav')
        <div class="d-flex flex-row mb-3 py-2">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-1">Редактировать</a>
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Удалить</button>
            </form>
        </div>
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>ID</th><td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Name</th><td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th><td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                    @if ($user->isAdmin())
                        <span class="badge badge-danger">Admin</span>
                    @else
                        <span class="badge badge-secondary">User</span>
                    @endif
                </td>
            </tr>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
