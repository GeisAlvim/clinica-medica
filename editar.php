<?php
require 'config.php';

$erro = ''; // Inicializa a variável de erro
$sucesso = ''; // Inicializa a variável de sucesso

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM pacientes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $paciente = $stmt->fetch();

    if (!$paciente) {
        header('Location: exibir.php');
        exit;
    }
} else {
    header('Location: exibir.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $nome = trim($_POST['nome']);
    $data_nascimento = $_POST['data_nascimento'];
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);
    $sexo = $_POST['sexo'];

    // Valida os dados
    if (empty($nome)) {
        $erro = "O nome não pode estar vazio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "O e-mail fornecido não é válido.";
    } elseif (!preg_match('/^\d{10,11}$/', $telefone)) {
        $erro = "O telefone deve conter apenas números e ter 10 ou 11 dígitos.";
    } elseif (!DateTime::createFromFormat('Y-m-d', $data_nascimento) || (new DateTime($data_nascimento))->diff(new DateTime())->y < 18) {
        $erro = "A data de nascimento deve ser válida e indicar que o paciente é maior de idade.";
    } else {
        // Prepara a consulta SQL para atualizar os dados
        $sql = "UPDATE pacientes SET nome = :nome, data_nascimento = :data_nascimento, email = :email, telefone = :telefone, endereco = :endereco, sexo = :sexo WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':id', $id);

        // Executa a consulta
        if ($stmt->execute()) {
            header('Location: exibir.php');
            exit;
        } else {
            $erro = "Erro ao atualizar o cadastro.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cadastro de Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Cadastro de Paciente</h2>

        <?php if ($erro): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($paciente['nome']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($paciente['data_nascimento']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($paciente['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($paciente['telefone']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($paciente['endereco']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" name="sexo" required>
                    <option value="Masculino" <?php echo ($paciente['sexo'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                    <option value="Feminino" <?php echo ($paciente['sexo'] == 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>