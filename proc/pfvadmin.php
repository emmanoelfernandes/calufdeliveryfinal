  
<?php
  

//
//// $frete = 5;
////       @$totalFinal = $frete + $total;
////       if(isset($totalFinal) && $totalFinal == $frete){
////    echo "<script>alert(' Carrinho Vazio ')</script>";
////    echo "<script>window.location = './'</script>";
////}
//
//
//
// //id_txt refere-se ao id do produto no formulario do mais detalhes
//
//if(isset($_POST['id_txt']) || isset($_POST['enviar']) ){
// //isso tudo vem do formulario maisDetalhes
//    @$id = mysqli_real_escape_string($conn, trim($_POST['id_txt']));
//    @$nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
//    @$quantidade = mysqli_real_escape_string($conn, trim($_POST['quantidade']));
//    @$preco = mysqli_real_escape_string($conn, trim($_POST['preco']));     
//    @$descricao = mysqli_real_escape_string($conn, trim($_POST['descricao'])); 
//            @$itens_pedido_obs = mysqli_real_escape_string($conn, trim($_POST['itens_pedido_obs']));
//            
//            
//   //CRIA UM ARRAY CARRINHO PRA JOGAR TUDO NELE         
//  @$meucarrinho [] = array ('id' => $id, 'nome' => $nome, 'quantidade' => $quantidade, 'preco' => $preco, 'descricao' => $descricao,   'itens_pedido_obs' => $itens_pedido_obs);
//} 
////$_SESSION['carrinho'] = $meucarrinho;
//
//if(isset($_SESSION['carrinho'])){    
//     $meucarrinho = $_SESSION['carrinho'] ;
//    if(isset($_POST['id_txt'])){
//    @$id = mysqli_real_escape_string($conn, trim($_POST['id_txt']));
//    @$nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
//    @$quantidade = mysqli_real_escape_string($conn, trim($_POST['quantidade']));
//    @$preco = mysqli_real_escape_string($conn, trim($_POST['preco']));
//    @$descricao = mysqli_real_escape_string($conn, trim($_POST['descricao']));
//    @$itens_pedido_obs = mysqli_real_escape_string($conn, trim($_POST['itens_pedido_obs']));
//    
//    
//    //indice no mesmo local -- fica colocando os itens no carrinho
//    @$pos = -1;
//    for ($i=0; $i< count($meucarrinho); $i++){
//        if($id == @$meucarrinho[$i]['id'] ){
//            $pos = $i;
//            //vai agrupar se for verdadeiro
//        }
//    }   
//    
//    
//
//    //incrementar quantidade se for diferente de menos 1 eee somando uma qunatidade com a outra
////  if($pos<>-1 && isset($meucarrinho['adcional'])){
////        $quant = $meucarrinho[$pos]['quantidade'] + $quantidade;
////     //   $prec = $meucarrinho[$pos]['preco'] + $preco;
////     //   $no = $meucarrinho[$pos]['nome'] + $nome;
////    $meucarrinho [] = array ('id' => $id, 'nome' => $nome, 'quantidade' => $quantidade, 'preco' => $preco, 'descricao' => $descricao,  'adcional' => $adcional, 'tamanho' => $tamanho, 'itens_pedido_obs' => $itens_pedido_obs, 'adcionaltxt' => $adcionaltxt);
////  }
//    if($pos<>-1){
//        $quant = $meucarrinho[$pos]['quantidade'] + $quantidade;
//     //   $prec = $meucarrinho[$pos]['preco'] + $preco;
//    //    $no = $meucarrinho[$pos]['nome'] + $nome;
//  @$meucarrinho [$pos] = array ('id' => $id, 'nome' => $nome, 'quantidade' => $quant, 'preco' => $preco, 'descricao' => $descricao,   'itens_pedido_obs' => $itens_pedido_obs);
//    }else{
//  
//  $meucarrinho [] = array ('id' => $id, 'nome' => $nome, 'quantidade' => $quantidade, 'preco' => $preco, 'descricao' => $descricao, 'itens_pedido_obs' => $itens_pedido_obs);
//}
//}}

    







