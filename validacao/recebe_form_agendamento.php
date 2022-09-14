<?php
ini_set('display_errors', 1);

$data_agendamento = $_POST['data_agendamento'];
$id_laboratorio = $_POST['labs'];
$id_professor = $_POST['prof'];
$data_hoje = date('Y/m/d');


$data_cria = new DateTime($data_agendamento);
$data_formata = $data_cria->format('Y/m/d');

echo ($data_hoje."\n");
echo ($data_formata."\n");
echo ($id_laboratorio."\n");
echo ($id_professor."\n");


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

$sql = " INSERT INTO tb_agendamento ( data_pedido, data_agendamento, id_professor, id_laboratorio) VALUES ( '{$data_formata}', '{$data_hoje}', {$id_professor}, {$id_laboratorio}) ";


mysqli_query($con, $sql)

?>
