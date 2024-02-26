<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store" />
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../adm-side/cadastrar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="../IMGS/icone.png" type="image/x-icon">

    <title>Sistema RT</title>
</head>

<body>
    
    
    
    
    <br>
     
<div class="conteiner">
    
    <h2>Cadastro da Empresa</h2>

    <form action="processar_cadastro_pro.php" method="post">
        <!-- Campos do formulário -->

        <label for="nome">Razão Social:</label>
        <input type="text" id="razao_social" name="razao_social" required>
        
        
        <br>
        
        <label for="cpf">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" required>
        <br>
        
        
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>
        <br>
        
        
        
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        
                
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
        <br>
        
      
      
      
      
      
      
    
       <a href="cadastro-empresa.php" >  <button type="submit" id="btn-cadastrar">Cadastrar</button> </a>
       
  
               
            
               
           
            
         

        
    </form>


    
    
    
    
    
    
    
</div>

    
    
    
    
    
    

    
    
    
    
    
    
    
</body>



</html>