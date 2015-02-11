<?php
include 'conf/requerLogin.php';
include 'conf/header.php';

if (isset($_POST['id'])){

	$id= $_POST['id'];
	$nome=$_POST['nome'];
	$descricao=$_POST['descricao'];
	$area=$_POST['area'];



	if ($id=='0'){
		
		$stmt = $conn->prepare('insert into cursos (curso_area_id,curso_nome,curso_descricao) values(?,?,?)');
		$stmt->bind_param("iss", $area,$nome,$descricao);
		$stmt->execute();

	} else {
		
		$stmt = $conn->prepare('update cursos set curso_area_id=?, curso_nome=?, curso_descricao=? where curso_id = ? ');
		$stmt->bind_param("issi", $area,$nome,$descricao,$id);
		$stmt->execute();
	
	}

	?>
	<script>
		alert('Registro salvo com sucesso.');
		window.location = 'cursos.php';
	</script>
	<?php

}



if (isset($_GET['id'])){

	$stmt = $conn->prepare("SELECT curso_id,curso_nome,curso_descricao,curso_area_id FROM cursos where curso_id = ?");

	if (!$stmt) {
		echo "errao ao preparar stmt";
		die;
	}

	$stmt->bind_param("i", $_GET['id']);
	$stmt->execute();
	$stmt->bind_result($id,$nome,$descricao,$area);
	$stmt->fetch();
	$stmt->close();
	
	$id= $_GET['id'];
}

?>

<h2>Cursos</h2>


<form method="POST">

<input type="hidden" name="id" value="<?php echo $id ?>"/>

  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $nome ?>">
  </div>

  <div class="form-group">
    <label for="nome">Descriçao:</label>
    <textarea class="form-control" id="descricao" name="descricao"><?php echo $descricao ?></textarea>
  </div>

  <?php
	$stmt_area = $conn->prepare("SELECT area_id, area_nome FROM areas order by area_nome");

	if (!$stmt_area) {
		echo "erro ao preparar stmt";
		die;
	}

	$stmt_area->execute();
	$stmt_area->bind_result($area_id,$area_nome);

  ?>

  <div class="form-group">
    <label for="area">Area:</label>

     <select name="area" id="area">
     	<?php while($stmt_area->fetch()){ ?>
    	<option value="<?php echo $area_id?>" <?php if($area==$area_id){ echo 'selected';} ?>><?php echo htmlspecialchars($area_nome) ?></option>
    	<?php }
    	$stmt_area->close();
    	?>
    </select>
    
  </div>


  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="cursos.php" class="btn btn-danger">voltar</a>
</form>



<?php
include 'conf/footer.php';
?>
