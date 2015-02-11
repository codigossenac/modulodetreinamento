<?php 
include 'conf/header.php';
?>

<h2>Meus Treinamentos</h2>

<?php 

$stmt_curso = $conn->prepare("select c.curso_id,c.curso_nome,c.curso_descricao,m.matricula_data from matriculas m  inner join usuarios u on u.usuario_id = m.matricula_usuario_id inner join cursos c on c.curso_id = m.matricula_curso_id where u.usuario_login = ?");


if (!$stmt_curso) {
	echo "erro ao preparar stmt";
	die;
}

$stmt_curso->bind_param("s", $_SESSION['usuarioLogado']);


$stmt_curso->execute();
$stmt_curso->bind_result($curso_id,$curso_nome,$curso_descricao,$matricula_data);

$cursos = [];

 while($stmt_curso->fetch()){
 	$cursos[]= array(
 		"curso_id" => $curso_id, 
 		"curso_nome" => $curso_nome, 
 		"curso_descricao" => $curso_descricao, 
 		"matricula_data" => $matricula_data
 	);
 }

$stmt_curso->close();

foreach ($cursos as $i => $value) {
    
    $stmt_concluido = $conn->prepare("select cast((sum(case when p.progresso_licao_id is null then 0 else 1 end)*100)/count(1) as decimal(10,2)) as concluido from matriculas m  
	inner join usuarios u on u.usuario_id = m.matricula_usuario_id 
	inner join cursos c on c.curso_id = m.matricula_curso_id 
	inner join modulos md on md.modulo_curso_id = c.curso_id 
	inner join licoes l on l.licao_modulo_id = md.modulo_id 
	left join progresso p on p.progresso_matricula_id = m.matricula_id and progresso_licao_id = l.licao_id 
	where u.usuario_login = ? and c.curso_id = ? ");


	if (!$stmt_concluido) {
		echo "erro ao preparar stmt";
		die;
	}


	$stmt_concluido->bind_param("si", $_SESSION['usuarioLogado'],$cursos[$i]['curso_id']);

	$stmt_concluido->execute();
	$stmt_concluido->bind_result($porcentagem_concluido);

	$cursos[$i]['porcentagem_concluido'] = $porcentagem_concluido;
	$stmt_concluido->close();
}


echo "<pre>";
var_dump( $cursos);
echo "</pre>";
die;







?>
<style type="text/css">
	
#material .row {
	margin-bottom:5px;
}

#material .row:hover {
	background: #f5f5f5;
}
</style>

<?php while($stmt_curso->fetch()){ ?>

<div class="row">
  <div class="col-md-12"><h3><?php echo htmlspecialchars($curso_nome) ?></h3></div>
</div>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-11">Matriculado em: <?php echo date("d-m-Y", strtotime($matricula_data))?></div>
</div>
<div class="row">
  <div class="col-md-1"></div>
   <div class="col-md-11">	
   <?php echo $curso_descricao ?>
   </div>

</div>


<div id="material"> 

<?php 



?>


<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-11"><h4>Material didatico (<?php echo $porcentagem_concluido;?>)% concluido</h4></div>
</div>


<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-11"><h5>Introduç~ao a linguagem</h5></div>
</div>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">V´ariaveis o que s~ao por onde andam</div>
  <div class="col-md-2">
	<a class="btn btn-success" href="#" role="button"><i class="glyphicon glyphicon-facetime-video"></i></a>
  </div>
</div>


<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">Historia da linguagem</div>
  <div class="col-md-2">
	<a class="btn btn-success" href="#" role="button"><i class="glyphicon glyphicon-book"></i></a> 
  </div>
</div>


<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">marca da linguagem</div>
  <div class="col-md-2">
	<a class="btn btn-info" href="#" role="button"><i class="glyphicon glyphicon-picture"></i></a> 
  </div>
</div>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">aprofundando mais um pouco</div>
  <div class="col-md-2">
	<a class="btn btn-danger" href="#" role="button"><i class="glyphicon glyphicon-lock"></i></a> 
  </div>
</div>

<hr>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-11"><h5>Introduç~ao a linguagem</h5></div>
</div>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">V´ariaveis o que s~ao por onde andam</div>
  <div class="col-md-2">
	<a class="btn btn-danger" href="#" role="button"><i class="glyphicon glyphicon-facetime-video"></i></a>
  </div>
</div>


<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">Historia da linguagem</div>
  <div class="col-md-2">
	<a class="btn btn-danger" href="#" role="button"><i class="glyphicon glyphicon-book"></i></a> 
  </div>
</div>


<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">marca da linguagem</div>
  <div class="col-md-2">
	<a class="btn btn-danger" href="#" role="button"><i class="glyphicon glyphicon-picture"></i></a> 
  </div>
</div>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">aprofundando mais um pouco</div>
  <div class="col-md-2">
	<a class="btn btn-danger" href="#" role="button"><i class="glyphicon glyphicon-lock"></i></a> 
  </div>
</div>
<?php }?>	
</div>
<?php 
include 'conf/footer.php';
?>
