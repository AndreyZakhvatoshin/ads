@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Добавить пользователя</a>
        <form action="?" method="GET">
            <div class="row">
                <div class="col-sm-1">
                    <div class="form-group">
                        <label for="id" class="col-form-label">ID</label>
                        <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Имя</label>
                        <input id="name" class="form-control" name="name" value="{{ request('name') }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input id="email" class="form-control" name="email" value="{{ request('email') }}">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group role-select">
                        <div class="role-select">
                            <label for="role" class="col-form-label">Роль</label>
                        </div>
                        <select id="role" class="form-select form-control" name="role">
                            <option value=""></option>
                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}"{{ $value === request('role') ? ' selected' : '' }}>{{ $label }}</option>
                            @endforeach;
                        </select>
                    </div>


                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="col-form-label">&nbsp;</label><br />
                        <button type="submit" class="btn btn-primary btn-block">Найти</button>
                    </div>
                </div>
            </div>
        </form>
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
          <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    </div>
@endsection
