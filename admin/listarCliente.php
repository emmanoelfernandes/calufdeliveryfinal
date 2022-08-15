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
                                 $resultado_sql =  "SELECT *, SUM(itens_pedido.itens_pedido_quantidade) as 'qtd' FROM cliente"
                      . " left JOIN itens_pedido on cliente.id_cliente = itens_pedido.id_usuario"
                      . " GROUP BY cliente.id_cliente"
                                         ;
                                    ?>
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
                  <th>Cliente</th>
                  <th>Qtds de Itens</th>
                  <th>Ações</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php //$qtdd = 0;
               //  $totall = 0;
                while ($resultado = mysqli_fetch_array($resultado_query)) { //varios itens ?>
                <?php 
                //$qtdd += $resultado['itens_pedido_quantidade'];
                
               // $subb = $resultado['soma'] * $resultado['itens_pedido_valor_produto'];
                ?>
                  
                  <tr>
                  
                  <td><?php echo $resultado['nome_cliente']?></td>
                  <td><a href="index.php?p=qtdcliente&idc=<?php echo $resultado['id_cliente']; ?>"><?php echo $resultado['qtd']; ?></a></td>
                  <td><a href="index.php?p=edc&edc=<?php echo $resultado['id_cliente']; ?>"> <img width="20px" src="./imgSite/editar.png"> <span class="glyphicon glyphicon-text-size"> </span></a> 
                      
                      
                      
                      
                  
                  <form action="index.php?p=apagaCli&idac=<?php echo $resultado['id_cliente']; ?>" method="POST">
                   <input type="hidden" value="<?php echo $row['id_cliente'] ?>" name="idApagarClienteINPUT">
                  <button onclick="return confirm('Tem certeza que deseja apagar categoria ?')" title="APAGAR" id="APAGAR" name="apagarCliente" type="submit"><img width="20px" src="./imgSite/deletar.png"> <span class="glyphicon glyphicon-text-size"> </span></button>
                  </form>
                  
                  </td>
              
                </tr>
                <?php 
              
               // $totall += $subb;
                
                } ?>
              
              </tbody>
            </table>
             
          </div>
        </main>
      </div>
    </div>

   
  </body>
</html>
