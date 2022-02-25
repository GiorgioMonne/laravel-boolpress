@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{$post->title}}
                </div>  

                <div class="card-body">

                    <div class="mb-3">
                        @if ($post->image)
                            <img src="{{asset("storage/{$post->image}")}}" alt="">
                        @endif
                    </div>

                    <div class="mb-3">
                        <td>
                            <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                        </td>

                        <td>
                            <form action="{{route("posts.destroy", $post->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </div>

                    <div class="mb-3">
                        <strong>Stato:</strong>
                        @if($post->published)
                            <span  class="badge badge-success">Pubblicato</span>
                        @else
                            <span class="badge badge-secondary">Trade</span>
                        @endif
                    </div>

                    @if ($post->category)

                        <div class="mb-3">
                            <strong>Categoria:</strong>
                            {{$post->category->name}}                     
                        </div>
                        
                    @endif

                    <div class="mb-3">

                        @if(count($post->tags) > 0)
                            <strong>Tags:</strong>
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-primary">{{$tag->name}}</span>
                            @endforeach
                                                  
                        @endif

                    </div>

                    {{$post->content}}
                </div>
               
            </div>
        </div>
    </div>
</div>
    
@endsection
