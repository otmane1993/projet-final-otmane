<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels=Hotel::all();
        return view('Hotel.hotel',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Hotel.create');
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
                'price' => 'required',
                'name' => 'required',
            ]);
        //$val = Validator::make($request->all(),[
        //    'price' => 'required',
        //    'name' => 'required',
        //]);
        //if($request->file('image')==null)
        //{
         //   $image="otmane.png";
        //}
        //else
        //{
            $image=$request->file('image')->store('public/files');
        //}
        Hotel::create([
            'price'=>$request->price,
            'name_hotel'=>$request->name,
            'image_hotel'=>$image,
        ]);
        Session::put('message','Hotel cree avec succes');
        return redirect()->route('hotel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel=Hotel::find($id);
        return view('hotel.show',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel=Hotel::find($id);
        return view('Hotel.edit',compact('hotel'));
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
            'price' => 'required',
            'name' => 'required',
        ]);
        $hotel=Hotel::find($id);
        $image=$hotel->image_hotel;
        if($request->file('image'))
        {
            Storage::delete($image);
            $image=$request->file('image')->store('public/files');
        }
        //dd($image);
        $hotel->price=$request->price;
        //dd($request->price);
        $hotel->name_hotel=$request->name;
        $hotel->image_hotel=$image;
        $hotel->save();
        Session::put('update','Hotel updated successfully');
        return redirect()->route('hotel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel=Hotel::find($id)->delete();
        //dd($hotel);
        //$hotel->delete();
        return redirect()->route('hotel');
    }
}
