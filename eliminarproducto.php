<?php

include_once('includes/conexion.php');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql1 = "DELETE FROM `productos` WHERE `id` =".$id;
        $pdo->query($sql1);
        
        $url = "<meta http-equiv='refresh' content='1;URL=listarproducto.php'><script language='javascript'>alert('Producto eliminado')</script>";
        echo $url;
    } else {
        $url = "<meta http-equiv='refresh' content='1;URL=listarproducto.php'><script language='javascript'>alert('Producto no eliminado')</script>";
        echo $url;
    }
    
    
}catch(PDOException $e) {
   echo $e->getMessage();
}

$pdo = null;

?>