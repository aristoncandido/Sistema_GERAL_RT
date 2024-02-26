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


<script>
                function formatarCPF(campo) {
                    campo.maxLength = 14;
                    var valor = campo.value.replace(/\D/g, '');
                    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
                    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
                    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                    campo.value = valor;
                }
                
                function validarCPF(campo) {
                    var cpf = campo.value.replace(/\D/g, '');
                    if (cpf.length !== 11) {
                        alert("CPF inválido! O CPF deve conter 11 dígitos.");
                        campo.focus();
                        return false;
                    }
                    // Outras validações de CPF podem ser implementadas aqui
                    return true;
                }
</script>







<body>
    
    
    
    
    <br>
     
<div class="conteiner">
    
    <h2>Cadastro do Requerente</h2>

    <form action="processar_cadastro_pro.php" method="POST">
        <!-- Campos do formulário -->

        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" required>
        
        
        <br>
        
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf"    oninput="formatarCPF(this)" onblur="validarCPF(this)"     required>
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
        
           <label for="inscricao">N° Inscrição:</label>
        <input type="text" id="inscricao" name="inscricao" required>
        <br>
        
      
      
      
      
      
      
      
      
    
            <a href="cadastro-empresa.php"  ><button type="submit" id="btn-cadastrar"  >Continuar</button></a>
            
            <span><a href="consultar_cpf.php" style="margin: 0 auto 0 auto;"  id="voltar"   ><svg style='width:32px; height=32px;color: white;stroke: white;fill: white;'  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#3399ff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002" stroke="#3399ff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="#3399ff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a></span>
       
  
               
            
               
           
            
         

        
    </form>


    
    
    
    
    
    
    
</div>

    
    
    
    
 <script>
    // Esta linha de código aguarda o evento de carregamento do DOM para garantir que o JavaScript só será executado após o carregamento completo da página.
    document.addEventListener("DOMContentLoaded", function() {
        // Aqui estamos selecionando o elemento do botão com o ID "btn-cadastrar" e armazenando-o na variável btn_cadastrar.
        var btn_cadastrar = document.getElementById("btn-cadastrar");

        // Esta função verifica se todos os campos do formulário estão preenchidos. Ela retorna verdadeiro se todos os campos estiverem preenchidos e falso caso contrário.
        function validateFields() {
            // Aqui estamos obtendo os valores dos campos de entrada do formulário (nome, cpf, endereco, telefone, inscricao).
            var nome = document.getElementById("nome").value;
            var cpf = document.getElementById("cpf").value;
            var endereco = document.getElementById("endereco").value;
            var telefone = document.getElementById("telefone").value;
            var inscricao = document.getElementById("inscricao").value;

            // Esta linha de código verifica se todos os campos estão preenchidos e retorna verdadeiro se estiverem, e falso caso contrário.
            return nome.trim() !== "" && cpf.trim() !== "" && endereco.trim() !== "" && telefone.trim() !== "" && inscricao.trim() !== "";
        }

        // Esta função atualiza o estado do botão com base na validação dos campos do formulário.
        function updateButtonState() {
            // Esta linha de código define o estado do botão (habilitado ou desabilitado) com base no resultado da função validateFields().
            btn_cadastrar.disabled = !validateFields();
        }

        // Chamamos a função updateButtonState() para definir o estado inicial do botão quando a página é carregada.
        updateButtonState();

        // Estamos adicionando ouvintes de eventos a cada campo de entrada do formulário (nome, cpf, endereco, telefone, inscricao) para que o estado do botão seja atualizado sempre que o valor de qualquer campo for alterado.
        document.getElementById("nome").addEventListener("input", updateButtonState);
        document.getElementById("cpf").addEventListener("input", updateButtonState);
        document.getElementById("endereco").addEventListener("input", updateButtonState);
        document.getElementById("telefone").addEventListener("input", updateButtonState);
        document.getElementById("inscricao").addEventListener("input", updateButtonState);
    });
</script>
    
    
    
    
    
    
    
</body>



</html>