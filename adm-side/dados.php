<?php
session_start();

// Verifica se o usuário já está autenticado
if (isset($_SESSION['usuario_id'])) {
    header("Location: manager.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação dos campos do formulário
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro_login = "Por favor, insira um email válido.";
    } elseif (empty($senha)) {
        $erro_login = "Por favor, insira a senha.";
    } else {
        include('conexao.php');

        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        $email = $conn->real_escape_string($email); // Prevenção contra SQL injection
        
        $sql = "SELECT ID, NOME, EMAIL, DEPARTAMENTO, TIPO_DE_PERFIL, SENHA, STATUS FROM user WHERE EMAIL = '$email'";
    
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($senha, $row['SENHA'])) {
                
                $_SESSION['usuario_id'] = $row['ID'];
                $_SESSION['usuario_nome'] = $row['NOME'];
                $_SESSION['usuario_perfil'] = $row['PERFIL'];
                $_SESSION['tipo_de_perfil'] = $row['TIPO_DE_PERFIL'];
                $_SESSION['status'] = $row['STATUS'];

                header("Location: manager.php");
                exit();
            } else {
                $erro_login = "Credenciais incorretas.";
            }
        } else {
            $erro_login = "Credenciais incorretas.";
        }

        $conn->close();
    }
}



    // Exibir mensagem de erro, se houver
    if (isset($erro_login)) {
    header("Location: dados.php?erro=login_invalido");
     echo '<p style="color: red;">' . $erro_login . '</p>';
  
    
    
    
    }
    
 
    
    
    
    
    
    




?>







<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
     <link rel="shortcut icon" href="../Sistema RT/IMGS/icone2.png" type="image/x-icon">
     
   <title>Login Gerencial</title>
</head>

<body>
 
<iframe id="fundo" src="anima.html" frameborder="0" width:100%; height:100%;></iframe> 


    <div class="conteiner"> 
  
<img id="logo"  src="../IMGS/logo2.png" alt="logo" srcset="">


      <div class="logar">
    
            <div class="login">  

      
            <h2> Acesse com suas credenciais </h2> 


                                
                <form action="dados.php" method="POST">



                    <p><b>Email</b></p>
                    <input type="email" name="email" id="email" placeholder="email@exemplo.com">
                    <p><b>Senha</b></p>
                    <input  type="password" name="senha" id="senha"  placeholder="*******">
                    <button  id="login" class="btn" >Entrar</button>
             



                </form>

        


            </div>



       


        </div>







    </div>

    <script src="login.js"></script>




</body>

</html>