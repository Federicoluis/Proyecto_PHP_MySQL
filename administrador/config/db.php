<?php

$host="localhost";
$bd="website";
$user="root";
$password="";

try {
        $conection= new PDO("mysql:host=$host;dbname=$bd",$user,$password);
        if($conection){ }
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>