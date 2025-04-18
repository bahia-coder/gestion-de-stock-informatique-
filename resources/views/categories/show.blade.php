@extends('layouts.master')
@section('title')
information categorie
@endsection
@section('css')


@endsection
@section('titlr-page2')
   categorie
@endsection

@section('content')
<div class="container">
<a href="{{url('/categories')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                  <div class="card my-2">
                     <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Information Categorie {{$categorie->nom_categorie}}</h4>
                        </div>
                      </div>
                      <div class="card-body">
                        <form action="{{route('categories.update',$categorie->id)}}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nom_categorie">Nom Categorie</label>

                                <input type="text" class="form-control" name="NomCat"
                                    value="{{($categorie->nom_categorie)}}" disabled="disabled">
                            </div>
                          </form>
                       </div>
                  </div>
                </div>
             </div>
    </div>
    @endsection
