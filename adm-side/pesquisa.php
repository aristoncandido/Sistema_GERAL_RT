<html>
    
    
    <head>
        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manager.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../IMGS/icone.png" type="image/x-icon">
    
    <title>Sistema RT</title>
    </head>
  
    <style>
    
                .resultado-pesquisa{
                        
                        text-align:center;
                        padding-top:2%;
                        
                }
            
                .resultado-pesquisa h1,.resultado-pesquisa h3{
                    color:#1f74ca;
                }
            
                .resultado{
                    display:flex;
                    width:100%;
                    justify-content:space-between;
                    border: 1px solid #8080805e;
                    margin-top:2%;
                    padding:0 2%;
                }
                
                .resultado h4{
                    color : #3399ff;
                    padding:1%;
                }
                
                span{
                    font-size:25pt;
                    
                }
                    
                    
                    p{
                        text-align:center;
                        
                        display:flex;
                        
                        align-items:center;
                        
                        
                    }
    
    
    </style>
		

		
		
		<?php include_once('header.php')?>
		
		

		<body>
			
			
				
				 
          
            <div class="conteiner">
            		
            		<div class="resultado-pesquisa">
                 <?php
                                    
                                       if (isset($_GET['pesquisa'])) {
                        $pesquisa = $_GET['pesquisa'];
                        $filtro = $_GET['filtro'];
                    
                        if ($filtro == "nome") {
                            $sql = "SELECT * FROM profissional WHERE nome_completo LIKE '%$pesquisa%' ORDER BY id";
                        } else if ($filtro == "cpf") {
                            $sql = "SELECT * FROM profissional WHERE cpf LIKE '%$pesquisa%' ORDER BY id";
                        } else {
                            echo "<span>Nada encontrado ⚠️</span>";
                        }
                    
                        $result = mysqli_query($conn, $sql);
                    
                        if ($result->num_rows > 0) {
                            echo '<h3>buscando por... </h3>';
                            echo '<h1>Resultado da Busca</h1>';
                            
                          
                            
                            while ($profissional = $result->fetch_assoc()) {
                                
                                $registro ++;
                                $nome = $profissional['nome_completo'];
                                $email = $profissional['email'];
                                $cpf = $profissional['cpf'];
                                
                                
                                
                                
                                echo '<div class="resultado">';
                                
                                echo "<p>$registro ° Registro</p>";
                                echo "<h4>$nome</h4>";
                                echo "<h4></h4>";
                                echo "<h4>$cpf</h4>";
                                echo '</div>';
                               
                            }
                            
                          
                        } else {
                            echo "<span>Nada encontrado ⚠️</span>";
                        }
                    }
        
                    
            
         	?>
        
    
			</div>
			
			</div>	 
		
		</body>
		



</html>