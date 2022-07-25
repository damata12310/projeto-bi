<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Contato;
use App\Models\Pedido;
use App\Models\Produto;


class DashboardController extends Controller
{
    public function home()
    {
        $empresa = auth()->user()->empresa_id;

        $pedidos = Pedido::where('empresa_id', $empresa)->orderBy('tipoIntegracao')->get();
        $tipoIntegracao = [];
        $totalvenda = [];
        $soma = 0;
        $qtdVendas = 0;
        $plataforma = '';
        $verifica = [];
        $dados = [];
        foreach ($pedidos as $ped) {
            if (!in_array($ped->tipoIntegracao, $verifica)) {
                array_push($verifica, $ped->tipoIntegracao);
            }
        }

        for($i = 0; $i < count($verifica); $i++){

            foreach ($pedidos as $ped){

                if($ped->tipoIntegracao == $verifica[$i]){
                    $soma = $soma + $ped->totalvenda;
                    $plataforma = $verifica[$i];
                    $qtdVendas = $qtdVendas + 1;
                    $media = $soma / $qtdVendas;
                }

            }

            $tipoIntegracao = $plataforma;
            $totalvenda = $soma;
            $auxArr = [
                'nome' => $tipoIntegracao,
                'totalVendas' => number_format($totalvenda,2,",","."),
                'qtdVendas' => $qtdVendas,
                'media' => number_format($media,2,",",".")
            ];

            $media = 0;
            $soma = 0;
            $tipoIntegracao = '';
            $totalvenda = 0;
            $qtdVendas = 0;

            array_push($dados, $auxArr);
        }

        return view('sistema.dashboard')->with(['dados' => $dados]);
    }
}
