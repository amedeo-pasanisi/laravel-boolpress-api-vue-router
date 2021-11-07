@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4 mb-4">Dettaglio {{ $post['title'] }}</h1>
                <ul>
                    <li>{!! $post['content'] !!}</li>
                    <li>{!! $post['slug'] !!}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection