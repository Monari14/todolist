<?php
include "main.class.php";

$m = new Main_class();

$tarefaA = $_POST['tarefa'];
$dataA = $_POST['data'];
$horaA = $_POST['hora'];
$id = $_POST['id_tarefa'];

$m->setTarefaA($tarefaA);
$m->setDataA($dataA);
$m->setHoraA($horaA);
$m->setIdTarefa($id);

if ($m->update()) {
    echo "<div class='link'>Tarefa atualizada com sucesso!</div> <br>";
} else {
    echo "<div class='link'>Erro ao atualizar tarefa.</div> <br>";
}
echo "
<div class='link'>
<a href='tabela.php'>TABELA</a>
</div>
"

?>
