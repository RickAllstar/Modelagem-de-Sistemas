<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>
<body>
    <?php
    // Estabelece conexão com o servidor e BD
    include_once('connection.php');

    // Recebe dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    // Insere os dados na tabela de Pacientes
    $insere = mysqli_query($connection, "INSERT INTO Paciente(nome, telefone, cpf, endereco, senha)
                                        VALUES('$nome','$cpf','$telefone','$endereco','$senha')") 
                                            or die(mysqli_error());
    
    // Se o registro for inserido com sucesso, redirecione para outra página
    if ($insere) {
        header("Location: ../pages/paciente-login.html"); // Substitua 'outra_pagina.php' pelo URL correto
        exit();
    } else {
        echo "Erro ao cadastrar paciente.";
    }
    ?>
</body>
</html>
