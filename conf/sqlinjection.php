<?php
function anti_injection($string){

  $string = str_ireplace(" or ", "", $string);
  $string = str_ireplace("select ", "", $string);
  $string = str_ireplace("delete ", "", $string);
  $string = str_ireplace("create ", "", $string);
  $string = str_replace("#", "", $string);
  $string = str_replace("=", "", $string);
  $string = str_replace("--", "", $string);
  $string = str_replace(";", "", $string);
  $string = str_replace("*", "", $string);
  $string = trim($string);
  $string = strip_tags($string);
  $string = addslashes($string);

  return $string;
}

//aqui eu pego todos os dados vindos do form 
//e tratos todos de uma vez e já cria as variaveis correspondentes
foreach ($_POST as $campo => $valor) {
   $$campo = anti_injection ($valor);
}
?>