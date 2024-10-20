<?php

class LibrosView {

    function __construct(){

    }
    
    public function DisplayLibros($libros){

        $titulo = "Listado de Libros";

        require('templates/listado-libros.phtml');
        
    }

    public function DisplayDescripcion($libros){
        
        $titulo = "Descripcion del Libro";

        require('templates/descripcion-libro.phtml');
    }

}

?>