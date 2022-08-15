
  

    <div class="container-fluid">
      <div class="row">
<!--          d-none-->
        <nav class="col-md-2  d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  <?php
                            $qr = mysqli_query($conn, "SELECT MONTH(p.pedido_data_hora) as 'mes', YEAR(p.pedido_data_hora) as 'ano'  "
                                    . " FROM pedido p "
                                    //. "p INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['id'] . 
                                    . " GROUP BY  mes, ano "
                                    . " ORDER BY  mes, ano DESC");

                            if (mysqli_num_rows($qr) > '0') {
                                foreach ($qr as $dataar) {
//                                    $data = new DateTime($dataar['dataMovimentacao']);
//                                    $hora = new DateTime($dataar['dataMovimentacao']);
                                    $mes = ($dataar['mes']);
                                    $ano = ($dataar['ano']);


                                    switch ($mes) {
                                        case 1: case 1: $mesc = "Janeiro";
                                            break;
                                        case 2: case 2: $mesc = "Fevereiro";
                                            break;
                                        case 3: case 3: $mesc = "Mar&ccedil;o";
                                            break;
                                        case 4: case 4: $mesc = "Abril";
                                            break;
                                        case 5: case 5: $mesc = "Maio";
                                            break;
                                        case 6: case 6: $mesc = "Junho";
                                            break;
                                        case 7: case 7: $mesc = "Julho";
                                            break;
                                        case 8: case 8: $mesc = "Agosto";
                                            break;
                                        case 9: case 9: $mesc = "Setembro";
                                            break;
                                        case 10: case 10: $mesc = "Outubro";
                                            break;
                                        case 11: case 11: $mesc = "Novembro";
                                            break;
                                        case 12: case 12: $mesc = "Dezembro";
                                            break;
                                    }
                                    ?>

                                    <li><a href="index.php?p=rv&mes=<?php echo $mes ?>&ano=<?php echo $ano ?>"><?php echo $mesc ?> de <?php echo $ano ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                  <span class="sr-only">(atual)</span>
                </a>
              </li>
              
            </ul>
<!--
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Relatórios salvos</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>-->
            <ul class="nav flex-column mb-2">
<!--              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Neste mês
                </a>
              </li>-->
              
            </ul>
          </div>
        </nav>

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
            
                    
                                    
                                    
                                       if ((isset($_GET['mes'])) || isset($_GET['ano'])) {
//$mes = date("m");
            //$ano = date("Y");
                                           $ano = $_GET['ano'];
                                    $mes = $_GET['mes'];
                                    $resultado_sql = "SELECT *,"
             . " SUM(itens_pedido.itens_pedido_quantidade)  as 'soma' FROM itens_pedido"
             . " left JOIN produto on itens_pedido.itens_pedido_id_produto = produto.produto_id"
                                             . " left JOIN pedido p on itens_pedido.itens_pedido_id_pedido = p.pedido_id"
              . " WHERE MONTH(p.pedido_data) = $mes  && YEAR(p.pedido_data) = $ano   "
             . " GROUP BY itens_pedido.itens_pedido_id_produto ORDER BY soma DESC";                                           
                                    ?>    
                                    <h1>Relatório da venda do mês <?php echo $mes ?> de <?php echo $ano ?> </h1>
                                            <?php
                                       }else
                                       {
                                           $hoje = date('Y-m-d');
            //$mes = date("m");
            //$ano = date("Y");
                                    $resultado_sql = "SELECT *,"
             . " SUM(itens_pedido.itens_pedido_quantidade)  as 'soma' FROM itens_pedido"
             . " left JOIN produto on itens_pedido.itens_pedido_id_produto = produto.produto_id"
             . " left JOIN pedido p on itens_pedido.itens_pedido_id_pedido = p.pedido_id"
             . " WHERE p.pedido_data = '" . $hoje . "'"
             . " GROUP BY itens_pedido.itens_pedido_id_produto ORDER BY soma DESC";
                                    ?>
<h1>Relatório da venda do dia</h1>
<?php
                                       }

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
                  <th>#</th>
                  <th>Produto</th>
                  <th>Quantidade</th>
                  <th>Preço</th>
                  <th>SubTotal</th>
                </tr>
              </thead>
              <tbody>
                <?php $qtdd = 0;
                 $totall = 0;
                while ($resultado = mysqli_fetch_array($resultado_query)) { //varios itens ?>
                <?php 
                //$qtdd += $resultado['itens_pedido_quantidade'];
                
                $subb = $resultado['soma'] * $resultado['itens_pedido_valor_produto'];
                ?>
                  
                  <tr>
                  <td></td>
                  <td><?php echo $resultado['produto_nome']?></td>
                  <td><?php echo $resultado['soma']; ?></td>
                  <td><?php echo number_format($resultado['itens_pedido_valor_produto'],2,',','.') ?></td>
                  <td><?php echo number_format($subb,2,',','.') ?></td>
                </tr>
                <?php 
              
                $totall += $subb;
                
                } ?>
              
              </tbody>
            </table>
              <h3>Total: <?php  echo number_format($totall,2,',','.')  ?> </h3>
          </div>
        </main>
      </div>
    </div>

   
  </body>
</html>
