<?php
include "main.class.php";

if(isset($_GET['id'])) {
    $id_tarefa = $_GET['id'];

    $m = new Main_class();

    $m->setIdTarefa2($id_tarefa);
    echo "<link rel='stylesheet' href='css/style.css'>";
    if ($m->deletarTarefa()) {
        echo "<div class='link'>Tarefa apagada com sucesso!</div> <br>";
    } else {
        echo "<div class='link'>Erro ao apagar tarefa.</div> <br>";
    }
} else {
    echo "ID da tarefa não fornecida.";
}

echo "<div class='link'><a href='tabela.php'>TAREFAS</a>
</div>";
?>
