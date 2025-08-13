<?php

namespace Model;

use PDO;
use Model\Connection;

class Dragons
{
    private $conexao;

    public $id;

    public $nome;

    public $significado;

    public $cor;

    public $especie;

    public $cavaleiro;

    public function __construct()
    {
        $this->conexao = Connection::getConnection();
    }

    public function createdragons()
    {
        $bd = "INSERT INTO dragons (nome, significado, cor, especie, cavaleiro) VALUES (:nome, :significado, :cor, :especie, :cavaleiro)";
        $actioncreate = $this->conexao->prepare($bd);

        $actioncreate->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $actioncreate->bindParam(":significado", $this->significado, PDO::PARAM_STR);
        $actioncreate->bindParam(":cor", $this->cor, PDO::PARAM_STR);
        $actioncreate->bindParam(":especie", $this->especie, PDO::PARAM_STR);
        $actioncreate->bindParam(":cavaleiro", $this->cavaleiro, PDO::PARAM_STR);

        if ($actioncreate->execute()) {
            return true;
        }
        return false;
    }

    //OBTER DADOS DOS DRAGÕES

    public function getdragons()
    {
        $bd = "SELECT * FROM dragons";
        $actionget = $this->conexao->prepare($bd);
        $actionget->execute();
        return $actionget->fetchAll(PDO::FETCH_ASSOC);
    }


public function getdragonById($id)
{
    $bd = "SELECT * FROM dragons WHERE id = :id";
    $actionget = $this->conexao->prepare($bd);
    $actionget->bindParam(":id", $id, PDO::PARAM_INT);
    $actionget->execute();
    return $actionget->fetch(PDO::FETCH_ASSOC);
}

    public function updatedragons()
    {
        $bd = "UPDATE dragons SET nome = :nome, significado = :significado, cor = :cor, especie = :especie, cavaleiro = :cavaleiro WHERE id = :id";
        $actionupdate = $this->conexao->prepare($bd);

        $actionupdate->bindParam(":id", $this->id, PDO::PARAM_INT);
        $actionupdate->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $actionupdate->bindParam(":significado", $this->significado, PDO::PARAM_STR);
        $actionupdate->bindparam(":cor", $this->cor, PDO::PARAM_STR);
        $actionupdate->bindParam(":especie", $this->especie, PDO::PARAM_STR);
        $actionupdate->bindParam(":cavaleiro", $this->cavaleiro, PDO::PARAM_STR);

        if ($actionupdate->execute()) {

            return true;
        }
        return false;
    }

    public function deletedragons()
    {
        $bd = "DELETE FROM dragons WHERE id = :id";
        $actiondelete = $this->conexao->prepare($bd);
        $actiondelete->bindParam(":id", $this->id, PDO::PARAM_INT);

        if ($actiondelete->execute()) {
            return true;
        }
        return false;
    }
}

?>