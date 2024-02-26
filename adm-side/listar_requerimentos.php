<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de RT / COREN-PE</title>
    <link rel="stylesheet" href="manager.css">

    

<?php include 'header.php'; ?>
   <style>
    
    
    *{
        margin:0;
        padding:0;
    }
    
    #titulo-req{
             color:#3399ff;
             text-align:center;
             
    }

   .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 10px;
            margin-top: 50px;
            transition:9s;
        }
    
     body {
            background-color: #0667B3;
            font-family: Arial, Helvetica, sans-serif;
            overflow-y:visible;
        }

    
        table{
            transition : 0.8s;
             border:1px solid #afacaccf;
            margin:1% auto;
        }
    
      .table-header {
            font-weight: bold;
            text-align: center;
            background-color:#1f74ca;
             transition : 0.8s;
            color: #FFFFFF;
           
        }

        .table-data {
            text-align: center;
            padding: 5px;
             transition : 0.8s;
             border:1px solid #afacaccf;
        }
        
        
        .result-info{
            
            text-align:center;
           
        }
    
    
    </style>
    
</head>    

<body>
    <div class="container">
        <h1 id="titulo-req">Requerimentos</h1>
        <p class='result-info'>Clique no requerimento desejado para visualizar os detalhes.</p>

        <?php
        session_start();

        if (!isset($_SESSION['usuario_id'])) {
            header("Location: dados.php");
            exit();
        }

        if ($_SESSION['tipo_de_perfil'] != "administrador" && $_SESSION['tipo_de_perfil'] != "gerenciador") {
            header("Location: manager.php?erro=sem_permissao");
            echo "<span>Usuário sem permissão/span>";
        }

        try {
            include 'conexao.php';

            if ($conn->connect_error) {
                throw new Exception("Erro na conexao com o banco de dados: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM requerimento ORDER BY numero_protocolo ASC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<table width="90%"  border="1" cellspacing="1" cellpadding="2">';
                echo "<tr><th class='table-header'>Numero de Protocolo</th><th class='table-header'>Assunto</th><th class='table-header'>Data de Abertura</th><th class='table-header'>Profissional</th><th class='table-header'>*</th> <th class='table-header'>*</th></tr>";

                while ($registro = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='table-data'>" . $registro['numero_protocolo'] . "</td>";
                    echo "<td class='table-data'>" . $registro['assunto'] . "</td>";
                    echo "<td class='table-data'>" . $registro['data_abertura'] . "</td>";
                    echo "<td class='table-data'>" . $registro['profissional'] . "</td>";
                    echo "<td class='table-data'><a href='alterar_requerimento.php?ID=" . $registro['numero_protocolo'] . "'>Alterar</a> ";
                    echo "<td class='table-data'><a href='excluir_requerimento.php?ID=" . $registro['numero_protocolo'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "Nenhum requerimento cadastrado.";
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
        ?>
    </div>
</body>

<?php include 'footer.php'; ?>

</html>
