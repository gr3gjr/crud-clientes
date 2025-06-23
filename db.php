<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'crud';

// Criação da conexão
$conn = new mysqli($host, $user, $password, $database);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
  die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
