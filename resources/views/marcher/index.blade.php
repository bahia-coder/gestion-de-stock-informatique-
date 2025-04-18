@extends('layouts.master')

@section('title')
    liste of marches
@endsection
@section('titlr-page1')
        <h1>liste of marches</h1>
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/marcher')}}" class="btn btn-success my-1" style="margin-left: 50px;position: relative;top: 25px;left: 3px;"><<</a>
        <div class="form-group">
                            <form action="{{route('marcher.create')}}" method="get">
                                        <button type="submit" class="btn btn-primary" style="margin-left: 45px; position: absolute;z-index: 999; right: 96px;top: 192px;">
                                            Ajouter new marcher
                                        </button>
                            <form action="" method="post">

         </div>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                        Marcher
                        </div>
                    </div>
                    <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th class="bg-primary">ID</th>
                                <th class="bg-primary">Nom_marcher</th>
                                <th class="bg-primary">DESCRIPTION</th>
                                <th class="bg-primary">FORNISSEUR</th>
                                <th class="bg-primary">ACTIONS</th>
                            </tr>
                            <tbody>
                                @foreach($marche as $key => $fr)
                                <tr>
                                <td>{{$fr->id}}</td>
                                <td>{{$fr->nom_marche}}</td>
                                <td>{{$fr->description}}</td>
                                <td>{{\App\Models\Fournisseur::where('id',$fr->fournisseur_id)->first()->NomComplet}}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('marcher.show',$fr->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('marcher.edit',$fr->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($fr->stocks()->exists())
                                        <a href="#" class="btn btn-sm btn-secondary mx-2">
                                        <i class="fas fa-trash"></i>
                                        </a>
                                    @else
                                        <a href="{{route('marcher.delete',$fr->id)}}" class="btn btn-sm btn-danger mx-2" data-confirm="Êtes-vous sûr de vouloir supprimer ce marché ?">
                                        <i class="fas fa-trash"></i>
                                        </a>
                                    @endif


                                </td>
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
@endsection
