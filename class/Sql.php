<?php

class Sql extends PDO {

    //1-Faz conexão com BD
    private $conn;
    public function __construct() {

        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp", "root", "Dba1234");

    }

    //3- Recebe os parametros 
    private function setParams($statment, $parameters = array()) {

        foreach ($parameters as $key => $value) {

            $this->setParam($statment, $key, $value);

        }

    }

    //4- Seta valores/tratamento
    private function setParam($statment, $key, $value){

        $statment->bindParam($key, $value);

    }

    //2-Criar statement e preparar dados brutos
    public function query($rawQuery, $params = array()) {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;

    }

    //Função para seleção
    public function select($rawQuery, $params = array()):array
    {

        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>