////atualizar quantidade manual no carrinho
//if(isset($_POST['id2'])){
//$indice = $_POST['id2'];
//$quant = $_POST['quantidade2'];
//$meucarrinho[$indice]['quantidade'] = $quant;
//    
//}//excluir
//if(isset($_POST['id3'])){
//    $indice = $_POST['id3'];
//$meucarrinho[$indice] = NULL;
//    
//}
// 
//
//
//if(isset($meucarrinho)) {
//    $_SESSION['carrinho'] = $meucarrinho;
//}


?>




<!--VERIFICA SE EXISTE O BOTAO ENVIAR SE CLIENTE NAO TA LOGADO-->
<?php 
    if (isset($_POST['finalizar']) && !isset($_SESSION['nomeUsuario'])) {
        echo "<script>alert(' Não existe usuario logado')</script>";
        echo "<script>window.location = './index.php?p=entrar'</script>";
       
        
//       ENTAO VEM PRA CÁ, RECEBE PEDIDO FEITO PELO CLIENTE
 
    }if (isset($_POST['finalizar']) && isset($_SESSION['nomeUsuario'])) {
    @$idCliente = mysqli_real_escape_string($conn, trim($_POST['idCliente']));
           // @$fdp = mysqli_real_escape_string($conn, trim($_POST['fdp']));
    @$troco = mysqli_real_escape_string($conn, trim($_POST['troco']));
    @$tipo = mysqli_real_escape_string($conn, trim($_POST['tipo']));
    $obspedido = mysqli_real_escape_string($conn, trim($_POST['obspedido']));
    @$nomeCompleto = mysqli_real_escape_string($conn, trim($_POST['nome']));
    @$end = mysqli_real_escape_string($conn, trim($_POST['end']));
    @$n = mysqli_real_escape_string($conn, trim($_POST['n']));
    @$b = mysqli_real_escape_string($conn, trim($_POST['b']));
    @$p = mysqli_real_escape_string($conn, trim($_POST['p']));
    @$c = mysqli_real_escape_string($conn, trim($_POST['c']));
    @$nossoEnd = mysqli_real_escape_string($conn, trim($_POST['nossoEnd']));
    @$celular = mysqli_real_escape_string($conn, trim($_POST['celular']));
    @$modo = mysqli_real_escape_string($conn, trim($_POST['modo']));
        
        
        
           //     $obspedido = mysqli_real_escape_string($conn, trim($_POST['obspedido']));
        $fdp = mysqli_real_escape_string($conn, trim($_POST['fdp']));
        $acres = 1;
         if($fdp == "Cartão"){
             $acres = 1;
         } else {
         $acres = 0;    
         }
        
        
        $desco = $_SESSION['desco'];
   //      $tipo = 0;
        
          //     @$tipo = mysqli_real_escape_string($conn, trim($_POST['tipo']));
    //    $desco = mysqli_real_escape_string($conn, trim($_POST['desco']));
           //     $modo = mysqli_real_escape_string($conn, trim($_POST['modo']));
        //     $totalFinal = mysqli_real_escape_string($conn, trim($_POST['totalFinal']));
        $valor = mysqli_real_escape_string($conn, $_SESSION['total']);
        $number = str_replace(',', '.', str_replace('.', '', $valor));
        $numberr = str_replace(',', '.', str_replace(',', '.', $number));
        $numberrr = str_replace(',', '.', str_replace('R$', '', $numberr));
        
        
        
         $troco = mysqli_real_escape_string($conn, trim($_POST['troco']));
        $troc = str_replace(',', '.', str_replace('.', '', $troco));
        $tro = str_replace(',', '.', str_replace(',', '.', $troc));
        $tr = str_replace(',', '.', str_replace('R$', '', $tro));
        
        
        
    if ($_POST['troco'] > 0) {
        $tr;
        } else {
          $tr = 0;  
        }
//      $totalFinal = mysqli_real_escape_string($conn, trim($_POST['totalFinal']));
        $sqlInserirVenda = mysqli_query($conn, "INSERT INTO pedido (pedido_data, pedido_data_hora, pedido_valor, pedido_status,id_usuario,pedido_obs,pedido_fdp,pedido_troco,pedido_tipo,pedido_modo,pedido_desco)"
                . " VALUES ('" . date('Y-m-d') . "','" . date('Y-m-d H:i:s') . "','" . $numberrr . "','0','" . $idCliente . "','$obspedido','$fdp','$tr','$tipo','$modo','$desco')");
        $idVenda = mysqli_insert_id($conn);

            if(count($_SESSION['carrinho']) == 0){
          echo '
        <tr>
          <td colspan="5">Não há produto no carrinho </td>
        </tr>
        
      ';
           echo "<script>alert(' Carrinho está vazio ')</script>";
      echo "<script>window.location = './'</script>";
//    }
           
          } else {
               $_SESSION['desco'] = 0;
               $_SESSION['total'] = 0;
                $total = 0;
               
                //um select na tabale produto usando as quantidade de seession carrinho, o numero q de vai pecorrer o select e ir insertenado na tabele itens pedido
                foreach($_SESSION['carrinho'] as $id => $qtd){
                   
                  
                    
                            $sql   = "SELECT *  FROM produto WHERE produto_id= '$id'";
                        $qr    = mysqli_query($conn,$sql) or die(mysql_error());
                        $ln    = mysqli_fetch_assoc($qr);
                        $nome  = $ln['produto_nome'];
                        $preco = $ln['produto_preco'];
                        $sub   = number_format($ln['produto_preco'] * $qtd, 2, ',', '.');
                        $total += $ln['produto_preco'] * $qtd;
                         $idproduto = $ln['produto_id'];
//                    echo "quantidade ". $qtd;
//                    echo "Produto ID ". $ln['produto_id'];
//                        echo "PRECO " . $ln['produto_preco'];     
        
        
    //    for ($i = 0; $i < count($_SESSION['carrinho']); $i++) {
       //     $id = $_SESSION['carrinho'][$i]['id'];
       //     $nome = $_SESSION['carrinho'][$i]['nome'];
       //     $quantidade = $_SESSION['carrinho'][$i]['quantidade'];
        //    $preco = $_SESSION['carrinho'][$i]['preco'];
         //   $descricao = $_SESSION['carrinho'][$i]['descricacao'];
         //   $itens_pedido_obs = $_SESSION['carrinho'][$i]['itens_pedido_obs'];
            ?>




            <?php
            $sqlInserirItens = mysqli_query($conn, "INSERT INTO itens_pedido(itens_pedido_id_pedido, itens_pedido_id_produto, itens_pedido_quantidade, itens_pedido_valor_produto,itens_pedido_adc,itens_pedido_adc_txt, itens_pedido_obs ,itens_pedido_valor_total, itens_pedido_frete, id_usuario) VALUES "
                    . " ('$idVenda','$idproduto','$qtd','$preco','$acres','0','0','$numberrr','0','" . $idCliente . "')");


            $read_ultimo_item_pedido = mysqli_query($conn, "SELECT itens_pedido_valor_total FROM itens_pedido ORDER BY itens_pedido_id DESC LIMIT 1");
            if (mysqli_num_rows($read_ultimo_item_pedido) > '0') {

                foreach ($read_ultimo_item_pedido as $read_ultimo_item_pedido_view)
                    ;

//        $itt = $read_ultimo_item_pedido_view['itens_pedido_quantidade'] * ( $read_ultimo_item_pedido_view['itens_pedido_valor_produto'] +  $read_ultimo_item_pedido_view['itens_pedido_adc']);
//        $mostrarultimoitem = $itt + $read_ultimo_item_pedido_view['itens_pedido_frete'];


                $read_ultimo_pedido = mysqli_query($conn, "SELECT pedido_id FROM pedido ORDER BY pedido_id DESC LIMIT 1");
                if (mysqli_num_rows($read_ultimo_pedido) > '0') {
                    foreach ($read_ultimo_pedido as $read_ultimo_pedido_view)
                        ;




                    $update_pedido = "UPDATE pedido SET  pedido_valor = '" . $read_ultimo_item_pedido_view['itens_pedido_valor_total'] . "' WHERE pedido_id = '" . $read_ultimo_pedido_view['pedido_id'] . "'";
                    mysqli_query($conn, $update_pedido); //executar query
                    ?>


                    <?php
                } 
            }


unset($_SESSION['desco']);
        unset($_SESSION['total']);
        unset($_SESSION['carrinho']);
      
            //unset($_SESSION['tipo']);

// echo "<META HTTP-EQUIV=REFRESH CONTENT = '1000;URL=index.php?p=carrinho'>";
           echo "<script>alert('Pedido Finalizado Com Sucesso') </script>";
            echo "<script>window.location = './index.php?p=admin'</script>";
              echo "<script>window.onload = './index.php?p=admin'</script>";
           
            
       
            
              
              
              ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
     $para = "emmanoelfernandes@gmail.com";
    $assunto = "Compra no caluf";
    $emaill = "emmanoellopes0@gmail.com";
     $corpo = "Uma compra foi realizada no site";
    
   
   
    $header .= "Content-Type: text/html; charset= utf-8\n";
           $header = "From: $emaill Reply-to: $emaill\n";
    
    mail($para,$assunto,$corpo, $header);
   // echo "The email message was sent.";
            
            
            
            
            
            
                }

    }}
    
