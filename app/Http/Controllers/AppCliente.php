<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Contato;
use App\Models\Pedido;
use App\Models\Produto;


class AppCliente extends Controller
{

    function chamadaBling($endpoint, $apikey){
        $url = "https://bling.com.br/Api/v2/".$endpoint."/json/?apikey=".$apikey;
        $response = file_get_contents($url);
        $response = json_decode($response);

        return $response;
    }

    public function pedidosBling()
    {
        $empresa = Empresa::where('id', auth()->user()->empresa_id)->first();

        $apikey = $empresa->chaveBling;
        $endpoint = 'pedidos';
        $appCliente = new AppCliente;
        $retorno = $appCliente->chamadaBling($endpoint, $apikey);

        $pedidos = Pedido::where('empresa_id', auth()->user()->empresa_id)->get();

        $arrVerifica = [];
        foreach ($pedidos as $pedido){
            array_push($arrVerifica, $pedido->numero);
        }

        foreach ($retorno->retorno->pedidos as $res){
            if(!in_array($res->pedido->numero, $arrVerifica)) {
                $contato = Contato::where('empresa_id',auth()->user()->empresa_id)->where('id_bling', $res->pedido->cliente->id)->first();

                if(!isset($contato)){
                    $contato = new Contato();
                    $contato->empresa_id     = auth()->user()->empresa_id;
                    $contato->id_bling       = $res->pedido->cliente->id;
                    $contato->nome           = $res->pedido->cliente->nome;
                    $contato->cnpj           = $res->pedido->cliente->cnpj;
                    $contato->ie_rg          = $res->pedido->cliente->ie;
                    $contato->endereco       = $res->pedido->cliente->endereco;
                    $contato->numero         = $res->pedido->cliente->numero;
                    $contato->complemento    = $res->pedido->cliente->complemento;
                    $contato->cidade         = $res->pedido->cliente->cidade;
                    $contato->bairro         = $res->pedido->cliente->bairro;
                    $contato->cep            = $res->pedido->cliente->cep;
                    $contato->uf             = $res->pedido->cliente->uf;
                    $contato->email          = $res->pedido->cliente->email;
                    $contato->celular        = $res->pedido->cliente->celular;
                    $contato->fone           = $res->pedido->cliente->fone;


                    if(isset($res->pedido->cliente->codigo)){
                        $contato->codigo         = $res->pedido->cliente->codigo;
                    }
                    if(isset($res->pedido->cliente->tipo)){
                        $contato->tipo           = $res->pedido->cliente->tipo;
                    }
                    if(isset($res->pedido->cliente->fantasia)){
                        $contato->fantasia       = $res->pedido->cliente->fantasia;
                    }
                    if(isset($res->pedido->cliente->situacao)){
                        $contato->situacao       = $res->pedido->cliente->situacao;
                    }
                    if(isset($res->pedido->cliente->contribuinte)){
                        $contato->contribuinte   = $res->pedido->cliente->contribuinte;
                    }
                    if(isset($res->pedido->cliente->site)){
                        $contato->site           = $res->pedido->cliente->site;
                    }
                    if(isset($res->pedido->cliente->dataAlteracao)){
                        $contato->dataAlteracao  = $res->pedido->cliente->dataAlteracao;
                    }
                    if(isset($res->pedido->cliente->dataInclusao)){
                        $contato->dataInclusao   = $res->pedido->cliente->dataInclusao;
                    }
                    if(isset($res->pedido->cliente->sexo)){
                        $contato->sexo           = $res->pedido->cliente->sexo;
                    }
                    if(isset($res->pedido->cliente->clienteDesde)){
                        $contato->clienteDesde   = $res->pedido->cliente->clienteDesde;
                    }
                    if(isset($res->pedido->cliente->limiteCredito)){
                        $contato->limiteCredito  = $res->pedido->cliente->limiteCredito;
                    }
                    if(isset($res->pedido->cliente->nomeVendedor)){
                        $contato->nomeVendedor   = $res->pedido->cliente->nomeVendedor;
                    }
                    $contato->save();
                }

                $pedido = new Pedido();
                $pedido->contato_id = $contato->id;
                $pedido->empresa_id = auth()->user()->empresa_id;
                if(isset($res->pedido->tipoIntegracao)){
                    $pedido->tipoIntegracao = $res->pedido->tipoIntegracao;
                }
                $pedido->desconto = $res->pedido->desconto;
                $pedido->observacoes = $res->pedido->observacoes;
                $pedido->observacaointerna = $res->pedido->observacaointerna;
                $pedido->data = $res->pedido->data;
                $pedido->numero = $res->pedido->numero;
                $pedido->numeroOrdemCompra = $res->pedido->numeroOrdemCompra;
                $pedido->vendedor = $res->pedido->vendedor;
                $pedido->valorfrete = $res->pedido->valorfrete;
                $pedido->outrasdespesas = $res->pedido->outrasdespesas;
                $pedido->totalprodutos = $res->pedido->totalprodutos;
                $pedido->totalvenda = $res->pedido->totalvenda;
                $pedido->situacao = $res->pedido->situacao;
                $pedido->dataSaida = $res->pedido->dataSaida;

                $pedido->save();

                foreach ($res->pedido->itens as $r){
                    if(isset($r->item->codigo)){
                        $item = new Produto();
                        $item->pedido_id = $pedido->id;
                        $item->empresa_id = auth()->user()->empresa_id;
                        $item->codigo = $r->item->codigo;
                        $item->descricao = $r->item->descricao;
                        $item->quantidade = $r->item->quantidade;
                        $item->valorunidade = $r->item->valorunidade;
                        $item->precocusto = $r->item->precocusto;
                        $item->descontoItem = $r->item->descontoItem;
                        $item->un = $r->item->un;
                        $item->pesoBruto = $r->item->pesoBruto;
                        $item->largura = $r->item->largura;
                        $item->altura = $r->item->altura;
                        $item->profundidade = $r->item->profundidade;
                        $item->descricaoDetalhada = $r->item->descricaoDetalhada;
                        $item->unidadeMedida = $r->item->unidadeMedida;
                        $item->gtin = $r->item->gtin;
                        $item->save();
                    }
                }
            }
        }
    }

    public function contatosBling()// trocar para o nome de contatos
    {
        $empresa = Empresa::where('id', auth()->user()->empresa_id)->first();

        $apikey = $empresa->chaveBling;
        $endpoint = 'contatos';
        $appCliente = new AppCliente;
        $retorno = $appCliente->chamadaBling($endpoint, $apikey);

        $contato = Contato::where('empresa_id', auth()->user()->empresa_id)->get();

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

}
