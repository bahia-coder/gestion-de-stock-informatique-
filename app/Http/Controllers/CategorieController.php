<?php
namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CategorieController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            $redirectUrl = '/';
            return redirect($redirectUrl);
        }
           $categories=Categorie::all();
           return view('categories.index',compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $categorie = new Categorie();
        $categorie->nom_categorie=$request->nom_categorie;
        $categorie->save();
        return redirect()->route('categorie.index')->with([
            'success'=>'categorie added successfully'
        ]);
    }
    public function show($id)
    {
        $categorie=Categorie::where('id',$id)->first();
        return view('categories.show',compact('categorie'));
    }
    public function edit($id)
    {
        $categorie =Categorie::findorFail($id);
        return view('categories.edit',compact('categorie'));
    }
    public function update(Request $request,$id)
    {
        $categorie=Categorie::findorFail($id);
        $categorie->nom_categorie=$request->nom_categorie;
        $categorie->save();
        return redirect()->route('categorie.index')->with([
            'success'=>'categorie modified successfully'
        ]);;
    }
    public function destroy($id)
    {
        Categorie::findorFail($id)->delete();
        return redirect()->route('categorie.index');
    }
}
