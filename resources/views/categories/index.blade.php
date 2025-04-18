@extends('layouts.master')
@section('title')
 liste des categories
@endsection
@section('titlr-page1')
categorie
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
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

@section('content')
<div class="container">
<a href="{{url('/home')}}" class="btn btn-success my-1" style="margin-left: 50px;position: relative;top: 20px;left: 3px;"><<</a>
        <div class="form-group">
            <form action="{{route('categories.create')}}" method="get">
                <button type="submit" class="btn btn-primary" style="margin-left: 45px; position: absolute;z-index: 999; right: 96px;top: 192px;">
                     create new categorie
                </button>
           <form action="" method="get">
         </div>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                          Categorie
                        </div>
                    </div>
                    <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th class="bg-primary">ID</th>
                                <th class="bg-primary">Nom Categorie</th>
                                <th class="bg-primary">Event</th>
                            </tr>
                            <tbody>
                                @foreach($categories as $categorie)
                                <tr>
                                <td>{{$categorie->id}}</td>
                                <td>{{$categorie->nom_categorie}}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('categories.show',$categorie->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('categorie.edit',$categorie->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($categorie->stocks()->exists())
                                        <a href="#" class="btn btn-sm btn-secondary mx-2">
                                        <i class="fas fa-trash"></i>
                                        </a>
                                    @else
                                        <a href="{{route('categorie.destroy',$categorie->id)}}" class="btn btn-sm btn-danger mx-2" data-confirm="Êtes-vous sûr de vouloir supprimer ce catégorie ?">
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
