   <?php if (@$_SESSION['idUsuario'] == 0 ) { 
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=home'>";
exit();  }  ?>
<?php

date_default_timezone_set('America/Belem');
?>
<?php

if (!isset($_SESSION['tipo_cliente'])) {
    header("location: ./");
} elseif (($_SESSION['tipo_cliente']) == "2") {
    header("location: ./");
}

    
    if(isset($_GET['id'])){
$id_produto = addslashes($_GET['id']);}
?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5"><br>Area do Administrador </h1>
        
        <ul class="list-unstyled">
         <div class="col-lg-9">
          <h2>Todos Pedidos</h2><br/>
         
          <div class="col-lg-9">
          <h2>Detalhes do Pedido</h2>
          <div class="table-responsive-xl">
          <table class="table">
              <tr>
                  <td>Id Pedido</td>
                  <td>Data e Hora</td>
                  <td>Descriçao</td>
                  <td>Valor Unitario</td>
                  <td>Quantidade</td>
                  <td>Valor Total Unitário</td>
                   
                
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
        
           $resultado_sql = "SELECT * FROM itens_pedido INNER JOIN cliente ON (itens_pedido.itens_pedido_id_pedido = '".$id_produto."') INNER JOIN pedido ON (pedido.pedido_id = '".$id_produto."')INNER JOIN produto ON (produto.produto_id = itens_pedido_id_produto) WHERE cliente.id_cliente = '".$_SESSION['id']."'";
//              $resultado_sql = "SELECT * FROM itens_pedido as i, usuario u, pedido p  WHERE i.itens_pedido_id_pedido = {$id_produto} AND i.id_usuario = {$_SESSION['id'] WHERE tab1.campo = 'valor'";
        $resultado_query = mysqli_query($conn, $resultado_sql);
       // $resultado = mysqli_fetch_assoc($resultado_query); //quero so um resultado ASSOC
        
               while ($resultado = mysqli_fetch_array($resultado_query)){ //varios itens
//        {if(count($resultado_query) > 0) //se tiver comentario no bd
//                {
//                foreach ($resultado_query as $resultado)
//                {<td>'.$data->format('d/m/Y'). ' - ' .$hora->format('H:i:s').'</td>
                     $data = new DateTime($resultado['pedido_data']);
                         $hora = new DateTime($resultado['pedido_data_hora']);
                         $totalissimo = number_format($resultado['itens_pedido_valor_total'],2,',','.');
                          echo  '<tr>
                  <td>'.$resultado['itens_pedido_id_pedido'].'</td>
                 

<td>'.$data->format('d/m/Y'). ' - ' .$hora->format('H:i:s').'</td>
<td>'.$resultado['produto_nome']. "-" .$resultado['produto_tamanho'].'</td>                  

<td>'.number_format($resultado['itens_pedido_valor_produto'],2,',','.').'</td>
                      
                      <td>'.number_format($resultado['itens_pedido_quantidade']).'</td>
                  
<td>'.number_format($resultado['itens_pedido_valor_produto'] * number_format($resultado['itens_pedido_quantidade']),2,',','.').'</td>                   
                       
                  
                  
                 
              </tr>';  }  ?>
               </table>
          </div>
          <?php
                                
                                           
                                       
                                       ?>
              
          
         
          <h3 style="float: right">Total com o frete:  <?php echo $totalissimo ?> </h3>
          
          
          <hr/>
       
          <br/>
          <hr/>
       
          <br/>

        </ul>
      </div>
    </div>
  </div>

 



