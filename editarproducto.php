<?php

include_once('includes/conexion.php');

$id = $_POST['id'];
$categoria = $_POST['categoria'];
$nombre = $_POST['nombre'];
$referencia = $_POST['referencia'];
$precio = $_POST['precio'];
$peso = $_POST['peso'];
$stock = $_POST['stock'];
$fecha = $_POST['fecha'];

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    $sql = "UPDATE `productos` SET `nombre` = ?, `referencia` = ?, `precio` = ?, `peso` = ?, `id_categoria` = ?, `stock` = ? WHERE `id` = ?";
    
    $pdo->prepare($sql)->execute([$nombre, $referencia, $precio, $peso, $categoria, $stock, $id]);

    
    $url = "<meta http-equiv='refresh' content='1;URL=listarproducto.php'><script language='javascript'>alert('Producto editado')</script>";
    echo $url;
    
} catch(PDOException $e) {
   echo $e->getMessage();
}

$pdo = null;

?>