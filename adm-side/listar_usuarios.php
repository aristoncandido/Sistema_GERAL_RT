<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de RT / COREN-PE</title>
    <link rel="stylesheet" href="manager.css">
    <link rel="shortcut icon" href="../IMGS/icone.png" type="image/x-icon">
    <style>
        body {
            background-color: #0667B3;
            font-family: Arial, Helvetica, sans-serif;
            overflow-y:visible;
            width:100%;
            height:100vh;
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
        table{
            transition : 0.8s;
             border:1px solid #afacaccf;
            margin:1% auto;
        }
            
      #fundo{

                position: absolute;
                width: 100%;
                height: 100%;
                z-index: -99;

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

        .result-info {
            font-size: 14px;
            margin-top: 10px;
             transition : 0.8s;
        }

        .footer {
            font-size: 12px;
            text-align: center;
            padding-bottom:15%;
         
            width:100%;
        }

        .footer a {
            color: #000000;
            text-decoration: none;
        }
        
        
            .footer p span{
            
            color:#3399ff;
            
        }
        
        
        a{
            text-decoration:none;
            color:#3399ff;
        }
        
        h2{
             text-align:center;
             color:#3399ff;
        }
        
        .result-info{
            
            text-align:center;
           
        }
        
        
        .back{
            font-size:1rem;
            color:#3399ff;
            width:10%;
            margin:0 auto 1% auto;
            text-align:center;
            height:3rem;
       
            
           
            
        }
        
        
        .back svg{
            height:auto;
        }
        
        
        
        .icon-cadastro{
         
            width:90%;
            display:flex;
            justify-content:flex-end;
            margin:0 auto;
            
        }
        
        
        #icon-cadastro{
            
            position:relative;
            top:90%;
            width:46px;
            height:auto;
            
                
                
            
        }
        
        
        
    </style>
</head>

<body>
    
    
    <?php
    
    
      if (isset($_GET['msg'])) {
          
          echo '<script>alert("Usuário alterado com sucesso");</script>';
            
            
            
        }
    
    
    ?>

    <?php include "header.php"; ?>

    <div class="container">
        <?php
        session_start();

        if (!isset($_SESSION['usuario_id'])) {
            header("Location: dados.php");
            exit();
        }

        $nome_usuario = $_SESSION['usuario_nome'];

       // echo "<p>Olá, $nome_usuario</p>";
        echo '<p class="icon-cadastro" >
        
        <a href="cadastrar.php">
        <svg id="icon-cadastro" viewBox="0 0 24 24"
        fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0">
        </g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" 
        stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> 
        <path d="M21 12H17M19 14L19 10" stroke="#0095FF" stroke-width="1.5"
        stroke-linecap="round"></path>
        <path d="M3 19.1115C3 16.6984 4.69732 14.643 7.00404 14.2627L7.21182 14.2284C9.05892 13.9239 10.9411 13.9239 12.7882 14.2284L12.996 14.2627C15.3027 14.643 17 16.6984 17 19.1115C17 20.1545 16.1815 21 15.1719 21H4.82813C3.81848 21 3 20.1545 3 19.1115Z" stroke="#363853" stroke-width="1.5"></path> <path d="M14.0834 6.9375C14.0834 9.11212 12.2552 10.875 10 10.875C7.74486 10.875 5.91669 9.11212 5.91669 6.9375C5.91669 4.76288 7.74486 3 10 3C12.2552 3 14.0834 4.76288 14.0834 6.9375Z" stroke="#0095FF" stroke-width="1.5"></path> </g></svg></a>
            
            
            
            
        </p>';
        
        
        
        echo '    <h2>Usuários Cadastrados    </h2>       ';
        
        
        
        
        
        echo "<p class='result-info'>Clique no usuário desejado para visualizar os detalhes.
        
        
        
        
        
        
        
        
        </p>";
        echo "<br>";

        try {
            include 'conexao.php';

            if ($conn->connect_error) {
                throw new Exception("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }

            $sql1 = "SELECT ID, NOME, EMAIL, DEPARTAMENTO, TIPO_DE_PERFIL, STATUS FROM user ORDER BY NOME ASC";

            $stmt = $conn->prepare($sql1);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $registros = $result->fetch_all(MYSQLI_ASSOC);

                echo '<table width="90%" border="1" cellspacing="1" cellpadding="2">';
                echo '<tr>';
                echo '<td class="table-header">Nome</td>';
                echo '<td class="table-header">E-mail</td>';
                echo '<td class="table-header">Departamento</td>';
                echo '<td class="table-header">Tipo de Perfil</td>';
                echo '<td class="table-header">*</td>';
                echo '<td class="table-header">*</td>';
                echo '<td class="table-header">*</td>';
                echo '</tr>';

                foreach ($registros as $registro) {
                    echo "<tr>";
                    echo "<td class='table-data'>{$registro['NOME']}</td>";
                    echo "<td class='table-data'>{$registro['EMAIL']}</td>";
                    $departamento = $registro['DEPARTAMENTO'];
                    $status = $registro['STATUS'];
                    
                    $ID = $registro['ID'];
                    echo "<td class='table-data'>$departamento</td>";
                    echo "<td class='table-data'>{$registro['TIPO_DE_PERFIL']}</td>";
                    echo "<td class='table-data'><a href='alterar_usuario.php?ID=$  ID'>Alterar</a></td>";
                   if ($status == 1) {
                        echo "<td class='table-data'><a href='inativar_usuario.php?ID=$ID'>Inativar</a></td>";
                    } else {
                        echo "<td class='table-data'><a href='ativar_usuario.php?ID=$ID'>Ativar</a></td>";
                    }
                    echo "<td class='table-data'><a href='deletar_usuario.php?ID=$ID'>Excluir</a></td>";
   
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum usuário cadastrado.";
            }

            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
        ?>
        
        
        
        
        
        
        
        
        
        <?php
        
        include 'footer.php';
        
        ?>
        
        
        
        
        
        
        

       
       
       
    </div>

</body>

</html>
