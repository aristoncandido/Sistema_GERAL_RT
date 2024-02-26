<?php
// Configurações do banco de dados

// Inicie a sessão no início do arquivo
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Se não estiver autenticado, redirecione para a página de login
    header("Location: dados.php");
    exit();
}

if (isset($_GET['ID']) && is_numeric($_GET['ID'])) {
    // Obtém o ID do parâmetro GET
    $id = $_GET['ID'];

    try {
        // Cria a conexão com o banco de dados
        include('conexao.php');

        // Consulta SQL para deletar o registro com base no ID
        $sql = "DELETE FROM user WHERE ID = ?";

        // Preparação e execução da consulta
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Verifica se a exclusão foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            header('Location: listar_usuarios.php?mensagem=registroexcluido');
            exit();
        } else {
            header('Location: listar_usuarios.php?mensagem=naoencontrado');
            exit();
        }

        // Fecha a conexão com o banco de dados
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $erro = "Erro: " . $e->getMessage();
        header('Location: listar_usuarios.php?erro=' . urlencode($erro));
        exit();
    }
} else {
    $erro = "Parâmetro ID inválido.";
    header('Location: listar_usuarios.php?erro=' . urlencode($erro));
    exit();
}
?>

?>