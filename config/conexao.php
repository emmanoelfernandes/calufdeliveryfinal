<?php
date_default_timezone_set('America/Belem');

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "fluxcaluf";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

        mysqli_query($conn,"SET NAMES 'utf8'");
	mysqli_query($conn,'SET character_set_connection=utf8');
	mysqli_query($conn,'SET charecter_set_client=utf8');
	mysqli_query($conn,'SET charecter_set_results=utf8');
	?>
        