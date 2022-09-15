<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="estilos/estilo.css" rel="stylesheet">
	<?php require 'estilos/bootstrap.php' ?>
</head>
<body>


<?php 

ini_set('display_errors', 1);
$host = "localhost";
$user= "root";
$pass = "";
$banco = "bd_agenda_lab";
 
$con = new mysqli($host, $user, $pass, $banco);


//Select laboratórios
$query_lab = mysqli_query($con, "SELECT * FROM tb_laboratorio");


//Select agendamento
$query_agendamento = mysqli_query($con, "SELECT * FROM tb_agendamento");


//Select professores
$query_professor = mysqli_query($con, "SELECT * FROM tb_professor");



?>



<!-- Menu próprio do index -->

<nav class="navbar" >

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">IFRO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="agendamento/agendamento.php">Agendamento</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="professor/cadProfessor.php">Professor</a>
      </li>
      <li class="nav-item">
      	<a class="nav-link" href="laboratorio/cadLaboratorio.php">Laboratório</a>
      </li>
    </ul>
  </div>
</nav>

</nav>

<!-- Final Menu -->

<!-- Manhã -->
<table class="table">
	<!-- Horários -->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">08h</th>
      <th scope="col">09h</th>
      <th scope="col">10h</th>
      <th scope="col">11h</th>
    </tr>
  </thead>
  <!--Laboratórios-->
  <tbody>
    <?php while($prod = mysqli_fetch_array($query_lab)){ ?>
    <tr>
      <th scope="row"><?php echo($prod['nome']) ?></th> 
      <td>Fulano</td>
      <td>Fulano</td>
      <td>Livre</td>
      <td>Livre</td>
    </tr>  <?php } ?>
    
    <!--<tr>
      <th scope="row">Informática A</th>
      <td>Fulano</td>
      <td>Fulano</td>
      <td>Livre</td>
      <td>Livre</td>
    </tr> -->

  </tbody>
</table>

<!-- Tarde -->


</body>
</html>
