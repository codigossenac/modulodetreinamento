
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
                	<li><a href="#">Cursos Disponíveis</a></li>
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
                                <th width="80px"><a href="#">Área</a></th>
                                <th width="200px"><a href="#">Descrição</a></th>
                            </tr>
						</thead>
						<tbody>						
						<? $busca_cursos = mysql_query("SELECT * FROM pro_cursos ORDER by id");
							while($resultado = mysql_fetch_array($busca_cursos)) {
							$nomecurso = $resultado['curso'];
							$idcurso = $resultado['id'];
							$areacurso = $resultado['area'];
							$descricao = $resultado['descricao'];
							$modulo = $resultado['modulo_id'];
							$permissao = $modulo+1;
							echo "
							<tr>
                            	<td class=\"a-center\">$idcurso</td>
                            	<td><Center><a href=\"#\">$nomecurso</a></center></td>
                                <td><Center>$areacurso</center></td>
                                <td><Center>$descricao</center></td>
                                
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
                            <li><a href="#" class="addorder">Cursos Disponíveis</a></li>
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
        </div><br/>

        </div>
</div>
</body>
</html>
