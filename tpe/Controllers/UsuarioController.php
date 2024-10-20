<?php
require_once ".\Models\UsuarioModel.php";
require_once ".\Views\UsuarioView.php";

class UsuariosController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new UsuariosModel();
        $this->view = new UsuariosView();
    }
    
    public function GetUsuarios(){
        $usuarios = $this->model->GetUsuarios();
        $this->view->DisplayUsuarios($usuarios);
    }
    
    public function GetDescripcion($id_usuario){
        $usuarios = $this->model->GetDescripcion($id_usuario);
        
        $this->view->DisplayDescripcion($usuarios);
    }
}


?>