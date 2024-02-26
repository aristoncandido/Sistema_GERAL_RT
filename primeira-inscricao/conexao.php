<?php
$servername = "localhost";
$username = "coren341_corenpegeral";
$password = "OB^29?feMp&)";
$database = "coren341_sistemacorenpegeral";

// Cria uma conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
/* echo "Conexão bem-sucedida"; */
?>


