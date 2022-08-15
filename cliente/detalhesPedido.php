<html lang="pt-br">
<?php //usuario
date_default_timezone_set('America/Belem');

if(!isset($_SESSION['nomeCompleto'])){
   
   echo "<script>alert(' faça login primeiro')</script>";
    echo "<script>window.location = '../seguranca/fazerLogin.php'</script>";
    
}
if(isset($_GET['id'])){
$id_produto = addslashes($_GET['id']);}
//if(!isset($_SESSION['carrinho'])) { //se nao existe  a sessao
//    $_SESSION['carrinho'] = array(); //cria uma sessao array
//    
//}
//$read_produto = mysqli_query($conn, "SELECT * FROM produto WHERE produto_id = '". $id_produto ."'ORDER BY produto_descricao ASC");
//        if(mysqli_num_rows($read_produto) > '0'){
//            foreach ($read_produto as $read_produto_view);
//            if($_SESSION['carrinho'][$id_produto]){ //se selecionei o produto e ele ja ta dentro do carrinho
//                $_SESSION['carrinho'][$id_produto] +=1; //aadicionar ele mais um
//            } else {
//            $_SESSION['carrinho'][$id_produto]    =1;//se nao adiciona ele
//            }
//        }
//} 
?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

<!--      <div class="col-lg-3">
<?php $logado = $_SESSION['nomeCompleto']; ?>
        <h1 class="my-4">Categorias</h1>
        <h5>Olá <?php echo $logado; ?></h5>
        <div class="list-group">
        <?php //listar produtos ao lado esquerdo
        $read_categoria = mysqli_query($conn, "SELECT * FROM categoria ORDER BY categoria_id ASC");
        if(mysqli_num_rows($read_categoria) > 0){
            foreach ($read_categoria as $read_categoria_view){
                echo '<a href="index.php?cat='.$read_categoria_view['categoria_id'].'
                        "class="list-group-item">'.$read_categoria_view['categoria_descricao'].'</a>';
            }
        }
            ?>
            
        
          
        </div>

      </div>-->
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
          <h2>Meus Pedidos</h2>
          <div class="table-responsive-xl">
          <table class="table">
              <tr>
<!--                  <td>Código do Pedido</td>-->
                 
                  <td>Produto</td>
                  <td>Valor Unitario </td>
                  <td>Quantidade</td>
                  <td>Sub-Total </td>
                   
                
              </tr>
              <?php 
             
             // $id_produto_carrinho = '0';
          
//              $read_pedido = mysqli_query($conn,  "SELECT pedido_status,pedido_id,itens_pedido_id_pedido,pedido_data_hora,itens_pedido_valor_produto,itens_pedido_quantidade FROM itens_pedido a, usuario b, pedido c WHERE a.id_usuario = '".$_SESSION['id']."' AND '".$id_produto ."' = a.itens_pedido_id_pedido ORDER BY pedido_id ASC");
//              if(mysqli_num_rows($read_pedido) > '0'){
//                  foreach ($read_pedido as $read_pedido_view){
//                      if($read_pedido_view['pedido_status'] == '0'){
//                          $status_pedido = "Processando";                          
//                      } else {
//                              $status_pedido = "Aprovado";                          
//                      }
        
           $resultado_sql = "SELECT * FROM itens_pedido i LEFT JOIN cliente c ON (i.itens_pedido_id_pedido = '".$id_produto."') LEFT JOIN pedido p ON (p.pedido_id = '".$id_produto."') LEFT JOIN produto pr ON (pr.produto_id = i.itens_pedido_id_produto) "
                   . "  WHERE c.id_cliente = '".$_SESSION['id']."'";
