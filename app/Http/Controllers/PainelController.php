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

    public function listEmpresa()
    {
        $empresas = Empresa::get();

        return view('painel.listEmpresa')->with('empresas', $empresas);
    }

    public function listUsuario()
    {
        $empresas = Empresa::get();
        $usuarios = User::get();

        return view('painel.listUsuarios')->with(['empresas' => $empresas, 'users' => $usuarios]);
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
                return redirect('/painel/listUsuario')->with('sucess', 'Sucesso usuário criado com sucesso!!!');
            }else{
                return redirect('/painel/listUsuario')->with('error', 'Erro o usuário não foi criado...');
            }
        }
    }

    public function deleteEmpresa(Request $request)
    {
        if(isset($request)){
            Empresa::destroy($request->id);
            return redirect('/painel/listEmpresa')->with('success', 'Empresa deletada com sucesso!');
        }else {
            return redirect('/painel/listEmpresa')->with('error', 'Oooops, algo deu errado tente novamente!!!');
        }
    }

    public function editaEmpresa(Request $request)
    {
        $empresa = Empresa::find($request->id);

        return view('painel.editEmpresa')->with('empresa', $empresa);
    }

    public function editaEmpresaPost(Request $request)
    {
        if (isset($request)){

            Empresa::findOrFail($request->id)->update([
                'nome' => $request->nome,
                'cnpj' => $request->cnpj,
                'chaveBling' => $request->chaveBling
            ]);
            return redirect('/painel/listEmpresa')->with('success', 'Empresa alterada com sucesso!');
        }else{
            return redirect('/painel/listEmpresa')->with('error', 'Oooops, algo deu errado tente novamente!!!');
        }
    }

    public function deleteUsuario(Request $request)
    {
        if(isset($request)){
            User::destroy($request->id);
            return redirect('/painel/listUsuario')->with('success', 'Usuário deletado(a) com sucesso!');
        }else {
            return redirect('/painel/listUsuario')->with('error', 'Oooops, algo deu errado tente novamente!!!');
        }
    }

    public function editaUsuario(Request $request)
    {
        $user = User::find($request->id);
        $empresa = Empresa::find($user->empresa_id);

        return view('painel.editUsuario')->with(['empresa' => $empresa, 'user' => $user]);
    }

    public function editaUsuarioPost(Request $request)
    {
        if (isset($request)){

            if($request->nivel == 'Master'){
                $nivel = 'master';
                $value = 1;
            }elseif($request->nivel == 'Soulog'){
                $nivel = 'soulog';
                $value = 1;
            }else{
                $nivel = 'cliente';
                $value = 1;
            }

            User::findOrFail($request->id)->update([
                'name' => $request->name,
                $nivel => $value,
            ]);
            return redirect('/painel/listUsuario')->with('success', 'Usuário alterado(a) com sucesso!');
        }else{
            return redirect('/painel/listUsuario')->with('error', 'Oooops, algo deu errado tente novamente!!!');
        }
    }
}


