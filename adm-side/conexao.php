<?php
$servername = "localhost";
$username = "z;
$password = "z";
$database = "z";

// Cria uma conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
/* echo "Conexão bem-sucedida"; */
?>


