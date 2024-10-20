<?php

class AdministradorView {

    function __construct(){
    }
    
    public function DisplayLogIn(){
        $titulo = "Log In";
        require('templates/login.phtml');
    }

    public function DisplayForm($prestamos, $usuarios, $libros){

        $tituloPrestamos = "Listado de Prestamos de la Biblioteca";
        $tituloUsuarios = "Listado de Usuarios";
        $tituloLibros = "Listado de Libros";
        require('templates/formularios.phtml');
    }

    public function DisplayModifyFormPrestamos(){
        $titulo = "Modificar Prestamos";
        require('templates/modificar-prestamos.phtml');
    }

    public function DisplayModifyFormUsuarios(){
        $titulo = "Modificar Usuarios";
        require('templates/modificar-usuarios.phtml');
    }

    public function DisplayModifyFormLibros(){
        $titulo = "Modificar Libros";
        require('templates/modificar-libros.phtml');
    }

    public function ShowError($error){
        require('templates/error.phtml');
    }

    
}

?>