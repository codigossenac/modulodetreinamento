<?php
// Incluindo arquivo de conexão/configuração
require_once('../conf/conn.php');
require_once('../conf/sqlinjection.php');


// Instanciando novo objeto da classe Login
$objLogin = new Login();

// Recuperando informações enviadas
$login = anti_injection($_POST['login']);
$senha = anti_injection($_POST['senha']);

// Se conseguir encontrar o usuário e a senha estiver correta
if ($objLogin->logar($login, $senha))
    // Retornando falso
    echo false;
else
    // Retornando mensagem de erro
    echo '<script type="text/javascript">
alert("Usuario ou senha incorretos, digite novamente...");
</sript>';
	
?>
