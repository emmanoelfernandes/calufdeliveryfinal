   <?php if (@$_SESSION['idUsuario'] == 0 ) { 
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=home'>";
exit();  }  ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<!--          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Compartilhar</button>
                <button class="btn btn-sm btn-outline-secondary">Exportar</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button>
            </div>
          </div>-->

<!--          <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->
<?php    
//if (isset($_GET['mes']) && isset($_GET['idCat']) && (!empty($_GET['idCat']))) {
//                                    $sqlano = $_GET['ano'];
//                                    $sqlmes = $_GET['mes'];
//                                    $id = $_SESSION['id'];
//                                    $kok = $_GET['idCat'];
//                                    $resultado_sql = "SELECT * FROM movimentacao m INNER JOIN categoriaCaixa c ON m.categoriaMovimentacao_idCategoria = $kok "
//                                            . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario =  $id WHERE MONTH(m.dataMovimentacao) = $sqlmes  && YEAR(m.dataMovimentacao) = $sqlano   "
//                                            . " AND c.idCategoriaCaixa = $kok "
//                                            . " GROUP BY m.idMovimentacao "
//                                            //   . " GROUP BY m.dataMovimentacao AND m.idMovimentacao "
//                                            . "   ORDER BY m.dataMovimentacao DESC"
//                                    ;
//                                } elseif (isset($_GET['mes'])) {
//                                    $sqlano = $_GET['ano'];
//                                    $sqlmes = $_GET['mes'];
//                                    $id = $_SESSION['id'];
//                                    $resultado_sql = "SELECT * FROM movimentacao m INNER JOIN categoriaCaixa c ON m.categoriaMovimentacao_idCategoria = c.idCategoriaCaixa "
//                                            . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = $id WHERE MONTH(m.dataMovimentacao) = $sqlmes && YEAR(m.dataMovimentacao) = $sqlano "
//                                            //    . " AND idCategoria = $kok "
//                                            . " GROUP BY m.idMovimentacao "
//                                            // . " GROUP BY m.idMovimentacao "
//                                            . "   ORDER BY m.dataMovimentacao DESC"
//                                    ;
//                                } else {
            
                    
                                    
                                    
//                                       if ((isset($_GET['mes'])) || isset($_GET['ano'])) {
////$mes = date("m");
//            //$ano = date("Y");
//                                           $ano = $_GET['ano'];
//                                    $mes = $_GET['mes'];
//                                    $resultado_sql = "SELECT *,"
//             . " SUM(itens_pedido.itens_pedido_quantidade)  as 'soma' FROM itens_pedido"
//             . " left JOIN produto on itens_pedido.itens_pedido_id_produto = produto.produto_id"
//                                             . " left JOIN pedido p on itens_pedido.itens_pedido_id_pedido = p.pedido_id"
//              . " WHERE MONTH(p.pedido_data) = $mes  && YEAR(p.pedido_data) = $ano   "
//             . " GROUP BY itens_pedido.itens_pedido_id_produto ORDER BY soma DESC";                                           
//                                    ?>    
<!--                                    <h1>Relatório da venda do mês //<?php echo $mes ?> de <?php echo $ano ?> </h1>-->
                                           <?php
//                                       }else
//                                       {
//                                           $hoje = date('Y-m-d');
            //$mes = date("m");
            //$ano = date("Y");
                                           if(isset($_GET['idc'])){
                                    $resultado_sql = "SELECT *  FROM itens_pedido"
             . " left JOIN produto on itens_pedido.itens_pedido_id_produto = produto.produto_id"
             . " left JOIN pedido p on itens_pedido.itens_pedido_id_pedido = p.pedido_id"
             . " left JOIN cliente c on itens_pedido.id_usuario = c.id_cliente"
             . " WHERE itens_pedido.id_usuario = '".$_GET['idc']."'   "
            //. " GROUP BY itens_pedido.itens_pedido_id_produto ORDER BY soma DESC"
             ;
                                           }    ?>
<h1>Lista de Clientes</h1>
<?php
                                       

//$resultado_sql = "SELECT * FROM movimentacao INNER JOIN cliente ON (itens_pedido.itens_pedido_id_pedido = '".$id_produto."') INNER JOIN pedido ON (pedido.pedido_id = '".$id_produto."')INNER JOIN produto ON (produto.produto_id = itens_pedido_id_produto) WHERE cliente.id_cliente = '".$_SESSION['id']."'";
//              $resultado_sql = "SELECT * FROM itens_pedido as i, usuario u, pedido p  WHERE i.itens_pedido_id_pedido = {$id_produto} AND i.id_usuario = {$_SESSION['id'] WHERE tab1.campo = 'valor'";
                                $resultado_query = mysqli_query($conn, $resultado_sql);
// $resultado = mysqli_fetch_assoc($resultado_query); //quero so um resultado ASSOC
// $resultado = mysqli_fetch_assoc($resultado_query);
//  while ($resultado = mysqli_fetch_array($resultado_query))   
                                
//        {if(count($resultado_query) > 0) //se tiver comentario no bd
//                {
//                foreach ($resultado_query as $resultado)
//                {
                                    
                                 ?>
          
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>Data</th>
              
                  <th>Qtd de Item</th>
                  <th>Produto</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php $qtdd = 0;
                 $qtddt = 0;
                while ($resultado = mysqli_fetch_array($resultado_query)) { //varios itens ?>
                <?php 
              
                $qtddt += $resultado['itens_pedido_valor_total'];
                     ?>
                
                  
                  <tr>
         <?php        $data = new DateTime($resultado['pedido_data']);
               //  $datacovertida = date("d/m/Y");
                 ?>

                  <td><?php echo $data->format('d/m/Y') ?></td>
        
                  <td><?php echo $resultado['itens_pedido_quantidade']; ?></td>
                  <td><?php echo $resultado['produto_nome'] ?></td>
                   
                    
                </tr>
                <?php 
              
               // $totall += $subb;
                
                } ?>
               <?php
//                                       }else
//                                       {
//                                           $hoje = date('Y-m-d');
            //$mes = date("m");
            //$ano = date("Y");
                                           if(isset($_GET['idc'])){
                                    $resultado_sql2 = "SELECT *, COUNT(p.pedido_id) as 'qtds'   FROM itens_pedido"
             . " left JOIN produto on itens_pedido.itens_pedido_id_produto = produto.produto_id"
             . " left JOIN pedido p on itens_pedido.itens_pedido_id_pedido = p.pedido_id"
             . " left JOIN cliente c on itens_pedido.id_usuario = c.id_cliente"
             . " WHERE itens_pedido.id_usuario = '".$_GET['idc']."'   "
            //. " GROUP BY itens_pedido.itens_pedido_id_produto ORDER BY soma DESC"
             ;
                                           }
                  
                   $resultado_query2 = mysqli_query($conn, $resultado_sql2);
                while ($resultado2 = mysqli_fetch_array($resultado_query2)) { //varios itens                   
                                  $qtdd = 0;            
                                            $qtdd += $resultado2['qtds'];
                                                   }
                
                //$sda = 5 + $qtdd
                //$subb = $resultado['soma'] * $resultado['itens_pedido_valor_produto'];
               //$totalll = $qtdd * $resultado['itens_pedido_valor_produto'];
               //$ttt += $totalll
                ?>
              </tbody>
            </table>
               <h3>Total de Pedidos Feitos:  <?php  echo $qtdd  ?> </h3>  
              <h3>Total : R$ <?php  echo number_format($qtddt,2,',','.')  ?> </h3> 
               
          </div>
        </main>
      </div>
    </div>

   
  </body>
</html>
