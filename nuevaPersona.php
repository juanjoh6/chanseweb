<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["sexo"])) exit();

include_once "base_de_datos.php";
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$sexo = $_POST["sexo"];
/*	Al incluir el archivo "base_de_datos.php", todas sus variables están a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos 	copiado y pegado el código*/
$sentencia = $base_de_datos->prepare("INSERT INTO personas(nombre, apellidos, sexo) VALUES (?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $apellidos, $sexo]); # Pasar en el mismo orden de los ?  #execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario. #Con eso podemos evaluar
if($resultado === TRUE) echo "Insertado correctamente";
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
    <link rel="stylesheet" href="css/.css">
    
</head>
<body>
	<br><br>

   <a href="formulario.html"><input type="button" value="Deseas agregar otra persona"></a>
    <a href="index.html"><input type="button" value="Cerrar Sesion"></a>
   <br><br>
</body>
</html>