@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.posts.update', $post['id']) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input value="{{ old('title', $post['title']) }}"
                        type="text"
                        name="title"
                        class="form-control"
                        id="title"
                        placeholder="Enter the name of the post"
                        class="@error('title') is-invalid @enderror">
                    
                    @error('title')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">content</label>
                    <textarea class="form-control"
                        name="content"
                        id="content"
                        class="@error('content') is-invalid @enderror">{!! old('content', $post['content']) !!}</textarea>
                    
                    @error('content')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" name="type" id="type">
                        <option value="">-- seleziona --</option>
                        <option value="a" {{ $post['type'] == 'a' ? 'selected' : null}}>a</option>
                        <option value="b" {{ $post['type'] == 'b' ? 'selected' : null}}>b</option>
                    </select>
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection