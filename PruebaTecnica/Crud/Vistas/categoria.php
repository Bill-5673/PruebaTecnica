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
    $sql = "SELECT id_categoria,Nombre, Detalle, Estado from categoria_producto";
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
                <label for="">Categoria</label>
                <input class="tbox" type="text" placeholder="Ingrese una marca" id="Categoria">
                <input type="hidden" id="NuevaCategoria" value="NuevaCategoria">
                <br>
                <label for="">Detalle</label>
                <input class="tbox" type="text" placeholder="Ingrese un detalle" id="Detalle">
                <br>
                <label for="">Estado</label>
                <select class="form-control" id="comboEstado">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
                <label for="">Marca</label>
                <select class="form-control" id="comboMarca">
                <?php
                    $sqlprov = "select id_marca, nombre from marca_producto";
                    $resultadoprov = mysqli_query($conn,$sqlprov);
                    while($rows2 = mysqli_fetch_array($resultadoprov))
                    {
                        ?>
                        <option value="<?php echo"".$rows2["id_marca"];?>"><?php echo"".$rows2["nombre"];?></option>
                        <?php
                    }
                ?>        
                </select>
                <br>
                <div class="centrar">
                    <button type="button" id="Guardar" class="btn btn-primary">Guardar</button> 
                </div>
            </form>
            <?php       
            }
            if($g == "e")
            {
                $sql2 = "SELECT id_categoria,Nombre, Detalle, Estado, marca_id_marca from categoria_producto where id_categoria = '$m';";
                $resultado2 = mysqli_query($conn, $sql2);
                $rows3 = mysqli_fetch_array($resultado2);
            ?>
            <form>
                <label for="">Marca</label>
                <input type="text" placeholder="Ingrese una marca" id="Categoria" value="<?php echo"".$rows3["Nombre"];?>">
                <input type="hidden" id="NuevaEditar" value="NuevaEditar">
                <input type="hidden" id="ID" value="<?php echo"".$rows3["id_categoria"];?>">
                <br>
                <label for="">Detalle</label>
                <input type="text" placeholder="Ingrese un detalle" id="Detalle" value="<?php echo"".$rows3["Detalle"];?>">
                <br>
                <?php
                    if($rows3["Estado"] == 1)
                    {
                        $nombreEstado = "Activo";
                    }
                    if($rows3["Estado"] == 2)
                    {
                        $nombreEstado = "Inactivo";
                    }
                    if($rows3["Estado"] == 3)
                    {
                        $nombreEstado = "Eliminado";
                    }
                ?>
                <label for="">Estado</label>
                <select class="form-control" id="comboEstado">
                    <option value="<?php echo"".$rows3["Estado"];?>"><?php echo"".$nombreEstado;?></option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
                <label for="">Marca</label>
                <?php
                    $que="Select id_marca, nombre from marca_producto";
                    $resul = mysqli_query($conn,$que);
                ?>
                <select class="form-control" id="comboMarca">
                    <?php
                        while($rows = mysqli_fetch_array($resul))
                        {
                    ?>
                        <option value="<?php echo"".$rows["id_marca"]; ?>"><?php echo"".$rows["nombre"]; ?></option>
                    <?php
                        }
                    ?>
                    <option value="<?php echo"".$rows3["Estado"];?>"><?php echo"".$nombreEstado;?></option>
                    <option value="1">Activo</option>
                </select>
                <br>
                <a href="marca.php?g=n" class="btn btn-primary">Nuevo</a>
                <button type="button" id="Editar" class="btn btn-primary">Guardar</button> 
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
                <th>Marcda</th>
                <th>Detalle</th>
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
                <th><?php echo"".$rows["Detalle"];?></th>
                <th><?php echo"".$nombreEstado;?></th>
                <th>
                    <a href="categoria.php?g=e&id=<?php echo"".$rows["id_categoria"];?>">Editar</a>    
                    <a href="../Funcionamiento/Funcionamiento.php?e=EliminarMarca&id=<?php echo"".$rows["id_categoria"];?>">Eliminar</a>    
                </th>
            </tr>
            <?php
            }
            ?>
        </table>
    </section>
        <script>
             $('#Guardar').click(function () { 
   $nom      = $('#Categoria').val(); //obtener el valor el id de un objeto
   $detalle  = $("#Detalle").val();
   $combo    = $("#comboEstado").val();
   $prov    = $("#comboMarca").val();
   $nuevo    = $("#NuevaCategoria").val();    
   $.ajax({url:"../Funcionamiento/Funcionamiento.php", //en dondè esta mi codigo? es decir mi logica
   method:"POST", // que metodo utilizo
   data:{
          Nombre:$nom,
          Detalle:$detalle,
          Combo:$combo,
          Prov:$prov,
          Nuevo:$nuevo
        }, //que info le envio
   success:function(dataabc){  // que quiero de respuesta
     window.location.href="categoria.php?g=n"; 
   }}); 
   });
   $('#Editar').click(function () { 
   
    $nom      = $('#Categoria').val(); //obtener el valor el id de un objeto
   $detalle  = $("#Detalle").val();
   $combo    = $("#comboEstado").val();
   $prov    = $("#comboMarca").val();
   $nuevo    = $("#NuevaEditar").val(); 
   $id      = $("#ID").val();
   $.ajax({url:"../Funcionamiento/Funcionamiento.php", //en dondè esta mi codigo? es decir mi logica
   method:"POST", // que metodo utilizo
   data:{
           Nombre:$nom,
           Detalle:$detalle,
           Combo:$combo,
           Nuevo:$nuevo,
           ID:$id,
        }, //que info le envio
   success:function(dataabc){  // que quiero de respuesta
    window.location.href="categoria.php?g=n"; 
   }}); 
   });

       
        </script>
</body>
</html>