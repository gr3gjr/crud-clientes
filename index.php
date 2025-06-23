<?php
include 'db.php';

$result = $conn->query("SELECT * FROM clientes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Clientes</title>
  <!-- Bootstrap 5.3 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-0">Lista de Clientes</h2>
      <a href="create.php" class="btn btn-success">+ Novo Cliente</a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark text-center">
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td class="text-center"><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['nome']) ?></td>
              <td><?= htmlspecialchars($row['telefone']) ?></td>
              <td><?= htmlspecialchars($row['endereco']) ?></td>
              <td class="text-center">
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

<?php $conn->close(); ?>
