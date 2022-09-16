<?php
ini_set('display_errors', 1);

$variavel_controle = 0;

$nome = $_POST['nome_laboratorio'];



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


$query = mysqli_query($con, "SELECT * FROM tb_laboratorio");



while($prod = mysqli_fetch_array($query)){
	$nome_b = $prod['nome_laboratorio'];


	if($nome== $nome_b){

		$variavel_controle = 1;	

	}
}

if ($variavel_controle == 0){



	$sql = " INSERT INTO tb_laboratorio ( nome_laboratorio) VALUES ( '{$nome}') ";

	mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../estilos/estilo.css" rel="stylesheet">
	<title>Laboratório</title>
	<?php require '../estilos/bootstrap.php' ?>
	<?php require '../estilos/menu.php' ?>
</head>
<body>
<div class="center">
	<?php
		if ($variavel_controle == 0) {

		 ?>
	<div class="alert alert-success" role="alert">
	
		Laboratório cadastrado com sucesso!
	</div>

  	<?php
  		} 
  		else{ ?>
  			<div class="alert alert-danger" role="alert">
  				Não foi possível cadastrar o laboratório. Nome já existente no banco.
  		<?php }

  	  ?>

</div>

</body>
</html>

