<?php
function consultar(){
    $resposta="<table border='1'><tr><th>Nome</th><th>Distrito</th><th>Populaao</th><th>Excluir</th></tr>";
include 'conecta.php';
$stmt = $pdo->query('SELECT * from city');
while ($row = $stmt->fetch()) {
    $resposta.="<tr><td>".$row['Name'].
    "</td><td>".$row['District'].
    "</td><td>".$row['Population'].
    "</td><td><button class='excluir' id=".$row['ID'].">excluir</button></td></tr>";
}
$resposta.="</table>";
echo $resposta;
}

?>
