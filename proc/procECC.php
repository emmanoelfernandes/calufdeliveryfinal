<?php
     
    if (isset($_POST['nome']) && $_POST['editar']) {

//  
//     $data = $_POST['data'];
//      $tipo =  $_POST['tipo'];
        $codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
       $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
        $cep = mysqli_real_escape_string($conn, trim($_POST['cep']));
        $end = mysqli_real_escape_string($conn, trim($_POST['end']));
        $num = mysqli_real_escape_string($conn, trim($_POST['num']));
        $comp = mysqli_real_escape_string($conn, trim($_POST['comp']));
        $ponto = mysqli_real_escape_string($conn, trim($_POST['ponto']));
        $bairro = mysqli_real_escape_string($conn, trim($_POST['bairro']));
        $uf = mysqli_real_escape_string($conn, trim($_POST['uf']));
        $cidade = mysqli_real_escape_string($conn, trim($_POST['cidade']));
        $celular = mysqli_real_escape_string($conn, trim($_POST['celular']));
//        $valor = mysqli_real_escape_string($conn, trim($_POST['valor']));
//        $number = str_replace(',','.',str_replace('.','',$valor));
//        $numberr = str_replace(',','.',str_replace(',','.',$number));
//          $numberrr = str_replace(',','.',str_replace('R$','',$numberr));
    }
//    "UPDATE funcionario "
//                . "SET nomeFuncionario='$nome', cargoFuncionario = '$cargo', senhaFuncionario = '$senha' WHERE idFuncionario = '$codigo'");	
    
    mysqli_query($conn,"UPDATE cliente "
            . " SET nome_cliente='$nome',"
            . "cep_cliente='$cep',"
            . "endereco_cliente='$end',"
            . "numeroCasa_cliente='$num',"
            . "cliente_complemento='$comp',"
            . "bairro_cliente='$bairro',"
            . "estado_cliente='$uf',"
            . "cidade_cliente='$cidade',"
            . "celular_cliente='$celular',"
            . "ponto_cliente='$ponto'"
            . "  WHERE id_cliente = '$codigo'");
            
    
if(mysqli_affected_rows($conn) == 0){
    echo mysqli_error($conn);
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
				<script type=\"text/javascript\">
					alert(\"ERRO ao editar.\");
				</script>";
    exit();
} else {
    
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=lc'>
				<script type=\"text/javascript\">
					alert(\"Editado com Sucesso.\");
				</script>";
       
    exit();
}

 ?>