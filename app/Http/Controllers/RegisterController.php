<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //redirecion a la vista de home

    public function show(){
        if(Auth::check()){
            return redirect()->route('home.index');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        
        $user = User::create($request->validated());
        auth()->login($user);
        
        //comprobacion de la verificacion de correo

        $user->sendEmailVerificationNotification();

        return redirect('/home')->with('success', "Cuenta Creada de Forma Correcta.");
    }

    
}
