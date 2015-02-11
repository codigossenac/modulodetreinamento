<?php
include 'conf/requerLogin.php';
include 'conf/header.php';

$usuario_id=$_GET['usuario_id'];

if (isset($_POST['data'])){

	$data=$_POST['data'];	
	$curso_id= $_POST['curso_id'];

	$stmt = $conn->prepare("insert into matriculas (matricula_data,matricula_curso_id,matricula_usuario_id) values(STR_TO_DATE(?,'%d/%m/%Y'),?,?)" );
	$stmt->bind_param("sii", $data ,$curso_id,$usuario_id);
	$stmt->execute();

	?>
	<script>
		alert('Registro salvo com sucesso.');
		window.location = 'matriculas.php?usuario_id=<?php echo $usuario_id?>';
	</script>
	<?php

}

?>

<h2>Matriculas</h2>


<form method="POST" action="matriculas_edit.php?usuario_id=<?php echo $usuario_id; ?>">



  <div class="form-group">
    <label for="nome">Data:</label>
    <input type="text" class="form-control datepicker" id="data" name="data"  placeholder="" value="">
  </div>


  <?php
	$stmt_curso = $conn->prepare("SELECT c.curso_id, c.curso_nome,a.area_nome FROM cursos c inner join areas a on a.area_id = c.curso_area_id order by a.area_nome,c.curso_nome");

	if (!$stmt_curso) {
		echo "erro ao preparar stmt";
		die;
	}

	$stmt_curso->execute();
	$stmt_curso->bind_result($combo_curso_id,$combo_curso_nome,$combo_area_nome);

  ?>

  <div class="form-group">
    <label for="area">Curso:</label>

     <select name="curso_id" id="curso_id">
     	<?php while($stmt_curso->fetch()){ ?>
    	<option value="<?php echo $combo_curso_id?>"><?php echo htmlspecialchars($combo_area_nome) .' - '. htmlspecialchars($combo_curso_nome) ; ?></option>
    	<?php }
    	$stmt_curso->close();
    	?>
    </select>
    
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="matriculas.php?usuario_id=<?php echo $usuario_id; ?>" class="btn btn-danger">voltar</a>
</form>



<?php
include 'conf/footer.php';
?>
	