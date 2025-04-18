@extends('layouts.master')
@section('title')
    liste of fournisseurs
@endsection
@section('content')
        <div class="container">
        <a href="{{url('/home')}}" class="btn btn-success my-1" style="margin-left: 50px;  position: relative;top: 20px;left: 5px;"><<</a>
        <div class="form-group">
                            <form action="{{route('fournisseurs.create')}}" method="get">
                                        <button type="submit" class="btn btn-primary " style="margin-left: 45px; position: absolute;z-index: 999; right: 96px;top: 192px;">
                                            Ajouter new fournisseur
                                        </button>
                            <form action="" method="post">
         </div>
            <div class="row ">
                <div class="col-md-11 mx-auto ">
                   <div class="card">
                    <div class="card-header">
                        <div class="text-center font-weight-bold text-uppercase">
                        Fournisseurs
                        </div>
                    </div>
                    <div class="card-body">
                    <table id="myTable" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th class="bg-primary">ID</th>
                                <th class="bg-primary">NomComplet</th>
                                <th class="bg-primary">Adresse</th>
                                <th class="bg-primary">tel</th>
                                <th class="bg-primary">Email</th>
                                <th class="bg-primary">Action</th>
                            </tr>
                            <tbody>
                                @foreach($fournisseurs as $key => $fr)
                                <tr>
                                <td>{{$fr->id}}</td>
                                <td>{{$fr->NomComplet}}</td>
                                <td>{{$fr->Adresse}}</td>
                                <td>{{$fr->tel}}</td>
                                <td>{{$fr->email}}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('fournisseurs.show',$fr->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('fournisseurs.edit',$fr->id)}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($fr->marches()->exists())
                                        <a href="#"  class="btn btn-sm btn-secondary mx-2">
                                        <i class="fas fa-trash"></i>
                                        </a>
                                    @else
                                        <a href="{{route('fournisseurs.delete',$fr->id)}}" data-confirm="Êtes-vous sûr de vouloir supprimer ce fournisseur ?" class="btn btn-sm btn-danger mx-2">
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


@endsection

