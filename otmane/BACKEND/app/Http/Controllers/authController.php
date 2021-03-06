<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;

class authController extends Controller
{
    public function login(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email'=>['required','email'],
            'password'=>['required','string' ],
        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],401);
        }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user=User::where('email',$request->email)->firstOrFail();
            return response()->json($user);
        }
        else
        {
            return response()->json(['error'=>'Bad credentials'],401);
        }
    }    
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'firstname'=>['required','string','max:25'],
            'lastname'=>['required','string','max:25'],
            'email'=>['required','email','unique:users'],
            'password'=>['required','string','min:8'],
            'confirm'=>['required','string','same:password'],
        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()],401);
        }
        $user=User::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'api_token'=>Str::random(60),
        ]);
        $user->succes='record registed successfully';
        return response()->json($user);
    }
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
