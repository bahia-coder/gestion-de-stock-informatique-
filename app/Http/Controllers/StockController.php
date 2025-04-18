<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Article;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            $redirectUrl = '/';
            return redirect($redirectUrl);
        }
        $stocks=Stock::all();
        return view('stock.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'quantité'=>'required|numeric',
            'marque'=>'required',
            'modele'=>'required',
            'garantie'=>'required',
            'marche_id'=>'required',
            'categorie_id'=>'required',
        ]);
        $stock=new  Stock();
        $stock->quantité=$request->quantité;
        $stock->marque=$request->marque;
        $stock->modele=$request->modele;
        $stock->garantie=$request->garantie;
        $stock->marche_id=$request->marche_id;
        $stock->categorie_id=$request->categorie_id;
        $stock->save();
          for ($i = 0; $i < $request->quantité; $i++) {
            $article=new Article();
            $article->stock_id=$stock->id;
            $article->save();
        }
        return redirect()->route('stocks.index')->with([
            'success'=>'stock added successfully'
        ]);
    }
    public function show($id)
    {
        $stock=Stock::where('id',$id)->first();
        //$Stock=Stock::find($id);
        $arts=$stock->articles()->where('statut',true)->get();
        return view('stock.show',compact('stock','arts'));
    }
    public function showArticlesCommandés($id)
    {
        $stock=Stock::where('id',$id)->first();
        //$Stock=Stock::find($id);
        $arts=$stock->articles()->where('statut',false)->get();
        //return $arts;
        return view('stock.articlescommandées',compact('stock','arts'));
    }
    public function edit($id)
    {
        $stock=Stock::where('id',$id)->first();
       return view('stock.edit',compact('stock'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'marque'=>'required',
            'modele'=>'required',
            'garantie'=>'required',
            'quantité'=>'required|numeric',
            'marche_id'=>'required',
            'categorie_id'=>'required',
        ]);
        $stock=Stock::where('id',$id)->first();
        $nb=$stock->quantité-$request->quantité;
        $nb2=$request->quantité-$stock->quantité;
        $stock->marque=$request->marque;
        $stock->modele=$request->modele;
        $stock->garantie=$request->garantie;
        $stock->marche_id=$request->marche_id;
        $stock->quantité=$request->quantité;
        $stock->categorie_id=$request->categorie_id;
        $stock->save();
        if($nb>0){
            Article::where('stock_id',$id)->orderBy('id')->limit($nb)->delete();
        }
        else{
            for ($i = 0; $i < $nb2; $i++) {
                $article=new Article();
                $article->stock_id=$stock->id;
                $article->save();
            }
        }
        return redirect()->route('stocks.index')->with([
            'success'=>'stock modified successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock=Stock::where('id',$id)->first();
        $arts=$stock->articles()->delete();
        $fr=Stock::where('id',$id)->delete();

        return redirect()->route('stocks.index');
    }
}
