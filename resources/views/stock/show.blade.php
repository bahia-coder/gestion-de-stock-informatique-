@extends('layouts.master')
@section('title')
Information Stock
@endsection
@section('titlr-page1')
        <h1>Information Stock </h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/stocks')}}" class="btn btn-success my-1" style="margin-left: 45px "><<</a>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                        les articles associé a ce stock
                        </div>
                        <div class="form-group">
                                <form action="{{route('stocks.showArticlesCommandés',$stock->id)}}" method="get">
                                            <button type="submit" class="btn btn-outline-secondary">
                                                Article Commandés
                                            </button>
                                </form>
            </div>

                    </div>
                    <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                            <th class="bg-primary">categorie</th>
                                <th class="bg-primary">marque</ class="bg-primary">
                                <th class="bg-primary">modele</th>
                                <th class="bg-primary">marche</th>
                                <th class="bg-primary">numero invontaire</th>
                                <th class="bg-primary">Etat</th>
                            </tr>
                            <tbody>
                                @foreach($arts as $key => $article)
                                <tr>
                                <td>{{\App\Models\Categorie::where('id',$stock->categorie_id)->first()->nom_categorie}}</td>
                                    <td>{{$stock->marque}}</td>
                                      <td>{{$stock->modele}}</td>
                                         <td>{{\App\Models\Marche::where('id',$stock->marche_id)->first()->nom_marche}}</td>
                                <td>{{$article->id}}</td>
                                <td>{{$article->etat}}</td>
                            </tr>
                                @endforeach

                            </tbody>
                        </thead>
                    </table>
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
