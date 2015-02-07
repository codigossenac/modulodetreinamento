<?php

require_once('conf/conn.php');
require_once('conf/sqlinjection.php');
$objLogin = new Login();

	// Verificando se o usuário está logado, caso contrá será redirecionado para a página de login
	if (!$objLogin->verificar('index.php'))
		// Finalizado o script, apenas para garantir que o usuário irá ver o conteúdo da página
		exit;
	// Selecionando informações do usuário
	$query = mysql_query("SELECT idfuncionario,funcionario_nome,funcionario_email FROM funcionario WHERE idfuncionario = {$objLogin->getID()}");
	$usuario = mysql_fetch_object($query);
	$nome = $usuario->funcionario_nome;
	$email = $usuario->funcionario_email;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aulas Online</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>

<body>
	<div id="container">
    	<div id="header">
        	<h2>Aulas Online</h2>
    <div id="topmenu">
            	<ul>
                	<li class="current"><a href="logado.php">Meus Cursos</a></li>
                    <li><a href="#">Meus Certificados</a></li>
                	<li><a href="cursos.php">Cursos Disponíveis</a></li>
                    <li><a href="#">Meus Dados</a></li>
                    <li><a href="#">Ajuda Online</a></li>
          </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
					<li><b>Bem Vindo, </b><?php echo $nome." - Email: $email"; ?></li>
                </ul>
            </div>
      </div>
        <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>Meus Cursos</h3>
                	<table width="100%">
						<thead>
							<tr>
                            	<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th><a href="#">Nome</a></th>
                                <th width="150px"><a href="#">Área</a></th>
                                <th width="50px"><a href="#">%</a></th>
                                <th width="90px"><a href="#">Data de Inicio</a></th>
                            </tr>
						</thead>
						<tbody>
						<? $busca_cursos = mysql_query("SELECT c.id,c.curso,c.area,m.id,m.curso_id,m.usuario_id,m.data FROM pro_cursos c JOIN pro_matricula m ON m.curso_id = c.id");
							while($resultado = mysql_fetch_array($busca_cursos)) {
							$nomecurso = $resultado['curso'];
							$idcurso = $resultado['id'];
							$nomemodulo = $resultado['modulo'];
							$areacurso = $resultado['area'];
							$data = $resultado['data'];
							echo "
							<tr>
                            	<td class=\"a-center\">$idcurso</td>
                            	<td><Center><a href=\"curso.php?id=$idcurso\">$nomecurso</a></center></td>
                                <td><Center>$areacurso</center></td>
                                <td><Center>60%</center></td>
                                <td><Center>$data</center></td>
                                
                            </tr>";}?>
							
                            
						</tbody>
					</table>
                   
                </div>
                <br />
               

                </div>
            </div>
            <div id="sidebar">
  				<ul>
                	<li><h3><a href="#" class="folder_table">Menu Cursos</a></h3>
                        <ul>
                        	<li><a href="#" class="addorder">Meus Cursos</a></li>
                    		<li><a href="#" class="addorder">Meus Certificados</a></li>
                            <li><a href="cursos.php" class="addorder">Cursos Disponíveis</a></li>
                        </ul>
                    </li>
                   
                  <li><h3><a href="#" class="user">Meus Dados</a></h3>
          				<ul>
                            <li><a href="#" class="group">Alterar Dados</a></li>
                            <li><a href="#" class="group">Alterar Senha</a></li>
                            <li><a href="#" class="online">Sair</a></li>
                        </ul>
                    </li>
				</ul>       
          </div>
      </div>
	  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="footer">
        <div id="credits">
   		
        </div>
        <div id="styleswitcher">
            <ul>
                <li><a href="javascript: document.cookie='theme='; window.location.reload();" title="Red" id="defswitch">d</a></li>
                <li><a href="javascript: document.cookie='theme=1'; window.location.reload();" title="Default" id="blueswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=2'; window.location.reload();" title="Green" id="greenswitch">g</a></li>
                <li><a href="javascript: document.cookie='theme=3'; window.location.reload();" title="Brown" id="brownswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=4'; window.location.reload();" title="Mix" id="mixswitch">m</a></li>
            </ul>
        </div><br />

        </div>
</div>
</body>
</html>
