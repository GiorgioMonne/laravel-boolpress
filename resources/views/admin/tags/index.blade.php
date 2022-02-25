@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista Post</div>

                

                <div class="card-body mb-3">

                    <a href="{{route("tags.create")}}"><button type="button" class="btn btn-success mb-3">Aggiungi Categoria</button></a>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Slug</th>
                          </tr>
                        </thead>
                        <tbody> 
                            
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->slug}}</td>
                                    
                                    <td>
                                        <a href="{{route("tags.show", $tag->id)}}"><button type="button" class="btn btn-info">Visualizza</button></a>
                                    </td>
                                    <td>
                                        <a href="{{route("tags.edit", $tag->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                                    </td>

                                    <td>
                                        <form action="{{route("tags.destroy", $tag->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
