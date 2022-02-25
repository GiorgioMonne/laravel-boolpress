@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista Post</div>

                

                <div class="card-body">

                    <a href="{{route("categories.create")}}"><button type="button" class="btn btn-success">Crea Post</button></a>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Azioni</th>
                          </tr>
                        </thead>
                        <tbody> 
                            
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        @if($category->published)
                                            <span  class="badge badge-success">Pubblicato</span>
                                        @else
                                            <span class="badge badge-secondary">Trade</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route("categories.show", $category->id)}}"><button type="button" class="btn btn-info">Visualizza</button></a>
                                    </td>
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
