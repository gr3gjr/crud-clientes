<?php
include 'db.php';

$nome = $telefone = $endereco = "";
$sucesso = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $telefone = $_POST["telefone"];
  $endereco = $_POST["endereco"];

  $stmt = $conn->prepare("INSERT INTO clientes (nome, telefone, endereco) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $nome, $telefone, $endereco);

  if ($stmt->execute()) {
    $sucesso = true;
    $nome = $telefone = $endereco = ""; // Limpa os campos após sucesso
  }

  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Cliente</title>
  <!-- Bootstrap 5.3 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h2 class="card-title mb-4 text-center">Cadastrar Cliente</h2>

            <?php if ($sucesso): ?>
              <div class="alert alert-success text-center" role="alert">
                Cliente cadastrado com sucesso!
              </div>
            <?php endif; ?>

            <form action="create.php" method="POST">
              <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="<?= htmlspecialchars($nome) ?>">
              </div>

              <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?= htmlspecialchars($telefone) ?>">
              </div>

              <div class="mb-3">
                <label for="endereco" class="form-label">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?= htmlspecialchars($endereco) ?>">
              </div>

              <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>

            <div class="mt-3 text-center">
              <a href="index.php" class="btn btn-link">Voltar para a lista</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
