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
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Cadastrar Cliente</h1>

  <?php if ($sucesso): ?>
    <p style="color: green;">Cliente cadastrado com sucesso!</p>
  <?php endif; ?>

  <form action="create.php" method="POST">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($nome) ?>"><br>

    <label for="telefone">Telefone:</label><br>
    <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($telefone) ?>"><br>

    <label for="endereco">Endereço:</label><br>
    <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($endereco) ?>"><br><br>

    <button type="submit">Cadastrar</button>
  </form>

  <p><a href="index.php">Voltar para a lista</a></p>
</body>
</html>
