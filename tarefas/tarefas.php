<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require "banco.php";

$exibir_tabela = true;
$lista_tarefas = buscar_tarefas($conexao);

$tarefa	=	[
    'id' =>	0,
    'nome' => '',
    'descricao' => '',
    'prazo' => '',
    'prioridade' =>	1,
    'concluida' => ''
];

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = [
        'id'         => $_GET['id'] ?? 0,
        'nome'       => $_GET['nome'],
        'descricao'  => $_GET['descricao'] ?? '',
        'prazo'      => $_GET['prazo'] ?? '',
        'prioridade' => $_GET['prioridade'] ?? 1,
        'concluida'  => isset($_GET['concluida']) ? 1 : 0,
    ];

    gravar_tarefa($conexao, $tarefa);
    header('Location:	tarefas.php');
    die(); 
}

include "template.php";