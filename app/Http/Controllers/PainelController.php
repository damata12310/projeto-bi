<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;

class PainelController extends Controller
{
    public function home()
    {
        return view('painel.home');
    }

    public function createEmpresa()
    {
        return view('painel.createEmpresa');
    }

    public function createUsuario()
    {
        $empresas = Empresa::get();

        return view('painel.createUser')->with('empresas', $empresas);

    }

    public function criaEmpresa(Request $request)
    {
        $this->validate($request, [
            'nome'       => 'required',
            'cnpj'       => 'required',
            'chaveBling' => 'required',
        ],[
            'nome.required'       => 'Nome é obrigatório',
            'cnpj.required'       => 'CNPJ é obrigatório',
            'chaveBling.required' => 'A chave bling é obrigatório',
        ]);

        if (isset($request)){
            $empresa = New Empresa();

            $empresa->nome = $request->nome;
            $empresa->cnpj = $request->cnpj;
            $empresa->chaveBling = $request->chaveBling;

            if($empresa->save()){
                return redirect()->back()->with('sucess', 'Sucesso empresa criada com sucesso!!!');
            }else{
                return redirect()->back()->with('error', 'Erro a empresa não foi criada...');
            }
        }
    }

    public function criaUsuario(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'name' => 'required',
            'empresa_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nivel' => 'required',
        ],[
            'name.required'       => 'Nome é obrigatório',
            'empresa_id.required'       => 'Empresa é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'password.required' => 'A senha é obrigatório',
            'nivel.required' => 'O nível de usuário é obrigatório',
        ]);

        if (isset($request)){
            $user = New User();

            $user->name = $request->name;
            $user->empresa_id = $request->empresa_id;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            if($request->nivel == 'Master'){
                $user->master = 1;
                $user->soulog = 0;
                $user->cliente = 0;
            }else if($request->nivel == 'Soulog'){
                $user->master = 0;
                $user->soulog = 1;
                $user->cliente = 0;
            }else{
                $user->master = 0;
                $user->soulog = 0;
                $user->cliente = 1;
            }

            if($user->save()){
                return redirect()->back()->with('sucess', 'Sucesso usuário criado com sucesso!!!');
            }else{
                return redirect()->back()->with('error', 'Erro o usuário não foi criado...');
            }
        }
    }
}
