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
                    justify-content:space-around;
                    border: 1px solid #8080805e;
                    margin-top:2%;
                }
                
                .resultado h4{
                    color : #3399ff;
                    padding:1%;
                }
                
                span{
                    font-size:25pt;
                    
                }
                    
    
    
    </style>
		

		
		
		<?php include_once('header.php')?>
		
		

		<body>
			
			
				
				 
          
            <div class="conteiner">
            		
            		<div class="resultado-pesquisa">
            <?php
                        
                        
                        
                        if(isset($_GET['pesquisa'])){
                            
                            
                            
                            
                            
                            
                        $pesquisa = $_GET['pesquisa'];
                            
                            
                            if( ){ //filtragem do select
                                
                                       
                            
                                   $sql = "SELECT * FROM profissional WHERE nome_completo LIKE '%$pesquisa%' ORDER BY id";
        
                                    
                                   $result = mysqli_query($conn,$sql);
                                    
                                    
                                    if($result -> num_rows > 0){
                                
                                
                              	$profissional = $result->fetch_assoc();            
                                $nome = $profissional['nome_completo'];
                                $email = $profissional['email'];
                                
                                
                                 echo '<h3>buscando por... </h3>' ;
                                 echo '<h1>Resultado da Busca</h1>' ;
               
                                     
                                 echo '<div class="resultado">';
                                 echo "<h4>$nome</h4>"  ;
                                 echo "<h4>$email</h4>";
                                 echo '</div>';
                                 
                                 
                                 
                                 
                                 
                             
                                
                                
                            }
                     
                                
                                
                                
                                
                                
                                
                                
                            }else{
                                echo "<span>Nada encontrado ⚠️   </span>";
                            }
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        }
            
            
            
            
         	?>
        
    
			</div>
			
			</div>	 
		
		</body>
		



</html>