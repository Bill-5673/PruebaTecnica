<?php
    include("Conexion.php");
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) 
    {
        echo "Fallo en Conexion";
        die("Connection failed: " . mysqli_connect_error());
    }
    //Nuevo proveedor
    if($_POST["Nuevo"] == "NuevoProveedor")
    {
        $nombre      =$_POST["Nombre"];
        $correo      =$_POST["Correo"];
        $numero      =$_POST["Numero"];
        $direccion   =$_POST["Direccion"];
        $estado      =$_POST["Combo"];
        $sql1 ="SELECT count(Correo) cuenta FROM proveedor where Correo = '$correo'";
        $resultado1 = mysqli_query($conn, $sql1);
        $rows = mysqli_fetch_assoc($resultado1);
        $cuenta = $rows["cuenta"];
        if($cuenta == 0)
        {
        
            $sql2="CALL Insertar_Proveedor('{$nombre}','{$correo}','{$numero}','{$direccion}','{$estado}')";
            $resultado2 = mysqli_query($conn, $sql2);
            if($resultado2 == 1)
            {
                echo "<script language='javascript'> alert('Proveedor ingresado con exito'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
            }
            else
            {
                echo "<script language='javascript'> alert('Fallo a la hora de ingresar un proveedor'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
            }
        }
    }
    //Editar proveedor
    if($_POST["Nuevo"] == "EditarProveedor")
    {
        $nombre      =$_POST["Nombre"];
        $correo      =$_POST["Correo"];
        $numero      =$_POST["Numero"];
        $direccion   =$_POST["Direccion"];
        $estado      =$_POST["Combo"];
        $id          =$_POST["ID"];
        $sql2="update proveedor set Nombre = '$nombre', Correo = '$correo', Telefono = '$numero', Direccion = '$direccion', Estado = '$estado' where id_proveedor = '$id'";
        $resultado2 = mysqli_query($conn, $sql2);
        if($resultado2 == 1)
        {
            echo "<script language='javascript'> alert('Proveedor editado con exito'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
        else
        {
            echo "<script language='javascript'> alert('Fallo a la hora de editar un proveedor'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
    }
    //Eliminar proveedor
    if($_GET["e"] == "EliminarProveedor")
    {
        $id  = $_GET["id"];
        $sql2="update proveedor set  Estado = '3' where id_proveedor = '$id'";
        $resultado2 = mysqli_query($conn, $sql2);
        if($resultado2 == 1)
        {
            echo "<script language='javascript'> alert('Proveedor eliminado con exito'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
        else
        {
            echo "<script language='javascript'> alert('Fallo a la hora de eliminar el proveedor'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
    }
    //Nueva marca
    if($_POST["Nuevo"] == "NuevaMarca")
    {   
        $nombre  =$_POST["Nombre"];
        $detalle =$_POST["Detalle"];
        $combo   =$_POST["Combo"];
        $prov   =$_POST["Prov"];
        $sql2 = "insert into marca_producto values('', '$nombre', '$detalle', '$combo', '$prov')";
        $resultado = mysqli_query($conn, $sql2);
        if($resultado == 1)
        {
            echo "<script language='javascript'> alert('Marca ingresada con exito'); window.location.href = '../Vistas/marca.php?g=n'; </script>";
        }
        else
        {
            echo "<script language='javascript'> alert('Error a la hora de ingresar una marca'); window.location.href = '../Vistas/marca.php?g=n'; </script>";
        }
    }
    //editar marca
    if($_POST["Nuevo"] == "EditarMarca")
    {       
        $nombre      =$_POST["Nombre"];
        $detalle     =$_POST["Detalle"];
        $estado      =$_POST["Combo"];
        $id          =$_POST["ID"];
        $sql2="UPDATE marca_producto set Nombre = '$nombre', Detalle = '$detalle', Estado = '$estado'  where id_marca = '$id'";
        $resultado2 = mysqli_query($conn, $sql2);
        if($resultado2 == 1)
        {
            echo "<script language='javascript'> alert('Marca modificada con exito'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
        else
        {
            echo "<script language='javascript'> alert('Fallo en la modificacion de marca'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
    }
    //eliminar marca
    if($_GET["e"] == "EliminarMarca")
    {
        $id  = $_GET["id"];
        $sql2="update marca_producto set  Estado = '3' where id_marca = '$id'";
        $resultado2 = mysqli_query($conn, $sql2);
        if($resultado2 == 1)
        {
            echo "<script language='javascript'> alert('Marca eliminada con exito'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
        else
        {
            echo "<script language='javascript'> alert('Fallo a la hora de eliminar marca'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
    }
    //nueva categoria
    if($_POST["Nuevo"] == "NuevaCategoria")
    {   
        $nombre  =$_POST["Nombre"];
        $detalle =$_POST["Detalle"];
        $combo   =$_POST["Combo"];
        $prov   =$_POST["Prov"];
        $sql2 = "insert into categoria_producto values('', '$nombre', '$detalle', '$combo', '$prov')";
        $resultado = mysqli_query($conn, $sql2);
        if($resultado == 1)
        {
            echo "<script language='javascript'> alert('Categoria ingresada con exito'); window.location.href = '../Vistas/marca.php?g=n'; </script>";
        }
        else
        {
            echo "<script language='javascript'> alert('Error a la hora de ingresar una Categoria'); window.location.href = '../Vistas/marca.php?g=n'; </script>";
        }
    }
    if($_POST["Nuevo"] == "NuevaEditar")
    {   
        $nombre      =$_POST["Nombre"];
        $detalle     =$_POST["Detalle"];
        $estado      =$_POST["Combo"];
        $id          =$_POST["ID"];
        $sql2="UPDATE categoria_producto set Nombre = '$nombre', Detalle = '$detalle', Estado = '$estado'  where id_categoria = '$id'";
        $resultado2 = mysqli_query($conn, $sql2);
        if($resultado2 == 1)
        {
            echo "<script language='javascript'> alert('Marca modificada con exito'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
        else
        {
            echo "<script language='javascript'> alert('Fallo en la modificacion de marca'); window.location.href = '../Vistas/Proveedor.php?g=n'; </script>";
        }
    }
    
?>