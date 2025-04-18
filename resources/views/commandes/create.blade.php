@extends('layouts.master')
@section('title')
ajouter Commande
@endsection
@section('titlr-page1')
        <h1>ajouter Commande</h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/commandes')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-2">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase" >
                            <h4>ajouter Commande</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/commandes/store" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="tirbunale_id">tirbunale </label>
                                <select name="tirbunale_id" class="form-control">
                                    @foreach(\App\Models\Tirbunale::all() as $tirbunale)
                                        <option value="{{$tirbunale->id}}">{{$tirbunale->Nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                    <label for="categorie_id">catégorie</label>
                                    <select name="categorie_id" class="form-control">
                                    @foreach(\App\Models\Stock::all() as $stock)
                                        <option value="{{$stock->id}}">{{$stock->categorie->nom_categorie}} {{$stock->marque}} {{$stock->modele}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group mb-3">
                                    <label for="quantité">quantité</label>
                                <input type="number" class="form-control" name="quantité"
                                    value="{{old('quantité')}}">
                                    @if(session()->has('echec'))
                                        <div class="text text-danger">{{session()->get('echec')}}'</div>
                                    @endif
                            </div>
                            <div class="form-group mb-3">
                                    <label for="date_envoi">date envoi</label>
                                    <input type="date" name="date_envoi" id="">
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
