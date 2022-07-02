<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Contato;


class AppCliente extends Controller
{
    function chamadaBling($endpoint, $apikey){

//        $response = file_get_contents("https://bling.com.br/Api/v2/pedidos/json/?apikey=e00d59341c007a4b734560dd8dc7cc08492077444034df49ee98397a40ee1e13f70f9726");
//        $response = file_get_contents("https://bling.com.br/Api/v2/contatos/json/?apikey=e00d59341c007a4b734560dd8dc7cc08492077444034df49ee98397a40ee1e13f70f9726");
        $url = "https://bling.com.br/Api/v2/".$endpoint."/json/?apikey=".$apikey;
        $response = file_get_contents($url);
        $response = json_decode($response);

        return $response;
    }

    public function teste()// trocar para o nome de contatos
    {
        $empresa = Empresa::where('id', auth()->user()->empresa_id)->first();

        $apikey = $empresa->chaveBling;
        $endpoint = 'contatos';
        $retorno = $this::chamadaBling($endpoint, $apikey);

        $contato = Contato::all();

        $arrVerifica = [];
        foreach ($contato as $cont){
                array_push($arrVerifica, $cont->id_bling);
        }

        foreach ($retorno->retorno->contatos as $res){
            if(!in_array($res->contato->id, $arrVerifica)){
                $contato = new Contato();
                $contato->empresa_id     = $empresa->id;
                $contato->id_bling       = $res->contato->id;
                $contato->codigo         = $res->contato->codigo;
                $contato->nome           = $res->contato->nome;
                $contato->fantasia       = $res->contato->fantasia;
                $contato->tipo           = $res->contato->tipo;
                $contato->cnpj           = $res->contato->cnpj;
                $contato->ie_rg          = $res->contato->ie_rg;
                $contato->endereco       = $res->contato->endereco;
                $contato->numero         = $res->contato->numero;
                $contato->bairro         = $res->contato->bairro;
                $contato->cep            = $res->contato->cep;
                $contato->cidade         = $res->contato->cidade;
                $contato->complemento    = $res->contato->complemento;
                $contato->uf             = $res->contato->uf;
                $contato->fone           = $res->contato->fone;
                $contato->email          = $res->contato->email;
                $contato->situacao       = $res->contato->situacao;
                $contato->contribuinte   = $res->contato->contribuinte;
                $contato->site           = $res->contato->site;
                $contato->celular        = $res->contato->celular;
                $contato->dataAlteracao  = $res->contato->dataAlteracao;
                $contato->dataInclusao   = $res->contato->dataInclusao;
                $contato->sexo           = $res->contato->sexo;
                $contato->clienteDesde   = $res->contato->clienteDesde;
                $contato->limiteCredito  = $res->contato->limiteCredito;
                if(isset($res->contato->nomeVendedor)){
                    $contato->nomeVendedor   = $res->contato->nomeVendedor;
                }
                $contato->save();
            }
        }
    }





//
//$contato = new Contato();
//$contato->empresa_id     = $empresa->id;
//$contato->id_bling       = $res->contato->id;
//$contato->codigo         = $res->contato->codigo;
//$contato->nome           = $res->contato->nome;
//$contato->fantasia       = $res->contato->fantasia;
//$contato->tipo           = $res->contato->tipo;
//$contato->cnpj           = $res->contato->cnpj;
//$contato->ie_rg          = $res->contato->ie_rg;
//$contato->endereco       = $res->contato->endereco;
//$contato->numero         = $res->contato->numero;
//$contato->bairro         = $res->contato->bairro;
//$contato->cep            = $res->contato->cep;
//$contato->cidade         = $res->contato->cidade;
//$contato->complemento    = $res->contato->complemento;
//$contato->uf             = $res->contato->uf;
//$contato->fone           = $res->contato->fone;
//$contato->email          = $res->contato->email;
//$contato->situacao       = $res->contato->situacao;
//$contato->contribuinte   = $res->contato->contribuinte;
//$contato->site           = $res->contato->site;
//$contato->celular        = $res->contato->celular;
//$contato->dataAlteracao  = $res->contato->dataAlteracao;
//$contato->dataInclusao   = $res->contato->dataInclusao;
//$contato->sexo           = $res->contato->sexo;
//$contato->clienteDesde   = $res->contato->clienteDesde;
//$contato->limiteCredito  = $res->contato->limiteCredito;
//if(isset($res->contato->nomeVendedor)){
//$contato->nomeVendedor   = $res->contato->nomeVendedor;
//}
//$contato->save();




}
