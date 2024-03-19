<!DOCTYPE html>
<?php
// REVISADO - OK

include_once("connection.php");
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <script language="javascript">
         function sucesso(){
    window.location = '../pages/paciente-dashboard.php?id=<?php echo $cpf; ?>';
}
<script type="text/javascript">
    function showErrorMessage(message) {
        var errorMessageDiv = document.getElementById('error-message');
        errorMessageDiv.innerHTML = message;
        errorMessageDiv.style.display = 'block';
    }
</script>
<script>
</script>

    </script>
        </script>
    </head>
    <body>
        <?php
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];
            $consulta = mysqli_query($connection,"SELECT * FROM Paciente WHERE cpf = '$cpf' AND senha = '$senha'") or die (mysqli_error($connection));
            $linhas = mysqli_num_rows($consulta);
            
            if($linhas == 0){
                echo "<script language='javascript'>showErrorMessage('Dados não encontrados. Por favor, verifique o CPF e a senha e tente novamente.')</script>";
            } else {
                $_SESSION["cpf"]=$_POST["cpf"];
                $_SESSION["senha"]=$_POST["senha"];
                header("Location: ../pages/paciente-dashboard.php?id=" . urlencode($cpf));
                exit(); // Termina a execução do script após o redirecionamento
            }
            
            $dados_nao_encontrados = true;
    
            if ($dados_nao_encontrados) {
                // Redirecionar de volta para a página de login
                header("Location: ../pages/paciente-login.html");
                

                exit; // Certifique-se de sair do script após o redirecionamento
            }
        ?>
    </body> 
</html>