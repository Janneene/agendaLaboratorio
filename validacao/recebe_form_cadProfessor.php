<?php
ini_set('display_errors', 1);

$variavel_controle = 0;

$nome = $_POST['nome_professor'];
$matricula = $_POST['matricula'];
$telefone = $_POST['telefone'];


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

$query = mysqli_query($con, "SELECT * FROM tb_professor");



while($prod = mysqli_fetch_array($query)){
	$nome_b = $prod['nome_professor'];
	$matricula_b = $prod['matricula']; 


	if($nome== $nome_b){
		if($matricula_b == $matricula){
			$variavel_controle = 1;	
		}
	}
}

if ($variavel_controle == 0){



	$sql = " INSERT INTO tb_professor ( nome_professor, matricula, telefone) VALUES ( '{$nome}',{$matricula}, '{$telefone}') ";

	mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../estilos/estilo.css" rel="stylesheet">
	<title>Professor</title>
	<?php require '../estilos/bootstrap.php' ?>
	<?php require '../estilos/menu.php' ?>
</head>
<body>
<div class="center">
	<?php
		if ($variavel_controle == 0) {

		 ?>
	<div class="alert alert-success" role="alert">
	
		Professor cadastrado com sucesso!
	</div>

  	<?php
  		} 
  		else{ ?>
  			<div class="alert alert-danger" role="alert">
  				Não foi possível cadastrar o professor, dados repetidos com o que estão armazenados no banco.
  		<?php }

  	  ?>

</div>

</body>
</html>

