<?php


session_start();



if (!isset($_SESSION['usuario_id'])) {
    header("Location: dados.php");
    exit();
}

if (!isset($_GET['ID']) || empty($_GET['ID'])) {
    echo "ID do usuário não fornecido.";
    exit();
}


$usuario_id = $_GET['ID'];



$status = $_SESSION['status'];

try {
    include 'conexao.php';

    if ($conn->connect_error) {
        throw new Exception("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Lógica para inativar o usuário
    $sql = "UPDATE user SET status = 0 WHERE ID = $usuario_id"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();

    // Verifica se o usuário foi inativado com sucesso
    if ($stmt->affected_rows > 0) {
        header("Location: listar_usuarios.php?msg=inativado");
    } else {
        header("Location: listar_usuarios.php?erro=ao_inativar");
    }

    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
    
    
    
    
    
    
    
    
}
?>