<html>

		
		
		
		
		<?php include_once('header.php')?>
		
		

		<body>
			
			
				
				 
          
            <div class="conteiner">
            		
            		<div class="resultado-pesquisa">
            <?php
                        
                        
                        
                        if(isset($_GET['pesquisa'])){
                            
                            $pesquisa = $_GET['pesquisa'];
                            
                            
                            
                           $sql = "SELECT * FROM profissional WHERE nome_completo LIKE '%$pesquisa%' ORDER BY id";

                            
                           $result = mysqli_query($conn,$sql);
                            
                            
                            if($result -> num_rows > 0){
                                
                                
                              	$profissional = $result->fetch_assoc();            
                                $nome = $profissional['nome_completo'];
                                $email = $profissional['email'];
                                
                                
                                
                                
                                echo '<h1>Resultado da Busca</h1>' .$nome .$email;
                                echo '<h3>buscando por... $</h3>'
                                
                                
                                
                                
                                
                                
                                
                            }else{
                                echo "<span>Nada encontrado</span>";
                            }
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        }
            
            
            
            
         	?>
        
    
			</div>
			
			</div>	 
		
		</body>
		



</html>