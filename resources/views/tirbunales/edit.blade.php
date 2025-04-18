@extends('layouts.master')
@section('title')
Edit Tirbunale
@endsection
@section('titlr-page1')
        <h1>Edit Tirbunale</h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/tirbunales')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                            <h4>Edit Tirbunale {{$tirbunale->id}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('tirbunale.update',$tirbunale->id)}}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="Nom">Nom Tribunale</label>
                                <input type="text" class="form-control" name="Nom" value="{{$tirbunale->Nom}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="Adresse">Adresse</label>
                                <input type="text" class="form-control" name="Adresse"
                                    placeholder="Adresse"  value="{{$tirbunale->Adresse}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="tel">telefone</label>
                                <input type="text" class="form-control" name="Ntelefone"
                                    placeholder="N telefone"  value="{{$tirbunale->Ntelefone}}">
                            </div>
                            <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                <input type="text" class="form-control" name="email"
                                    placeholder="Votre Email"value="{{$tirbunale->email}}">
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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
