<?php
if(isset($_GET['id'])) {
    $id_tarefa = $_GET['id'];
    include "main.class.php";
    $m = new Main_class();
    $tarefa = $m->getIdTarefa($id_tarefa);
    if($tarefa) {
        echo "
        <html>
        <head>
        <title>Atualizar Tarefa</title>
        <link rel='stylesheet' href='css/tabela.css'>
        </head>
        <body>
        <h2>Atualizar Tarefa</h2>
        <form action='salva.php' method='POST'>
            <input type='hidden' name='id_tarefa' value='". $tarefa['id_tarefa'] ."'>
            <label for='tarefa'>Tarefa</label><br>
            <input type='text' id='tarefa' name='tarefa' value='". $tarefa['tarefa'] ."'><br>
            <label for='data'>Data</label><br>
            <input type='data' id='data' name='data' value='". $tarefa['data'] ."'><br>
            <label for='hora'>Hora</label><br>
            <input type='time' id='hora' name='hora' value='". $tarefa['hora'] ."'><br>
            <input type='submit' value='Atualizar'>
        </form>
        </body>
        </html>";
    } else {
        echo "Tarefa não encontrada.";
    }
} else {
    echo "ID não foi fornecido.";
}
?>
