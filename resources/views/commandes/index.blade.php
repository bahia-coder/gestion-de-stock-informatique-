@extends('layouts.master')

@section('title')
    Stocks
@endsection
@section('titlr-page1')
        <h1>Stocks</h1>
@endsection

@section('content')

        <div class="container">
        <a href="{{url('/commandes')}}" class="btn btn-success my-1" style="margin-left: 50px;position: relative;top: 27px;left: px;"><<</a>
            <div class="form-group">
                                <form action="{{route('commandes.create')}}" method="get">
                                <button type="submit" class="btn btn-primary" style="margin-left: 45px; position: absolute;z-index: 999; right: 96px;top: 192px;">
                                            Ajouter new Commande
                                        </button>
                                <form action="" method="post">
            </div>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-2">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                        commandes
                        </div>
                    </div>
                    <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th class="bg-primary">Responsable</th>
                                <th class="bg-primary">Tirbunale</th>
                                <th class="bg-primary">contenu</th>
                                <th class="bg-primary">quantité</th>
                                <th class="bg-primary">date envoi</th>
                                <th class="bg-primary">Action</th>
                            </tr>
                            <tbody>
                                @foreach($commandes as $key => $commande)
                                <tr>
                                <td>{{\App\Models\User::where('id',$commande->user_id)->first()->Nom}}</td>
                                <td>{{\App\Models\Tirbunale::where('id',$commande->tirbunale_id)->first()->Nom}}</td>
                                <td>{{$commande->articles->first()->stock->categorie->nom_categorie}} {{$commande->articles->first()->stock->marque}} {{$commande->articles->first()->stock->modele}}</td>
                                <td>{{$commande->quantité}}</td>
                                <td>{{$commande->date_envoi}}</td>
                                @if($commande->confermer==0)
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('commandes.show',$commande->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('commandes.edit',$commande->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="{{route('commandes.delete',$commande->id)}}" class="btn btn-sm btn-danger mx-2" data-confirm="Êtes-vous sûr de vouloir supprimer cette commande ?">
                                    <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="{{route('commandes.confirmer',$commande->id)}}" class="btn btn-sm btn-success mx-2">
                                    <i class="fas fa-check-circle"></i>
                                    </a>


                                </td>
                            @else
                            <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('commandes.show',$commande->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-secondary mx-2" disabled="disabled">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="#" class="btn btn-sm btn-secondary mx-2">
                                    <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-secondary mx-2">
                                    <i class="fas fa-check-circle"></i>
                                    </a>


                                </td>
                            @endif
                                @endforeach
                            </tr>
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
