<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
  echo "ID inválido.";
  exit;
}

// Deletar cliente
$stmt = $conn->prepare("DELETE FROM clientes WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  header("Location: index.php");
  exit;
} else {
  echo "Erro ao excluir cliente.";
}
?>
