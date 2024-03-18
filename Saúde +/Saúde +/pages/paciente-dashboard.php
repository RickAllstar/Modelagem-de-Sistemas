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
                  echo "Cod_paciente: " . $row["cod_paciente"] . "<br>";
                  echo "Nome: " . $row["nome"] . "<br>";
                  echo "CPF: " . $row["cpf"] . "<br>";
                  // E assim por diante, dependendo dos campos que você tem na tabela Paciente
                }
              } else {
                echo "0 resultados encontrados";
              }

              // Fecha a conexão com o banco de dados
              $connection->close();
            

?>
    <main class="hero">
      <div class="card mb-3">
        <img src="../image/oftamologista.jpeg" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Oftamologista</h5>
          <p class="card-text">
            No Hospital Médico, reconhecemos a importância fundamental dos
            oftalmologistas na preservação da saúde ocular e na promoção do
            bem-estar de nossos pacientes. Como especialistas dedicados à saúde
            dos olhos, os oftalmologistas desempenham um papel vital em nossa
            equipe médica, oferecendo cuidados especializados e compassivos a
            indivíduos de todas as idades.
          </p>
          <a href="pagina-oftamologista.html" class="btn btn-primary"
            >Marcar consulta</a
          >
        </div>
      </div>
      <div class="card">
        <img src="../image/dermatologia.jpeg" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Dermatologista</h5>
          <p class="card-text">
            No Hospital, reconhecemos a importância vital dos dermatologistas na
            promoção da saúde da pele e no bem-estar geral de nossos pacientes.
            Como especialistas dedicados ao cuidado da pele, cabelos e unhas, os
            dermatologistas desempenham um papel essencial em nossa equipe
            médica, oferecendo uma ampla gama de serviços para manter a
            integridade e a saúde da pele de nossos pacientes.
          </p>
          <a href="pagina-dermatologista.php?id=<?php echo urldecode($cpf); ?>" class="btn btn-primary">


            >Marcar consulta</a
          >
        </div>
      </div>
      <div class="card">
        <img src="../image/medico-geral.png" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Médico Geral</h5>
          <p class="card-text">
            No Hospital, reconhecemos o papel central e versátil dos médicos
            gerais na promoção da saúde e no bem-estar geral de nossos
            pacientes. Como profissionais da linha de frente da medicina, os
            médicos gerais desempenham um papel essencial em nossa equipe
            médica, oferecendo cuidados abrangentes e holísticos para uma ampla
            variedade de condições médicas e necessidades de saúde.
          </p>
          <a href="pagina-medicogeral.html" class="btn btn-primary"
            >Marcar consulta</a
          >
        </div>
      </div>
    </main>
  </body>
</html>
