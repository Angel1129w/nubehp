<?php
$dbname = "newsize";
$host = "localhost";
$user = "postgres";
$password = "070223";
$port = "5432";
$usuario = $_POST['Usuario'];

try {
    $conex = new PDO("pgsql:host=$host;dbname=$dbname;port=$port;user=$user;password=$password;port=$port;");
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM usuariosp WHERE usuario = :usuario";
    $ps = $conex->prepare($sql);
    $ps->bindParam(':usuario', $usuario);

    $st = $ps->execute();

    echo "Usuario borrado";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>