<?php

namespace App\control;

use App\model\Estado;

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

class EstadoControl extends Control{

    function selecionarTodos($request, $response){
        
        $est = new Estado($this->db);


        $estado = $est->selecionarTodos();

        if(!empty($estado)){
            $response->withHeader( 'Content-type', 'application/json' );
            $response->withStatus(200);
            return $response->withJson($estado);
        }else{
            $response->withHeader( 'Content-type', 'text/html');
            $response->withStatus(404)->write("Nenhum estado encontrado!!");
            return $response;
        }   
    }



    function selecionarUf($request, $response){
        $param = $request->getAttribute('param');

        if($param != null){
            $est = new Estado($this->db);
            
            $estado = $est->selecionarEst($param);

            if(!empty($estado)){
                $response->withHeader('Content-type', 'application/json');
                $response->withstatus(200);
                return $response->withJson($estado);
            }else{
                $response->withHeader('Content-type', 'application/json');
                $response->withStatus(500)->write('Erro na consulta de estado.');
                return $response;
            }
        }else{
            return "Codigo ou UF inválido";
        }
    }

  
}
?>