<?php 

ini_set('display_errors', 1);


$host = "localhost";
$user= "root";
$pass = "";
$banco = "bd_agenda_lab";
 
$con = new mysqli($host, $user, $pass, $banco);
  
if($con->connect_errno)
{
  echo"Falha na conexao";
}else{
  //echo"Funcionou";
}


$arrayLab = array();
$arrayProf = array();
$arrayData = array();
$arrayHoraInicio = array();
$arrayHoraFim = array();
$tamanhoArray = 0;

$query_lista = mysqli_query($con, "SELECT * FROM tb_agendamento INNER JOIN tb_laboratorio ON tb_agendamento.id_laboratorio = tb_laboratorio.id_laboratorio 
  INNER JOIN tb_professor ON tb_agendamento.id_professor = tb_professor.id_professor 
  ORDER BY tb_agendamento.data_agendamento DESC");

while($aux = mysqli_fetch_array($query_lista)){
  array_push($arrayLab, $aux['nome_laboratorio']);
  array_push($arrayProf, $aux['nome_professor']);
  array_push($arrayData, $aux['data_agendamento']);
  array_push($arrayHoraInicio, $aux['hora_inicio']);
  array_push($arrayHoraFim, $aux['hora_fim']);

  $tamanhoArray = count($arrayLab);
}


//SELECT id FROM table ORDER BY date DESC
?>
<!-- deixar em lista e ordenar por data -->
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
<!-- Menu próprio do index -->

<nav class="navbar" >

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="imagem/logo_ifro.png" alt="IFRO logo" width="30" height="30">
    </a>
  </div>
  <a class="navbar-brand" href="index.php">IFRO</a>
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
      <li class="nav-item">
        <a class="nav-link" href="relatorio/relatorio.php">Relatório</a>
      </li>
    </ul>
  </div>
</nav>

</nav>

<!-- Final Menu -->

<!-- Manhã -->
<table class="table">
  <!-- Horários -->
  <!--Laboratórios-->
  <tbody>

    <tr>
      <th> Laboratório </th>
      <th> Professor </th>
      <th> Data Agendada </th>
      <th> Hora início </th>
      <th> Hora Fim </th> 
    </tr>
    <?php for ($i=0; $i < $tamanhoArray ; $i++) { ?>
      <tr>
        <td> <?php  echo($arrayLab[$i]);  ?> </td>
        <td> <?php  echo($arrayProf[$i]);  ?> </td>
        <td> <?php  echo date('d/m/Y', strtotime ($arrayData[$i])); ?></td>
        <td> <?php  echo($arrayHoraInicio[$i]);  ?> h</td>
        <td> <?php  echo($arrayHoraFim[$i]);  ?> h</td>
      </tr>
    <?php }



    ?>
    

  </tbody>
</table>

<!-- Tarde -->


</body>
</html>
