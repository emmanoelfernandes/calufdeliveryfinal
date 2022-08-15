<script language="javascript">

 
 
</script>

<?php
//  unlink ($dir.$dname);
 //  echo "<meta HTTP-EQUIV='refresh' CONTENT='10;URL=index.php?p=meusPedidos'>";
?>
<?php 
//window.setTimeout("location.reload()", 1);
 echo "<META HTTP-EQUIV=REFRESH CONTENT = '30;URL='>";
				

date_default_timezone_set('America/Belem');

ini_set('default_charset', 'UTF-8');

if(!isset($_SESSION['nomeCompleto'])){
   
   echo "<script>alert(' faça login primeiro')</script>";
    echo "<script>window.location = './index.php?p=entrar'</script>";
    
}
if(isset($_GET['id'])){
$id_produto = addslashes($_GET['id']);
if(!isset($_SESSION['carrinho'])) { //se nao existe  a sessao
    $_SESSION['carrinho'] = array(); //cria uma sessao array
    
}
$read_produto = mysqli_query($conn, "SELECT * FROM produto WHERE produto_id = '". $id_produto ."'ORDER BY produto_descricao ASC");
        if(mysqli_num_rows($read_produto) > '0'){
            foreach ($read_produto as $read_produto_view);
            if($_SESSION['carrinho'][$id_produto]){ //se selecionei o produto e ele ja ta dentro do carrinho
                $_SESSION['carrinho'][$id_produto] +=1; //aadicionar ele mais um
            } else {
            $_SESSION['carrinho'][$id_produto]    =1;//se nao adiciona ele
            }   
        }
} 


?>


  <!-- Page Content -->
  <div class="container" >

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
      

      <div class="col-lg-9" >
          <h2>Meus Pedidos</h2><br/>
          <h5>Olá <?php echo $logado; ?></h5>
  
          <div id="setTimeMP" class="table-responsive-xl">
          <table class="table">
              <tr>
                  <td>Código do Pedido</td>
                  <td>Data</td>
                  <td>Valor Total</td>

                  <td>Forma de Pagamento</td>
                                    <td>Status</td>

                  <td>Opções</td>
                 
              </tr>
             
 <?php 
 
             
             // $id_produto_carrinho = '0';
              $read_pedido = mysqli_query($conn,  "SELECT * FROM pedido INNER JOIN cliente ON (pedido.id_usuario = '".$_SESSION['id']."')WHERE cliente.id_cliente = '".$_SESSION['id']."' ORDER BY pedido_data_hora DESC");
              if(mysqli_num_rows($read_pedido) > '0'){
                  
                  foreach ($read_pedido as $read_pedido_view){
                 
                          $data = new DateTime($read_pedido_view['pedido_data']);
                         $hora = new DateTime($read_pedido_view['pedido_data_hora']);
                        
                        
            
                        if($read_pedido_view['pedido_status'] == '0'){
                           $status_pedido = "Processando"; ?>
                           
                     <?php } elseif ($read_pedido_view['pedido_status'] == '1'){
                              $status_pedido = "Preparando"; ?>                          
                           
                      <?php } elseif ($read_pedido_view['pedido_status'] == '2'){
                              $status_pedido = "Saiu Para Entrega";  ?>                         
                           
                      <?php } elseif ($read_pedido_view['pedido_status'] == '3'){
                              $status_pedido = "Entregue - Finalizado";   ?>
                           
                              <?php                    }  
                              
//                              if ($read_pedido_view['pedido_status'] = "PIX") { 
//                                 $fdp =  $read_pedido_view['pedido_fdp'] . " - NOSSA CHAVE PIX";
//                              } else {
//                                  $fdp = $read_pedido_view['pedido_fdp'];
//                              }
                              ?>
                           <?php
                          echo  '<tr>
                  <td>'.$read_pedido_view['pedido_id'].'</td>
              
                  <td>'.$data->format('d/m/Y'). ' - ' .$hora->format('H:i:s').'</td>';
                          
     if ($read_pedido_view['pedido_fdp'] == "Cartão"){   
         $acres = 1.;
         $acre = $read_pedido_view['pedido_valor'] + $acres;
         ?>
          
          <td>    <?php   echo number_format($acre,2,',','.');     ?> </td>
      
          <?php  } else {   ?>
        
          <td> <?php  echo  number_format($read_pedido_view['pedido_valor'],2,',','.');     ?> </td>
    
 <?php
          }           

          
          
           if ($read_pedido_view['pedido_fdp'] == "PIX - NOSSA CHAVE PIX"){   
       
         ?>
          
          <td>    <?php   echo "CHAVE PIX: 91981605460 ou 91981558383 (Wesley da Silva Caluf)"  ?> </td>
      
          <?php  } else {   ?>
        
      <td>    <?php   echo $read_pedido_view['pedido_fdp']  ?> </td>
    
 <?php
          }    
          
          
          
          
          
          
    ?>
                 
                  <?php               
echo '
                 

<td>'.$status_pedido.' </td>
                     
                  
                      
                  <td><a href="./index.php?p=detalhesPedido&id='.$read_pedido_view['pedido_id'].'">Detalhes</a></td>
                        
              </tr>'; 
               
                      }
              }
              
              ?>
          </table>
          </div> 
          <hr/>
       
          <br/>

<!--        <div class="row">
  <?php //listar produtos no centro
  if(isset($_GET['cat']) && $_GET['cat'] != ''){
      $id_cat = addslashes($_GET['cat']);
  $sql_categoria = "AND produto_id_categoria = '".$id_cat."'";
             } else {
             $sql_categoria = "";    
             }
  
  
  
        $read_produto = mysqli_query($conn, "SELECT * FROM produto WHERE produto_id != '' {$sql_categoria} ORDER BY produto_descricao ASC");
        if(mysqli_num_rows($read_produto) > '0'){
            foreach ($read_produto as $read_produto_view){
               
       
            ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?php echo $read_produto_view['produto_descricao'];?></a>
                </h4>
                  <h5>R$ <?php echo number_format($read_produto_view['produto_preco'],2,",",".");?></h5>
                  <p class="card-text"><?php echo utf8_encode( $read_produto_view['produto_breve_descricao']);?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
<?php
         }
        }
?>
        </div>-->
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->

