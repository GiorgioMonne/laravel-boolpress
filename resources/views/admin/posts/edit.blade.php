@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h2>Modifica Post: {{$post->title}}</h2>
                    
                </div> 

                <div class="card-body">

                    <form action="{{route("posts.update", $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci un titolo ..." value="{{old('title', $post->title)}}">

                            @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea  class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" placeholder="Inserisci il contenuto del post ...">{{old('content', $post->content)}}</textarea>
                            
                            @error('content')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="custom-select @error('content') is-invalid @enderror" name="category_id" id="category" >
                                <option value="">Seleziona una categoria ...</option>

                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{old("category_id", $post->category_id) == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <p>Tags</p>
                            
                            @foreach ($tags as $tag)
                                
                                <div class="form-group form-check form-check-inline">

                                    @if (old("tags"))
                                        <input type="checkbox" class="form-check-input " id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id,old("tags", []) ) ? 'checked' : ""}}>
                                    @else
                                        <input type="checkbox" class="form-check-input " id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'checked' : ""}}>
                                    @endif
                                    
                                    <label class="form-check-label" for="{{$tag->slug}}" >{{$tag->name}}</label>
                                </div>

                            @endforeach

                            @error('tags')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>

                        <div class="form-group form-check">

                            <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old('published', $post->published) ? 'checked' : ''}}>
                            <label class="form-check-label" for="published" >Pubblica</label>
                            
                            @error('published')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group  mb-3">
                            {{-- @if($post->image)
                                <img width="100" src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">
                            @endif --}}
                            <input type="file" id="image" name="image">
                            <label  for="image">Aggiungi immagine...</label>

                            @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Modifica</button>
                    </form>
                    
                </div>
               
            </div>
        </div>
    </div>
</div>
    
@endsection
