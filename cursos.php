<?php
include 'conf/header.php';

$stmt = $conn->prepare("SELECT c.curso_id,c.curso_nome,	c.curso_descricao, a.area_nome FROM cursos c inner join areas a on a.area_id = c.curso_area_id order by a.area_nome,c.curso_nome");

if (!$stmt) {
	echo "erro ao preparar stmt";
	die;
}

$stmt->execute();
$stmt->bind_result($id,$nome,$descricao,$area);

?>


<h2>Cursos</h2>

<a class="btn btn-success" href="cursos_edit.php?id=0" role="button"><i class="glyphicon glyphicon-plus"></i> Novo curso</a>
<p/> 
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Area</th>
			<th>Nome</th>
			<th>Descriçao</th>
			<th>Opçoes</th>
		</tr>
	</thead>

	<tbody>
	<?php
		while($stmt->fetch()){
	?>
		<tr>
			<td><?php echo htmlspecialchars($area)?></td>
			<td><?php echo htmlspecialchars($nome)?></td>
			<td><?php echo htmlspecialchars($descricao)?></td>
			<td> 
				<a class="btn btn-success" href="cursos_edit.php?id=<?php echo $id ?>" role="button"><i class="glyphicon glyphicon-pencil"></i> Editar</a> 
				<a class="btn btn-danger" href="cursos_delete.php?id=<?php echo $id ?>" onclick="return confirm('Deseja realmente remover?');" role="button"><i class="glyphicon glyphicon-remove"></i> Remover</a> 

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
