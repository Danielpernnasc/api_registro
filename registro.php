<?php
include_once("config.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if(isset($postdata) && !empty($postdata))
{
	$nome = mysqsli_real_escape_string($mysqli, trim($request->nome));
	$rua = mysqli_real_escape_string($mysqli, trim($request->rua));
	$numero = mysqli_real_escape_string($mysqli, (int)$request->numero);
	$complemento = mysqli_real_escape_string($mysqli, trim($request->complemento));
	$bairro = mysqli_real_escape_string($mysqli, trim($request->bairro));
	$cidade = mysqli_real_escape_string($mysqli, trim($request->cidade));
	$uf = mysqli_real_escape_string($mysqli, trim($request->uf));
	$cep = mysqli_real_escape_string($mysqli, trim($request->cep));
	$email = mysqsli_real_escape_string($mysqli, trim($request->email));
	$tel = mysqli_real_escalpe_string($mysqli, (int)$request->tel)
	$senha = mysqsli_real_escape_string($mysqli, (int)$request->senha);
	$confirma = mysqli_real_escape_string($mysqli, (int)$request->confirma);
	$sql = "INSERT INTO cliente_calvo(nome,rua, numero, complemento, bairro, cidade, uf, cep, email, tel, senha, confirma) VALUES ('{$nome}', '{$rua}', '{$complemento}', '{$bairro}', '{$cep}', '{$cidade}', '{$uf}' ,'{$email}', '{$tel}', '{$senha}', '{$confirma}')";
	if ($mysqli->query($sql) === TRUE) {


		$dadoscalvo = [

			'nome' => $nome,
			'rua' => $rua,
			'numero' => $numero,
			'complemento' => $complemento,
			'bairro' => $bairro,
			'cep' => $cep,
			'cidade' => $cidade,
			'uf' => $uf,
			'email' => $email,
			'tel' => $tel,
			'senha' => '',
			'confirma' => '',
			'id' => mysqli_insert_id($mysqli)
		];
		echo json_encode($dadoscalvo);
	}
}
?>