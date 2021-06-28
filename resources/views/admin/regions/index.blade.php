@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Добавить регион</a>

        @include('admin.users._nav')
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Название</th>
                <th scope="col">Slug</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($regions as $region)
                    <tr>
                        <td scope="row">{{ $region->id }}</td>
                        <td><a class="link" href="{{ route('admin.users.show', $region) }}">{{ $region->name }}</a></td>
                        <td>{{ $region->slug }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {!! $regions->links() !!}
        </div>
    </div>
@endsection
