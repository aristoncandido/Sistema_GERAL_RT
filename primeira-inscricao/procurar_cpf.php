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

    <style>
        .logo {
            width: 100%;
            display: flex;
            justify-content: center;
        }
 	 .container{
             height:100%;
         }
         
         body{
             height:100vh;
         }
         

        #logo {
            width: 380px;
        }

        .title {
            height: 5%;
        }

        .title h2 {
            color: #3399ff;
        }

        .consulta {
            background-color: white;
            border: 1px solid #3399ff;
            width: 40%;
            border-radius: 15pt;
            margin: 5% auto;
            position: relative;
            top: 15%;
            padding: 2%;
        
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .consulta button {
            padding: 1%;
        }

        .consulta span {
            color: #3399ff;
        }

        .pesquisa {
            display: flex;
        
        }

        #buscar_cpf {
            width: 25rem;
            background-color: #f5f5f5;
            color: #242424;
            padding: .15rem .5rem;
            min-height: 40px;
            border-radius: 4px;
            outline: none;
            border: none;
            line-height: 1.15;
            box-shadow: 0px 10px 20px -18px;
            color: black;
            font-weight: bolder;
            margin-top: 2%;
            font-size: larger;
        }

        #pesquisa:focus {
            border-bottom: 2px solid #5b5fc7;
            border-radius: 4px 4px 2px 2px;
        }

        #pesquisa:hover {
            outline: 1px solid lightgrey;
        }

        .btn-pesquisa {
            height: 40px;
            min-height: 40px;
            width: 100px;
            font-size: medium;
            text-align: center;
            border-radius: 4px;
            padding: 0;
            padding-top: 0.5%;
            background-color: #3399ff;
            color: #ffffff;
            margin-left: 1%;
            font-weight: bolder;
            border: none;
            margin: 2% 0 0% 2%;
            transition: 0.2s
        }

        .btn-pesquisa:hover {
            background-color: #012549;
            transition: 0.2s;
            cursor: pointer;
        }
        
        
        .profissional{
        display:flex;
        width:100%;
        justify-content:space-around;
       
        flex-wrap:wrap;
        width:80%;
        
        }
        button{
		    margin: 0 auto;
		    margin-top:5%;
		    width: 146px;
		  
		    background-color:#3399ff;
		    color: #fffff;
		    border: 0;
		    margin-bottom: 5%;
		    font-weight: 600;
		    color:white;
		    transition: background-color 0.2s, color 0.2s;
		}
		
			button:hover{
			
			cursor:pointer;
			
			background-color:#005EA1;
			
			
			
			}
			
			
			
			 
	    @media screen and (max-width:600px) {
	        
	         body{
	            overflow-y:visible;
	        }
	        
	        
	        
	        
	        .consulta {
	            
	            width:100%;
	            position:relative;
	            top:30%;
	            transform:translateY(-50%);
	            padding:15% 0;
	          
	            
	            
	        }
	        	
		
		
		
		
        
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img id="logo" src="../IMGS/logo2.png" alt="logo">
        </div>
        <div class="consulta">
        
            <?php
     	     include_once('conexao.php');
			    
            if ($conn->connect_error) {
                throw new Exception("Erro na conexão com o banco de dados: " . $conn->connect_error);
	   }
		       if (isset($_POST['buscar_cpf'])) {
			    try {
			 
			    
			        $cpf = $_POST['buscar_cpf'];
			        $sql = "SELECT * FROM profissional WHERE cpf = '$cpf' ";
			        $result = $conn->query($sql);
			
			       
			       
			        $cpf = $conn->real_escape_string($cpf); //prevenção contra SQL injection
			       
			
			        if ($result -> num_rows > 0) {
			            $profissional = $result->fetch_assoc();
			            echo '<div class="profissional">';
			            echo '<span>Seu nome: </span> ' . $profissional['nome_completo'] ;
			            echo ' <br>';
			            echo '<span>Sua Inscrição:  </span> ' . $profissional['numero_inscricao'];
			            echo '<br>';
			            
			            
			            		if($profissional['status'] == 1){
			            		
			            			echo '<br>';	
			            			echo "<span>Status: <b>Ativo</b></span>" ;
			            		
			            		
			            		}else{
			            		
			            				echo '<br>';		
			            				echo "<span>Status: <b>Inativo</b></span>" ;
			            				
			            		
			            		}
			            
			 
			            
			            echo '</div>';
			            
			            echo '<button>Ver última requisição</button>';
			            
			        } else {
			        	
			       	    header("Location: consultar_cpf.php?erro=not_found");
			            echo "<span>CPF não cadastrado</span>";
			            unset($_POST['buscar_cpf'])	;
			            session_destroy();
			          
			            
			        }
			    } catch (PDOException $e) {
			        echo "Erro: " . $e->getMessage();
			    } finally {
			        $stmt->closeCursor(); // Fechar cursor para liberar recursos do servidor
			        $stmt = null; // Limpar a referência ao statement
			        $conn = null; // Fechar conexão com o banco de dados
			    }
			} else {
			    header("Location: consultar_cpf.php?erro=verifiquecampos");
			}
			
            ?>
        </div>
        <div class="bg-fundo">
            <img src="srt/IMGS/blue.png" alt="background">
        </div>
    </div>
</body>

</html>
