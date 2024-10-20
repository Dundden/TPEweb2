<?php
require_once "Controllers\PrestamosController.php";
require_once "Controllers\UsuarioController.php";
require_once "Controllers\LibroController.php";
require_once "Controllers\AdministradorController.php";

$action = $_GET["action"];

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/prestamos');
define("URL_CATEGORIAS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/categorias');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/log-in');

if($action == "prestamos"){
    $controller = new PrestamosController();
    $controller->GetPrestamos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        if($partesURL[0] == "prestamos"){
            $controller = new PrestamosController();
            $controller->GetPrestamos();
        }elseif($partesURL[0] == "descripcion-prestamo"){
            $controller = new PrestamosController();
            $controller->GetDescripcion($partesURL[1]);
        }elseif($partesURL[0] == "usuarios"){
            $controller = new UsuariosController();
            $controller->GetUsuarios();
        }elseif($partesURL[0] == "descripcion-usuario"){
            $controller = new UsuariosController();
            $controller->GetDescripcion($partesURL[1]);
        }elseif($partesURL[0] == "libros"){
            $controller = new LibrosController();
            $controller->GetLibros();
        }elseif($partesURL[0] == "descripcion-libro"){
            $controller = new LibrosController();
            $controller->GetDescripcion($partesURL[1]);
        }elseif($partesURL[0] == "log-in"){
            $controller = new AdministradorController();
            $controller->LogIn();
        }elseif($partesURL[0] == "iniciarSesion"){
            $controller = new AdministradorController();
            $controller->IniciarSesion();
        }elseif($partesURL[0] == "categorias"){
            $controller = new AdministradorController();
            $controller->GetCategorias();
        }elseif($partesURL[0] == "eliminar-prestamo"){
            $controller = new AdministradorController();
            $controller->RemovePrestamo($partesURL[1]);
        }elseif($partesURL[0] == "eliminar-usuario"){
            $controller = new AdministradorController();
            $controller->RemoveUsuario($partesURL[1]);
        }elseif($partesURL[0] == "eliminar-libro"){
            $controller = new AdministradorController();
            $controller->RemoveLibro($partesURL[1]);
        }elseif($partesURL[0] == "insertar-prestamo"){
            $controller = new AdministradorController();
            $controller->InsertPrestamo();
        }elseif($partesURL[0] == "insertar-usuario"){
            $controller = new AdministradorController();
            $controller->InsertUsuario();
        }elseif($partesURL[0] == "insertar-libro"){
            $controller = new AdministradorController();
            $controller->InsertLibro();
        }elseif($partesURL[0] == "modificar-prestamo"){
            $controller = new AdministradorController();
            $controller->DisplayModifyFormPrestamos();
        }elseif($partesURL[0] == "enviarM-prestamo"){
            $controller = new AdministradorController();
            $controller->ModifyPrestamo();
        }elseif($partesURL[0] == "modificar-usuario"){
            $controller = new AdministradorController();
            $controller->DisplayModifyFormUsuarios();
        }elseif($partesURL[0] == "enviarM-usuario"){
            $controller = new AdministradorController();
            $controller->ModifyUsuario();
        }elseif($partesURL[0] == "modificar-libro"){
            $controller = new AdministradorController();
            $controller->DisplayModifyFormLibros();
        }elseif($partesURL[0] == "enviarM-libro"){
            $controller = new AdministradorController();
            $controller->ModifyLibro();
        }elseif($partesURL[0] == "log-out"){
            $controller = new AdministradorController();
            $controller->Logout();
        }else{
            $controller = new PrestamosController();
            $controller->ShowError();
        } 
    }
}

?>