<?php

require_once "config.php";

class UsuariosModel {

    private $db;

    function __construct(){
        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }

    private function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END

            CREATE TABLE IF NOT EXISTS prestamos (
            id_prestamo INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT,
            id_libro INT,
            fecha_prestamo DATE NOT NULL,
            fecha_devolucion DATE,
            FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
            FOREIGN KEY (id_libro) REFERENCES libros(id_libro)
            );
            
            CREATE TABLE IF NOT EXISTS libros (
            id_libro INT AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(45) NOT NULL,
            autor VARCHAR(45) NOT NULL,
            fecha_publicacion DATE,
            editorial VARCHAR(45) NOT NULL,
            genero VARCHAR(45) NOT NULL,
            genero INT NOT NULL
            );

            CREATE TABLE IF NOT EXISTS usuario (
            id_usuario INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(45) NOT NULL,
            apellido VARCHAR(45) NOT NULL,
            direccion VARCHAR(45) NOT NULL,
            mail VARCHAR(45) NOT NULL,
            telefono VARCHAR(45) NOT NULL,
            fecha_registro DATE
            );
END;
            try {
                $this->db->exec($sql);
            } catch (PDOException $e) {
                throw new Exception("Error al crear las tablas: " . $e->getMessage());
            }
        }
    }

	public function GetUsuarios(){
        $sentencia = $this->db->prepare( "select * from usuario");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $usuarios;
    }
    
    
    public function GetDescripcion($id_usuario){
        $sentencia = $this->db->prepare( "select * from usuario where id_usuario=?");
        $sentencia->execute(array($id_usuario));
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $usuarios;
    }
}

?>