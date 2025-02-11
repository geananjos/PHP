<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require "banco.php";

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = [
        'nome' => $_GET['nome'],
        'descricao' => $_GET['descricao'] ?? '',
        'prazo' => $_GET['prazo'] ?? '',
        'prioridade' => $_GET['prioridade'] ?? 'baixa',
        'concluida' => isset($_GET['concluida']) ? 'Sim' : 'Não',
    ];

    gravar_tarefa($conexao, $tarefa);
}

$lista_tarefas = buscar_tarefas($conexao);

include "template.php";