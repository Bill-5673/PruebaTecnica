<?php
include("Conexion.php");
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
    echo "Fallo en Conexion";
    die("Connection failed: " . mysqli_connect_error());
}


       
    $nombre      =$_POST["Nombre"];
    $detalle   =$_POST["Detalle"];
    $estado      =$_POST["Combo"];
    $id          =$_POST["ID"];
    $sql2="update marca_producto set Nombre = '$nombre', Detalle = '$detalle', Estado = '$estado'  where id_marca = '$id'";
    $resultado2 = mysqli_query($conn, $sql2);
    if($resultado2 == 1)
    {
        echo "<script language='javascript'> alert('Marca modificada con exito'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
    }
    else
    {
        echo "<script language='javascript'> alert('Fallo en la modificacion de marca'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
    }

?>