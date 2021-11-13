@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4 mb-4">Tutte le categorie</h1>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category['id'] }}</th>
                                <td>{{ $category['name'] }}</td>
                                <td>{{ $category['slug'] }}</td>
                                <td>
                                    <a href="{{route('admin.categories.show', $category['slug'])}}"
                                        class="btn btn-info">
                                        Details
                                    </a>
                                    <a href=""
                                        class="btn btn-warning">
                                        Modify
                                    </a>
                                    <form class="d-inline-block" method="post" action="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete_post">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection