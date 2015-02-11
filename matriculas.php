<?php
include 'conf/requerLogin.php';
include 'conf/header.php';


$usuario_id = $_GET['usuario_id'];


$stmt = $conn->prepare("SELECT m.matricula_id,m.matricula_data,m.matricula_curso_id,m.matricula_usuario_id,c.curso_nome FROM matriculas m inner join cursos c on c.curso_id = m.matricula_curso_id where m.matricula_usuario_id=? order by c.curso_nome");

if (!$stmt) {
	echo "erro ao preparar stmt";
	die;
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->bind_result($id,$data,$curso_id,$usuario_id,$curso_nome);

?>


<h2>Matriculas</h2>

<a class="btn btn-success" href="matriculas_edit.php?usuario_id=<?php echo $usuario_id  ?>&id=0" role="button"><i class="glyphicon glyphicon-plus"></i> Nova matricula</a>
  <a href="usuarios.php" class="btn btn-danger">voltar</a>
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
			<td><?php echo date("d-m-Y", strtotime($data))?></td>
			<td><?php echo htmlspecialchars($curso_nome)?></td>
			<td> 
				<a class="btn btn-danger" href="matriculas_delete.php?usuario_id=<?php echo $usuario_id  ?>&id=<?php echo $id ?>" onclick="return confirm('Deseja realmente remover?');" role="button"><i class="glyphicon glyphicon-remove"></i> Remover</a> 
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
