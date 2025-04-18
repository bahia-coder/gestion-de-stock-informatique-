@extends('layouts.master')
@section('title')
Add new Tirbunale
@endsection
@section('titlr-page1')
        <h1>Add new Tirbunales</h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/tirbunales')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Add new Tribunale</h4>
                        </div>

                    <div class="card-body">
                        <form action="{{route('tirbunale.store')}}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="NomComplet">Nom du tribunale </label>
                                <input type="text" class="form-control" name="Nom"
                                    placeholder="Nom tribunale">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="Adresse">Adresse</label>
                                <input type="text" class="form-control" name="Adresse"
                                    placeholder="Adresse">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="Ntelefone">telefone</label>
                                <input type="text" class="form-control" name="Ntelefone"
                                    placeholder="N telefone">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                <input type="text" class="form-control" name="email"
                                    placeholder="Votre Email">
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Envoyer
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
