<?php
$dbname = "newsize";
$host = "localhost";
$user = "postgres";
$password = "070223";
$port = "5432";

try {
    $conex = new PDO("pgsql:host=$host;dbname=$dbname;port=$port;user=$user;password=$password;");
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT talla, cantidad FROM tallas";
    $stmt = $conex->query($sql);

    $productos = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (!empty($row["talla"]) && !empty($row["cantidad"])) {
            $talla = $row["talla"];
            $cantidad = $row["cantidad"];
            $productos[] = array("talla" => $talla, "cantidad" => $cantidad);
        }
    }

    $n = count($productos);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($productos[$j]["cantidad"] > $productos[$j + 1]["cantidad"]) {
                $temp = $productos[$j];
                $productos[$j] = $productos[$j + 1];
                $productos[$j + 1] = $temp;
            }
        }
    }

    foreach ($productos as $producto) {
        echo "Cantidad: " . $producto["cantidad"] . " Talla: " . $producto["talla"] . "<br>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
