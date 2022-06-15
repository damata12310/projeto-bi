<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

class AuthuserController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ],[
                'email.required' => 'E-mail é obrigatório',
                'password.required' => 'Senha é obrigatório'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(auth()->user()->master){
                return redirect('/painel/home');
            }else{
                return redirect('/dashboard');
            }
        }else {
            return redirect()->back()->with('danger', 'E-mail ou senha inválida');
        }
    }
}
