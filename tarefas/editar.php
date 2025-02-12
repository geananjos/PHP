<?php
session_start();
require "banco.php";

$exibir_tabela = false;
if (array_key_exists('nome', $_GET) && $_GET['nome'] != '') {
    $tarefa = [
        'id' => $_GET['id'],
        'nome' => $_GET['nome'],
        'descricao' => '',
        'prazo' => '',
        'prioridade' => $_GET['prioridade'],
        'concluida' => 0,
    ];
    if (array_key_exists('descricao', $_GET)) {
        $tarefa['descricao'] = $_GET['descricao'];
    }
    if (array_key_exists('prazo', $_GET)) {
        $tarefa['prazo'] = $_GET['prazo'];
    }
    if (array_key_exists('concluida', $_GET)) {
        $tarefa['concluida'] = $_GET['concluida'];
    }
    editar_tarefa($conexao, $tarefa);
}
$tarefa = buscar_tarefa($conexao, $_GET['id']);

require "template.php";