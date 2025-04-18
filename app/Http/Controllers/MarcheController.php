<?php

namespace App\Http\Controllers;

use App\Models\Marche;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\database\migrations\fournisseurs;

class MarcheController extends Controller
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
        $marche=Marche::all();
        return view('marcher.index',compact('marche'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('marcher.create');
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
            'Nom_marcher'=>'required',
            'Description'=>'required',
            'fournisseur_id'=>'required',
        ]);

        $marche=new Marche();
        $marche->nom_marche=$request->Nom_marcher;
        $marche->description=$request->Description;
        $marche->fournisseur_id=$request->fournisseur_id;
        $marche->save();
        return redirect()->route('marcher.index')->with([
            'success'=>'marches added successfully'
        ]);
    }

    public function show($id)
    {
        $fr=Marche::where('id',$id)->first();
       return view('marcher.show',compact('fr'));
    }
    public function edit($id)
    {
        $fr=Marche::where('id',$id)->first();
       return view('marcher.edit',compact('fr'));
    }


    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'Nom_marcher'=>'required',
            'Description'=>'required',
            'fournisseur_id'=>'required',
        ]);
        $fr=Marche::where('id',$id)->first();
        $fr->nom_marche=$request->Nom_marcher;
        $fr->description=$request->Description;
        $fr->fournisseur_id=$request->fournisseur_id;
        $fr->save();
        return redirect()->route('marcher.index')->with([
            'success'=>'marche modified successfully'
        ]);
    }
    public function destroy($id)
    {
        $fr=Marche::where('id',$id)->delete();
        return redirect()->route('marcher.index');
    }
}
