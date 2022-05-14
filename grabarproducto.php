<?php

include_once('includes/conexion.php');

$nombre = $_POST['nombre'];
$referencia = $_POST['referencia'];
$precio = $_POST['precio'];
$peso = $_POST['peso'];
$categoria = $_POST['categoria'];
$stock = $_POST['stock'];

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $sql = "INSERT INTO `productos` (`nombre`,`referencia`,`precio`,`peso`,`id_categoria`,`stock`,`fecha`) VALUES ('".$nombre."','".$referencia."','".$precio."','".$peso."','".$categoria."','".$stock."', now())";
    $pdo->query($sql);

    $url = "<meta http-equiv='refresh' content='1;URL=listarproducto.php'><script language='javascript'>alert('Producto grabado')</script>";
    echo $url;
    
} catch(PDOException $e) {
   echo $e->getMessage();
}

$pdo = null;

?>