<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Sejour;
use App\Hotel;
use App\Ville;

class SejourfrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'destination'=>['required','not_in:Selectionnez une ville'],
            'depart'=>['required'],
            'arrive'=>['required'],
        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],201);
        }
        $sejours=Sejour::all();
        $data=array();
        foreach($sejours as $sejour)
        {
            $ville=Ville::find($sejour->ville_id);
            if($sejour->date_depart==$request->depart && $ville->name_ville==$request->destination)
            {
            $sej=array();
            $hotel=Hotel::find($sejour->hotel_id);
            $ville=Ville::find($sejour->ville_id);
            $date1=strtotime($sejour->date_arrive);
            $date2=strtotime($sejour->date_depart);
            $date=abs($date1-$date2);
            $retour = array();
            $tmp = $date;
            $retour['second'] = $tmp % 60;
        
            $tmp = floor( ($tmp - $retour['second']) /60 );
            $retour['minute'] = $tmp % 60;
        
            $tmp = floor( ($tmp - $retour['minute'])/60 );
            $retour['hour'] = $tmp % 24;
        
            $tmp = floor( ($tmp - $retour['hour'])  /24 );
            $retour['day'] = $tmp;
            $day=$retour['day']; 
            $price=($hotel->price)*$day*$request->chambre;
            $sej['day']=$day;
            $sej['price']=$price;
            $sej['depart']=$sejour->date_depart;
            $sej['hotel']=$hotel->name_hotel;
            $sej['ville']=$ville->name_ville;
            $sej['image']=explode('/',$hotel->image_hotel)[2];
            $sej['sejour']=$sejour->id;
            array_push($data,$sej);
            }
        }
        return response()->json($data);
    }
    public function index()
    {
        $sejours=Sejour::all();
        $data=array();
        foreach($sejours as $sejour)
        {
            $sej=array();
            $hotel=Hotel::find($sejour->hotel_id);
            $ville=Ville::find($sejour->ville_id);
            $date1=strtotime($sejour->date_arrive);
            $date2=strtotime($sejour->date_depart);
            $date=abs($date1-$date2);
            $retour = array();
            $tmp = $date;
            $retour['second'] = $tmp % 60;
        
            $tmp = floor( ($tmp - $retour['second']) /60 );
            $retour['minute'] = $tmp % 60;
        
            $tmp = floor( ($tmp - $retour['minute'])/60 );
            $retour['hour'] = $tmp % 24;
        
            $tmp = floor( ($tmp - $retour['hour'])  /24 );
            $retour['day'] = $tmp;
            $day=$retour['day']; 
            $price=($hotel->price)*$day;
            $sej['day']=$day;
            $sej['price']=$price;
            $sej['hotel']=$hotel->name_hotel;
            $sej['ville']=$ville->name_ville;
            $sej['image']=$hotel->image_hotel;
            array_push($data,$sej);
        }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
