<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/Css/estilos.css">
    <title>Document</title>
</head>
<body class="cuerpo">
    <section>
        <div class="centrar">
        <label>Busqueda</label>
        <select class="form-control" id="comboEstado">
            <option slected="o">Elija una categoria</option>
            <option value="1">Productos</option>
            <option value="2">Proveedores</option>
        </select>
        <input type="text" name="buscador">
        </div>
    </section>
    <br>
    <section>
       <?php include("menu.php") ?>
    </section>
        <br>
        
</body>
</html>