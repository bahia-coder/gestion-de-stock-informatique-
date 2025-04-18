@extends('layouts.master')
@section('title')
 Home

@endsection
@section('css')


@endsection
@section('titlr-page1')
    Home
@endsection

@section('titlr-page2')
    settings
@endsection

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="mx-auto">
            <h1 class="m-0 text-primary font-weight-bold">Gestion Stock Informatique</h1>
          </div>
        </div>
      </div>
    </div>
          <div class="container">

            <div class="row my-5">

                <div class="col-md-4 ">
                    <div class="small-box bg-info">

                        <div class="inner">
                     <h3 class="text text-light">{{\App\Models\Fournisseur::count()}}</h3>
                            <p>Fournisseurs</p>

                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{url('fournisseurs')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 ">
                    <div class="small-box bg-success">
                        <div class="inner">
                           <h3 class="text text-light">{{\App\Models\Categorie::count()}}<sup style="font-size: 20px"></sup></h3>
                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <a href="{{route('categorie.index')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 ">
                    <div class="small-box bg-warning">
                        <div class="inner">
                           <h3 class="text text-light">{{\App\Models\Stock::count()}}<sup style="font-size: 20px"></sup></h3>
                            <p>Stock</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-database"></i>
                        </div>
                        <a href="{{route('stocks.index')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="small-box .bg-secondary">
                        <div class="inner">
                           <h3 class="text text-dark">{{\App\Models\Tirbunale::count()}}<sup style="font-size: 20px"></sup></h3>
                            <p>Tribunal</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-balance-scale"></i>
                        </div>
                        <a href="{{route('tirbunale.index')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="small-box bg-dark">

                        <div class="inner">
                            <h3 class="text text-light">{{\App\Models\Marche::count()}}</h3>
                            <p>marches</p>

                        </div>
                        <div class="icon">
                            <i class="fa fa-handshake"></i>
                        </div>
                        <a href="{{url('marcher')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 class="text text-light">{{\App\Models\Commande::count()}}</h3>
                            <p>Commandes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="{{url('commandes')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Inclure la bibliothèque Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Afficher le graphique dans un élément canvas -->
<canvas id="graphique-commandes"></canvas>

<!-- Initialiser le graphique avec les données -->
<script>
    var donnees = {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Nombre de commandes par mois',
            backgroundColor: 'green',
            //rgba(75, 192, 192, 0.2)
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            data: <?php echo json_encode($quantites); ?>,
        }],
    };

    var maxQuantite = Math.max(...donnees.datasets[0].data);
var options = {
    scales: {
        y: {
            ticks: {
                beginAtZero: true,
                stepSize: 1,
                precision: 0,
                max: maxQuantite
            }
        },
        x: {
            ticks: {
                autoSkip: false,
                maxRotation: 90,
                minRotation: 90
            }
        }
    }
};



    var ctx = document.getElementById('graphique-commandes').getContext('2d');
    var graphique = new Chart(ctx, {
        type: 'bar',
        data: donnees,
        options: options
    });
</script>

        </div>
    @endsection
