<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{
    public function update()
    {
        $id = session()->get('user_id');
        
        $user =  User::where('id', '=', $id)->first();

        return view('edit', ['user' => $user]);
    }

    public function update_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:8',
            'email' => 'required|email|unique:users,email,'. session()->get('user_id'),

        ]);

        if ($validator->fails()) {
           return json_encode(['status' => false ,'error' => implode(',' , $validator->messages()->all())]);
        }
       
        $id = $request->session()->get('user_id');
        
        $user =  User::where('id', '=', $id)->first();

       
        if($request->name)
        {
            $user->name = $request->name;
        }
        if($request->email)
        {
            $user->email = $request->email;
        }
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return json_encode([ "status"=> true ]);
    }

	
}
