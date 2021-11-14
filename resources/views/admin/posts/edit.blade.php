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
                <div class="form-group">
                    <label for="category_id">category</label>                        
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">-- seleziona --</option>
                        @foreach ($categories as $category)
                            <option value="{{$category['id']}}"
                                {{old('category_id', $post->category_id) == $category['id'] ? 'selected' : null}}>
                                {{$category['name']}}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            @if ($errors->any())
                                <input
                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : null}}
                                id="{{"tag" . $tag->id}}"
                                value="{{$tag->id}}"
                                name="tags[]"
                                class="form-check-input"
                                type="checkbox">
                                <label for="{{"tag" . $tag->id}}" class="form-check-label">{{$tag->name}}</label>
                            @else
                                <input
                                {{ $post->tags->contains($tag) ? 'checked' : null}}
                                id="{{"tag" . $tag->id}}"
                                value="{{$tag->id}}"
                                name="tags[]"
                                class="form-check-input"
                                type="checkbox">
                                <label for="{{"tag" . $tag->id}}" class="form-check-label">{{$tag->name}}</label>
                            @endif
                        </div> 
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection