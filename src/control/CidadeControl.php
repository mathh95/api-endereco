<?php

namespace App\control;

use App\model\Cidade;

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

class CidadeControl extends Control{

    function selecionarTodos($request, $response){
        
        $cid = new Cidade($this->db);


        $cidade = $cid->selecionarTodos();

        if(!empty($cidade)){
            $response->withHeader( 'Content-type', 'application/json' );
            $response->withStatus(200);
            return $response->withJson($cidade);
        }else{
            $response->withHeader( 'Content-type', 'text/html');
            $response->withStatus(404)->write("Nenhuma cidade encontrada!!");
            return $response;
        }   
    }



    function selecionarCid($request, $response){
        $param = $request->getAttribute('param');

        if($param != null){
            $cid = new Cidade($this->db);
            
            $cidade = $cid->selecionarCid($param);

            if(!empty($cidade)){
                $response->withHeader('Content-type', 'application/json');
                $response->withstatus(200);
                return $response->withJson($cidade);
            }else{
                $response->withHeader('Content-type', 'application/json');
                $response->withStatus(500)->write('Erro na consulta de cidade.');
                return $response;
            }
        }else{
            return "Codigo ou UF inválido";
        }
    }

  
}
?>