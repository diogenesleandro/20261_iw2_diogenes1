<?php
function consultar(){
    $resposta="<table border='1' class='table table-bordered table-striped table-responsive'><tr><th>Nome</th><th>Distrito</th><th>População</th><th>Ação</th></tr>";
include 'conecta.php';
$stmt = $pdo->query('SELECT * from city ORDER BY ID DESC');
while ($row = $stmt->fetch()) {
    $resposta.="<tr><td>".$row['Name'].
    "</td><td>".$row['District'].
    "</td><td>".$row['Population'].
    "</td><td>".
    "<button class='excluir btn btn-danger btn-lg' id=".$row['ID'].">excluir</button>".
    "<button class='editar btn btn-warning btn-lg' id=".$row['ID'].">editar</button></td></tr>";
}
$resposta.="</table>";
echo $resposta;
}

?>
