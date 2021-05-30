@extends('layouts.app')
@section('content')
    <div class="container">
        @include('admin.user._nav')
        <div class="d-flex flex-row mb-3 py-2">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-1">Редактировать</a>
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
@endsection
