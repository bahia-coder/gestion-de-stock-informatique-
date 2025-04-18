<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            $redirectUrl = '/';
            return redirect($redirectUrl);
        }
        $fournisseurs=Fournisseur::all();
        return view('fournisseurs.index',compact('fournisseurs'));
    }
    public function create()
    {
        return view('fournisseurs.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'NomComplet'=>'required',
            'Adresse'=>'required',
            'tel'=>'required|numeric',
            'email'=>'required|email',
        ]);
        if ($validator->fails()) {
            return redirect()->route('fournisseurs.create')->with([
                'error'=>'please remplire les champs par des données validées'
            ]);
        }else{
            $fournisseur=new Fournisseur();
            $fournisseur->NomComplet=$request->NomComplet;
            $fournisseur->Adresse=$request->Adresse;
            $fournisseur->tel=$request->tel;
            $fournisseur->email=$request->email;
            $fournisseur->save();
            return redirect()->route('fournisseurs.index')->with([
                'success'=>'fournisseurs added successfully'
            ]);
        }
    }

    public function show($id)
    {
        $fr=Fournisseur::where('id',$id)->first();
       return view('fournisseurs.show',compact('fr'));
    }
    public function edit($id)
    {
        $fr=Fournisseur::where('id',$id)->first();
       return view('fournisseurs.edit',compact('fr'));
    }


    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'NomComplet'=>'required',
            'Adresse'=>'required',
            'tel'=>'required|numeric',
            'email'=>'required|email',
        ]);
        if ($validator->fails()) {
            return redirect()->route('fournisseurs.edit',$id)->with([
                'error'=>'please remplire les champs par des données validées'
            ]);
        }else{
            $fr=Fournisseur::where('id',$id)->first();
            $fr->NomComplet=$request->NomComplet;
            $fr->Adresse=$request->Adresse;
            $fr->tel=$request->tel;
            $fr->email=$request->email;
            $fr->save();
            return redirect()->route('fournisseurs.index')->with([
                'success'=>'fournisseurs modified successfully'
            ]);
        }

    }
    public function destroy($id)
    {
        $fr=Fournisseur::where('id',$id)->delete();
        return redirect()->route('fournisseurs.index');
    }
}
