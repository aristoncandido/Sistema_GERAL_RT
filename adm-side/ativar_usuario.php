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


$status = $_SESSION['status'];

$user_id = $_GET["ID"];



        try{

           include 'conexao.php';

           if($conn -> connect_error){

            throw new Exception("Erro na conexão com o banco de dados: " . $conn->connect_error);

           }



           $sql = "UPDATE user SET status=1 WHERE ID = $user_id";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param("i", $usuario_id);
           $stmt->execute();


                // Verifica se o usuário foi inativado com sucesso
            if ($stmt->affected_rows > 0) {
                header("Location: listar_usuarios.php?msg=ativado");
            } else {
               header("Location: listar_usuarios.php?erro=ao_ativar");
            }
           
           
           
            $stmt->close();
            $conn->close();
    



        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    

    



?>