@extends('layouts.app')
@section('content')
    <div class="container">
        {{ session('success') }}
        <div class="tabs">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">Доска</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.users.index') }}">Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.regions.index') }}">Регионы</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
