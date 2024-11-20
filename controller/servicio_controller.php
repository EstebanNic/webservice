<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../model/servicio.php");

$servicio = new Servicio();
$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {
    case 'GetServicios':
        $datos = $servicio->get_servicios();
        echo json_encode($datos);
        break;

    case 'InsertServicio':
        $tipoDepartamento = $body["TipoDepartamento"];
        $descripcion = $body["Descripcion"];
        $fechaSoporte = $body["FechaSoporte"];
        $estado = $body["Estado"];
        $idUsuario = $body["IdUsuario"];
        $idDepartamento = $body["IdDepartamento"];
        $result = $servicio->insert_servicio($tipoDepartamento, $descripcion, $fechaSoporte, $estado, $idUsuario, $idDepartamento);
        echo json_encode($result);
        break;

    case 'DeleteServicio':
        $id = $body["idServicio"];
        $result = $servicio->delete_servicio($id);
        echo json_encode($result);
        break;

    case 'UpdateServicio':
        $id = $body["idServicio"];
        $tipoDepartamento = $body["TipoDepartamento"];
        $descripcion = $body["Descripcion"];
        $fechaSoporte = $body["FechaSoporte"];
        $estado = $body["Estado"];
        $idUsuario = $body["IdUsuario"];
        $idDepartamento = $body["IdDepartamento"];
        $result = $servicio->update_servicio($id, $tipoDepartamento, $descripcion, $fechaSoporte, $estado, $idUsuario, $idDepartamento);
        echo json_encode($result);
        break;
        
    case 'GetServiciosDetalle':
        $datos = $servicio->get_servicios_detalle();
        echo json_encode($datos);
        break;

}
?>