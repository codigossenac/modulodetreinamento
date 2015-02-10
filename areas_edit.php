<?php

include 'conf/header.php';

if (isset($_POST['id'])){

	$id= $_POST['id'];
	$nome=$_POST['nome'];


	if ($id=='0'){
		
		$stmt = $conn->prepare('insert into areas (area_nome) values(?)');
		$stmt->bind_param("s", $nome);
		$stmt->execute();

	} else {
		


		$stmt = $conn->prepare('update areas set area_nome=? where area_id = ? ');
		$stmt->bind_param("si", $nome,$id);
		$stmt->execute();
	
	}

	?>
	<script>
		alert('Registro salvo com sucesso.');
		window.location = 'areas.php';
	</script>
	<?php

}



if (isset($_GET['id'])){

	$stmt = $conn->prepare("SELECT area_id,area_nome FROM areas where area_id = ?");

	if (!$stmt) {
		echo "erro ao preparar stmt";
		die;
	}

	$stmt->bind_param("i", $_GET['id']);
	$stmt->execute();
	$stmt->bind_result($id,$nome);
	$stmt->fetch();
	$stmt->close();
	
	$id= $_GET['id'];
}

?>

<h2>Areas</h2>


<form method="POST">

<input type="hidden" name="id" value="<?php echo $id ?>"/>

  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $nome ?>">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="areas.php" class="btn btn-danger">voltar</a>
</form>



<?php
include 'conf/footer.php';
?>
