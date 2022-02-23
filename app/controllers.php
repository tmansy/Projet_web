<?php

function render($data=[]){
    extract($data);
    if(!isset($register)){
        throw new Exception("Il manque la variable register");
    }
    if(!isset($content)){
        throw new Exception("Il manque la variable content");
    }
    if(!isset($nav)){
        throw new Exception("Il manque la variable nav");
    }
    
    include "views/template.php";
}

?>