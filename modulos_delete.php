<?php
if (isset($_GET['id'])){

include 'conf/conn.php';

$stmt = $conn->prepare("delete from modulos where modulo_id = ? ");

if (!$stmt) {
	echo "erro ao preparar stmt";
	die;
}

$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

$stmt->close();

$conn->close();
?>
<script>
	alert('Registro removido com sucesso.');
</script>
<?php
}
?>
<script>
	window.location = 'modulos.php?curso_id=<?php echo $_GET['curso_id']?>';
</script>