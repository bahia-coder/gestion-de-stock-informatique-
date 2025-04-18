<?php

namespace App\Http\Controllers;

use App\Models\Tirbunale;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TirbunaleController extends Controller
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
        $tirbunales=Tirbunale::all();//get();
        return view('tirbunales.index',compact('tirbunales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tirbunales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tirbunale = new Tirbunale();
        $tirbunale->Nom=$request->Nom;
        $tirbunale->Adresse=$request->Adresse;
        $tirbunale->Ntelefone=$request->Ntelefone;
        $tirbunale->email=$request->email;
        $tirbunale->save();
        return redirect()->route('tirbunale.index')->with([
            'success'=>'tribunale added successfully'
        ]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tirbunale  $tirbunale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tirbunale=Tirbunale::where('id',$id)->first();
        return view('tirbunales.show',compact('tirbunale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tirbunale  $tirbunale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tirbunale =Tirbunale::findorFail($id);
        return view('tirbunales.edit',compact('tirbunale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tirbunale  $tirbunale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $tirbunale=Tirbunale::findorFail($id);
        $tirbunale->Nom=$request->Nom;
        $tirbunale->email=$request->email;
        $tirbunale->Ntelefone=$request->Ntelefone;
        $tirbunale->Adresse=$request->Adresse;
        $tirbunale->save();
        return redirect()->route('tirbunale.index')->with([
            'success'=>'tribunale modified successfully'
        ]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tirbunale  $tirbunale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Tirbunale::findorFail($id)->delete();
        return redirect()->route('tirbunale.index');
    }
}
