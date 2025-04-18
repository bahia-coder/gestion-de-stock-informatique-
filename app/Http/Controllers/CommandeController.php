<?php
namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
class CommandeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            $redirectUrl = '/';
            return redirect($redirectUrl);
        }
        $commandes=Commande::all();//get();
        return view('commandes.index',compact('commandes'));
    }
    public function create()
    {
        return view('commandes.create');
    }
    public function store(Request $request)
    {
        $stock=Stock::where('id',$request->categorie_id)->first();
        if($stock->quantité<$request->quantité){
            return redirect()->route('commandes.create')->with([
                'echec'=>'la quantité saisir pas disponible'
            ]);
        }else{
        $commande=new  Commande();
        $commande->quantité=$request->quantité;
        $commande->tirbunale_id=$request->tirbunale_id;
        $commande->date_envoi=$request->date_envoi;
        if (Auth::check()) {
            $commande->user_id = Auth::id();
        }
        $commande->save();

        $stock->quantité=$stock->quantité-$commande->quantité;
        $stock->save();
        $articles=Article::where('stock_id',$request->categorie_id)->where('statut',1)->limit($commande->quantité)->get();
        foreach ($articles as $article) {
            $article->statut = false;
            $article->commande_id=$commande->id;
            $article->save();
        }

        $this->pdf($commande->id);





        return redirect()->route('commandes.index')->with([
            'success'=>'Commande added successfully'
        ]);
        }

    }
    public function show($id)
    {
        $commande=Commande::where('id',$id)->first();
        $arts=$commande->articles()->get();
        $article=$commande->articles()->first();
        $stock=$article->stock()->first();
        return view('commandes.show',compact('commande','stock','arts'));
    }
    public function edit($id)
    {
        $commande=Commande::where('id',$id)->first();
        return view('commandes.edit',compact('commande'));
    }
    public function confirmer($id)
    {
        $commande=Commande::where('id',$id)->first();
        $commande->confermer=true;
        $commande->save();
        return redirect()->route('commandes.index')->with([
            'success'=>'Commande confermer successfully'
        ]);
    }
    public function update(Request $request, $id)
    {
        $commande=Commande::where('id',$id)->first();
       if($request->categorie_id==$commande->articles->first()->stock->id){
        $stock=Stock::where('id',$request->categorie_id)->first();
        if($stock->quantité+$commande->quantité > $request->quantité){
            $stock->quantité=$stock->quantité+$commande->quantité-$request->quantité;
            $stock->save();
            if($commande->quantité < $request->quantité){
                $articles=Article::where('stock_id',$request->categorie_id)->where('statut',1)->limit($request->quantité-$commande->quantité)->get();
                 foreach ($articles as $article) {
                $article->statut = false;
                $article->commande_id=$commande->id;
                $article->save();
            }
            }else if($commande->quantité > $request->quantité){
                $articles=Article::where('stock_id',$request->categorie_id)->where('statut',0)->limit($commande->quantité-$request->quantité)->get();
                foreach ($articles as $article) {
                    $article->statut = true;
                    $article->commande_id=null;
                    $article->save();
                }
            }
            $commande->quantité=$request->quantité;
            $commande->tirbunale_id=$request->tirbunale_id;
            $commande->date_envoi=$request->date_envoi;
            $commande->user_id = Auth::id();
            $commande->save();
        return redirect()->route('commandes.index')->with([
            'success'=>'Commande modified successfully'
        ]);
        }
        return redirect()->route('commandes.edit')->with([
            'echec'=>'la quantité saisir pas disponible'
        ]);
       }else{
           $stockpre=$commande->articles->first()->stock;
           $stockpre->quantité=$stockpre->quantité+$commande->quantité;
           $stock=Stock::where('id',$request->categorie_id)->first();
           if($stock->quantité<$request->quantité){
               return redirect()->route('commandes.edit',$commande->id)->with([
                   'echec'=>'la quantité saisir pas disponible'
               ]);
           }
           else{
            $arts=$commande->articles()->get();
            foreach($arts as $article){
                $article->statut=true;
                $article->commande_id=null;
                $article->save();
            }
            $commande->quantité=$request->quantité;
            $commande->tirbunale_id=$request->tirbunale_id;
            $commande->date_envoi=$request->date_envoi;
            if (Auth::check()) {
                $commande->user_id = Auth::id();
            }
            $commande->save();
            $stockpre->save();
                $stock->quantité=$stock->quantité-$commande->quantité;
                $stock->save();
                $articles=Article::where('stock_id',$request->categorie_id)->where('statut',1)->limit($commande->quantité)->get();
                foreach ($articles as $article) {
                    $article->statut = false;
                    $article->commande_id=$commande->id;
                    $article->save();
                }
            return redirect()->route('commandes.index')->with([
                'success'=>'Commande modified successfully'
            ]);
               }
        }
        }


        public function afficherGraphiqueCommandes(){
            $commandes = DB::table('commandes')
            ->select(
                DB::raw('MONTH(date_envoi) as mois'),
                DB::raw('YEAR(date_envoi) as annee'),
                DB::raw('COUNT(id) as nombre_commandes')
            )
            ->groupBy('mois', 'annee')
            ->get();


                    $donneesParMois = $commandes->groupBy(function ($item) {
                        return $item->annee . '-' . $item->mois;
                    });

                    $labels = $donneesParMois->keys()->toArray();
                    $quantites = $commandes->pluck('nombre_commandes')->toArray();

    return view('welcome', compact('labels', 'quantites'));
}



     public function destroy($id)
    {
        $commande=Commande::where('id',$id)->first();
        $arts=$commande->articles()->get();

        foreach($arts as $article){
            $article->statut=true;
            $article->commande_id=null;
            $article->save();
            $stock_id=$article->stock_id;
        }
        $stock=Stock::where('id',$stock_id)->first();
        $stock->quantité=$commande->quantité+$stock->quantité;
        $stock->save();
        $commande->delete();
        return redirect()->route('commandes.index');
    }
    public function decharge($id){
        $commande=Commande::where('id',$id)->first();
        $tribunale=$commande->tirbunale->first();
        $arts=$commande->articles()->get();
        $article=$commande->articles()->first();
        $stock=$article->stock()->first();
        $categorie=$stock->categorie->first();
     return view('commandes.decharge',compact('commande','stock','arts','tribunale','categorie'));
    }
    public function pdf($id){
        $commande = Commande::where('id',$id)->first();
        $tribunale= $commande->tirbunale->first();
        $arts     = $commande->articles()->get();
        $article=$commande->articles()->first();
        $stock = $article->stock()->first();
        $categorie=$stock->categorie->first();
        $pdf = Pdf::loadView('commandes.PDF',compact('commande','stock','arts','tribunale','categorie'));
        return $pdf->download();
    }
    }

