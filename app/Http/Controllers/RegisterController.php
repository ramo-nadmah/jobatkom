<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function main()
    {
        return view('pages-register');
    }
    public function registration(Request $request)
    {
        $this->validate($request, [
            'email'=>'unique:users',
            'password' => 'required|min:6',
            'password-confirmation'=>'required|min:6|same:password'
//            confirmed|
        ]);

        $user=User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>$request->account_type
        ]);


        if($request->account_type =="freelancer")
        {

            return redirect()->route('freelancersData', [$user]);
        }
        else
        {
            return redirect()->route('employersData', [$user]);
        }

    }
}
