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

//Tableau de tableau qui contient un tableau de tableau, 2 niveaux de tableaux
function formattedBook($books){
    $formatted_book = [];
    $num_book = -1;
    $array_book = 0;
    for($i=0; $i<count($books); $i++){
        if($books[$i]["numCommande"] != $num_book){
            $formatted_book[$i]["numCommande"] = $books[$i]["numCommande"];
            $num_book = $formatted_book[$i]["numCommande"];
            $formatted_book[$i]["login"] = $books[$i]["login"];
            $formatted_book[$i]["statut"] = $books[$i]["statut"];
            $formatted_book[$i]["articlesArray"] = [];
            array_push($formatted_book[$i]["articlesArray"], array("ArticlesNoms" => $books[$i]["nomProduit"], "ArticlesQuantite" => $books[$i]["quantite"], "ArticlesPrix" => $books[$i]["prix"]));
            $array_book = $i;
        }
        else{
            array_push($formatted_book[$array_book]["articlesArray"], array("ArticlesNoms" => $books[$i]["nomProduit"], "ArticlesQuantite" => $books[$i]["quantite"], "ArticlesPrix" => $books[$i]["prix"]));
        } 
    }
    return $formatted_book;
}

?>