<?php
class ConexionBD {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "web";
    }

    public function conectar() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function obtenerConexion() {
        return $this->conn;
    }

    public function cerrarConexion() {
        $this->conn->close();
    }
}
?>
