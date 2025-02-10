<?php
    // Garante que a variável $lista_tarefas seja sempre um array válido
    $lista_tarefas = $_SESSION['lista_tarefas'] ?? [];

    // Se a variável for uma string (caso tenha sido corrompida), a convertemos para array vazio
    if (!is_array($lista_tarefas)) {
        $lista_tarefas = [];
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <!-- <link rel="stylesheet" href="/css/tarefas.css" type="text/css"> -->
    <link rel="stylesheet" href="css/tarefas.css" type="text/css">
</head>

<body>
    <h1>Gerenciador de Tarefas</h1>

    <form method="get" action="tarefas.php">
        <fieldset>
            <legend>Nova tarefa</legend>

            <label>
                Tarefa:
                <input type="text" name="nome" required />
            </label>

            <label>
                Descrição (Opcional):
                <textarea name="descricao"></textarea>
            </label>

            <label>
                Prazo (Opcional):
                <input type="date" name="prazo" />
            </label>

            <fieldset>
                <legend>Prioridade:</legend>
                <label>
                    <input type="radio" name="prioridade" value="baixa" checked /> Baixa
                    <input type="radio" name="prioridade" value="media" /> Média
                    <input type="radio" name="prioridade" value="alta" /> Alta
                </label>
            </fieldset>

            <label>
                Tarefa concluída:
                <input type="checkbox" name="concluida" value="Sim" />
            </label>

            <input type="submit" value="Cadastrar" />
        </fieldset>
    </form>

    <table border="1">
        <tr>
            <th>Tarefa</th>
            <th>Descrição</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluída</th>
        </tr>

        <?php if (!empty($lista_tarefas)) : ?>
            <?php foreach ($lista_tarefas as $tarefa) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($tarefa['nome'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($tarefa['descricao'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($tarefa['prazo'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($tarefa['prioridade'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($tarefa['concluida'] ?? 'Não'); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5" style="text-align: center;">Nenhuma tarefa cadastrada</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>