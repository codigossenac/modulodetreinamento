<?php



include 'conf/header.php';
?>



      <div class="row">
      <div class="col-xs-6">
          <div class="well">
              <form id="loginForm" method="POST" action="logar.php" >
                  <div class="form-group">
                      <label for="login" class="control-label">Login:</label>
                      <input type="text" class="form-control" id="login" name="login" value="" placeholder="">
                      <span class="help-block"></span>
                  </div>
                  <div class="form-group">
                      <label for="senha" class="control-label">Senha:</label>
                      <input type="password" class="form-control" id="senha" name="senha">
                      <span class="help-block"></span>
                  </div>
                  <?php 
                    if (isset($_GET['erro'])) {
                  ?>
                    <div  class="alert alert-danger">Usuario ou senha invalidos</div>
                  <?php 
                    }
                  ?>
                  
                  <button type="submit" class="btn btn-success btn-block">Acessar</button>
              </form>
          </div>
      </div>
      <div class="col-xs-6">
          <p class="lead">Sistema de Treinamento</p>
          <p>O módulo de treinamento tem o objetivo de proporcionar aos funcionários  da empresa o acesso à
           treinamentos na plataforma WEB, visando a melhoria do desempenho de suas funções, resultando no 
           desenvolvimento e crescimento da empresa.
           </p>
           <p>
          O aperfeiçoamento contínuo e planejado dos colaboradores é uma das formas de se alcançar vantagens 
          competitivas sobre os concorrentes. 
          </p>
           <p>
          O módulo Treinamento possibilita o controle total das rotinas de planejamento, execução e avaliação 
          dos treinamentos dos funcionários.
          </p>
           <p>
          Vejamos agora alguns benefícios atingidos com a realização de um programa de treinamento. São eles:
          </p>
          <ul >
                <li>Aumento de produtividade</li>
                <li>Redução de custos</li>
                <li>Melhoria da qualidade</li>
                <li>Redução na rotatividade de pessoal</li>
                <li>Flexibilidade dos empregados</li>
                <li>Entrosamento</li>
                <li>Empresa mais competitiva</li>
                <li>Descobertas de novas aptidões e habilidades</li>
                
          </ul>
            

      </div>
<?php
include 'conf/footer.php';
?>