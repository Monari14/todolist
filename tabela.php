<?php
include "main.class.php";

$m = new Main_class();
$tarefas = $m->listaTarefa();

echo "<link rel='stylesheet' href='style.css'>";
echo "
<h1>Tarefas</h1>
<table border=1>
<tbody>
    <tr>
        <th>ID_Tarefa</th>
        <th>Tarefa</th>
        <th>Data</th>
        <th>Hora</th>
    </tr>
</tbody>
</table>";

foreach ($tarefas as $m) {
    echo "
    <table border=1>
    <tbody>
        <tr>
            <td>
                <a href='atualizar.php?id=". $m['id_tarefa'] ."'>". $m['id_tarefa'] ."</a>
            </td>
            <td>". $m['tarefa'] . "</td>
            <td>". $m['data'] . "</td>
            <td>". $m['hora'] . "</td>
            <td>
                <a href='apagar.php?id=". $m['id_tarefa'] ."'>apagar</a>
            </td>
        </tr>
    </tbody>
    </table>";
}
echo "
    <a href='index.html'>VOLTAR</a>

";
?>
