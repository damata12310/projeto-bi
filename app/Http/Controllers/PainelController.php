<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

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
}
