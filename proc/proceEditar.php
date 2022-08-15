<?php
if(isset($_POST['btnEditar'])){
       // $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $id = mysqli_real_escape_string($conn, trim($_POST['idEditar']));
    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $data = mysqli_real_escape_string($conn, trim($_POST['data']));
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));
    $valor = mysqli_real_escape_string($conn, trim($_POST['valor']));
    $tipo = mysqli_real_escape_string($conn, trim($_POST['tipo']));
    $usuario = mysqli_real_escape_string($conn, trim($_SESSION['idUsuario']));
   // $nome = mysqli_real_escape_string($conexao, $produto->nome);
    
    $valor = mysqli_real_escape_string($conn, trim($_POST['valor']));
    $number = str_replace(',','.',str_replace('.','',$valor));
    $numberr = str_replace(',','.',str_replace(',','.',$number));
    $numberrr = str_replace(',','.',str_replace('R$','',$numberr));
    //$idCat = $resultado['idCategoria'];
            

$updateFuncionario = mysqli_query($conn, "UPDATE movimentacao  SET nomeMovimentacao = '$nome', valorMovimentacao = '$numberrr',"
        . " tipoMovimentacao = '$tipo', "
        . " dataMovimentacao = '$data', " . " usuarioMovimentacao_idUsuario = '$usuario',"
        . " categoriaMovimentacao_idCategoria = '$categoria'  WHERE idMovimentacao = '$id' ");	


		if(mysqli_affected_rows($conn) == 1){
		          echo mysqli_error($conn);
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Alterado com Sucesso.\");
				</script>
			";
                            exit();
                    
		}else{
                    echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '10;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"ERRO: Não pode ser alterado.\");
				</script>
			";	
                        exit();
              
}}

                
                
                

                if(isset($_POST['btnPagParcialQED'])){
       // $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $id = mysqli_real_escape_string($conn, trim($_POST['idEditar']));
    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $data = mysqli_real_escape_string($conn, trim($_POST['data']));
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));
    
    $pagParcial = mysqli_real_escape_string($conn, trim($_POST['pagParcial']));
    $number = str_replace(',','.',str_replace('.','',$pagParcial));
        $numberr = str_replace(',','.',str_replace(',','.',$number));
          $numberrr = str_replace(',','.',str_replace('R$','',$numberr));
          
    $tipo = mysqli_real_escape_string($conn, trim($_POST['tipo']));
    $usuario = mysqli_real_escape_string($conn, trim($_SESSION['idUsuario']));
   // $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $valor = mysqli_real_escape_string($conn, trim($_POST['valor']));    
    
    
          @$restante = $valor - $numberrr;
          $numberp = str_replace(',','.',str_replace('.','',$restante));
        $numberrp = str_replace(',','.',str_replace(',','.',$numberp));
          $numberrrp = str_replace(',','.',str_replace('R$','',$numberrp));
    //$number = str_replace(',','.',str_replace('.','',$valor));
        //$numberr = str_replace(',','.',str_replace(',','.',$number));
          //$numberrr = str_replace(',','.',str_replace('R$','',$numberr));
    //$idCat = $resultado['idCategoria'];
