<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once('../databases/connection.php'); ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/styles.css" />
    <title>Dashboard do Médico</title>
    <link rel="icon" type="image/x-icon" href="../logo/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="../index.html" class="logo"><img src="../image/Saúde+.png" height="50px" width="110px" alt="" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/paciente-login.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/paciente-cadastro.html">Cadastre-se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/medico-login.html">Sou Médico</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="hero">
        <div class="container">
            <?php
            $sql = "SELECT * FROM dermatologista";

            // Executa a consulta
            $result = $connection->query($sql);

            // Verifica se a consulta retornou resultados
            if ($result->num_rows > 0) {
                // Inicia a tabela HTML

                echo "<table class='table table-bordered'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";
                echo "<th>Nome Paciente</th>";
                echo "<th>Data</th>";
                echo "<th>Horario</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                // Loop através dos resultados da consulta
                while($row = $result->fetch_assoc()) {
                    // Saída de dados de cada linha
                    echo "<tr>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["data_agendamento"] . "</td>";
                    echo "<td>" . $row["horario"] . "</td>";
                    echo "</tr>";
                }

                // Fecha a tabela HTML
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "0 resultados encontrados";
            }

            // Fecha a conexão com o banco de dados
            $connection->close();
            ?>
            <div class="text-center">
                <a href="mudaçao.php" class="btn btn-primary">Alterar dados do paciente</a>
            </div>
        </div>
    </main>
</body>
</html>
