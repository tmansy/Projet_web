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


function lowerAndNoAccent($product){
    $product = mb_strtolower($product, "UTF-8");
    $product = str_replace(
        array(
            'à', 'â', 'ä', 'á', 'ã', 'å',
            'î', 'ï', 'ì', 'í', 
            'ô', 'ö', 'ò', 'ó', 'õ', 'ø', 
            'ù', 'û', 'ü', 'ú', 
            'é', 'è', 'ê', 'ë', 
            'ç', 'ÿ', 'ñ',
        ),
        array(
            'a', 'a', 'a', 'a', 'a', 'a', 
            'i', 'i', 'i', 'i', 
            'o', 'o', 'o', 'o', 'o', 'o', 
            'u', 'u', 'u', 'u', 
            'e', 'e', 'e', 'e', 
            'c', 'y', 'n', 
        ),
        $product
    );
    return $product;
}

?>