@extends('layouts.master')
@section('title')
edit Fournisseur
@endsection
@section('titlr-page1')
        <h1>edit Fournisseur</h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/fournisseurs')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-2">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>edit Fournisseur {{$fr->id}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/fournisseurs/update/{{$fr->id}}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="NomComplet">NomComplet</label>
                                <input type="text" class="form-control" name="NomComplet"
                                    value="{{old('NomComplet',$fr->NomComplet)}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="Adresse">Adresse</label>
                                <input type="text" class="form-control" name="Adresse"

                                    value="{{old('Adresse',$fr->Adresse)}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="tel">tel</label>
                                <input type="text" class="form-control" name="tel"

                                    value="{{old('tel',$fr->tel)}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="email">email</label>
                                <input type="text" class="form-control" name="email"

                                    value="{{old('email',$fr->email)}}">
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                   </div>


                </div>
            </div>
        </div>
@endsection
