<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Hotel;
use App\Sejour;
use App\Ville;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::table('users_of_sejours')->insert(['user_id'=>$request->user,'sejour_id'=>$request->sejour]);
        return response()->json('insertion successfully');
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
    public function fetch($id)
    {
        $resevs=DB::select("SELECT * FROM users_of_sejours WHERE user_id=$id");
        $reseves=array();
        foreach($resevs as $resev)
        {
            $rev=array();
            $rev['numero']=$resev->id;
            $sejour=Sejour::find($resev->sejour_id);
            $rev['depart']=$sejour->date_depart;
            $hotel=Hotel::find($sejour->hotel_id);
            $rev['hotel']=$hotel->name_hotel;
            $ville=Ville::find($sejour->ville_id);
            $rev['ville']=$ville->name_ville;
              /******  calcul de jour  ******/
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
            $rev['day']=$day;
            array_push($reseves,$rev);
        }
        return response()->json($reseves);
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
