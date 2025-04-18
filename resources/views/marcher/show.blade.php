@extends('layouts.master')
@section('title')
Information Marche
@endsection
@section('titlr-page1')
        <h1>Information Marche </h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/marcher')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Information Marche {{$fr->nom_marche}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/marcher/update/{{$fr->id}}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nom_marche">Nom Marcher</label>
                                <input type="text" class="form-control" name="nom_marche"
                                    value="{{($fr->nom_marche)}}" disabled="disabled">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="Adresse">Description</label>
                                <input type="text" class="form-control" name="description"

                                    value="{{($fr->description)}}" disabled="disabled">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="fournisseur_id">fournisseur</label>
                                    <input type="text" class="form-control" name="nom_marcher"
                                    value="{{\App\Models\Fournisseur::where('id',$fr->fournisseur_id)->first()->NomComplet}}" disabled="disabled">
                            </div>
                                <div class="form-group">
                                <div class="pull-right" style="margin-bottom:10px;">
                                  </div>
                                </div>
                            </div>

                        </form>
                    </div>
                   </div>


                </div>
            </div>
        </div>
@endsection
