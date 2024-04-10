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
    $sql = "SELECT * FROM usuariosp WHERE usuario = :usuario";
    $ps = $conex->prepare($sql);
    $ps->bindParam(':usuario', $usuario);
    $ps->execute();
    $result = $ps->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>