<?php
require 'config.php'; // Arquivo de configuração para conexão com o banco de dados

$sucesso = '';
$erro = '';

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
        // Prepara a consulta SQL para inserir os dados
        $sql = "INSERT INTO pacientes (nome, data_nascimento, email, telefone, endereco, sexo) VALUES (:nome, :data_nascimento, :email, :telefone, :endereco, :sexo)";
        $stmt = $pdo->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':sexo', $sexo);

        // Executa a consulta
        if ($stmt->execute()) {
            $sucesso = "Cadastro realizado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar o paciente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastro de Paciente</h2>

        <?php if ($sucesso): ?>
            <div class="alert alert-success"><?php echo $sucesso; ?></div>
        <?php endif; ?>
        <?php if ($erro): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type ="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" name="sexo" required>
                    <option value="">Selecione</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    <div class="text-center">
        <a href="index.php" class="btn btn-primary btn-lg m-2">Voltar ao menu</a>            
    </div>
</body>
</html>