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

$data_hoje = date('Y-m-d');
$horas = array("Livre","Livre","Livre","Livre");
$count = count($horas);
$i = 0;
$nome_professor = '';


$con = new mysqli($host, $user, $pass, $banco);


//SELECTS
$query_lab = mysqli_query($con, "SELECT * FROM tb_laboratorio");
$query_agendamento = mysqli_query($con, "SELECT * FROM tb_agendamento WHERE data_agendamento = '$data_hoje'");


while($aux = mysqli_fetch_array($query_agendamento)){
  $hora = $aux['hora_inicio'];

  $contador = 8;
  for ($i=0; $i < $count; $i++) { 

    if($contador == $hora){
      
      $horas[$i] = $aux['id_professor'];
      
      $query_professor = mysqli_query($con, "SELECT * FROM tb_professor WHERE id_professor =  $horas[$i]" );
      while($aux2 = mysqli_fetch_array($query_professor)){
        $nomeprof = $aux2['nome'];
        $horas[$i] = $nomeprof;
      }
    }
    $contador++;
    
  }
 
}

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
      <?php 
       // foreach($horas as $value){ 
        for ($i = 0; $i < $count; $i++){
      ?>
        <td> <?php echo "{$horas[$i]}\n"; ?> </td> <?php } ?>
      </tr><?php  } ?>

    
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
