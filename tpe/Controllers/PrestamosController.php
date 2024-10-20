<?php
require_once ".\Models\PrestamosModel.php";
require_once ".\Views\PrestamosView.php";

class PrestamosController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new PrestamosModel();
        $this->view = new PrestamosView();
    }

    public function ShowError(){
        $this->view->ShowError();
    }
    
    public function GetPrestamos(){
        $prestamos = $this->model->GetPrestamos();
        
        $this->view->DisplayPrestamos($prestamos);
    }

    public function GetDescripcion($id_producto){
        $producto = $this->model->GetDescripcion($id_producto);
        
        $this->view->DisplayDescripcion($producto);
    }
}


?>