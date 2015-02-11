<?php
include 'conf/requerLogin.php';
include 'conf/header.php';


$curso_id = $_GET['curso_id'];


$stmt = $conn->prepare("SELECT modulo_id,modulo_nome,modulo_ordem FROM modulos where modulo_curso_id=? order by modulo_ordem");

if (!$stmt) {
	echo "erro ao preparar stmt";
	die;
}

$stmt->bind_param("i", $curso_id);
$stmt->execute();
$stmt->bind_result($id,$nome,$ordem);

?>


<h2>Modulo</h2>

<a class="btn btn-success" href="modulos_edit.php?curso_id=<?php echo $curso_id  ?>&id=0" role="button"><i class="glyphicon glyphicon-plus"></i> Novo Modulo</a>
  <a href="cursos.php" class="btn btn-danger">voltar</a>
<p/> 
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Ordem</th>
			<th>Opçoes</th>
		</tr>
	</thead>

	<tbody>
	<?php
		while($stmt->fetch()){
	?>
		<tr>
			<td><?php echo htmlspecialchars($nome)?></td>
			<td><?php echo htmlspecialchars($ordem)?></td>
			<td> 
				<a class="btn btn-success" href="modulos_edit.php?curso_id=<?php echo $curso_id  ?>&id=<?php echo $id ?>" role="button"><i class="glyphicon glyphicon-pencil"></i> Editar</a> 
				<a class="btn btn-danger" href="modulos_delete.php?curso_id=<?php echo $curso_id  ?>&id=<?php echo $id ?>" onclick="return confirm('Deseja realmente remover?');" role="button"><i class="glyphicon glyphicon-remove"></i> Remover</a> 

				<a class="btn btn-primary" href="licoes.php?curso_id=<?php echo $curso_id  ?>&modulo_id=<?php echo $id ?>" role="button"><i class="glyphicon glyphicon-open-file"></i> Liçoes</a> 

			</td>
		</tr>
	<?php
		}
	?>
	</tbody>

</table>
<?php
$stmt->close();
include 'conf/footer.php';
?>
