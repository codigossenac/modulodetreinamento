<?php
include 'conf/requerLogin.php';
include 'conf/header.php';

$modulo_id=$_GET['modulo_id'];
$curso_id=$_GET['curso_id'];


if (isset($_POST['id'])){

	

	$id= $_POST['id'];
	$nome=$_POST['nome'];
	$tipo=$_POST['tipo'];
	$ordem=$_POST['ordem'];
	$texto=$_POST['texto'];



	if ($tipo!= "Texto"){
		$texto="";
	}
	

	if ($id=="0"){
		
		$stmt = $conn->prepare('insert into licoes (licao_nome,licao_tipo,licao_ordem,licao_modulo_id,licao_texto) values(?,?,?,?,?)');
		$stmt->bind_param("ssiis", $nome,$tipo,$ordem,$modulo_id,$texto);
		$stmt->execute();

	
		$id=$conn->insert_id;

	} else {
		


		$stmt = $conn->prepare('update licoes set licao_nome=?,licao_tipo=?,licao_ordem=?,licao_texto=? where licao_id = ? ');
		$stmt->bind_param("ssisi", $nome,$tipo,$ordem,$texto,$id);
		$stmt->execute();


		
	}

	?>
	<script>
		alert('Registro salvo com sucesso.');
		window.location = 'licoes.php?curso_id=<?php echo $curso_id; ?>&modulo_id=<?php echo $modulo_id; ?>';
	</script>
	<?php

	if (isset($_FILES['arquivo'])){
		$target_dir = "uploads/";
		$target_file = $target_dir . $id;
		move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file);
	}

	
}



if (isset($_GET['id'])){

	$stmt = $conn->prepare("SELECT licao_id,licao_nome,licao_tipo,licao_ordem,licao_modulo_id,licao_texto FROM licoes where licao_id = ?");

	if (!$stmt) {
		echo "erro ao preparar stmt";
		die;
	}

	$stmt->bind_param("i", $_GET['id']);
	$stmt->execute();
	$stmt->bind_result($id,$nome,$tipo,$ordem,$modulo_id,$texto);
	$stmt->fetch();
	$stmt->close();
	
	$id= $_GET['id'];
}

?>

<h2>licoes</h2>

<form method="POST" enctype="multipart/form-data" action="licoes_edit.php?curso_id=<?php echo $curso_id; ?>&modulo_id=<?php echo $modulo_id; ?>">

<input type="hidden" name="id" value="<?php echo $id ?>"/>


  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $nome ?>">
  </div>

   <div class="form-group">
    <label for="ordem">Ordem:</label>
    <input type="text" class="form-control" id="ordem" name="ordem" placeholder="" value="<?php echo $ordem ?>">
  </div>
   <div class="form-group">
    <label for="tipo">Tipo:</label>
    <select name="tipo" id="tipo" onchange="mudaTipo()" >
    	<option <?php if($tipo=='Imagem'){ echo 'selected';} ?>>Imagem</option>
    	<option <?php if($tipo=='Video'){ echo 'selected';} ?>>Video</option>
       	<option <?php if($tipo=='Texto'){ echo 'selected';} ?>>Texto</option>
    </select>
  </div>

   <div class="form-group" id="grupo_texto">
    <label for="tipo">Texto:</label>
  	<textarea name="texto" id="texto"><?php echo $texto ?></textarea>
  </div>

  <div class="form-group" id="grupo_arquivo">
    <label for="tipo">Arquivo:</label>
    <input type="file" name="arquivo" id="arquivo">
  </div>


  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="licoes.php?curso_id=<?php echo $curso_id; ?>&modulo_id=<?php echo $modulo_id; ?>" class="btn btn-danger">voltar</a>
</form>

<script>

function mudaTipo(){
	if ($("#tipo").val()=='Texto'){
		$("#grupo_arquivo").hide();
		$("#grupo_texto").show();
	} else {
		$("#grupo_arquivo").show();
		$("#grupo_texto").hide();
	}
}

$(function(){
	mudaTipo();
})

</script>

<?php
include 'conf/footer.php';
?>
