@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Добавить пользователя</a>
        @include('admin.users._nav')
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Роль</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td><a class="link" href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
