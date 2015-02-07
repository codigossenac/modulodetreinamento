<?php

include 'conf/conn.php';

$stmt = $conn->prepare("SELECT usuario_nome,usuario_tipo FROM usuarios where usuario_login = ? and usuario_senha = ?");

if (!$stmt) {
	echo "erro ao preparar stmt";
	die;
}

$stmt->bind_param("ss", $_POST['login'] ,$_POST['senha']);
$stmt->execute();
$stmt->bind_result($nome,$tipo);

if ($stmt->fetch()){

	// grava o usuario Logado na sessao
	$_SESSION['usuarioLogado'] =  $_POST['login'] ;
	$_SESSION['nomeUsuarioLogado'] = $nome;
	$_SESSION['tipoUsuarioLogado'] = $tipo;

	// redireciona para a app
	header("location: inicio.php");	

} else {
	session_destroy();
	// usuario nao logado
	header("location: index.php?erro=403");
}
$stmt->close();
?>