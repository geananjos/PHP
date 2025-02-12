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

include "template.php";