@extends('layouts.master')
@section('title')
Information Fournisseur
@endsection
@section('titlr-page1')
        <h1>Information Fournisseur </h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/fournisseurs')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-2">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Information Fournisseur {{$fr->NomComplet}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/fournisseurs/update/{{$fr->id}}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="NomComplet">NomComplet</label>
                                <input type="text" class="form-control" name="NomComplet"
                                    value="{{($fr->NomComplet)}}" disabled="disabled">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="Adresse">Adresse</label>
                                <input type="text" class="form-control" name="Adresse"
                                    value="{{($fr->Adresse)}}" disabled="disabled">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="tel">tel</label>
                                <input type="text" class="form-control" name="tel"
                                    value="{{($fr->tel)}}"disabled="disabled">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="email">email</label>
                                <input type="text" class="form-control" name="email"
                                    value="{{($fr->email)}}" disabled="disabled">
                            </div>
                            </div>
                        </form>
                    </div>
                   </div>


                </div>
            </div>
        </div>
@endsection
