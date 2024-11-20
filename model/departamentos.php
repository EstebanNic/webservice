<?php
class Departamento extends Conectar {
    public function get_departamento() {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "SELECT * FROM departamentos";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_departamento($departamento, $area, $ubicacion) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "INSERT INTO departamentos (Departamento, Area, Ubicacion) VALUES (?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $departamento);
        $sql->bindValue(2, $area);
        $sql->bindValue(3, $ubicacion);
        $sql->execute();
        return ["id" => $conectar->lastInsertId()];
    }

    public function delete_departamento($id) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "DELETE FROM departamentos WHERE idDepartamento = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return ["resultado" => "Departamento eliminado"];
    }

    public function update_departamento($id, $departamento, $area, $ubicacion) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "UPDATE departamentos SET Departamento = ?, Area = ?, Ubicacion = ? WHERE idDepartamento = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $departamento);
        $sql->bindValue(2, $area);
        $sql->bindValue(3, $ubicacion);
        $sql->bindValue(4, $id);
        $sql->execute();
        return ["resultado" => "Departamento actualizado"];
    }
}
?>
