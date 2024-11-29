<?php
class Conectar {

    protected $dbh;

    protected function Conexion() {
        try {
            $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=servicio", "root", "");
            return $conectar;
        } catch (Exception $e) {
            print "Error de conexión: " . $e->getMessage();
        }
    }

    // Estaasdasd función permite devolver la conexión en un formato utf8
    // para caracteres especiales como tildes o la letra ñ
    // ahora puedo colocar la ñ
    public function setnames() {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
?>
