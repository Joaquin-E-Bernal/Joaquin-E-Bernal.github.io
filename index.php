<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT clicks FROM contador_clicks WHERE id = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$clickCount = $row["clicks"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $clickCount++;
  $sql = "UPDATE contador_clicks SET clicks = $clickCount WHERE id = 1";
  $conn->query($sql);
}

$conn->close();
?>
