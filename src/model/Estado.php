<?php
namespace App\model;


error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

class Estado{

    private $db;
    private $cod_estado;
    private $nome_estado;
    private $uf;


    
    function __construct($db){
        $this->db = $db;
    }


    
    public function getCod_estado(){
        return $this->cod_estado;
    }

    public function setCod_estado($cod_estado){
        $this->cod_estado = $cod_estado;
    }

    public function getNome_estado(){
        return $this->nome_estado;
    }


    public function setNome_estado($nome_estado){
        $this->nome_estado = $nome_estado;
    }


    public function getUf(){
        return $this->uf;
    }


    public function setUf($uf){
        $this->uf = $uf;
    }



  

    function selecionarTodos(){
        $estado = array();

        $sql = $this->db->prepare("SELECT * FROM estado ORDER BY cod_estado ASC");

        if($sql->execute()){
            if($sql->rowCount() > 0){

                $estado = $sql->fetchAll();

            }
        }

        return $estado;
    }

    function selecionarEst($param){
        $estado = array();

        $sql = $this->db->prepare("SELECT * FROM estado WHERE (cod_estado = :cod_estado) OR (nome = :nome) OR (uf = :uf)");
        $sql->bindValue(":cod_estado", $param);
        $sql->bindValue(":nome", $param);
        $sql->bindValue(":uf", $param);

        if($sql->execute()){
            if($sql->rowCount() > 0){
                $estado = $sql->fetch();
            }
        }

        return $estado;
    }
    
}