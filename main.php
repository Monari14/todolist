<?php
include "main.class.php";
$m = new Main_class();
$tarefa = $_POST['tarefa'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$m->setTarefa($tarefa);
$m->setData($data);
$m->setHora($hora);

if($m->inserirTarefa()){
    echo '
    <link rel="stylesheet" href="css/main.css">
    ';
    echo "<p style='font-size:30pt;'>Nova Tarefa Adicionada! <br></p>
    ";
    echo 
    "
    <br>
    <a style='font-size:20pt;' href='index.html'>Voltar</a>
    ";
}else{
    echo "ERRO ao Adicionar Tarefa! <br>";
}
?>