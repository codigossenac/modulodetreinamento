<?php

include 'conf/header.php';

if (isset($_POST['id'])){

	$id= $_POST['id'];
	$nome=$_POST['nome'];
	$login=$_POST['login'];
	$senha=$_POST['senha'];
	$tipo=$_POST['tipo'];


	if ($id=='0'){
		
		$stmt = $conn->prepare('insert into usuarios (usuario_nome,usuario_login,usuario_senha,usuario_tipo) values(?,?,?,?)');
		$stmt->bind_param("ssss", $nome,$login,$senha,$tipo);
		$stmt->execute();

	} else {
		


		$stmt = $conn->prepare('update usuarios set usuario_nome=?,usuario_login=?,usuario_senha=?,usuario_tipo=? where usuario_id = ?');
		$stmt->bind_param("ssssi", $nome,$login,$senha,$tipo,$id);
		$stmt->execute();
	
	}

	?>
	<script>
		alert('Registro salvo com sucesso.');
		window.location = 'usuarios.php';
	</script>
	<?php

}



if (isset($_GET['id'])){

	$stmt = $conn->prepare("SELECT usuario_id,usuario_nome,usuario_login,usuario_senha,usuario_tipo FROM usuarios where usuario_id = ?");

	if (!$stmt) {
		echo "erro ao preparar stmt";
		die;
	}

	$stmt->bind_param("i", $_GET['id']);
	$stmt->execute();
	$stmt->bind_result($id,$nome,$login,$senha,$tipo);
	$stmt->fetch();
	$stmt->close();
	
	$id= $_GET['id'];
}

?>

<h2>Usuarios</h2>


<form method="POST">

<input type="hidden" name="id" value="<?php echo $id ?>"/>

  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $nome ?>">
  </div>

    <div class="form-group">
    <label for="login">Login:</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="" value="<?php echo $login ?>">
  </div>


  <div class="form-group">
    <label for="senha">Senha:</label>
    <input type="password" class="form-control" id="senha" name="senha" placeholder="" value="<?php echo $senha ?>">
  </div>

  <div class="form-group">
    <label for="tipo">Tipo:</label>
    <select name="tipo" id="tipo">
    	<option <?php if($tipo=='Funcionario'){ echo 'selected';} ?>>Funcionario</option>
    	<option <?php if($tipo=='Administrador'){ echo 'selected';} ?>>Administrador</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="usuarios.php" class="btn btn-danger">voltar</a>
</form>



<?php
include 'conf/footer.php';
?>
