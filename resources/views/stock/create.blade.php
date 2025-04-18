@extends('layouts.master')
@section('title')
ajouter a le stock
@endsection
@section('titlr-page1')
        <h1>ajouter a le stock</h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/stocks')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>ajouter a le stock</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/stocks/store" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="marque">marque </label>
                                <input type="text" class="form-control" name="marque"
                                    value="{{old('marque')}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="modele">modele</label>
                                <input type="text" class="form-control" name="modele"

                                    value="{{old('modele')}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="garantie">garantie</label>
                                <input type="text" class="form-control" name="garantie"

                                    value="{{old('garantie')}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="quantité">quantité</label>
                                <input type="number" class="form-control" name="quantité"

                                    value="{{old('quantité')}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="categorie_id">categorie</label>
                                    <select name="categorie_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach(\App\Models\Categorie::all() as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->nom_categorie}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group mb-3">
                                    <label for="marche_id">Marché</label>
                                    <select name="marche_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach(\App\Models\Marche::all() as $marche)
                                        <option value="{{$marche->id}}">{{$marche->nom_marche}}</option>
                                    @endforeach
                                    </select>
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
