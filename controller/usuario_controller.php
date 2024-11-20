<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../model/usuario.php");

$usuario = new Usuario();
$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {
    case 'GetUsuario':
        $datos = $usuario->get_usuario();
        echo json_encode($datos);
        break;

    case 'InsertUsuario':
        $nombre = $body["Nombre"];
        $apellido = $body["Apellido"];
        $correo = $body["Correo"];
        $idDepartamento = $body["idDepartamento"];
        $result = $usuario->insert_usuario($nombre, $apellido, $correo, $idDepartamento);
        echo json_encode($result);
        break;

    case 'DeleteUsuario':
        $id = $body["idUsuario"];
        $result = $usuario->delete_usuario($id);
        echo json_encode($result);
        break;

    case 'UpdateUsuario':
        $id = $body["idUsuario"];
        $nombre = $body["Nombre"];
        $apellido = $body["Apellido"];
        $correo = $body["Correo"];
        $idDepartamento = $body["idDepartamento"];
        $result = $usuario->update_usuario($id, $nombre, $apellido, $correo, $idDepartamento);
        echo json_encode($result);
        break;
}
?>
