<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
if($_POST){

// include database connection
include 'banco.php';

try{

// insert query
$query = "INSERT INTO clientes SET p_nome=:nome, p_endereco=:endereco, p_email=:email, p_telefone=:telefone, p_senha=:senha, p_confirma=:confirma";
            // 
            // numero=:numero, complemento=:complemento, bairro=:bairro, cep:cep, cidade=:cidade, uf:=uf,
// prepare query for execution
$stmt = $con->prepare($query);
// posted values
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$confirma = $_POST['confirma'];

// bind the parameters
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':confirma', $confirma);
// Execute the query
if($stmt->execute()){
    echo json_encode(array('result'=>'success'));
    }else{
    echo json_encode(array('result'=>'fail'));
    }
    }
    // show error
    catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
    }
    }
?>