
<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo nome não está vazio
    if (!empty($_POST["nome"])) {
        // Armazena o nome do paciente na sessão
        $_SESSION['nome'] = $_POST["nome"];
    }

    // Verifica se o campo horário não está vazio
    if (!empty($_POST["horario"])) {
        // Armazena o horário na sessão
        $_SESSION['horario'] = $_POST["horario"];
    }

    // Verifica se o campo data não está vazio
    if (!empty($_POST["data"])) {
        // Armazena a data na sessão
        $_SESSION['data'] = $_POST["data"];
    }
}
?>