//              $resultado_sql = "SELECT * FROM itens_pedido as i, usuario u, pedido p  WHERE i.itens_pedido_id_pedido = {$id_produto} AND i.id_usuario = {$_SESSION['id'] WHERE tab1.campo = 'valor'";
        $resultado_query = mysqli_query($conn, $resultado_sql);
       // $resultado = mysqli_fetch_assoc($resultado_query); //quero so um resultado ASSOC
        // $resultado = mysqli_fetch_assoc($resultado_query);
            //  while ($resultado = mysqli_fetch_array($resultado_query))   
               while ($resultado = mysqli_fetch_array($resultado_query)){ //varios itens
//        {if(count($resultado_query) > 0) //se tiver comentario no bd
//                {
//                foreach ($resultado_query as $resultado)
//                {
                   $resultadoFinal = $resultado['itens_pedido_valor_produto']  * $resultado['itens_pedido_quantidade'];                  
                   $data = new DateTime($resultado['pedido_data']);
                         $hora = new DateTime($resultado['pedido_data_hora']);
                         $adicional = $resultado['itens_pedido_adc'];
                         $totalissimo = $resultado['itens_pedido_valor_total'];
                         $desc = $resultado['pedido_desco'];
                         @$frete = $resultado['itens_pedido_frere'];
                         $sub = $resultado['pedido_valor'] + $desc;
                          echo  '<tr>
     
                 

<td>'.$resultado['produto_nome'].'</td>                  

<td>'.number_format($resultado['itens_pedido_valor_produto'],2,',','.'). '</td>
                      
                      <td>'.number_format($resultado['itens_pedido_quantidade']).'</td>

<td>' . "R$ " .number_format($resultadoFinal,2,',','.')  .'</td>                   
                       
                  
                  
                 
              </tr>';
                   
                   }                       
                                 
                    ?>
              
          
          </table>
          </div>
             <?php 
             if ($adicional == 1) {
              
                 $tkkk = $totalissimo +  $adicional ;
               ?>  
                   <hr/>    
                   
                    <h5 style="float: right">Sub-Total: R$ <?php echo number_format($sub,2,',','.')  ?> </h5>  <br/>
           <br/>
            <h5 style="float: right">Acréscimo: R$ <?php echo number_format($adicional,2,',','.')  ?> </h5>  <br/>
           <br/>
          <h5 style="float: right">Frete: R$ <?php echo number_format($frete,2,',','.')  ?> </h5>  <br/>
           <br/>
           <h5 style="float: right">Desconto: R$ <?php echo number_format($desc,2,',','.')  ?> </h5>  <br/>
           <br/>
           
          <h3 style="float: right">Total: R$ <?php echo number_format($tkkk,2,',','.')  ?> </h3>
                 
        
          <?php    
              } else {
                  
             
               $tkkk = $totalissimo;
        ?>        
                 <hr/> 
                   
                    <h5 style="float: right">Sub-Total: R$ <?php echo number_format($sub,2,',','.')  ?> </h5>  <br/>
           <br/>
          <h5 style="float: right">Acréscimo: R$ <?php echo number_format($adicional,2,',','.')  ?> </h5>  <br/>
           <br/>
            <h5 style="float: right">Frete: R$ <?php echo number_format($frete,2,',','.')  ?> </h5>  <br/>
           <br/>
            <h5 style="float: right">Desconto: R$ <?php echo number_format($desc,2,',','.')  ?> </h5>  <br/>
           <br/>
          <h3 style="float: right">Total: R$ <?php echo number_format($tkkk,2,',','.')  ?> </h3>
      
          <?php    
                }             
   
          
           ?> 
          
           

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  
  <!-- /.container -->

  <!-- Footer -->
  
  
  
  
  
  
  
  
  
  
  
<!--  
    <?php
//      $resultado_sql = "SELECT * FROM itens_pedido i LEFT JOIN cliente c ON (i.itens_pedido_id_pedido = '".$id_produto."') LEFT JOIN pedido p ON (p.pedido_id = '".$id_produto."') LEFT JOIN produto pr ON (pr.produto_id = i.itens_pedido_id_produto) "
//                   . "  WHERE c.id_cliente = '".$_SESSION['id']."'";
////              $resultado_sql = "SELECT * FROM itens_pedido as i, usuario u, pedido p  WHERE i.itens_pedido_id_pedido = {$id_produto} AND i.id_usuario = {$_SESSION['id'] WHERE tab1.campo = 'valor'";
//        $resultado_query = mysqli_query($conn, $resultado_sql);
//       
//  while ($resultado = mysqli_fetch_array($resultado_query)){ //varios itens
////        {if(count($resultado_query) > 0) //se tiver comentario no bd
////                {
////                foreach ($resultado_query as $resultado)
////                {
//      $nn = $resultado['produto_nome'];
//                   $resultadoFinal = ($resultado['itens_pedido_valor_produto'] + $resultado['itens_pedido_adc']) * $resultado['itens_pedido_quantidade'];                  
//                   $data = new DateTime($resultado['pedido_data']);
//                         $hora = new DateTime($resultado['pedido_data_hora']);
//                         $totalissimo = $resultado['itens_pedido_valor_total'];
//                    
//                  $resultado['itens_pedido_id_pedido'].
                 
//
//$data->format('d/m/Y'). " - " .$hora->format('H:i:s').
//$resultado['produto_nome']. "-" .$resultado['produto_tamanho']. "-" .$resultado['itens_pedido_adc_txt'].
//
//number_format($resultado['itens_pedido_valor_produto'],2,',','.'). "+" .number_format($resultado['itens_pedido_adc'],2,',','.').
//                      
//                number_format($resultado['itens_pedido_quantidade']).
//
//number_format($resultadoFinal,2,',','.')  
//                       
//                  
//                  
//                 
//;
//array_push(
//                                   $_SESSION['carrinho'], 
//                                   array(
//                                  'nome' => $nn
//                                   )
//                                   );
                    
                    
                    ?>
                    <textarea name="whatsapp" rows="14" cols="33"><?php // echo $what ?>
  </textarea><?php
//                           }
                           
//                           echo '<pre>';
//                           var_dump($_SESSION['carrinho']);
//                           echo '<pre>';
//                           $car = $_SESSION['carrinho'];
//                           echo $car;
//                           echo '<pre>';
//                           ?>
  
                           <a href="https://api.whatsapp.com/send?phone=5591984620807&text=<?php // echo $car ?>">
                                        Enviar Pelo Whatsapp
                                    </a>
        -->

</html>
