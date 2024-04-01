<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once("../databases/connection.php");
?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/styles.css" />
    <title>Alterar Dados do Paciente</title>
    <link rel="icon" type="image/x-icon" href="../logo/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <script>
      function mascara1(telefone, mask) {
          // Limpa qualquer não número da entrada
          telefone.value = telefone.value.replace(/\D/g, '');
          
          // Aplica a máscara desejada
          var valor = telefone.value;
          var i = 0;
          var mascara = '';
          for (var m = 0; m < mask.length; m++) {
              if (mask.charAt(m) == '#') {
                  if (valor.charAt(i) != '')
                      mascara += valor.charAt(i++);
                  else
                      break;
              } else {
                  mascara += mask.charAt(m);
              }
          }
          telefone.value = mascara;
      }
  </script>

    <script>
  function mascara(cpf, mask) {
      // Limpa qualquer caractere não numérico da entrada
      cpf.value = cpf.value.replace(/\D/g, '');

      // Aplica a máscara desejada
      var valor = cpf.value;
      var i = 0;
      var mascara = '';
      for (var m = 0; m < mask.length; m++) {
          if (mask.charAt(m) == '#') {
              if (valor.charAt(i) != '')
                  mascara += valor.charAt(i++);
              else
                  break;
          } else {
              mascara += mask.charAt(m);
          }
      }
      cpf.value = mascara;
  }
</script>
</head>
<body>
    <!-- </date_interval_create_from_date_string> -->
    
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
    <div class="hero">
    <div class="container">
        <h2 class="text-center">Alterar Dados do Paciente</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="codigo_paciente" class="form-label">Selecione o código do paciente:</label>
                <select class="form-select" id="codigo_paciente" name="codigo_paciente">
                   
                   <?php
                    $sql = "SELECT cod_paciente, nome 
                            FROM paciente";

                    $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                                                    echo "<option value='" . $row["cod_paciente"] . "'>" . $row["cod_paciente"] . " - " . $row["nome"] . "</option>";
                                                                  }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Novo nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Novo nome">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Novo telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Novo telefone"
                onkeypress="mascara1(this, '## #####-####')" maxlength = "13">
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Novo endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Novo endereço">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">Novo CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Novo CPF" 
                onkeypress="mascara(this, '###.###.###-##')" maxlength = "14" 
              />
            </div>
            <button type="submit" class="btn btn-primary">Alterar Dados do Paciente</button>
        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $codigo_paciente = $_POST['codigo_paciente'];
    $novo_nome = $_POST['nome'];
    $novo_telefone = $_POST['telefone'];
    $novo_endereco = $_POST['endereco'];
    $novo_cpf = $_POST['cpf'];

    // Construir a query de atualização de acordo com os campos preenchidos
    $sql = "UPDATE paciente SET ";
    if (!empty($novo_nome)) {
        $sql .= "Nome='$novo_nome', ";
    }
    if (!empty($novo_telefone)) {
        $sql .= "Telefone='$novo_telefone', ";
    }
    if (!empty($novo_endereco)) {
        $sql .= "endereco='$novo_endereco', ";
    }
    if (!empty($novo_cpf)) {
        $sql .= "Cpf='$novo_cpf', ";
    }

    // Remover a vírgula extra no final da string SQL
    $sql = rtrim($sql, ", ");

    // Adicionar a cláusula WHERE para atualizar apenas o paciente selecionado
    $sql .= " WHERE Cod_paciente='$codigo_paciente'";

    // Executar a query
    if ($connection->query($sql) === TRUE) {
        echo "<div class='ec'> <p>Dados do paciente atualizados com sucesso.</p></div>";
    } else {
        echo "Erro ao tentar atualizar os dados do paciente:" . $connection->error;
    }
}

$connection->close();
?>

    </div>
    </div>
</body>
</html>

