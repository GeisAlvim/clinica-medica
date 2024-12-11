<?php
require 'config.php'; // Arquivo de configuração para conexão com o banco de dados

// Consulta para obter todos os pacientes
$sql = "SELECT * FROM pacientes";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Pacientes</h2>
        <a href="cadastro.php" class="btn btn-primary mb-3">Cadastrar Novo Paciente</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Sexo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pacientes) > 0): ?>
                    <?php foreach ($pacientes as $paciente): ?>
                        <tr>
                            <td><?php echo $paciente['id']; ?></td>
                            <td><?php echo htmlspecialchars($paciente['nome']); ?></td>
                            <td><?php echo htmlspecialchars($paciente['data_nascimento']); ?></td>
                            <td><?php echo htmlspecialchars($paciente['email']); ?></td>
                            <td><?php echo htmlspecialchars($paciente['telefone']); ?></td>
                            <td><?php echo htmlspecialchars($paciente['endereco']); ?></td>
                            <td><?php echo htmlspecialchars($paciente['sexo']); ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $paciente['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="excluir.php?id=<?php echo $paciente['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja excluir este paciente?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Nenhum paciente cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>