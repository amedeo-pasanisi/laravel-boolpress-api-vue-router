@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.posts.store') }}" method="post">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                            name="title"
                            value="{{old('title')}}"
                            class="form-control"
                            id="title"
                            placeholder="Enter the name of the post"
                            class="@error('title') is-invalid @enderror">
                    
                        @error('title')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" id="content" class="@error('content') is-invalid @enderror">{{old('content')}}</textarea>
                        
                        @error('content')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="type">Type</label>                        
                        <select class="form-control" name="type" id="type">
                            <option value="">-- seleziona --</option>
                            <option value="a">a</option>
                            <option value="b">b</option>
                        </select>
                        @error('type')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection