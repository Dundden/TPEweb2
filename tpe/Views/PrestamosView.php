<?php

class PrestamosView {

    function __construct(){
    }

    public function ShowError(){
        $error = "Pagina no encontrada";
        require('templates/error.phtml');
    }
    
    public function DisplayPrestamos($prestamos){

        $titulo = "Listado de Prestamos de la Biblioteca";

        require('templates/listado-prestamos.phtml');
        
    }


    public function DisplayDescripcion($prestamos){
        
        $titulo = "Descripcion del Prestamo";

        require('templates/descripcion-prestamos.phtml');
    }

}

?>