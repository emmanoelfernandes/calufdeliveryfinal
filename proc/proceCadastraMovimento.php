 
     <?php
     
    if (isset($_POST['acao']) && $_POST['acao'] == 1) {

  
     $data = $_POST['data'];
      $tipo =  $_POST['tipo'];
       $cat = mysqli_real_escape_string($conn, trim($_POST['cat']));
        $descricao = mysqli_real_escape_string($conn, trim($_POST['descricao']));
        $valor = mysqli_real_escape_string($conn, trim($_POST['valor']));
        $number = str_replace(',','.',str_replace('.','',$valor));
        $numberr = str_replace(',','.',str_replace(',','.',$number));
          $numberrr = str_replace(',','.',str_replace('R$','',$numberr));
    }
    mysqli_query($conn,"INSERT INTO movimentacao (nomeMovimentacao,valorMovimentacao,tipoMovimentacao,dataMovimentacao,usuarioMovimentacao_idUsuario,categoriaMovimentacao_idCategoria) values "
            . "('$descricao','$numberrr','$tipo','$data','".$_SESSION['idUsuario']."','$cat')");
    
if(mysqli_insert_id($conn) == 0){
    echo mysqli_error($conn);
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '10;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"ERRO ao cadastrar movimentação.\");
				</script>";
    exit();
} else {
    
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Movimentação Cadastrado com Sucesso.\");
				</script>";
       
    exit();
}

 ?>