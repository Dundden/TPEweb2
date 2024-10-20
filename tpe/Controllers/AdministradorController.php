<?php
require_once ".\Models\AdministradorModel.php";
require_once ".\Views\AdministradorView.php";

class AdministradorController {

    private $model;
    private $view;
    
	function __construct(){
        $this->model = new AdministradorModel();
        $this->view = new AdministradorView();
    }

    public function LogIn(){
        $this->view->DisplayLogIn();
    }   

    public function IniciarSesion(){
        $password = $_POST['pass'];

        $administrador = $this->model->GetPassword($_POST['user']);

        if (isset($administrador) && $administrador != null && password_verify($password, $administrador->password)){
            session_start();
            $_SESSION['userId'] = $administrador->id_administrador;
            $_SESSION['user'] = $administrador->email;
            header("Location: " . URL_CATEGORIAS);
        }else{
            session_start();
            $_SESSION['error'] = "Usuario o contraseña incorrectos.";
            header("Location: " . URL_LOGIN);
        }
    }

    public function GetCategorias(){
        $prestamos = $this->model->GetPrestamos();
        $usuarios = $this->model->GetUsuarios();
        $libros = $this->model->GetLibros();

        $this->view->DisplayForm($prestamos, $usuarios, $libros);
    }

    public function Logout(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }

    function RemovePrestamo($id_prestamo){
        $this->model->RemovePrestamo($id_prestamo);
    }

    function RemoveUsuario($id_usuario){
        $this->model->RemoveUsuario($id_usuario);
    }
    
    function RemoveLibro($id_libro){
        $this->model->RemoveLibro($id_libro);
    }

    function InsertPrestamo(){
        $this->model->InsertPrestamo();
                 
    }

    function InsertUsuario(){
        $this->model->InsertUsuario();        
    }

    function InsertLibro(){
        $this->model->InsertLibro();         
    }
    
    function DisplayModifyFormPrestamos(){
        $this->view->DisplayModifyFormPrestamos();         
    }

    function DisplayModifyFormUsuarios(){
        $this->view->DisplayModifyFormUsuarios();         
    }

    function DisplayModifyFormLibros(){
        $this->view->DisplayModifyFormLibros();         
    }

    function ModifyPrestamo(){
        $this->model->ModifyPrestamo();        
    }

    function ModifyUsuario(){
        $this->model->ModifyUsuario();        
    }

    function ModifyLibro(){
        $this->model->ModifyLibro();        
    }

}


?>