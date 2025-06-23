<?php
include 'db.php';

// Verifica se o ID foi passado via GET
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
  // Redireciona para index com mensagem de erro opcional
  header("Location: index.php?erro=1");
  exit;
}

// Prepara a exclusão
$stmt = $conn->prepare("DELETE FROM clientes WHERE id = ?");
$stmt->bind_param("i", $id);

// Executa e redireciona
if ($stmt->execute()) {
  header("Location: index.php");
  exit;
} else {
  echo "Erro ao excluir cliente.";
}
?>
