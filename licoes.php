<?php
include 'conf/header.php';

$stmt = $conn->prepare("SELECT licao_id,licao_nome,licao_tipo,licao_ordem FROM licoes where licao_modulo_id = ? order by licao_ordem");

if (!$stmt) {
	echo "erro ao preparar stmt";
	die;
}
$stmt->bind_param("i", $_GET['modulo_id']);
$stmt->execute();
$stmt->bind_result($id,$nome,$tipo,$ordem);
?>
<h2>Liçoes</h2>

<a class="btn btn-success" href="licoes_edit.php?curso_id=<?php echo $_GET['curso_id']?>&modulo_id=<?php echo $_GET['modulo_id']?>&id=0" role="button"><i class="glyphicon glyphicon-plus"></i> Nova Liçao</a>
 <a href="modulos.php?curso_id=<?php echo $_GET['curso_id']?>" class="btn btn-danger">voltar</a>
<p/> 
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Tipo</th>
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
			<td><?php echo htmlspecialchars($tipo)?></td>
			<td><?php echo htmlspecialchars($ordem)?></td>
			<td> 
				<a class="btn btn-success" href="licoes_edit.php?curso_id=<?php echo $_GET['curso_id']?>&modulo_id=<?php echo $_GET['modulo_id']?>&id=<?php echo $id ?>" role="button"><i class="glyphicon glyphicon-pencil"></i> Editar</a> 
				<a class="btn btn-danger" href="licoes_delete.php?curso_id=<?php echo $_GET['curso_id']?>&modulo_id=<?php echo $_GET['modulo_id']?>&id=<?php echo $id ?>" onclick="return confirm('Deseja realmente remover?');" role="button"><i class="glyphicon glyphicon-remove"></i> Remover</a> 

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
