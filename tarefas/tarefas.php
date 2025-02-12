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

if (array_key_exists('nome', $_POST) && $_POST['nome'] != '') {
    $tarefa = [
        'id' => 0,
        'nome' => $_POST['nome'],
        'descricao' => '',
        'prazo' => '',
        'prioridade' => $_POST['prioridade'],
        'concluida' => 0,
    ];
    
    if (array_key_exists('descricao', $_POST)) {
        $tarefa['descricao'] = $_POST['descricao'];
    }
    if (array_key_exists('prazo', $_POST)) {
        $tarefa['prazo'] = $_POST['prazo'];
    }
    if (array_key_exists('concluida', $_POST)) {
        $tarefa['concluida'] = $_POST['concluida'];
    }
    gravar_tarefa($conexao, $tarefa);
    header('Location: tarefas.php');
    die();
}


include "template.php";