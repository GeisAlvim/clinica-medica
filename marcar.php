<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consulta - Clínica Médica</title>
    <!-- Link do Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Agendar Consulta</h1>
        <p class="text-center">Por favor, preencha os campos abaixo para agendar uma consulta.</p>

        <form>
            <div class="form-group">
                <label for="especialidade">Especialidade:</label>
                <select class="form-control" id="especialidade">
                    <option value="">Selecione uma especialidade</option>
                    <option value="cardiologia">Cardiologia</option>
                    <option value="ortopedia">Ortopedia</option>
                    <option value="pediatria">Pediatria</option>
                </select>
            </div>

            <div class="form-group">
                <label for="medico">Médico:</label>
                <select class="form-control" id="medico">
                    <option value="">Selecione um médico</option>
                    <!-- Cardiologia -->
                    <option value="dr_jose" data-especialidade="cardiologia">Dr. José</option>
                    <option value="dra_maria" data-especialidade="cardiologia">Dra. Maria</option>
                    <!-- Ortopedia -->
                    <option value="dr_pedro" data-especialidade="ortopedia">Dr. Pedro</option>
                    <option value="dra_sofia" data-especialidade="ortopedia">Dra. Sofia</option>
                    <!-- Pediatria -->
                    <option value="dr_luiz" data-especialidade="pediatria">Dr. Luiz</option>
                    <option value="dra_julia" data-especialidade="pediatria">Dra. Julia</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data">
            </div>

            <div class="form-group">
                <label for="horario">Horário:</label>
                <select class="form-control" id="horario">
                    <option value="">Selecione um horário</option>
                    <option value="08:00">08:00</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </div>
            

            <button type="submit" class="btn btn-primary">Agendar Consulta</button>
        </form>
    </div>

    <div class="text-center">
        <a href="index.php" class="btn btn-primary btn-lg m-2">Voltar ao menu</a>            
    </div>

    <!-- Link do Bootstrap JS e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script para filtrar médicos por especialidade -->
    <script>
        $(document).ready(function() {
            $('#especialidade').on('change', function() {
                var especialidade = $(this).val();
                $('#medico option').hide();
                $('#medico option[data-especialidade="' + especialidade + '"]').show();
            });
        });
    </script>
</body>
</html>