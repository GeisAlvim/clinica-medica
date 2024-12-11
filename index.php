<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Clínica Médica</title>
    <!-- Link do Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Bem-vindo à Clínica Médica</h1>
        <p class="text-center">O que você deseja fazer?</p>

        <div class="text-center">
            <a href="cadastro.php" class="btn btn-primary btn-lg m-2">Efetuar Cadastro</a>
            <a href="editar.php" class="btn btn-warning btn-lg m-2">Editar Cadastro</a>
            <a href="marcar.php" class="btn btn-success btn-lg m-2">Marcar Consulta</a>
            <a href="visualizar_consultas.php" class="btn btn-primary btn-lg m-2">Consultas Agendadas</a>
        </div>
    </div>

    <!-- Link do Bootstrap JS e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>