@extends('layouts.master')

@section('title')
    Stocks
@endsection
@section('titlr-page1')
        <h1>Stocks</h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/stocks')}}" class="btn btn-success" style="margin-left: 50px;position: relative;top: 20px;left: 3px; "><<</a>
            <div class="form-group">
                                <form action="{{route('stocks.create')}}" method="get" style="margin-left: 45px; position: absolute;z-index: 999; right: 96px;top: 180px;">
                                            <button type="submit" class="btn btn-primary my-1">
                                                Ajouter new Stock
                                            </button>
                                <form action="" method="post">
            </div>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                        Stocks
                        </div>
                    </div>
                    <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th class="bg-primary">Categorie</th>
                                <th class="bg-primary">Marque</th>
                                <th class="bg-primary">Modele</th>
                                <th class="bg-primary">garantie</th>
                                <th class="bg-primary">quantité</th>
                                <th class="bg-primary">Marche</th>
                                <th class="bg-primary">Action</th>
                            </tr>
                            <tbody>
                                @foreach($stocks as $key => $stock)
                                <tr>
                                @if($stock->quantité > 5)
                                <td>{{\App\Models\Categorie::where('id',$stock->categorie_id)->first()->nom_categorie}}</td>
                                <td>{{$stock->marque}}</td>
                                <td>{{$stock->modele}}</td>
                                <td>{{$stock->garantie}}</td>
                                <td>{{$stock->quantité}}</td>
                                <td>{{\App\Models\Marche::where('id',$stock->marche_id)->first()->nom_marche}}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('stocks.show',$stock->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('stocks.edit',$stock->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if ($stock->articles()->whereHas('commande')->exists())
                                        <a href="#" class="btn btn-sm btn-secondary mx-2">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('stocks.delete', $stock->id) }}" class="btn btn-sm btn-danger mx-2" data-confirm="Êtes-vous sûr de vouloir supprimer ce tribunal ?">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            @else
                            <td class="text text-danger">{{\App\Models\Categorie::where('id',$stock->categorie_id)->first()->nom_categorie}}</td>
                                <td class="text text-danger">{{$stock->marque}}</td>
                                <td class="text text-danger">{{$stock->modele}}</td>
                                <td class="text text-danger">{{$stock->garantie}}</td>
                                <td class="text text-danger">{{$stock->quantité}}</td>
                                <td class="text text-danger">{{\App\Models\Marche::where('id',$stock->marche_id)->first()->nom_marche}}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('stocks.show',$stock->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('stocks.edit',$stock->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if ($stock->articles()->whereHas('commande')->exists())
                                        <a href="#" class="btn btn-sm btn-secondary mx-2">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('stocks.delete', $stock->id) }}" class="btn btn-sm btn-danger mx-2" data-confirm="Êtes-vous sûr de vouloir supprimer ce tribunal ?">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            @endif
                            </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                   </div>
                   </div>
                </div>
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
        timer: 1500
        })
    </script>
    @endif
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const confirmLinks = document.querySelectorAll('[data-confirm]');
    confirmLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const message = this.getAttribute('data-confirm');
            Swal.fire({
                title: 'Are you sure?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = this.getAttribute('href');
                }
            });
        });
    });
});
</script>
@endsection
