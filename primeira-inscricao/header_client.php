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
         
         
         body{
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
                width:40%;
                border-radius:15pt;
                margin:5% auto;
                position:relative;
                top:15%;
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
    
    </style>

<body>

    <div class="conteiner">

        <div class="logo">
            <img id="logo" src="../IMGS/logo2.png" alt="logo">
        </div>













        <div class="consulta">

            <h1>

                Já possui cadastro?

            </h1>
            <h2>
                Consulte seu CPF aqui!
            </h2>
            
            
            <br>
            <label for="buscar_cpf">Digite aqui seu cpf</label>
            
            
            <div>
                
             <input type="text" name="bucar_cpf" id="buscar_cpf">
            <input type="button" value="buscar" id="buscar">

                
                
            </div>
            
             <br>
            <div>
                
                <span>Não possui ainda cadastro? <br> <a href="primeira-insc.php"> <b>Clique aqui</b> </a> para se registrar</span>
            </div>
     



                <?php
                
                include "./adm-side/footer.php";
                
                ?>




        </div>
        
        
        
        
        
        
        
        
        







        <div class="bg-fundo">
        <img style=" "src="../IMGS/blue.png" alt="" srcset="">

        </div>












    </div>






</body>

</html>