<?php
include 'conecta.php';
include 'consulta.php';
$nome = $_POST['nome'];
$distrito = $_POST['distrito'];
$populacao = $_POST['populacao'];
$sql = "INSERT INTO city VALUES (NULL, '".$nome."', 'ABW', '".$distrito."', '".$populacao."')";
if($pdo->query($sql)){
 consultar();
}else{
    echo "erro";
}
?>