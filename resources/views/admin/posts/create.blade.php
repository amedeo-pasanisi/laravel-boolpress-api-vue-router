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
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            placeholder="Enter the name of the post">
                    
                        @error('title')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('title') is-invalid @enderror" name="content" id="content">{{old('content')}}</textarea>
                        
                        @error('content')
                            <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">category</label>                        
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">-- seleziona --</option>
                            @foreach ($categories as $category)
                                {{-- in value inserisco l'id della category dato che è l'id ad essere salvato
                                (grazie alle fillable e all'attributo name del tag select)
                                nella colonna category_id della tabella posts --}}
                                <option value="{{$category['id']}}"
                                    {{old('category_id') == $category['id'] ? 'selected' : null}}>
                                    {{$category['name']}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input id="{{"tag" . $tag->id}}" value="{{$tag->id}}" name="tags[]" class="form-check-input" type="checkbox">
                                <label for="{{"tag" . $tag->id}}" class="form-check-label">{{$tag->name}}</label>
                            </div> 
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection