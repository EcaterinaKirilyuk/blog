<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration');
    }


    public function login(Request $request)
    {

        $conditions = [
            ['name', '=', $request->name],
            ['email', '=', $request->email],
            ['password','=', $request->password]
        ];

        $user =  User::where($conditions)->first();

        if($user){

            echo "true";

        }else{
            echo "false";
        }
    }

    public function loginHash(Request $request)
    {

        $conditions = [
            ['name', '=', $request->name],
            ['email', '=', $request->email],
        ];

        $user =  User::where($conditions)->first();

        $passwordCheck = Hash::check($request->password, $user->password);

        if($passwordCheck){

            echo "true";

        }else{
            echo "false";
        }
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function register(Request $request)
    {
        $conditions = [
            ['email', '=', $request->email]
        ];

        $user =  User::where($conditions)->first();

        if($user == true)
        {
            echo "false";
        }else {
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();
            echo "true";
            //dd($request);
        }
        

        
    }
}