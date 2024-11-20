<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../model/estado.php");

$estado = new Estado();
$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {
    case 'GetEstado':
        $datos = $estado->get_estado();
        echo json_encode($datos);
        break;

    case 'InsertEstado':
        $nombre = $body["Nombre"];
        $result = $estado->insert_estado($nombre);
        echo json_encode($result);
        break;

    case 'DeleteEstado':
        $id = $body["idEstado"];
        $result = $estado->delete_estado($id);
        echo json_encode($result);
        break;

    case 'UpdateEstado':
        $id = $body["idEstado"];
        $nombre = $body["Nombre"];
        $result = $estado->update_estado($id, $nombre);
        echo json_encode($result);
        break;
}
?>
