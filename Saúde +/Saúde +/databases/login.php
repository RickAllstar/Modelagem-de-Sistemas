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
                window.location='../pages/paciente-dashboard.html';
            }
            function failed(){
                setTimeout("window.location='../pages/paciente-login.html'", 2000);
            }
        </script>
    </head>
    <body>
        <?php
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];
            $consulta = mysqli_query($connection,"SELECT * FROM Paciente WHERE cpf = '$cpf' AND senha = '$senha'") or die (mysqli_error($connection));
            $linhas = mysqli_num_rows($consulta);
            
            if($linhas == 0){
                echo"<br><br><br><br><br><br><p align = 'center'>Por favor aguarde&hellip;</p>";
                echo"<script language='javascript'>failed()</script>";
            } else {
                $_SESSION["cpf"]=$_POST["cpf"];
                $_SESSION["senha"]=$_POST["senha"];
                echo"<script language='javascript'>sucesso()</script>";
            }
        ?>
    </body> 
</html>