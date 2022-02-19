<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
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
        $sejours=Sejour::paginate(5);
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
        Session::put('message-sejour','Sejour cree ave succes');
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
        $sejour=Sejour::find($id);
        $hotel=Hotel::find($sejour->hotel_id);
        $ville=Ville::find($sejour->ville_id);
        return view('Sejour.show',compact('sejour','hotel','ville'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sejour=Sejour::find($id);
        $hotel=Hotel::find($sejour->hotel_id);
        $ville=Ville::find($sejour->ville_id);
        $villes=Ville::all();
        $hotels=Hotel::all();
        //dd($sejour->date_arrive);  
        return view('Sejour.edit',compact('sejour','hotel','ville','villes','hotels'));
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
        $validate=$request->validate([
        //    'date-depart' => 'required',
        //    'date-arrive' => 'required',
            'hotel' => 'required',
            'ville' => 'required',
        ]);
        $sejour=Sejour::find($id);
        //dd($request->date_depart);
        $sejour->date_depart=$request->date_depart;
        $sejour->date_arrive=$request->date_arrive;
        $sejour->hotel_id=$request->hotel;
        $sejour->ville_id=$request->ville;
        $sejour->save();
        return redirect()->route('sejour'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sejour=Sejour::find($id)->delete();
        return redirect()->route('sejour');
    }
}
