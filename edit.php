<?php
include 'db.php';

$id = $_GET['id'] ?? null;
$nome = $telefone = $endereco = "";
$sucesso = false;

if (!$id) {
  echo "ID inválido.";
  exit;
}

// Buscar dados do cliente
$stmt = $conn->prepare("SELECT * FROM clientes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
  echo "Cliente não encontrado.";
  exit;
}

$cliente = $result->fetch_assoc();
$nome = $cliente['nome'];
$telefone = $cliente['telefone'];
$endereco = $cliente['endereco'];

// Atualizar dados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nome = $_POST["nome"];
  $telefone = $_POST["telefone"];
  $endereco = $_POST["endereco"];

  $stmt = $conn->prepare("UPDATE clientes SET nome = ?, telefone = ?, endereco = ? WHERE id = ?");
  $stmt->bind_param("sssi", $nome, $telefone, $endereco, $id);

  if ($stmt->execute()) {
    $sucesso = true;
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Cliente</title>
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
            <h2 class="card-title mb-4 text-center">Editar Cliente</h2>

            <?php if ($sucesso): ?>
              <div class="alert alert-success text-center" role="alert">
                Cliente atualizado com sucesso!
              </div>
            <?php endif; ?>

            <form action="" method="POST">
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

              <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
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

<?php $conn->close(); ?>
