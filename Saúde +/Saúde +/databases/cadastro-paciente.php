<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>
<body>
    <?php
    // estabelece conexão com o servidor e BD
    include_once('connection.php');

    // recebe dados do formulario
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $turma = $_POST['turma'];
    $senha = $_POST['senha'];

    $insere = mysqli_query($connection, "INSERT INTO Aluno(Matricula_aluno,Nome_aluno,Cpf_aluno,Turma,Senha_aluno)
                                        VALUES($matricula,$nome,$cpf,$turma,$senha)") 
                                            or die(mysqli_error());
                                        echo"Aluno Cadastrado com sucesso!";
            

    ?>
    
</body>
</html>