<?php
    error_reporting (0);
    include("../Funcionamiento/Conexion.php");
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) 
    {
        echo "Fallo en Conexion";
        die("Connection failed: " . mysqli_connect_error());
    }
    $g = $_GET["g"];
    $m = $_GET["id"];
    $sql2 = "SELECT Id_proveedor ,Nombre, Correo, Telefono, Direccion, Estado FROM proveedor where id_proveedor = '$m';";
    $resultado2 = mysqli_query($conn, $sql2);
    $rows1 = mysqli_fetch_array($resultado2);
    $sql = "call mostrar_proveedor();";
    $resultado = mysqli_query($conn, $sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
   <link rel="stylesheet" href="../Estilos/Css/estilos.css">
    <title>Provedores</title>
</head>
<body class="cuerpo">
    <section>
        <div class="">
            <a class="boton" href="index.php">Inicio</a>
        </div>
    </section>
    <br>
    <section>
        <div class="form">
            <?php 
            if($g == "n")
            {
            ?>
            <form>
                <label for="">Nombre</label>
                <br>
                <input class="tbox" type="text" placeholder="Ingrese el nombre del proveedor" id="Proveedor">
                <input type="hidden" id="NuevoProveedor" value="NuevoProveedor">
                <br>
                <label for="">Correo</label>
                <br>
                <input class="tbox" type="text" placeholder="Ingrese un correo" id="Correo">
                <br>
                <label for="">Telefono</label>
                <br>
                <input class="tbox" type="number" placeholder="Ingrese un numero de telefono" id="Numero">
                <br>
                <label for="">Dirección</label>
                <br>
                <input class="tbox" type="text" placeholder="Ingrese una descripción"  id="Direccion">
                <br>
                <br>
                <select class="form-control" id="comboEstado">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
                <br>
                <div class="centrar">
                    <button type="button" id="save" class="btn btn-primary">Guardar</button> 
                </div>
            </form>
            <?php       
            }
            if($g == "e")
            {
            ?>
            <form>
                <?php
                    
                ?>
                <label for="">Nombre</label>
                <input type="text" placeholder="Ingrese el nombre del proveedor" id="Proveedor" value="<?php echo"".$rows1["Nombre"];?>">
                <input type="hidden" id="EditarProveedor" value="EditarProveedor">
                <input type="hidden" id="ID" value="<?php echo"".$rows1["Id_proveedor"];?>">
                <br>
                <label for="">Correo</label>
                <input type="text" placeholder="Ingrese un correo" id="Correo" value="<?php echo"".$rows1["Correo"];?>" readonly>
                <br>
                <label for="">Telefono</label>
                <input type="number" placeholder="Ingrese un numero de telefono" id="Numero" value="<?php echo"".$rows1["Telefono"];?>">
                <br>
                <label for="">Dirección</label>
                <input type="text" placeholder="Ingrese una descripción" id="Direccion" value="<?php echo"".$rows1["Direccion"];?>">
                <br>
                <?php 
                    if($rows1["Estado"] == 1)
                    {
                        $nombreEstado = "Activo";
                    }
                    if($rows1["Estado"] == 2)
                    {
                        $nombreEstado = "Inactivo";
                    }
                ?>
                <select class="form-control" id="comboEstado">
                    <option value="<?php echo"".$rows1["Estado"];?>"><?php echo"".$nombreEstado;?></option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
                <a href="proveedor.php?g=n" class="btn btn-primary">Nuevo</a>
                <button type="button" id="save3" class="btn btn-primary">Guardar</button>
            </form>
            <?php
            }
            ?>
            <br>
        </div>
    </section>
    <section class="tbl">
        <table>
            <tr>
                <th>Proveedor</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Acción</th>

            </tr>
            <?php
                while($rows = mysqli_fetch_array($resultado))
                {
                    if($rows["Estado"] == 1)
                    {
                        $nombreEstado = "Activo";
                    }
                    if($rows["Estado"] == 2)
                    {
                        $nombreEstado = "Inactivo";
                    }
                    if($rows["Estado"] == 3)
                    {
                        $nombreEstado = "Eliminado";
                    }
            ?>
            <tr>
                <th><?php echo"".$rows["Nombre"];?></th>
                <th><?php echo"".$rows["Correo"];?></th>
                <th><?php echo"".$rows["Telefono"];?></th>
                <th><?php echo"".$rows["Direccion"];?></th>
                <th><?php echo"".$nombreEstado;?></th>
                <th>
                <a href="proveedor.php?g=e&id=<?php echo"".$rows["id_proveedor"];?>">Editar</a>    
                <a href="../Funcionamiento/Funcionamiento.php?e=EliminarProveedor&id=<?php echo"".$rows["id_proveedor"];?>">Eliminar</a>    
                </th>
            </tr>
            <?php
            }
            ?>
        </table>
    </section >
        <script>
             $('#save').click(function () { 
   
   $nom       = $('#Proveedor').val(); //obtener el valor el id de un objeto
   $correo    = $("#Correo").val();
   $numero    = $("#Numero").val();
   $direccion = $("#Direccion").val();
   $combo    = $("#comboEstado").val();
   $nuevo    = $("#NuevoProveedor").val();    
   $.ajax({url:"../Funcionamiento/Funcionamiento.php", //en dondè esta mi codigo? es decir mi logica
   method:"POST", // que metodo utilizo
   data:{
          Nombre:$nom,
          Correo:$correo,
          Numero:$numero,
          Direccion:$direccion,
          Combo:$combo,
          Nuevo:$nuevo
        }, //que info le envio
   success:function(dataabc){  // que quiero de respuesta
     window.location.href="index.php"; 
   }}); 
   });
   $('#save3').click(function () { 
   
   $nom       = $('#Proveedor').val(); //obtener el valor el id de un objeto
   $correo    = $("#Correo").val();
   $numero    = $("#Numero").val();
   $direccion = $("#Direccion").val();
   $combo    = $("#comboEstado").val();
   $nuevo    = $("#EditarProveedor").val();   
   $id      = $("#ID").val();   
   console.log($nom, $correo, $numero, $direccion, $combo, $nuevo, $id); 
   $.ajax({url:"../Funcionamiento/Funcionamiento.php", //en dondè esta mi codigo? es decir mi logica
   method:"POST", // que metodo utilizo
   data:{
          Nombre:$nom,
          Correo:$correo,
          Numero:$numero,
          Direccion:$direccion,
          Combo:$combo,
          Nuevo:$nuevo,
          ID:$id
        }, //que info le envio
   success:function(dataabc){  // que quiero de respuesta
    window.location.href="proveedor.php?g=n"; 
   }}); 
   });

       
        </script>
</body>
</html>