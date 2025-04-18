@extends('layouts.master')
@section('title')
edit marcher
@endsection
@section('titlr-page1')
        <h1>edit marcher</h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/marcher')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>edit marcher {{$fr->id}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/marcher/update/{{$fr->id}}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="Nom_marcher">Nom_marcher</label>
                                <input type="text" class="form-control" name="Nom_marcher"
                                    value="{{old('Nom_marcher',$fr->nom_marche)}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="Description">Description</label>
                                <input type="text" class="form-control" name="Description"
                                    value="{{old('Description',$fr->description)}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="fournisseur_id">fournisseur</label>
                               <select name="fournisseur_id" class="form-control">
                                <option value="{{$fr->fournisseur_id}}">{{\App\Models\Fournisseur::where('id',$fr->fournisseur_id)->first()->NomComplet}}</option>
                                @foreach(\App\Models\Fournisseur::where('id','!=',$fr->fournisseur_id)->get() as $fournisseur)
                                <option value="{{$fournisseur->id}}">{{$fournisseur->NomComplet}}</option>
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
