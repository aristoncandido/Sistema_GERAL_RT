<?php
include 'conexao.php';

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // capturar os dados da empresa do form
    $razao = $_POST['razao_social'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    
    
    
     if (empty($razao) || empty($cnpj) || empty($endereco) || empty($email) || empty($telefone) ) {
        header('Location: cadastro-empresa?mensagem=camposobrigatorios');
        exit();
    }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 255) {
        header('Location: cadastro-empresa?mensagem=camposobrigatorios');
        exit();
    }
   
   
   
    $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

    $servername = "localhost";
    $username = "coren341_corenpegeral";
    $password = "OB^29?feMp&)";
    $database = "coren341_sistemacorenpegeral";
    
    $conn = new mysqli($servername, $username, $password, $database);



    // Prepare SQL statement for insertion
    $sql = "INSERT INTO profissional (cnpj, razao_social, endereco, email, telefone, numero_inscricao) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement is prepared successfully
    if (!$stmt) {
        die("Erro na preparação da declaração: " . $conn->error);
        header("Location: primeira-insc?ms=erro404 ");
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ssssss", $cpf, $nome, $endereco, $email, $telefone, $inscricao);
    if (!$stmt->execute()) {
        die("Erro na execução da declaração: " . $stmt->error);
    }

    // Close statement
    $stmt->close();

    // Redirect user with success message
    header('Location: cadastro-empresa.php?mensagem=cadastrorealizado');
    exit(); // Terminate script execution after redirection
}
?>
