<?php

namespace Controller;
use Model\Dragons;

class DragonsController
{
    public function getdragons()
    {
        $dragon = new Dragons();
        $dragons = $dragon->getdragons();

        if ($dragons) {
            header('Content-Type: application/json', true, 200);
            echo json_encode($dragons);
        } else {
            header('Content-Type: application/json', true, 404);
            echo json_encode(["message" => "No dragons found"]);
        }
    }

    public function createdragons()
    {
        $infor = json_decode(file_get_contents("php://input"));

        if (isset($infor->nome) && isset($infor->significado) && isset($infor->cor) && isset($infor->especie) && isset($infor->cavaleiro)) {
            $dragon = new Dragons();
            $dragon->nome = $infor->nome;
            $dragon->significado = $infor->significado;
            $dragon->cor = $infor->cor;
            $dragon->especie = $infor->especie;
            $dragon->cavaleiro = $infor->cavaleiro;

            if ($dragon->createdragons()) {
                header('content-Type: application/json', true, 201);
                echo json_encode(["message" => "dragon created sucessfully"]);
            } else {
                header('content-Type: application/json', true, 500);
                echo json_encode(["message" => "Failed to create a dragon"]);
            }
        } else {
            header('content-Type: application/json', true, 400);
            echo json_encode(["message" => "Invalid input"]);
        }
    }

    public function updatedragons()
    {
        $infor = json_decode(file_get_contents("php://input"));
        if (isset($infor->id) && isset($infor->nome) && isset($infor->significado) && isset($infor->cor) && isset($infor->especie) && isset($infor->cavaleiro)) {
            $dragon = new Dragons();
            $dragon->id = $infor->id;
            $dragon->nome = $infor->nome;
            $dragon->significado = $infor->significado;
            $dragon->cor = $infor->cor;
            $dragon->especie = $infor->especie;
            $dragon->cavaleiro = $infor->cavaleiro;

            if ($dragon->updatedragons()) {
                header('content-type: application/json', true, 200);
                echo json_encode(["message" => "Dragon updated sucessfully"]);
            } else {
                header('content-Type: application/json', true, 500);
                echo json_encode(["message" => "Failed to update a dragon"]);
            }
        } else {
            header('content-Type: application/json', true, 400);
            echo json_encode(["message" => "Invalid input"]);
        }
    }

    public function deletedragons()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $dragon = new Dragons();
            $dragon->id = $id;

            if ($dragon->deletedragons()) {
                header('content-Type: application/json', true, 200);
                echo json_encode(["message" => "Dragon deleted sucessfully"]);
            } else {
                header('content-Type: application/json', true, 500);
                echo json_encode(["message" => "Failed to delete a dragon"]);
            }
        } else {
            header('content-Type: application/json', true, 400);
            echo json_encode(["message" => "Invalid Id"]);
        }
    }
}



?>