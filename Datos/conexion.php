<?php
try {
    $pdo=new PDO("mysql:dbname=sistemalibreria;host=localhost","root","");
    echo 'conectado';
    
} catch (Exception $ex) {
    die('Error'.$ex->getMessage());
}

?>

