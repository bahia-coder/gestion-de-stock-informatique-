@extends('layouts.master')
@section('title')
Information Stock
@endsection
@section('titlr-page1')
        <h1>Articles Commandés </h1>
@endsection
@section('content')
        <div class="container">
            <div class="row ">
                <div class="col-md-10 mx-auto ">
                   <div class="card my-5">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                        les articles commandée
                        </div>
                    <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                            <th class="bg-primary">categorie</th>
                                <th class="bg-primary">marque</th>
                                <th class="bg-primary">modele</th>
                                <th class="bg-primary">marche</th>
                                <th class="bg-primary">numero invontaire</th>
                                <th class="bg-primary">commande</th>
                            </tr>
                            <tbody>
                                @foreach($arts as $key => $article)
                                <tr>
                                <td>{{\App\Models\Categorie::where('id',$stock->categorie_id)->first()->nom_categorie}}</td>
                                    <td>{{$stock->marque}}</td>
                                      <td>{{$stock->modele}}</td>
                                         <td>{{\App\Models\Marche::where('id',$stock->marche_id)->first()->nom_marche}}</td>
                                <td>{{$article->id}}</td>
                                <td>{{$article->commande_id}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                   </div>
        </div>
@endsection