//@$tipo1 = 2;           
if($restante){

    
    mysqli_query($conn, "UPDATE movimentacao  SET nomeMovimentacao = '$nome', valorMovimentacao = '$numberrrp',"
        . " tipoMovimentacao = '$tipo', "
        . " dataMovimentacao =  '$data', usuarioMovimentacao_idUsuario = '$usuario',"
        . " categoriaMovimentacao_idCategoria = '$categoria'  WHERE idMovimentacao = '$id' ");	
@$tipobQED = 2;
mysqli_query($conn,"INSERT INTO movimentacao (nomeMovimentacao,valorMovimentacao,tipoMovimentacao,dataMovimentacao,usuarioMovimentacao_idUsuario,categoriaMovimentacao_idCategoria) values "
            . "('$nome','$numberrr','$tipobQED','".date('Y-m-d H:i:s')."','".$_SESSION['id']."','$categoria')");

}
    if(mysqli_affected_rows($conn) != 1){
		          echo mysqli_error($conn);
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '150;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Não foi alterado com Sucesso.\");
				</script>
			";
                            exit();
                    
		}else{
                    echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Alterado com Sucesso.\");
				</script>
			";	
                        exit();
              
                }}

                 

                if(isset($_POST['btnPagParcialQMD'])){
       // $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $id = mysqli_real_escape_string($conn, trim($_POST['idEditar']));
    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $data = mysqli_real_escape_string($conn, trim($_POST['data']));
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));
    
    $pagParcial = mysqli_real_escape_string($conn, trim($_POST['pagParcial']));
    $number = str_replace(',','.',str_replace('.','',$pagParcial));
        $numberr = str_replace(',','.',str_replace(',','.',$number));
          $numberrr = str_replace(',','.',str_replace('R$','',$numberr));
          
    $tipo = mysqli_real_escape_string($conn, trim($_POST['tipo']));
    $usuario = mysqli_real_escape_string($conn, trim($_SESSION['idUsuario']));
   // $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $valor = mysqli_real_escape_string($conn, trim($_POST['valor']));    
    
    
          @$restante = $valor - $numberrr;
          $numberp = str_replace(',','.',str_replace('.','',$restante));
        $numberrp = str_replace(',','.',str_replace(',','.',$numberp));
          $numberrrp = str_replace(',','.',str_replace('R$','',$numberrp));
    //$number = str_replace(',','.',str_replace('.','',$valor));
        //$numberr = str_replace(',','.',str_replace(',','.',$number));
          //$numberrr = str_replace(',','.',str_replace('R$','',$numberr));
    //$idCat = $resultado['idCategoria'];
//@$tipo1 = 2;           
if($restante){

    
    mysqli_query($conn, "UPDATE movimentacao  SET nomeMovimentacao = '$nome', valorMovimentacao = '$numberrrp',"
        . " tipoMovimentacao = '$tipo', "
        . " dataMovimentacao =  '$data', usuarioMovimentacao_idUsuario = '$usuario',"
        . " categoriaMovimentacao_idCategoria = '$categoria'  WHERE idMovimentacao = '$id' ");	
@$tipobQMD = 1;
mysqli_query($conn,"INSERT INTO movimentacao (nomeMovimentacao,valorMovimentacao,tipoMovimentacao,dataMovimentacao,usuarioMovimentacao_idUsuario,categoriaMovimentacao_idCategoria) values "
            . "('$nome','$numberrr','$tipobQMD','".date('Y-m-d H:i:s')."','".$_SESSION['idUsuario']."','$categoria')");

}
    if(mysqli_affected_rows($conn) != 1){
		          echo mysqli_error($conn);
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '150;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Não foi alterado com Sucesso.\");
				</script>
			";
                            exit();
                    
		}else{
                    echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Alterado com Sucesso.\");
				</script>
			";	
                        exit();
              
                }}
//$insert = mysqli_query($conn, $updateFuncionario);
         
//        if($insert){
//          echo"<script language='javascript' type='text/javascript'>
//          alert('<Alterado com sucesso!');window.location.
//          href='index.php'</script>";
//        }else{
//          echo mysqli_error($conn);
//          echo "
//				<META HTTP-EQUIV=REFRESH CONTENT = '5;URL=index.php'>
//				<script type=\"text/javascript\">
//					alert(\"Não foi possivél alterar a movimentação.\"); 
//                   
//         
//				</script>
//			";
//        }
//		
 
 if(isset($_POST['idEditC'])){
       // $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $id = mysqli_real_escape_string($conn, trim($_POST['idEditarC']));
    
    
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));
    
    
    $usuario = mysqli_real_escape_string($conn, trim($_SESSION['idUsuario']));
   // $nome = mysqli_real_escape_string($conexao, $produto->nome);
    
    //$number = str_replace(',','.',str_replace('.','',$valor));
        //$numberr = str_replace(',','.',str_replace(',','.',$number));
          //$numberrr = str_replace(',','.',str_replace('R$','',$numberr));
    //$idCat = $resultado['idCategoria'];
            

$updateFuncionario = mysqli_query($conn, "UPDATE categoriacaixa  SET categoriacaixa_nome = '$categoria' "
        //. "usuarioMovimentacao_idUsuario = '$usuario',"
        . "  WHERE categoriacaixa_id = '$id' ");	


		if(mysqli_affected_rows($conn) == 1){
		          echo mysqli_error($conn);
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Categoria  foi alterado com Sucesso.\");
				</script>
			";
                            exit();
                    
		}else{
                    echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '1500;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Não foi alterado.\");
				</script>
			";	
                        exit();
              
 }}
