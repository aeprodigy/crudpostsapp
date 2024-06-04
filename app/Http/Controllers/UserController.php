<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function logout(){
        auth()->logout();
        //redirects us to the home page.
        return redirect('/');
    }

    public function login(Request $loginRequest){

        $incomingLoginFields = $loginRequest->validate([
            'loginname'=>'required',
            'loginpassword'=>'required',
        ]);

        if(auth()->attempt(['name'=> $incomingLoginFields['loginname'], 'password' => $incomingLoginFields['loginpassword'] ])){
            $loginRequest -> session()->regenerate(); //save the user session.
           
            return redirect('/');

        }
        else{
            return 'Please enter valid details';

        }

        //return redirect('/');

    }
    
    //user controller functions/register
    public function register (Request $request){
        //register fields validation
        $incomingFileds = $request->validate([
            'name'=>['required','min:3', 'max:10', Rule::unique('users','name')],
            'email'=>['required','email', Rule::unique('users','email')],
            'password'=>['required', 'min:8', 'max:18']
        ]);

        //hash the user's password
        $incomingFileds['password'] = bcrypt($incomingFileds['password']);

        //instance of the user model.
        $user = User::create($incomingFileds);

        auth()->login($user);

        return redirect('/');
    }
}
