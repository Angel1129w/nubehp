<?php
$host = "tree-caribou-7375.g8z.gcp-us-east1.cockroachlabs.cloud"; 
$port = "26257"; 
$user = "angel"; 
$pass = "s--d5SQhPeRIipJGYA6xDA"; 
$dbname = "practica"; 
$sslmode = "verify-full"; 
$options = "--cluster=tree-caribou-7375"; 
$usuario = $_POST['Usuario'];
$nombreCompleto = $_POST['NombreCompleto'];
$correo = $_POST['Correo'];
$password1 = $_POST['Password']; 

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$pass;sslmode=$sslmode;options=$options";
    $pdo = new PDO($dsn);

    $sql = "INSERT INTO usuariosp (usuario,nombre_completo, correo, contraseña) VALUES (:usuario, :nombreCompleto, :correo, :contrasena)";
    $ps = $pdo->prepare($sql);
    $ps->bindParam(':usuario', $usuario);
    $ps->bindParam(':nombreCompleto', $nombreCompleto);
    $ps->bindParam(':correo', $correo);
    $ps->bindParam(':contrasena', $password1);

    $st = $ps->execute();

    echo "Registro exitoso.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
