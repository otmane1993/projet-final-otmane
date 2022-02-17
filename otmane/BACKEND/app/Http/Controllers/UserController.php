<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
       $user=User::where('api_token',$request->tokene)->get();
       return response()->json($user);
    }
    public function index()
    {
        return view('user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::find(4);
        $user->sejours()->attach([2,3,4]);
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
        $user=User::find($id);
        if(!$request->firstname)
        {
            $user->firstname=$user->firstname;
        }
        else
        {
            $user->firstname=$request->firstname;
        }
        if(!$request->lastname)
        {
            $user->lastname=$user->lastname;
        }
        else
        {
            $user->lastname=$request->lastname;
        }
        if(!$request->password)
        {
            $user->password=$user->password;
        }
        else
        {
            $user->password=Hash::make($request->password);
        }
        
        //$user->lastname=$request->lastname;
        //$user->password=Hash::make($request->password);
        $user->save();
        return response()->json(['message'=>'updating is successfully']);
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
