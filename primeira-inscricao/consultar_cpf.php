<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store" />
    <link rel="stylesheet" href="../index.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

    <title>Sistema RT</title>
</head>
    
    <style>
            
          .logo{

                  width:100%;
                  display:flex;
                  justify-content:center;
                  
    
    
         }
         
         .container{
             height:100%;
         }
         
         body{
             height:100vh;
         }
         
    
            #logo{
            
                 
              width: 380px;
            
              
              
            
            }
    
            
            .title{
                height:5%;
            }
            
            .title h2{
                
                
                    color:#3399ff;
                
                
            }


            .consulta{
                
                background-color:white;
                border:1px solid #3399ff ;
                width:50%;
                border-radius:15pt;
                margin:0% auto;
                position:relative;
	            top:30%;
	            transform:translateY(-50%);
	          
                padding:2%;
                
                display:flex;
               
                flex-direction:column;
                align-items:center;
                
                
                  
                
            }
            
            
            .consulta button{
                
                padding:1%;
                
            }
            
            .consulta span{
                
                
                 color:#3399ff;
                
                
                
            }
    
    		.pesquisa{
    		
    		
    			display:flex;
    			width:100%;
    			
    			
    		
    		
    		}
    		
    		.pesquisa form{
    		    width:90% !important;
    		    margin:0 auto;
    		}
    	
    
    		
    
    
    	    #buscar_cpf{
	
		/*   max-width: 200px; */
		
		
		  background-color: #f5f5f5;
		  color: #242424;
		  padding: .15rem .5rem;
		  width:80%;
		  margin:0 auto;
		  min-height: 40px;
		  border-radius: 4px;
		  outline: none;
		  border: none;
		  line-height: 1.15;
		  box-shadow: 0px 10px 20px -18px;
		  color: black;
		  font-weight: bolder;
		
		  margin-top:2%;
		  font-size:larger ;
		
		
		}
		
		#pesquisa:focus {
		
		  border-bottom: 2px solid #5b5fc7;
		  border-radius: 4px 4px 2px 2px;
		
		}
		
		#pesquisa:hover {
		
		       outline: 1px solid lightgrey;
		
}		
    
    
		    .btn-pesquisa{
			
		      height:40px;
		      min-height: 40px;
		      width: 100px;
		      font-size:medium;
		      text-align: center;
		      border-radius: 4px;
		      padding: 0;
		
		      
		      background-color: #3399ff;
		      color: #ffffff;
		      margin-left: 1%;
		      font-weight: bolder;
		      border: none;
		      margin: 2% 0 0% 0%;
		      transition:0.2s
		
		
		}
		
		.btn-pesquisa:hover{
		
			  background-color: #012549;
			  transition:0.2s;
		          cursor:pointer;
		    
		}
	    
	    span a{
	        color: #1f74ca;
	    }
	    span a:hover{
	        
	        color: #3399ff;
	    }
	    
	    @media screen and (max-width:600px) {
	        
	       
	        .consulta {
	            
	            width:100%;
	            position:relative;
	            top:30%;
	            padding:15% 0;
	            transform:translateY(-50%);
	            
	            
	        }
	        
    
}
    
    
    
    
    
    
    </style>


<script>
                function formatarCPF(campo) {
                    campo.maxLength = 14;
                    var valor = campo.value.replace(/\D/g, '');
                    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
                    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
                    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                    campo.value = valor;
                }
                
                
</script>


<body>
    
    
    
    
      <div class="container">
          
          
              
       <a href="../index.php">
        
       <div class="logo">
            <img id="logo" src="../IMGS/logo2.png" alt="logo">
        </div>
        </a>


                        <div class="consulta">
                                <h1>Já possui cadastro?</h1>
                                <h2>Consulte seu CPF aqui!</h2>
                                
                                <label for="buscar_cpf">Digite aqui seu CPF</label>
                                <div class="pesquisa">
                                    <form class="form" method="POST" action="procurar_cpf.php" style="width:auto; display:flex;">
                                        <input type="text" id="buscar_cpf" name="buscar_cpf" oninput="formatarCPF(this)" placeholder="Digite seu cpf">
                                        <input type="submit" value="buscar" id="buscar" class="btn-pesquisa">
                                    </form>
                                    
                                    <?php
                                         if(isset($_SESSION['submit']) && isset($_GET['buscar_cpf']) ){
                                             include_once('procurar_cpf.php');
                                             
                                    
                                    }
                                    ?>
                                    
                                 
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                                <div>
                                    <br>
                                    <span>Não possui cadastro ainda? <a href="primeira-insc.php"> <br><b>Clique aqui</b></a> para se registrar.</span>
                                </div>
                            </div>
                        
                        
                           
                            
                        </div>
    






    <div class="bg-fundo">
        
        <img src="../IMGS/blue.png" alt="">
        
        
        
        
        
        
    </div>

    <script>
        function formatarCPF(campo) {
            campo.maxLength = 14;
            var valor = campo.value.replace(/\D/g, '');
            valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
            valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
            valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            campo.value = valor;
        }
        
        var url = window.location.href;
        if(url == "https://www.coren-pe.gov.br/srt/primeira-inscricao/consultar_cpf.php?erro=not_found" ){
            alert("CPF NÃO CADASTRADO");
        }else if(url == "https://www.coren-pe.gov.br/srt/primeira-inscricao/consultar_cpf.php?erro=verifiquecampos"){
            
            
            alert("Verifique os campos e tente novamente");
            
            
            
            
            
        }
        
        
        
        
        
        
        
        
        
        
        
        
    </script>
    
  
  
    
    
    
    
    
</body>
</html>
