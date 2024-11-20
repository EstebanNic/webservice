<?php
class Estado extends Conectar {
    public function get_estado() {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "SELECT * FROM estado";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_estado($nombre) {
        // Validar que el nombre esté entre los valores permitidos
        $nombresValidos = ["finalizado", "cancelado", "en proceso"];
        if (!in_array(strtolower($nombre), $nombresValidos)) {
            return ["error" => "Nombre de estado no válido"];
        }

        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "INSERT INTO estado (Nombre) VALUES (?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->execute();
        return ["id" => $conectar->lastInsertId()];
    }
    public function delete_estado($id) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "DELETE FROM estado WHERE idEstado = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return ["resultado" => "Estado eliminado"];
    }
    public function update_estado($id, $nombre) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "UPDATE estado SET Nombre = ? WHERE idEstado = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $id);
        $sql->execute();
        return ["resultado" => "Estado actualizado"];
    }
}
?>