?>




<!--RECEBE PEDIDO FEITO PELO ADMNISTRADOR-->
<?php
//if (isset($_POST['finalizar']) && !isset($_SESSION['nomeUsuario'])) {
//    echo "<script>alert(' Não existe usuario sslogado')</script>";
//    echo "<script>window.location = './index.php?p=entrar'</script>";
//}
//if (isset($_POST['finalizar']) && isset($_SESSION['nomeUsuario'])) {
//
//    @$idCliente = mysqli_real_escape_string($conn, trim($_POST['idCliente']));
//    @$fdp = mysqli_real_escape_string($conn, trim($_POST['fdp']));
//    @$troco = mysqli_real_escape_string($conn, trim($_POST['troco']));
//    @$tipo = mysqli_real_escape_string($conn, trim($_POST['tipo']));
//    $obspedido = mysqli_real_escape_string($conn, trim($_POST['obspedido']));
//    @$nomeCompleto = mysqli_real_escape_string($conn, trim($_POST['nome']));
//    @$end = mysqli_real_escape_string($conn, trim($_POST['end']));
//    @$n = mysqli_real_escape_string($conn, trim($_POST['n']));
//    @$b = mysqli_real_escape_string($conn, trim($_POST['b']));
//    @$p = mysqli_real_escape_string($conn, trim($_POST['p']));
//    @$c = mysqli_real_escape_string($conn, trim($_POST['c']));
//    @$nossoEnd = mysqli_real_escape_string($conn, trim($_POST['nossoEnd']));
//    @$celular = mysqli_real_escape_string($conn, trim($_POST['celular']));
//    @$modo = mysqli_real_escape_string($conn, trim($_POST['modo']));
//}
//
//@$valor = mysqli_real_escape_string($conn, $_SESSION['total']);
//$number = str_replace(',', '.', str_replace('.', '', $valor));
//$numberr = str_replace(',', '.', str_replace(',', '.', $number));
//$numberrr = str_replace(',', '.', str_replace('R$', '', $numberr));
//
//@$totalFinal = mysqli_real_escape_string($conn, trim($_POST['totalFinal']));
//$sqlInserirVenda = mysqli_query($conn, "INSERT INTO pedido (pedido_data, pedido_data_hora, pedido_valor, pedido_status,id_usuario,pedido_obs,pedido_fdp,pedido_troco,pedido_tipo,pedido_modo,pedido_desco)"
//        . " VALUES ('" . date('Y-m-d') . "','" . date('Y-m-d H:i:s') . "','$numberr','0','$idCliente','$obspedido','$fdp','$troco','$tipo','$modo','" . $_SESSION['desco'] . "')");
//$idVenda = mysqli_insert_id($conn);
////        $valor = mysqli_real_escape_string($conn, $_POST['totalFinal']);
////$number = str_replace(',','.',str_replace('.','',$valor));
////        $numberr = str_replace(',','.',str_replace(',','.',$number));
////       $numberrr = str_replace(',','.',str_replace('R$','',$numberr));
////      $totalFinal = mysqli_real_escape_string($conn, trim($_POST['totalFinal']));
//
//
//
//if (count($_SESSION['carrinho']) == 0) {
//    echo '
//        <tr>
//          <td colspan="5">Não há produto no carrinho</td>
//        </tr>
//      ';
//} else {
//
//    $total = 0;
//    foreach ($_SESSION['carrinho'] as $id => $qtd) {
//        $sql = "SELECT *  FROM produto WHERE produto_id= '$id'";
//        $qr = mysqli_query($conn, $sql) or die(mysql_error());
//        $ln = mysqli_fetch_assoc($qr);
//        $id = $ln['produto_id'];
//        $nome = $ln['produto_nome'];
//        $catid = $ln['produto_categoria_id'];
//        $preco = $ln['produto_preco'];
//        $sub = number_format($ln['produto_preco'] * $qtd, 2, ',', '.');
//        //$total += $ln['produto_preco'] * $qtd;
//        $total += $ln['produto_preco'] * $qtd;
//
////                   $valor = mysqli_real_escape_string($total);
////$number = str_replace(',','.',str_replace('.','',$valor));
////        $numberr = str_replace(',','.',str_replace(',','.',$number));
////       $numberrr = str_replace(',','.',str_replace('R$','',$numberr));      
//
//
//
//        $sqlInserirItens = mysqli_query($conn, "INSERT INTO itens_pedido(itens_pedido_id_pedido, itens_pedido_id_produto, itens_pedido_quantidade, itens_pedido_valor_produto,itens_pedido_adc,itens_pedido_adc_txt, itens_pedido_obs ,itens_pedido_valor_total, itens_pedido_frete, id_usuario) VALUES "
//                . " ('$idVenda','$id','$qtd','$preco','0','0','0','$numberr','0','$idCliente')");
//
//
//        $read_ultimo_item_pedido = mysqli_query($conn, "SELECT itens_pedido_valor_total FROM itens_pedido ORDER BY itens_pedido_id DESC LIMIT 1");
//        if (mysqli_num_rows($read_ultimo_item_pedido) > '0') {
//
//            foreach ($read_ultimo_item_pedido as $read_ultimo_item_pedido_view)
//                ;
//
////        $itt = $read_ultimo_item_pedido_view['itens_pedido_quantidade'] * ( $read_ultimo_item_pedido_view['itens_pedido_valor_produto'] +  $read_ultimo_item_pedido_view['itens_pedido_adc']);
////        $mostrarultimoitem = $itt + $read_ultimo_item_pedido_view['itens_pedido_frete'];
//
//
//            $read_ultimo_pedido = mysqli_query($conn, "SELECT pedido_id FROM pedido ORDER BY pedido_id DESC LIMIT 1");
//            if (mysqli_num_rows($read_ultimo_pedido) > '0') {
//                foreach ($read_ultimo_pedido as $read_ultimo_pedido_view)
//                    ;
//
//
//
////        '".$read_ultimo_item_pedido_view['itens_pedido_valor_total']."'
//                $update_pedido = "UPDATE pedido SET  pedido_valor = '" . $read_ultimo_item_pedido_view['itens_pedido_valor_total'] . "' WHERE pedido_id = '" . $read_ultimo_pedido_view['pedido_id'] . "'";
//                mysqli_query($conn, $update_pedido); //executar query
//                ?>


              <?php
//            }
//        }
//
//
//        unset($_SESSION['desco']);
//        unset($_SESSION['total']);
//        unset($_SESSION['carrinho']);
//        //unset($_SESSION['tipo']);
//
//
//        echo "<script>alert('Pedido Finalizado Com Sucesso!!!') </script>";
//        echo "<script>window.location = 'index.php?p=home'</script>";
//    }
//} 
?>
