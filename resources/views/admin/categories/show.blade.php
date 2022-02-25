@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{$category->name}}
                </div>  

                <div class="card-body ">

                    <div class="mb-3">
                        <td>
                            <a href="{{route("categories.edit", $category->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                        </td>

                        <td>
                            <form action="{{route("categories.destroy", $category->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </div>
                    <div class="mb-3">
                        slug: {{$category->slug}}
                    </div> 

                    @if (count($category->posts) > 0)
                        <div class="mb-3">
                            <h3>Lista Categorie assocciate</h3>
                            <ul>
                                @foreach ($category->posts as $post)
                                    <li>{{$post->title}}</li>
                                @endforeach
                            </ul>
                        </div> 
                    @endif

            </div>
        </div>
    </div>
</div>
    
@endsection
