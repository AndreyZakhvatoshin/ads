@extends('layouts.app')
@section('content')
@include('admin.user._nav')
<form method="POST" action="{{ route('admin.users.store') }}">
    <div class="mb-3">
      <label for="name" class="form-label">Имя</label>
      <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
      @if ($errors->has('name'))
        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
      @endif
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input name="email" type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
      @if ($errors->has('email'))
        <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>
@endsection
