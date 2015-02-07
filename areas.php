<?php
include 'conf/header.php';

$stmt = $conn->prepare("SELECT area_id,area_nome FROM areas order by area_nome");

if (!$stmt) {
	echo "erro ao preparar stmt";
	die;
}

$stmt->execute();
$stmt->bind_result($id,$nome);

?>


<h2>Areas</h2>

<a class="btn btn-success" href="areas_edit.php?id=0" role="button"><i class="glyphicon glyphicon-plus"></i> Nova area</a>
<p/> 
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Opçoes</th>
		</tr>
	</thead>

	<tbody>
	<?php
		while($stmt->fetch()){
	?>
		<tr>
			<td><?php echo htmlspecialchars($nome)?></td>
			<td> 
				<a class="btn btn-success" href="areas_edit.php?id=<?php echo $id ?>" role="button"><i class="glyphicon glyphicon-pencil"></i> Editar</a> 
				<a class="btn btn-danger" href="areas_delete.php?id=<?php echo $id ?>" onclick="return confirm('Deseja realmente remover?');" role="button"><i class="glyphicon glyphicon-remove"></i> Remover</a> 

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
