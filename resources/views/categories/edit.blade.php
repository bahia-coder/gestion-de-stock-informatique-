@extends('layouts.master')
@section('title')
Edit categorie
@endsection
@section('titlr-page2')
     categorie
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="container">
<a href="{{url('/categories')}}" class="btn btn-success my-1" style="margin-left: 45px"> << </a>
   <div class="row ">
      <div class="col-md-11 mx-auto ">
         <div class="card my-2">
               <div class="card-header">
                  <div class="text-center font-weight-bold text-uppercase">
                     <h4>edit categorie {{$categorie->id}}</h4>
                  </div>
              </div>
              <div class="card-body">
                 <form action="{{route('categories.update',$categorie->id)}}" method="post" class="mt-3">
                   @csrf
                 <div class="form-group mb-3">
                    <label for="NomCat">Nom Categorie</label>
                    <input type="text" name="nom_categorie" value="{{$categorie->nom_categorie}}" class="form-control">
                 </div>
                    <button type="submit" class="btn btn-primary" >UPDATE</button>
              </div>
         </div>
     </div>
 </div>
</div>
@endsection
