<html lang="en">
<?php
// REVISADO - OK

include_once("../databases/connection.php");
?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/styles.css" />
    <title>Dashboard do Paciente</title>
    <link rel="icon" type="image/x-icon" href="../logo/favicon.ico" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a href="../index.html" class="logo"
          ><img src="../image/Saúde+.png" height="50px" width="110px" alt=""
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="../pages/paciente-login.html">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/paciente-cadastro.html"
                >Cadastre-se</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/medico-login.html"
                >Sou Médico</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
$cpf = $_GET['id'];
                  
              $sql = "SELECT * FROM paciente WHERE cpf = '$cpf'";

              // Executa a consulta
              $result = $connection->query($sql);

              // Verifica se a consulta retornou resultados
              if ($result->num_rows > 0) {
                // Loop através dos resultados da consulta
                while($row = $result->fetch_assoc()) {
                  // Aqui você pode acessar os dados do paciente
                   "Cod_paciente: " . $row["cod_paciente"] . "<br>";
                   "Nome: " . $row["nome"] . "<br>";
                   "CPF: " . $row["cpf"] . "<br>";
                  // E assim por diante, dependendo dos campos que você tem na tabela Paciente
                  $nome=$row["nome"];
                }
              } else {
                echo "0 resultados encontrados";
              }

              // Fecha a conexão com o banco de dados
              $connection->close();
            

?>
    <main class="hero">
      <div class="container">
        <h1>Agendamento Medico Geral</h1>
        <form class="row g-3" method="POST" action="../databases/oftamologista.php" >
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="inputEmail4" name="nome" value="<?php echo($nome)?>"
          </div>
          <div class="col-md-6">
            <label for="horario" class="form-label">Horário:</label>
            <select class="form-control" id="horario" name="horario">
              <option value="08:00">08:00</option>
              <option value="09:00">09:00</option>
              <option value="10:00">10:00</option>
              <!-- Adicione mais opções conforme necessário -->
            </select>
          </div>
          <div class="col-md-2">
            <label for="data" class="form-label">Data:</label>
            <input type="date" class="form-control" id="data" name="data" />
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck" />
              <label class="form-check-label" for="gridCheck">
                Check me out
              </label>
            </div>
          </div>
          <div class="col-12">
           
            <a href="confirmacao.html"><button type="submit" class="btn btn-primary" id="btn-agendar"></a>
              Agendar
            </button>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
