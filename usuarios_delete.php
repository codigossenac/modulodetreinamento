<?php
include 'conf/requerLogin.php';
if (isset($_GET['id'])){

include 'conf/conn.php';

$stmt = $conn->prepare("delete from usuarios where usuario_id = ? ");

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
	window.location = 'usuarios.php';
</script>