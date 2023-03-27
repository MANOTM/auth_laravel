<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tache;


class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taches=Tache::all()->where('user_id',Auth::user()->id);
        return view('Tache.index',compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tache.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'expiration'=>'required',
            'description'=>'required',
            'categorie'=>'required',
        ]);
        Tache::create([
            'expiration'=>$request->expiration,
            'description'=>$request->description,
            'categorie'=>$request->categorie,
            'user_id'=>Auth::user()->id,
            'accomplie'=>'N'
        ]);
        return redirect()->Route('Tache.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tache=Tache::findOrFail($id);
        return view('Tache.edit',compact('tache'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tache=Tache::findOrFail($id);
        $tache->categorie=$request->categorie;
        $tache->description=$request->description;
        $tache->expiration=$request->expiration;
        $tache->save();
        return redirect()->Route('Tache.index')->with('succes','Tache Has Been Updated Succesfely');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tache::findOrFail($id)->delete();
        return back()->with('succes','Tache Has Been Deleted');
    }
}
