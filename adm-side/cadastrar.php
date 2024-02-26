<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./inde.css">
    <link rel="stylesheet" href="cadastrar.css">
    
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
     <link rel="shortcut icon" href="../IMGS/icone.png" type="image/x-icon">
    <title>Cadastro Administrativo</title>
</head>
<body>
    <?php
    
    include 'conexao.php';
  
    
    session_start();

     // Verifique se o usuário está autenticado
     if (!isset($_SESSION['usuario_id'])) {
         
         
         
         header("Location: dados.php");
                
         exit();
        
        
        
    }else if( $_SESSION['status'] != 1 || $_SESSION['tipo_de_perfil'] != 'administrador'){
        
     // Verifique se o usuário está autenticado para 
        
        header("Location: dados.php");
        
        exit();
        
    }
    
   
        
        

    

?>

    
    
    
 
<div class="conteiner">
    <h2>Cadastrar Usuário</h2>

    <form action="processar_cadastro.php" method="post">
        <!-- Campos do formulário -->

        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" required>
        
        
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="departamento">Departamento:</label>
        <select id="departamento" name="departamento" required>
            <option value="registro">RT</option>
            <option value="ti">TI</option>
        </select>
        <br>

        <label for="tipo_perfil">Categoria de Perfil:</label>
        <select name="tipo_perfil" id="tipo_perfil">
            <option value="administrador">ADMINISTRADOR</option>
            <option value="gerenciador">GERENCIADOR</option>
        </select>
       

        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>

        <label for="confirma_senha">Confirmação de Senha:</label>
        <input type="password" id="confirma_senha" name="confirma_senha" required>
        <br>

        <!-- Adicionada validação para verificar se a senha e a confirmação coincidem -->
        <span id="senha-erro" style="color: red; background-color:white; margin-bottom:5%;"></span>
        <script>
            function validarFormulario() {
                let nome = document.getElementById('nome').value;
                let email = document.getElementById('email').value;
                let departamento = document.getElementById('departamento').value;
                let tipoPerfil = document.getElementById('tipo_perfil').value;
                let senha = document.getElementById('senha').value;
                let confirmaSenha = document.getElementById('confirma_senha').value;
                let senhaErro = document.getElementById('senha-erro');
                let botaoCadastrar = document.getElementById('btn-cadastrar');

                if (nome && email && departamento && tipoPerfil && senha && confirmaSenha && senha === confirmaSenha) {
                    senhaErro.textContent = '';
                    botaoCadastrar.disabled = false;
                    



                } else {
                    senhaErro.textContent = 'Por favor, preencha todos os campos corretamente.';
                    botaoCadastrar.style.display = none;

                    
                    botaoCadastrar.disabled = true;
                }
            }

            document.getElementById('senha').addEventListener('input', validarFormulario);
            document.getElementById('confirma_senha').addEventListener('input', validarFormulario);
      
      
      
      
      
      
      
      
      
      
      
        </script>
        <!-- Fim da validação -->

        <button type="submit" id="btn-cadastrar" disabled>Cadastrar</button>
         <button type="button"><a href="listar_usuarios.php" id="btn-cancelar"> Cancelar    </a></button>
  
               
            
               
           
            
         

        <!-- Botão de Cancelar -->
        
    </form>

    <!-- Adicione seus scripts JavaScript aqui, se necessário -->
    
    
    
    
</div>


 <div class="footer">
            <p>Versão 1.0.1 / 2024<br>
                Conselho Regional de Enfermagem de Pernambuco<br>
               <span> Departamento de Tecnologia da Informação</span><br>
                Todos os Direitos Reservados</p>
            <p class="back" ><a  href="manager.php"><svg style='width:32px; height=32px;color: white;stroke: white;fill: white;'  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#3399ff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#3399ff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#3399ff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a></p>
 </div>
   <!--ff-->
   
</body>
</html>


