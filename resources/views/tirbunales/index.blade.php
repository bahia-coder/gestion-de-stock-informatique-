@extends('layouts.master')

@section('title')
    liste des tirbunales
@endsection
@section('titlr-page1')
        <h1>liste des tribunales</h1>
@endsection
@section('content')
        <a href="{{url('/home')}}" class="btn btn-success my-1" style="margin-left: 50px;  position: relative;top: 20px;left: 12px;"><<</a>
        <div class="container">
        <div class="form-group">
            <form action="{{route('tirbunale.create')}}" method="get">
                <button type="submit" class="btn btn-primary my-1" style="margin-left: 45px; position: absolute;z-index: 999; right: 96px;top: 192px;">
                    Add new Tribunal </button>
            <form action="" method="post">
        </div>
      <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card my-1">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                         Tribunal
                        </div>
                    </div>
                    <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="bg-primary">ID</th>
            <th class="bg-primary">Nom T</th>
            <th class="bg-primary">Adresse</th>
            <th class="bg-primary">tel</th>
            <th class="bg-primary">Email</th>
            <th class="bg-primary">Event</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tirbunales as $tirbunale)
        <tr>
            <td>{{$tirbunale->id}}</td>
            <td>{{$tirbunale->Nom}}</td>
            <td>{{$tirbunale->Adresse}}</td>
            <td>{{$tirbunale->Ntelefone}}</td>
            <td>{{$tirbunale->email}}</td>
            <td class="d-flex justify-content-center align-items-center">
            <a href="{{route('tirbunale.show',$tirbunale->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('tirbunale.edit',$tirbunale->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($tirbunale->commandes()->exists())
                                        <a href="#" class="btn btn-sm btn-secondary mx-2">
                                        <i class="fas fa-trash"></i>
                                        </a>
                                    @else
                                        <a href="{{route('tirbunale.delete',$tirbunale->id)}}" class="btn btn-sm btn-danger mx-2" data-confirm="Êtes-vous sûr de vouloir supprimer ce marché ?">
                                        <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
            </td>
        </tr>
        @endforeach
    </tbody>
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
