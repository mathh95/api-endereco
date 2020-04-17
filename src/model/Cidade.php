<?php
namespace App\model;


error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

class Cidade{

    private $db;
    private $cod_cidade;
    private $nome_cidade;
    private $estado;
    private $nome_estado;


    
    function __construct($db){
        $this->db = $db;
    }

    public function getCod_cidade(){
        return $this->cod_cidade;
    }

    public function setCod_cidade($cod_cidade){
        $this->cod_cidade = $cod_cidade;
    }

    public function getNome_cidade(){
        return $this->nome_cidade;
    }


    public function setNome_cidade($nome_cidade){
        $this->nome_cidade = $nome_cidade;
    }

    public function getNome_estado(){
        return $this->nome_estado;
    }
    public function setNome_estado(Estado $nome_estado){
        $this->nome_estado = $nome_estado;
    }
    
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado(Estado $estado){
        $this->estado = $estado;
    }
    

    function selecionarTodos(){
        $estado = array();

        $sql = $this->db->prepare("SELECT * FROM cidade ORDER BY cod_cidade ASC");

        if($sql->execute()){
            if($sql->rowCount() > 0){

                $estado = $sql->fetchAll();

            }
        }

        return $estado;
    }


    function selecionarCid($param){
        $estado = array();

        $sql = $this->db->prepare("SELECT cidade.cod_cidade, cidade.nome as nome_cidade, estado.uf, estado.nome AS nome_estado FROM cidade
        INNER JOIN estado ON cidade.cod_estado = estado.cod_estado 
        WHERE cod_cidade = :cod_cidade OR cidade.nome = :nome");
        
        $sql->bindValue(":cod_cidade", $param);
        $sql->bindValue(":nome", $param);


        if($sql->execute()){
            if($sql->rowCount() > 0){
                $estado = $sql->fetch();
            }
        }

        return $estado;
    }
    
}