<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../model/departamentos.php");

$departamentos = new Departamento();
$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {
    case 'GetDep':
        $datos = $departamentos->get_departamento();
        echo json_encode($datos);
        break;

    case 'InsertDep':
        $departamento = $body["Departamento"];
        $area = $body["Area"];
        $ubicacion = $body["Ubicacion"];
        $result = $departamentos->insert_departamento($departamento, $area, $ubicacion);
        echo json_encode($result);
        break;

    case 'DeleteDep':
        $id = $body["idDepartamento"];
        $result = $departamentos->delete_departamento($id);
        echo json_encode($result);
        break;

    case 'UpdateDep':
        $id = $body["idDepartamento"];
        $departamento = $body["Departamento"];
        $area = $body["Area"];
        $ubicacion = $body["Ubicacion"];
        $result = $departamentos->update_departamento($id, $departamento, $area, $ubicacion);
        echo json_encode($result);
        break;
}
?>
