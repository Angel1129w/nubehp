<?php
$dbname = "newsize";
$host = "localhost";
$user = "postgres";
$password = "070223";
$port = "5432";
$Cantidad = $_POST['Cantidad'];
$Talla = $_POST['Talla'];


try {
    $conex = new PDO("pgsql:host=$host;dbname=$dbname;port=$port;user=$user;password=$password;port=$port;");
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO tallas (cantidad,talla) VALUES (:cantidad,:talla)";
    $ps = $conex->prepare($sql);
    $ps->bindParam(':cantidad', $Cantidad);
    $ps->bindParam(':talla', $Talla);
    
    $st = $ps->execute();

   
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
