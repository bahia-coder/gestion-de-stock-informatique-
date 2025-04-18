<html>
<style>
    h4{
        text-align:center;
        margin-left:100px;
    }
    h5{
        text-align:center;
    }
    .bordered {
        border: 1px solid black;
        padding: 10px;
        width: 600px;
        border-color:burlywood;
    }
    .vv{
        margin-left:30px;
        display: block;
        font-size: 50px;
        text-align: center;
        color:black;
        font-family:Georgia, 'Times New Roman', Times, serif;
    }
    .text{
        text-align: center;
        margin-right: 100px;
        margin-top: 30px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .textt{
        text-align: center;
        margin-top: 50px;
    }
  .photos{
        margin-left:300PX;
        width: 1000px;

  }
  .tableaux{
        margin-left: 140px;
        margin-right:100px;
        size: 200px;
        width: 400px ;
  }
  .td{
        text-align: center;
        width: 80px;
  }
  .bordered-text {
  border: 1px solid black;
  padding: 10px;
}
</style>
<div class="bordered-text">
            <div class="photos">
                <img src="https://th.bing.com/th/id/OIP.V1Yh5BrI7AUssNE4zmXD5AHaIq?pid=ImgDet&rs=1" width="100" height="100" class="centered " >
            </div>
                <div class="centered">
                    <h5>ROYAUME DU MAROC MINISTERE DE LA JUSTICE <br>COUR D'APPEL D'OUARZAZATESOUS DIRECTION REGIONALE   </h5>
                </div>
                <div>
                    <h1 class="vv bordered">Certificat de réception </h1>
                </div>
                <div class="text">
                    <h4>Le chef du département du ministère public atteste que {{$tribunale->Nom}} a
                        {{$tribunale->Adresse}}que la Sous-direction régionale a reçu ce qui suit :
                    </h4>
                </div>
                <div>
                    <table border=1px class="tableaux">
                        <tr>
                            <th>Numero invontaire</th>
                            <th>Quantité</th>
                            <th>Articles</th>
                        </tr>

                        <tr>
                            <td class="td">@foreach($arts as $article)
                            <i class="fa fa-barcode"></i> <?php  $pr_id = sprintf("%04d",$article->id); echo $pr_id; ?> <br>
                            @endforeach
                            </td>

                            <td class="td">{{$commande->quantité}}</td>
                            <td class="td">{{$categorie->nom_categorie}} {{$stock->marque}}</td>

                        </tr>
                    </table>
                </div>
                <h2 class="textt">  Possession certifiée de ce qui a été mentionné sur :
                    <br> {{$commande->date_envoi}}
                    <br>
                        Signature du bénéficiaire :
                        </h2><br><br>
</div>
</html>
