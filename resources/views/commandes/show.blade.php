
@extends('layouts.master')
@section('title')
Informations détaillé sur la commande
@endsection
@section('titlr-page1')
        <h1>Informations détaillé sur la commande</h1>
@endsection
@section('content')
      <div class="container">
        <a href="{{url('/commandes')}}" class="btn btn-success my-1" style="margin-left: 45px"><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                        les articles associé a cette commande
                        </div>
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
                        </tr>
                            <tbody>
                                @foreach($arts as $key => $article)
                                <tr>
                                <td>{{\App\Models\Categorie::where('id',$stock->categorie_id)->first()->nom_categorie}}</td>
                                    <td>{{$stock->marque}}</td>
                                      <td>{{$stock->modele}}</td>
                                         <td>{{\App\Models\Marche::where('id',$stock->marche_id)->first()->nom_marche}}</td>
                                <td>{{$article->id}}</td>
                            </tr>
                                @endforeach
</tbody>
                        </thead>
                    </table>
                    <a href="{{route('commandes.decharge',$commande->id)}}"><button class="btn btn-success my-1">Show Decharge</button></a>
                   </div>
        </div>
@endsection
@section('scripts')
    @if(session()->has('success'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{session()->get('success')}}',
        showConfirmButton: false,
        timer: 4500
        })
    </script>
    @endif
@endsection
