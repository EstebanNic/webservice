<?php
class Servicio extends Conectar {
    public function get_servicios() {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "SELECT s.idServicio, s.TipoDepartamento, s.Descripcion, s.FechaRequerimiento, s.FechaSoporte, 
                       e.Nombre AS Estado, u.Nombre AS UsuarioNombre, u.Apellido AS UsuarioApellido, 
                       d.Departamento AS DepartamentoNombre
                FROM servicios s
                INNER JOIN estado e ON s.Estado = e.idEstado
                INNER JOIN usuario u ON s.IdUsuario = u.idUsuario
                INNER JOIN departamentos d ON s.IdDepartamento = d.idDepartamento";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_servicio($tipoDepartamento, $descripcion, $fechaSoporte, $estado, $idUsuario, $idDepartamento) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "INSERT INTO servicios (TipoDepartamento, Descripcion, FechaSoporte, Estado, IdUsuario, IdDepartamento) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tipoDepartamento);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $fechaSoporte);
        $sql->bindValue(4, $estado);
        $sql->bindValue(5, $idUsuario);
        $sql->bindValue(6, $idDepartamento);
        $sql->execute();
        return ["id" => $conectar->lastInsertId()];
    }

    public function delete_servicio($id) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "DELETE FROM servicios WHERE idServicio = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return ["resultado" => "Servicio eliminado"];
    }

    public function update_servicio($id, $tipoDepartamento, $descripcion, $fechaSoporte, $estado, $idUsuario, $idDepartamento) {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "UPDATE servicios SET TipoDepartamento = ?, Descripcion = ?, FechaSoporte = ?, Estado = ?, 
                                       IdUsuario = ?, IdDepartamento = ? WHERE idServicio = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tipoDepartamento);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $fechaSoporte);
        $sql->bindValue(4, $estado);
        $sql->bindValue(5, $idUsuario);
        $sql->bindValue(6, $idDepartamento);
        $sql->bindValue(7, $id);
        $sql->execute();
        return ["resultado" => "Servicio actualizado"];
    }

    public function get_servicios_detalle() {
        $conectar = parent::Conexion();
        parent::setnames();
        $sql = "SELECT 
                    u.idUsuario,
                    u.Nombre AS NombreUsuario,
                    d.Departamento AS NombreDepartamento,
                    s.TipoDepartamento,
                    s.Descripcion,
                    s.FechaRequerimiento,
                    s.FechaSoporte,
                    e.Nombre AS Estado
                FROM servicios s
                INNER JOIN usuario u ON s.IdUsuario = u.idUsuario
                INNER JOIN departamentos d ON s.IdDepartamento = d.idDepartamento
                INNER JOIN estado e ON s.Estado = e.idEstado";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
