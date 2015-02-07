<?include ('topo.php');?>   
	
		<!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Envio de Remessa de Toners</span></h2>
                        
                     <div class="module-body">
                        <?	
							$estado_Operador = $usuario->estado;
							$operador = $usuario->nome;
							$transporteid = anti_injection($_POST['transporteid']);
							$origem = anti_injection($_POST['origem']);
							if (anti_injection($_POST['recebe'])) {
								$opcao = 1;
							}
							else
								$opcao = 0;
							if ($transporteid != NULL) {	
								if ($opcao == 1) {
									$seleciona = mysql_query("SELECT * from sisu_transito_toners WHERE transitoid = '$transporteid'");
									while($selecionado=mysql_fetch_array($seleciona)) {
										$qtde = $selecionado['quantidade'];
										$pn = $selecionado['partnumber'];
										$movimenta = mysql_query("UPDATE sisu_estoque SET estoque_qtde=estoque_qtde+$qtde WHERE estoque_PartNumber = '$pn' AND estoque_estado = '$estado_Operador'");
										if (!$movimenta)
											mysql_query("INSERT INTO sisu_estoque VALUES ('','$pn','$estado_Operador','$qtde','')");
										$altera = mysql_query("UPDATE sisu_transito SET transito_receptor='$operador', transito_status='Recebido', transito_datarecepcao=NOW(), transito_horarecepcao=NOW() WHERE transito_id = '$transporteid'");
									}
									echo "<Center>Transporte Nº: <b>$transporteid</b> Recebido.</center>";
								}
								elseif ($opcao == 0) {
									$seleciona = mysql_query("SELECT * from sisu_transito_toners WHERE transitoid = '$transporteid'");
									while($selecionado=mysql_fetch_array($seleciona)) {
										$qtde = $selecionado['quantidade'];
										$pn = $selecionado['partnumber'];
										$alteraestoque = mysql_query("UPDATE sisu_estoque SET estoque_qtde=estoque_qtde+$qtde WHERE estoque_PartNumber = '$pn' AND estoque_estado = '$origem'");
									}
									$altera = mysql_query("UPDATE sisu_transito SET transito_receptor='$operador', transito_status='Recusado', transito_datarecepcao=NOW(), transito_horarecepcao=NOW() WHERE transito_id = '$transporteid'");
									echo "<center>Transporte Nº: <b>$transporteid</b> Recusado.</center>";
								}
							}	
						?>
							<br><br>
							<form action="receber_transporte.php">
								<Center><input type="submit" value="Voltar" class="submit-green"></center>
							</form>
                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
            
          
               
	</body>
</html>