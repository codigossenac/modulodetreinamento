<?php
include 'conf/requerLogin.php';
include 'conf/header.php';

if (isset($_POST['id'])){

	$id= $_POST['id'];
	$nome=$_POST['nome'];
	$ordem =$_POST['ordem'];
	$curso_id= $_POST['curso_id'];


	if ($id=='0'){
		
		$stmt = $conn->prepare('insert into modulos (modulo_nome,modulo_ordem,modulo_curso_id) values(?,?,?)');
		$stmt->bind_param("sii", $nome,$ordem,$curso_id);
		$stmt->execute();

	} else {
		


		$stmt = $conn->prepare('update modulos set modulo_nome=?,modulo_ordem=? where modulo_id = ? ');
		$stmt->bind_param("sii", $nome,$ordem,$id);
		$stmt->execute();
	
	}

	?>
	<script>
		alert('Registro salvo com sucesso.');
		window.location = 'modulos.php?curso_id=<?php echo $curso_id?>';
	</script>
	<?php

}



if (isset($_GET['id'])){

	$stmt = $conn->prepare("SELECT modulo_id,modulo_nome,modulo_ordem FROM modulos where modulo_id = ?");

	if (!$stmt) {
		echo "erro ao preparar stmt";
		die;
	}

	$stmt->bind_param("i", $_GET['id']);
	$stmt->execute();
	$stmt->bind_result($id,$nome,$ordem);
	$stmt->fetch();
	$stmt->close();
	
	$id= $_GET['id'];
	$curso_id= $_GET['curso_id'];

}

?>

<h2>Modulos</h2>


<form method="POST">

<input type="hidden" name="id" value="<?php echo $id ?>"/>
<input type="hidden" name="curso_id" value="<?php echo $curso_id ?>"/>

  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $nome ?>">
  </div>
  <div class="form-group">
    <label for="ordem">Ordem:</label>
    <input type="text" class="form-control" id="ordem" name="ordem" placeholder="" value="<?php echo $ordem ?>">
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="modulos.php?curso_id=<?php echo $curso_id; ?>" class="btn btn-danger">voltar</a>
</form>



<?php
include 'conf/footer.php';
?>
	