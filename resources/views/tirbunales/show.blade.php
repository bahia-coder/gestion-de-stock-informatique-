@extends('layouts.master')
@section('title')
Information Tirbunale
@endsection
@section('titlr-page1')
        <h1>Information Tirbunale </h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/tirbunales')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Information du Tirbunale {{$tirbunale->Nom}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('tirbunale.update',$tirbunale->id)}}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="Nom">Nom tirbunale </label>
                                <input type="text" class="form-control" name="Nom"
                                    value="{{($tirbunale->Nom)}}" disabled="disabled">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="Adresse">Adresse</label>
                                <input type="text" class="form-control" name="Adresse"
                                    value="{{($tirbunale->Adresse)}}" disabled="disabled">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="tel">telefone</label>
                                <input type="text" class="form-control" name="Ntelefone"
                                    value="{{($tirbunale->Ntelefone)}}"disabled="disabled">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="email">email</label>
                                <input type="text" class="form-control" name="email"
                                    value="{{($tirbunale->email)}}" disabled="disabled">
                            </div>
                            </div>
                        </form>
                    </div>
                   </div>
                </div>
            </div>
        </div>
@endsection
