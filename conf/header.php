<?php
include 'conf/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Modulo de treinamento</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
 
  $(function(){


  tinymce.init({
    language : 'pt_BR',
      selector: "textarea",
      setup: function (editor) {
        editor.on('change', function () {
          tinymce.triggerSave();
        });
      },
      plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste "
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"

   });
  });
  </script>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Modulo de treinamento</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        <?php
          if (isset($_SESSION['usuarioLogado'])) {
        ?>
    
          <ul class="nav navbar-nav"> 
            <li class="active"><a href="inicio.php">Inicio</a></li>
            <li><a href="areas.php">Areas</a></li>
            <li><a href="cursos.php">Cursos</a></li>
            <li><a href="#about">Matriculas</a></li>
            <li><a href="#contact">Usuarios</a></li>
          </ul>
        
        <?php
          }
        ?>  
        
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    <div class="sistema">
