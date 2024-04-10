<?php

$dbname = "newsize";
$host = "localhost";
$user = "postgres";
$password = "070223";
$port = "5432";


try {
    $conex = new PDO("pgsql:host=$host;dbname=$dbname;port=$port;user=$user;password=$password;");
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $usuario = $_POST['Usuario'];
    $password1 = $_POST['Password2']; 
    $pgsql = "SELECT * FROM usuariosp WHERE usuario = :Usuario AND contraseña = :Password2";
    $ps = $conex->prepare($pgsql);
    $ps->bindParam(':Usuario', $usuario);
    $ps->bindParam(':Password2', $password1);

    $ps->execute();

    if ($ps->rowCount() > 0) {
        echo "OK"; 
        exit();
    } else {
        echo "Usuario incorrecto";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
