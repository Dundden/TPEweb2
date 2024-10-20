<?php
require_once ".\Models\LibroModel.php";
require_once ".\Views\LibroView.php";

class LibrosController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new LibrosModel();
        $this->view = new LibrosView();
    }
    
    public function GetLibros(){
        $libros = $this->model->GetLibros();
        $this->view->DisplayLibros($libros);
    }

    public function GetDescripcion($id_libro){
        $libros = $this->model->GetDescripcion($id_libro);
        
        $this->view->DisplayDescripcion($libros);
    }
}


?>