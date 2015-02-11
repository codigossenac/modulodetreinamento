<?php
include 'conf/requerLogin.php';
include 'conf/header.php';

$stmt = $conn->prepare("SELECT usuario_id,usuario_nome,usuario_login,usuario_tipo FROM usuarios order by usuario_nome");

if (!$stmt) {
	echo "erro ao preparar stmt";
	die;
}

$stmt->execute();
$stmt->bind_result($id,$nome,$login,$tipo);

?>


<h2>Usuarios</h2>

<a class="btn btn-success" href="usuarios_edit.php?id=0" role="button"><i class="glyphicon glyphicon-plus"></i> Novo Usuario</a>
<p/> 
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>login</th>
			<th>Tipo</th>
			<th>Opçoes</th>
		</tr>
	</thead>

	<tbody>
	<?php
		while($stmt->fetch()){
	?>
		<tr>
			<td><?php echo htmlspecialchars($nome)?></td>
			<td><?php echo htmlspecialchars($login)?></td>
			<td><?php echo htmlspecialchars($tipo)?></td>

			<td> 
				<a class="btn btn-success" href="usuarios_edit.php?id=<?php echo $id ?>" role="button"><i class="glyphicon glyphicon-pencil"></i> Editar</a> 
				<a class="btn btn-danger"  href="usuarios_delete.php?id=<?php echo $id ?>" onclick="return confirm('Deseja realmente remover?');" role="button"><i class="glyphicon glyphicon-remove"></i> Remover</a> 
				<a class="btn btn-primary" href="matriculas.php?usuario_id=<?php echo $id ?>" role="button"><i class="glyphicon glyphicon-list-alt"></i> Matriculas</a> 
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
