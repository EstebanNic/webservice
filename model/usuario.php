<?php
class Usuario extends Conectar {
    public function get_usuario() {
        $conectar = parent::Conexion();
        parent::setnames();
        // Modificar la consulta para hacer un JOIN con la tabla departamentos
        $sql = "SELECT u.idUsuario, u.Nombre, u.Apellido, u.Correo, u.idDepartamento, d.Departamento AS NombreDepartamento
                FROM usuario u
                INNER JOIN departamentos d ON u.idDepartamento = d.idDepartamento";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_usuario($nombre, $apellido, $correo, $idDepartamento) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "INSERT INTO usuario (Nombre, Apellido, Correo, idDepartamento) VALUES (?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellido);
        $sql->bindValue(3, $correo);
        $sql->bindValue(4, $idDepartamento);
        $sql->execute();
        return ["id" => $conectar->lastInsertId()];
    }

    public function delete_usuario($id) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "DELETE FROM usuario WHERE idUsuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return ["resultado" => "Usuario eliminado"];
    }

    public function update_usuario($id, $nombre, $apellido, $correo, $idDepartamento) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "UPDATE usuario SET Nombre = ?, Apellido = ?, Correo = ?, idDepartamento = ? WHERE idUsuario = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellido);
        $sql->bindValue(3, $correo);
        $sql->bindValue(4, $idDepartamento);
        $sql->bindValue(5, $id);
        $sql->execute();
        return ["resultado" => "Usuario actualizado"];
    }
}
?>
