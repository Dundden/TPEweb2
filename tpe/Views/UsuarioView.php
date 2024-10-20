<?php

class UsuariosView {

    function __construct(){

    }
    
    public function DisplayUsuarios($usuarios){

        $titulo = "Listado de Usuarios";

        require('templates/listado-usuarios.phtml');
        
    }

    public function DisplayDescripcion($usuarios){
        
        $titulo = "Descripcion del Usuario";

        require('templates/descripcion-usuario.phtml');
    }

}

?>