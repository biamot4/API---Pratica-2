<?php

require_once __DIR__ . '/vendor/autoload.php';

use Controller\DragonsController;

$dragonsController = new DragonsController();

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {


    case 'GET':
        $dragonsController->getdragons();
        break;

    case 'POST':
        $dragonsController->createdragons();
        break;

    case 'PUT':
        $dragonsController->updatedragons();
        break;

    case 'DELETE':
       $dragonsController->deletedragons();
        break;

        default:
        header('Content-Type: application/json', true, 405);
        echo json_encode(["message" => "Method not allowed"]);
        break;


}
?>