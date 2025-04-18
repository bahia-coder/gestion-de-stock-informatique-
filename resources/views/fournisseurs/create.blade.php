@extends('layouts.master')
@section('title')
Add new Fournisseur
@endsection
@section('titlr-page1')
        <h1>Add new Fournisseur</h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/fournisseurs')}}" class="btn btn-success my-1" style="margin-left: 45px"> << </a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-2">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Add new Fournisseur</h4>
                        </div>
                    <div class="card-body">
                        <form action="/fournisseurs/store" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="NomComplet">NomComplet</label>
                                <input type="text" class="form-control" name="NomComplet"
                                    placeholder="NomComplet"
                                    value="{{old('NomComplet')}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="Adresse">Adresse</label>
                                <input type="text" class="form-control" name="Adresse"
                                    placeholder="Adresse"
                                    value="{{old('Adresse')}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="tel">tel</label>
                                <input type="text" class="form-control" name="tel"
                                    placeholder="tel"
                                    value="{{old('tel')}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="email">email</label>
                                <input type="text" class="form-control" name="email"
                                    placeholder="email"
                                    value="{{old('email')}}">
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
