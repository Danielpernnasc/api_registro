<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// include database connection
include 'banco.php';
 
// delete message prompt will be here
 
// select all data
$query = "SELECT p_id, p_nome, p_endereco, p_email, p_telefone, p_senha, p_confirma FROM clientes ORDER BY p_id DESC";
$stmt = $con->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
// $query = "SELECT p_id, p_nome, p_endereco, p_email, p_telefone, p_senha, p_confirma FROM clientes ORDER BY p_id DESC";
// $stmt = $con->prepare($query);
// $stmt->execute();
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $json = json_encode($results);
// echo $json;
?>