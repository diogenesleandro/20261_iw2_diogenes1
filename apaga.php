<?php
include 'conecta.php';
include 'consulta.php';
$id = $_POST['id'];
$sql = "DELETE FROM city WHERE ID = '".$id."'";
if($pdo->query($sql)){
 consultar();
}else{
    echo "erro";
}
?>