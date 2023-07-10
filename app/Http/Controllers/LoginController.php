<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('home.index');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->to('login')
            ->withErrors('El correo o la contraseña están incorrectos.');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if ($user && $user->estado === 'DESACTIVADO') {
            return redirect()->to('login')
                ->withErrors('No puedes iniciar sesión porque tu cuenta está desactivada.');
        }

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user) 
    {
        return redirect()->route('home.index');
    }
}
