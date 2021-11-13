@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4 mb-4">Category {{ $category['name'] }}</h1>
                <ul>
                    <li>{!! $category['name'] !!}</li>
                    <li>{!! $category['slug'] !!}</li>
                </ul>
            </div>
            <div class="col-12">
                <h2 class="mt-4 mb-4">Posts list</h2>
                <ul>
                    @forelse ($category->posts as $post)
                        <li><a href="{{ route('admin.posts.show', $post['slug']) }}">{!! $post['title'] !!}</a></li>
                    @empty
                        <p>There is no post with this category</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection