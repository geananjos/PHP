<?php
$_SESSION['lista_tarefas'] = []; // Limpa todas as tarefas
session_start();
// Garante que a sessão contém um array
if (!isset($_SESSION['lista_tarefas']) || !is_array($_SESSION['lista_tarefas'])) {
    $_SESSION['lista_tarefas'] = [];
}

if (!empty($_GET['nome'])) {
    $tarefa = [
        'nome'       => $_GET['nome'],
        'descricao'  => $_GET['descricao'] ?? '',
        'prazo'      => $_GET['prazo'] ?? '',
        'prioridade' => $_GET['prioridade'] ?? 'baixa',
        'concluida'  => isset($_GET['concluida']) ? 'Sim' : 'Não',
    ];

    $_SESSION['lista_tarefas'][] = $tarefa;

    // EVITA DUPLICAÇÃO: Redireciona após salvar a tarefa
    header("Location: tarefas.php");
    exit;
}

$lista_tarefas = $_SESSION['lista_tarefas'];

include 'template.php';