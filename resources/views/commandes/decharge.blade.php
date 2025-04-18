<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


    H4{
        margin-left: 100px;
        font-size: large;
    }
    .bordered {
        border: 1px solid black;
        padding: 10px;
        width: 350px;
        border-color:burlywood;
    }
    .vv{
        margin-left: 150px;
        margin-right: 150;
        display: block;
        font-size: 30px;
        text-align: center;
        color:black;
        font-family:Georgia, 'Times New Roman', Times, serif;
    }

    .textt{
        text-align: center;
        margin-top: 50px;
    }
  .photos{
   margin-left:  300px;
    width: 100px;
    height: 100px;
    border-radius:50%;

  }
  .tableaux{
  margin-left:50px;
  border-color:blanchedalmond;
  size: 400px;
  }
  .td{
    text-align: center;
    width: 200px;
  }
  .bordered-text {
  border: 1px solid black;
  padding: 10px;
  margin-left: 300px;
  margin-right: 300px;
}
</style>
<div class="bordered-text">
    <div class="photos">
                <img src="https://th.bing.com/th/id/OIP.V1Yh5BrI7AUssNE4zmXD5AHaIq?pid=ImgDet&rs=1" width="100" height="100" class="centered " >
    </div>
                <br><br>
                <div class="centered">
                    <H4>ROYAUME DU MAROC MINISTERE DE LA JUSTICE COUR <br>D'APPEL D'OUARZAZATESOUS DIRECTION REGIONALE   </H4>
                </div>
            <div><h1 class="vv bordered">Certificat de réception </h1></div>
        <div class="text"><h4>Le chef du département du ministère public atteste que {{$tribunale->Nom}} a
        {{$tribunale->Adresse}} que la Sous-direction régionale a reçu ce qui suit :</h4></div>
<div><table border=1px class="tableaux">
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
<div>
<h2 class="textt">  Possession certifiée de ce qui a été mentionné sur :<br>{{$commande->date_envoi}}</h2>
<div class="textt"><h2> Signature du bénéficiaire :</h2></div>
<a href="{{route('commandes.pdf',$commande->id)}}" style="margin-left:30%;"><button style="font-size:24px;">télécharger décharge<i class="	fa fa-download" style="color:green"></i></button></a>

</div>
</div>
</html>
