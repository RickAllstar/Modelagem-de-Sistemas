<?php
// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os campos "cpf" e "senha" foram enviados no formulário
    if (isset($_POST['cpf']) && isset($_POST['senha'])) {
        // Obter os valores dos campos do formulário
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];

        // Conectar ao banco de dados
        $conn = new mysqli('localhost', 'root', '', 'clinica_medica');

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Consulta SQL para verificar se as credenciais estão corretas
        $sql = "SELECT Paciente FROM login WHERE cpf = '$cpf' AND senha = '$senha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Credenciais corretas, redirecionar para a página paciente-dashboard.html
            header("Location: paciente-dashboard.html");
            exit();
        } else {
            // Credenciais incorretas, mostrar mensagem de erro
            echo "CPF ou senha incorretos.";
        }

        // Fechar conexão com o banco de dados
        $conn->close();
    } else {
        echo "Campos 'cpf' e 'senha' não foram recebidos.";
    }
}
?>
