<?php

require_once "config.php";

class AdministradorModel {

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

    public function GetPassword($email){
        $sentencia = $this->db->prepare( "SELECT * FROM administrador WHERE email = ?");
        $sentencia->execute(array($email));
        
        $administrador = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $administrador;
    }

	public function GetLibros(){
        $sentencia = $this->db->prepare( "select * from libros");
        $sentencia->execute();
        $libros = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $libros;
    }

    public function GetPrestamos(){
        $sentencia = $this->db->prepare( "select * from prestamo");
        $sentencia->execute();
        $prestamos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $prestamos;
    }

    public function GetUsuarios(){
        $sentencia = $this->db->prepare( "select * from usuario");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $usuarios;
    }

    function RemovePrestamo($id_prestamo){
        try{
            $sentencia = $this->db->prepare("DELETE FROM prestamo WHERE id_prestamo=?");
    
            $sentencia->execute(array($id_prestamo));
    
            header("Location: " .URL_CATEGORIAS);
        }catch(PDOException $e){   
            echo "Error al eliminar datos en la tabla";
        }
    }

    function RemoveUsuario($id_usuario){
        try{
            $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id_usuario=?");
    
            $sentencia->execute(array($id_usuario));

            header("Location: " .URL_CATEGORIAS);
        }catch(PDOException $e){   
            echo "Error al eliminar datos en la tabla";
        } 
    }
    
    function RemoveLibro($id_libro){
        try{
            $sentencia = $this->db->prepare("DELETE FROM libros WHERE id_libro=?");
    
            $sentencia->execute(array($id_libro));
    
            header("Location: " .URL_CATEGORIAS);
        }catch(PDOException $e){   
            echo "Error al eliminar datos en la tabla";
        } 
    }

    function InsertPrestamo(){
        try{ 
            $sentencia = $this->db->prepare('INSERT INTO prestamo(id_usuario, id_libro, fecha_prestamo, fecha_devolucion) VALUES (?, ?, ?, ?)');
    
            $sentencia->execute(array($_POST['id-usuario'], $_POST['id-libro'], $_POST['fecha-prestamo'], $_POST['fecha-devolucion']));

            header("Location: " .URL_CATEGORIAS);  

        } catch(PDOException $e){   
            echo "Error al insertar datos en la tabla";
        }
    }

    function InsertUsuario(){
        try{
            $sentencia = $this->db->prepare('INSERT INTO usuario(nombre, apellido, direccion, mail, telefono, fecha_registro) VALUES (?, ?, ?, ?, ?, ?)');
    
            $sentencia->execute(array($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['mail'], $_POST['telefono'], $_POST['fecha-registro']));

            header("Location: " .URL_CATEGORIAS);
        } catch(PDOException $e){   
            echo "Error al insertar datos en la tabla";
        }

    }

    function InsertLibro(){
        try{
            $sentencia = $this->db->prepare('INSERT INTO libros(titulo, autor, fecha_publicacion, editorial, genero, cantidad_copias) VALUES (?, ?, ?, ?, ?, ?)');
    
            $sentencia->execute(array($_POST['titulo'], $_POST['autor'], $_POST['fecha-publicacion'], $_POST['editorial'], $_POST['genero'], $_POST['cantidad-copias']));
    
            header("Location: " .URL_CATEGORIAS);
        }catch(PDOException $e){   
            echo "Error al insertar datos en la tabla";
        }
    }

    function ModifyPrestamo(){
        try{
            $sentencia = $this->db->prepare("UPDATE prestamo SET id_usuario=?, id_libro=?, fecha_prestamo=?, fecha_devolucion=? WHERE id_prestamo=?");
    
            $sentencia->execute(array($_POST['id-usuario'], $_POST['id-libro'], $_POST['fecha-prestamo'], $_POST['fecha-devolucion'], $_POST['id-prestamo']));
    
            header("Location: " .URL_CATEGORIAS);
        }catch(PDOException $e) {
            echo "Error al modificar datos de la tabla";
        }
    }

    function ModifyUsuario(){
        try{
            $sentencia = $this->db->prepare("UPDATE usuario SET nombre=?, apellido=?, direccion=?, mail=?, telefono=?, fecha_registro=? WHERE id_usuario=?");
    
            $sentencia->execute(array($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['mail'], $_POST['telefono'], $_POST['fecha-registro'], $_POST['id-usuario']));
    
            header("Location: " .URL_CATEGORIAS);
        }catch(PDOException $e) {
            echo "Error al modificar datos de la tabla";
        }
    }

    function ModifyLibro(){
        try {
            $sentencia = $this->db->prepare("UPDATE libros SET titulo=?, autor=?, fecha_publicacion=?, editorial=?, genero=?, cantidad_copias=? WHERE id_libro=?");
    
            $sentencia->execute(array($_POST['titulo'], $_POST['autor'], $_POST['fecha-publicacion'], $_POST['editorial'], $_POST['genero'], $_POST['cantidad-copias'], $_POST['id-libro']));
        
            header("Location: " .URL_CATEGORIAS);
        }catch(PDOException $e) {
            echo "Error al modificar datos de la tabla";
        } 
    }
}

?>