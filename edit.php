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
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Editar Cliente</h1>

  <?php if ($sucesso): ?>
    <p style="color: green;">Cliente atualizado com sucesso!</p>
  <?php endif; ?>

  <form action="" method="POST">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($nome) ?>"><br>

    <label for="telefone">Telefone:</label><br>
    <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($telefone) ?>"><br>

    <label for="endereco">Endereço:</label><br>
    <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($endereco) ?>"><br><br>

    <button type="submit">Salvar Alterações</button>
  </form>

  <p><a href="index.php">Voltar para a lista</a></p>
</body>
</html>

<?php $conn->close(); ?>
