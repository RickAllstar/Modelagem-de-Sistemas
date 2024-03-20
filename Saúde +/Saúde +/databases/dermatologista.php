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
    $horario = $_POST['horario'];


    $consulta = mysqli_query($connection, "SELECT nome, cod_paciente as codigo
                                            FROM Paciente
                                            WHERE nome = '$nome'");

        while ($resultado = mysqli_fetch_array($consulta)){
                                                             $resultado['codigo'];
                                                          }

            $insere = mysqli_query($connection, "INSERT INTO dermatologista(data_agendamento, horario, nome)
                                                 VALUES('$data_agendamento','$horario','$nome')");
                

      // Se o registro for inserido com sucesso, redirecione para outra página
       if ($insere) {
                     header("Location: ../pages/paciente-login.html"); // Substitua 'outra_pagina.php' pelo URL correto
                    exit();
                    } 
            else {
                  echo "Erro ao cadastrar paciente.";
                 }


      

    // Insere os dados na tabela de Pacientes
    
    
    
?>
</body>
</html>