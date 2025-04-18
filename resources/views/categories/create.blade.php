 @extends('layouts.master')
@section('title')
Create new Categorie
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection
@section('titlr-page1')
    home
@endsection

@section('titlr-page2')
    create categorie
@endsection

@section('content')
<a href="{{url('/categories')}}" class="btn btn-success my-1" style="margin-left: 45px"> << </a>
<div class="row ">
    <div class="col-md-11 mx-auto ">
        <div class="card my-2">
             <div class="card-header">
                   <div class="text-center font-weight-bold text-uppercase">
                      <h4>Add new Categorie</h4>
                   </div>
             </div>
            <div class="card-body">
                <div class="card-body">
                     <form action="{{route('categories.store')}}" method="post" class="mt-3">
                       @csrf
                       <div class="form-group mb-3">
                          <label for="NomCtegorie">Nom Categorie</label>
                          <input type="text" name="nom_categorie"
                                  placeholder="Entrer nom de la categorie" class="form-control">
                      </div>
                       <div class="form-group">
                             <button type="submit" class="btn btn-primary">
                                Envoyer
                              </button>
                      </div>
                       </form>
              </div>
         </div>
        </div>
    </div>
</div>
    @endsection
