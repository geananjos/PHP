<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="css/tarefas.css" type="text/css">
</head>

<body>
    <h1>Gerenciador de Tarefas</h1>
    <?php require 'formulario.php'; ?>
    <?php if ($exibir_tabela) : ?>
        <?php require 'tabela.php'; ?>
    <?php endif; ?>
</body>
</html>