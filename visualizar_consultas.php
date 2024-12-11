<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Agendadas - Clínica Médica</title>
    <!-- Link do Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Consultas Agendadas</h1>
        <p class="text-center">Aqui estão suas consultas agendadas:</p>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Especialidade</th>
                    <th>Médico</th>
                    <th>Paciente</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Simulação de dados de consultas agendadas
                $consultas = [
                    [
                        'data' => '2023-10-10',
                        'horario' => '08:00',
                        'especialidade' => 'Cardiologia',
                        'medico' => 'Dr. José',
                        'paciente' => 'João da Silva'
                    ],
                    [
                        'data' => '2023-10-12',
                        'horario' => '09:00',
                        'especialidade' => 'Ortopedia',
                        'medico' => 'Dra. Sofia',
                        'paciente' => 'Maria Oliveira'
                    ],
                    [
                        'data' => '2023-10-15',
                        'horario' => '10:00',
                        'especialidade' => 'Pediatria',
                        'medico' => 'Dr. Luiz',
                        'paciente' => 'Ana Clara'
                    ]
                ];

                // Exibir as consultas
                foreach ($consultas as $consulta) {
                    echo "<tr>
                            <td>{$consulta['data']}</td>
                            <td>{$consulta['horario']}</td>
                            <td>{$consulta['especialidade']}</td>
                            <td>{$consulta['medico']}</td>
                            <td>{$consulta['paciente']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="text-center">
        <a href="index.php" class="btn btn-primary btn-lg m-2">Voltar ao menu</a>            
    </div>

    <!-- Link do Bootstrap JS e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>