<?php

session_start();

define("ROOT_PATH", "/monprojet.devel/");
$request = str_replace(ROOT_PATH, "", $_SERVER['REQUEST_URI']);
$request = strtok($request, '?');
$request = trim($request, '/');
$segments = array_filter(explode('/', $request));

if(!$segments){
    $segments[0] = "home_page";
}

define("REQ_TYPE", $segments[0] ?? NULL);
define("REQ_TYPE_ID", $segments[1] ?? NULL);
define("REQ_ACTION", $segments[2] ?? NULL);

$file = "controllers/".REQ_TYPE.".php";

if(file_exists($file)){
    include($file);
    exit();
}
else{
    include("controllers/404.php");
    exit();
}

?>