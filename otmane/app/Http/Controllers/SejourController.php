<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sejour;
use App\Hotel;
use App\Ville;


class SejourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sejours=Sejour::all();
        $hotels=Hotel::all();
        $villes=Ville::all();
        return view('Sejour.index',compact('sejours','hotels','villes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels=Hotel::all();
        $villes=Ville::all();
        return view('Sejour.create',compact('villes','hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'depart' => 'required',
            'arrive' => 'required',
        ]);
        Sejour::create([
            'date_depart'=>$request->depart,
            'date_arrive'=>$request->arrive,
            'hotel_id'=>$request->hotel,
            'ville_id'=>$request->ville,
        ]);
        return redirect()->route('sejour');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
