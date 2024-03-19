<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>
<body>
<?php
session_start();

include_once('connection.php');

    // Recebe dados do formulário
    $nome = $_POST['nome'];
    $data_agendamento = $_POST['data'];
    $horario = $_POST['horario'];;

    // Insere os dados na tabela de Pacientes
    $insere = mysqli_query($connection, "INSERT INTO oftamologista(nome, data_agendamento, horario)
                                        VALUES('$nome','$data_agendamento','$horario')") ;
                                            
    
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