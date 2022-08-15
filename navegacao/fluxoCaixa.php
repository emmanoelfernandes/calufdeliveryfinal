

            
     
        <!--MOVIMENOT GERAL-->
        <?php
        $qr = mysqli_query($conn, "SELECT SUM(m.valorMovimentacao) as total FROM movimentacao m"
                . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE m.tipoMovimentacao=1 "
                . " GROUP BY u.idUsuario ");
        $row = mysqli_fetch_array($qr);
        @$entradas = $row['total'];

        $qr = mysqli_query($conn, "SELECT SUM(m.valorMovimentacao) as total FROM movimentacao m"
                . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE m.tipoMovimentacao=2  "
                . " GROUP BY u.idUsuario  ");
        $row = mysqli_fetch_array($qr);
        @$saidas = $row['total'];

        $resultado_mesG = $entradas - $saidas;
        ?>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">Movimento Geral </strong>
                        <h3 class="mb-0">
                            <p class="text-dark"  >Entradas <?php echo number_format($entradas, 2, ',', '.') ?></p>
                            <p  style="color: red;">Saídas -<?php echo number_format($saidas, 2, ',', '.') ?></p>
                            <?php if ($resultado_mesG >= 0) { ?>
                                <p class="text-dark" >Total <?php echo number_format($resultado_mesG, 2, ',', '.') ?></p>
                            <?php } else { ?>
                                <p style="color: red;" >Total <?php echo number_format($resultado_mesG, 2, ',', '.') ?></p>
                            <?php } ?>
                        </h3>
                        <div class="mb-1 text-muted">Resultado das movimentacões desde do início do uso do sistema  </div>


                    </div>

                </div>
            </div>
            <!--    /MOVIMENTO GERAL-->










            <!--MOVIMENTO DO MES-->
            <?php
            $mes = date("m");
            $ano = date("Y");
            
            $qr = mysqli_query($conn, "SELECT SUM(m.valorMovimentacao) as total FROM movimentacao m"
                    . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE m.tipoMovimentacao=1 && MONTH(dataMovimentacao)='$mes' && YEAR(dataMovimentacao)='$ano' "
                    . " GROUP BY u.idUsuario ");
            $row = mysqli_fetch_array($qr);
            @$entradas = $row['total'];

            $qr = mysqli_query($conn, "SELECT SUM(m.valorMovimentacao) as total FROM movimentacao m"
                    . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE m.tipoMovimentacao=2 && MONTH(dataMovimentacao)='$mes' && YEAR(dataMovimentacao)='$ano'"
                    . " GROUP BY u.idUsuario ");
            $row = mysqli_fetch_array($qr);
            @$saidas = $row['total'];
$datahoje = date('Y-m-d');
            $resultado_mes = $entradas - $saidas;
            ?>


            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">Movimento de Mês</strong>
                        <h3 class="mb-0">
                            <p class="text-dark"  >Entradas <?php echo number_format($entradas, 2, ',', '.') ?></p>
                            <p  style="color: red;">Saídas -<?php echo number_format($saidas, 2, ',', '.') ?></p>
                            <?php if ($resultado_mes >= 0) { ?>
                                <p class="text-dark" >Total <?php echo number_format($resultado_mes, 2, ',', '.') ?></p>
                            <?php } else { ?>
                                <p style="color: red;"   >Total <?php echo number_format($resultado_mes, 2, ',', '.') ?></p>
                            <?php } ?>
                        </h3>
                        <div class="mb-1 text-muted">Resultado das movimentacões do mês atual ( <?php echo strftime("%B de %Y", strtotime($datahoje)); ?> )</div>


                    </div>

                </div>
            </div>
            <!--          /MOVIMENTO DO MES          -->
        


<!--MOVIMENTO DA SEMANA
            <?php
            $mes = date("m");
            $ano = date("Y");
            $dia = date("d");
            $semana = date("W");
            $datahoje = date('Y-m-d');

             //= date("d/m/Y");
            
            $qr = mysqli_query($conn, "SELECT SUM(m.valorMovimentacao) as total FROM movimentacao m"
                    . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE m.tipoMovimentacao=1 && WEEK(dataMovimentacao)='$semana' && MONTH(dataMovimentacao)='$mes' && YEAR(dataMovimentacao)='$ano' "
                    . " GROUP BY u.idUsuario ");
            $row = mysqli_fetch_array($qr);
            @$entradas = $row['total'];

            $qr = mysqli_query($conn, "SELECT SUM(m.valorMovimentacao) as total FROM movimentacao m"
                    . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE m.tipoMovimentacao=2 && WEEK(dataMovimentacao)='$semana' && MONTH(dataMovimentacao)='$mes' && YEAR(dataMovimentacao)='$ano' "
                    . " GROUP BY u.idUsuario ");
            $row = mysqli_fetch_array($qr);
            @$saidas = $row['total'];

            $resultado_mes = $entradas - $saidas;
            ?>


            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-gray-dark">Movimento da Semana</strong>
                        <h3 class="mb-0">
                            <p class="text-dark"  >Entradas <?php echo number_format($entradas, 2, ',', '.') ?></p>
                            <p  style="color: red;">Saídas -<?php echo number_format($saidas, 2, ',', '.') ?></p>
                            <?php if ($resultado_mes >= 0) { ?>
                                <p class="text-dark" >Total <?php echo number_format($resultado_mes, 2, ',', '.') ?></p>
                            <?php } else { ?>
                                <p style="color: red;"   >Total <?php echo number_format($resultado_mes, 2, ',', '.') ?></p>
                            <?php } ?>
                        </h3>
                        <div class="mb-1 text-muted">Resultado das movimentacões da semana atual(<?php echo $semana; ?> )</div>


                    </div>

                </div>
            </div>
                      /MOVIMENTO DA SEMANA          -->

<!--MOVIMENTO DO DIA-->
            <?php
            $mes = date("m");
            $ano = date("Y");
            $dia = date("d");
            //$dia = date("d");
            //$dia = date("d");
            $datahoje = date('Y-m-d');

             //= date("d/m/Y");
            
            $qr = mysqli_query($conn, "SELECT SUM(m.valorMovimentacao) as total FROM movimentacao m"
                    . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE m.tipoMovimentacao=1 && DAY(dataMovimentacao)='$dia' && MONTH(dataMovimentacao)='$mes' && YEAR(dataMovimentacao)='$ano' "
                    . " GROUP BY u.idUsuario ");
            $row = mysqli_fetch_array($qr);
            @$entradas = $row['total'];

            $qr = mysqli_query($conn, "SELECT SUM(m.valorMovimentacao) as total FROM movimentacao m"
                    . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE m.tipoMovimentacao=2 && DAY(dataMovimentacao)='$dia' && MONTH(dataMovimentacao)='$mes' && YEAR(dataMovimentacao)='$ano' "
                    . " GROUP BY u.idUsuario ");
            $row = mysqli_fetch_array($qr);
            @$saidas = $row['total'];

            $resultado_mes = $entradas - $saidas;
            ?>


            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-gray-dark">Movimento do dia</strong>
                        <h3 class="mb-0">
                            <p class="text-dark"  >Entradas <?php echo number_format($entradas, 2, ',', '.') ?></p>
                            <p  style="color: red;">Saídas -<?php echo number_format($saidas, 2, ',', '.') ?></p>
                            <?php if ($resultado_mes >= 0) { ?>
                                <p class="text-dark" >Total <?php echo number_format($resultado_mes, 2, ',', '.') ?></p>
                            <?php } else { ?>
                                <p style="color: red;"   >Total <?php echo number_format($resultado_mes, 2, ',', '.') ?></p>
                            <?php } ?>
                        </h3>
                        
                     <?php 
                    


                     ?>
                        <div class="mb-1 text-muted">Resultado das movimentacões do dia atual (<?php echo utf8_encode(strftime("%A, %d de %B de %Y", strtotime($datahoje))); ?> )</div>


                    </div>

                </div>
            </div>
            <!--          /MOVIMENTO DO DIA          -->
        </div>





        <main role="main" class="container">
            <!--BOTOES ADICIONAR CATEGORIA E ADICIONAR MOVIMENTACAO-->
            <nav class="blog-pagination">
                <a id="btnAddCat" class="btn btn-outline-primary" href="#">Adicionar Categoria</a>
                <a id="btnAddMov" class="btn btn-outline-secondary" href="#">Adicionar Movimento</a>
            </nav>



            <!--ADICIONAR CATEGORIA-->
            <div id="formAddCat" style="display: none;" >
                <h3>Adicionar Categoria</h3>
                <table  class="table">
                    <form method="post" action="index.php?p=procCCat">
                        <input type="hidden" name="acao" value="2" />  
                         <input type="hidden" name="idLogado" value="<?php echo $_SESSION['idUsuario']?>" /> 
                        Nome: <input type="text" name="nome" size="20" maxlength="50" />
                        <br />
                        <br />
                        <input type="submit" class="btn" value="Enviar" />
                    </form>
                </table>
                <?php
                $qr = mysqli_query($conn, "SELECT * FROM usuario u INNER JOIN categoriacaixa c ON c.categoriacaixaid_usuarioid = " . $_SESSION['idUsuario'] . ""
                        . " GROUP BY c.categoriacaixa_nome "
                        . " ORDER BY c.categoriacaixa_nome ASC"
                        . "");
                ?>
                <strong>Categorias:</strong><br />

                <div class="table-responsive-lg table-striped table-hover">
                    <table  class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th >Categoria</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <?php
                                while ($row = mysqli_fetch_array($qr)) {
                                    ?>  
                                    <td><?php echo $row['categoriacaixa_nome'] ?></td>
                                    <td><a class="" data-toggle="modal" data-target="#myModalC<?php echo $row['categoriacaixa_id'] ?>" href="#myModalC<?php echo $row['categoriacaixa_id'] ?>">Editar</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>



            </div> 
            <!--TERMINA ADICIONAR CATEGORIA E EDITAR CATEGORIA-->







            <!-- Inicio Modal Editar MOVIMENTO-->
            <?php
//    if( (isset($_GET['mes'])) ||  isset($_GET['idCat']) || isset($resultado['idCategoria']))  {
//$mesul = $_GET['mes'];
//  $resultado_sql = "SELECT * FROM movimentacao m INNER JOIN categoria c ON  c.usuarioCategoria_idUsuario =  ".$_SESSION['id'].""
//               . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = ".$_SESSION['id']." WHERE MONTH(m.dataMovimentacao) = $mesul  "
//       . " GROUP BY m.idMovimentacao "
//  . "   ORDER BY m.dataMovimentacao DESC";
//  }
//   @$data = new DateTime($resultados['dataMovimentacao']);
//                      @$hora = new DateTime($resultados['dataMovimentacao']);
//
//    $resultado_query = mysqli_query($conn, $resultado_sql);
//foreach($resultado_query as $resultados){
//     while ($resultados = mysqli_fetch_array($resultado_query)){
            ?>
            <!-- Modal EDITAR CATEGORIAA -->
            <?php
//if(isset($_GET['myModalC'])){
            $qrr = mysqli_query($conn, "SELECT * FROM usuario u INNER JOIN categoriacaixa c ON c.categoriacaixaId_usuarioid = " . $_SESSION['idUsuario'] . ""
                    . " GROUP BY c.categoriacaixa_nome "
                    . " ORDER BY c.categoriacaixa_nome ASC"
                    . "");
            ?>

            <?php
            while ($row = mysqli_fetch_array($qrr)) {
                ?>  
                <div id="myModalC<?php echo $row['categoriacaixa_id'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Editar Categoria</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="index.php?p=editCat">
                                    <div class="form-group">
                                        <input id="id"  class="form-control" value=" <?php echo $row['categoriacaixa_id ']; ?> " name="id" type="hidden">
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="hidden" name="idR" class="form-control" required placeholder="" value="<?php echo $row['categoriacaixa_id'] ?>" >

                                            </div>


                                            <label>Categoria: </label> 

                                            <div class="form-line">
                                                <input type="text" class="form-control" required placeholder="" value="<?php echo $row['categoriacaixa_nome'] ?>" name="categoria">

                                            </div>



                                        </div>
                                        <div class="modal-footer">

                                            <input type="hidden" value="<?php echo $row['categoriacaixa_id'] ?>" name="idEditarC">
                                            <button id="ALTERAR" name="idEditC" class="btn-lg" type="submit">ALTERAR</button> <br/>
                                            </form>

                                            <form action="index.php?p=apagaC&apacaC=<?php echo $row['categoriacaixa_id'] ?>" method="POST">
                                                <input type="hidden" value="<?php echo $row['categoriacaixa_id'] ?>" name="idApagarCat">
                                                <button style="font-size:10px; color:#666" onclick="return confirm('Tem certeza que deseja apagar categoria ?')" title="APAGAR" id="APAGAR" name="apagarCat" class="btn btn-lg btn-warning " type="submit">APAGAR</button>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <!-- Fim Modal Editar CATEGORIA-->












            <!--ADICIONAR MOVIMENTO-->
            <div id="formAddMov" style="display: none;">
                <h3>Adicionar Movimento</h3>
                <?php
                $qr = mysqli_query($conn, "SELECT * FROM usuario u INNER JOIN categoriacaixa c ON c.categoriacaixaid_usuarioid = " . $_SESSION['idUsuario'] . ""
                        . " GROUP BY c.categoriacaixa_nome "
                        . " ORDER BY c.categoriacaixa_nome ASC"
                        . "");
                if (mysqli_num_rows($qr) == 0)
                    echo "Adicione ao menos uma categoria";

                else {
                    ?>
                    <form method="post" action="index.php?p=procCMov">
                        <input type="hidden" name="idLogado" value="<?php echo $_SESSION['idUsuario']?>" /> 
                        <input type="hidden" name="acao" value="1" />
                        <strong>Data:</strong><br />
                        <input type="date" name="data" size="11" maxlength="10" required="on" />

                        <br />
                        <br />

                        <strong>Tipo:<br /></strong>
                        <label for="tipo_receita" style="color:#030"><input type="radio" name="tipo" value="1" id="tipo_receita" required="on" /> Entrada!</label>&nbsp; 
                        <label for="tipo_despesa" style="color:#C00"><input type="radio" name="tipo" value="2" id="tipo_despesa" required="on" /> Saída!</label>
<!--                        <label for="tipo_medeve" style="color:#030"><input type="radio" name="tipo" value="3" id="tipo_medeve" required="on" /> Me deve!</label>&nbsp; 
                        <label for="tipo_eudevo" style="color:#C00"><input type="radio" name="tipo" value="4" id="tipo_eudevo" required="on" /> Eu devo!</label>-->

                        <br />
                        <br />

                        <strong>Categoria:</strong><br />
                        <select name="cat" required="on">
                            <?php
                            while ($row = mysqli_fetch_array($qr)) {
                                ?>
                                <option  value="<?php echo $row['categoriacaixa_id'] ?>"><?php echo $row['categoriacaixa_nome'] ?></option>
                            <?php } ?>
                        </select>

                        <br />
                        <br />

                        <strong>Descriçao:</strong><br />
                        <textarea   name="descricao"></textarea>


                        <br />
                        <br />

                        <strong>Valor:</strong><br />
                        R$ <input required="on"  name="valor"  type="text" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});" title="Preencha com um valor" placeholder="000,00">

                        <br />
                        <br />

                        <input type="submit" class="btn" value="Enviar" />

                    </form>
                <?php } ?>

            </div> 
            <!--TERMINA ADICIONAR MOVIMENTO -->









            <br/>
            <div class="row">

                <div class="col-md-8 blog-main">
                    <form name="form_filtro_cat" method="GET" action="index.php?p="  >
<!--                        SE GET DA MOVIMENTACAO CAIXA FOR VAZIO (INICIO DELE}-->
                        <?php if (empty($_GET['mes'])  && empty($_GET['ano'])) { ?>
<input type="hidden" value="fc" name="p" />
                            <input type="hidden" value="<?php echo $mes ?>" name="mes" />
                        <input type="hidden" value="<?php echo $ano ?>" name="ano" />             
                                                
                    
                        
                        
                             <?php }else  { ?>     
                            <input type="hidden" value="fc" name="p" />
                            <input type="hidden" value="<?php echo $_GET['mes'] ?>" name="mes" />
                            <input type="hidden" value="<?php echo $_GET['ano'] ?>" name="ano" />
                    
                                
                            
                        <?php } ?>
                           
                        Filtrar por categoria:  <select name="idCat" onchange="form_filtro_cat.submit()"/>
<!-- -->
                        <option value="">Tudo</option>


                        <?php
                    
                        
                        if (isset($_GET['mes'])) {
                            $sqlmes = $_GET['mes'];
                            $sqlano = $_GET['ano'];
                            $qr = mysqli_query($conn, "SELECT * FROM usuario u INNER JOIN categoriacaixa c ON c.usuarioCategoria_idUsuario = " . $_SESSION['idUsuario'] . ""
                                    . " INNER JOIN movimentacao m ON categoriaMovimentacao_idCategoria = categoriacaixa_id WHERE MONTH(m.dataMovimentacao) = $sqlmes && YEAR(m.dataMovimentacao) = $sqlano  "
                                    . " GROUP BY c.categoriacaixa_nome "
                                    . " ORDER BY c.categoriacaixa_nome ASC"
                                    . "");
                        }
                        elseif (isset($_POST['datainicio'])) {
                            $datainicio = $_GET['datainicio'];
                            $datafim = $_GET['datafim'];
                            $qr = mysqli_query($conn, "SELECT * FROM usuario u INNER JOIN categoriacaixa c ON c.usuarioCategoria_idUsuario = " . $_SESSION['idUsuario'] . ""
                                    . " INNER JOIN movimentacao m ON categoriaMovimentacao_idCategoria = categoriacaixa_id WHERE m.dataMovimentacao BETWEEN ('$datainicio') AND ('$datafim')  "
                                    . " GROUP BY c.categoriacaixa_nome "
                                    . " ORDER BY c.categoriacaixa_nome ASC"
                                    . "");
                        }
                        
                        
                        
                        else {
                            $qr = mysqli_query($conn, "SELECT * FROM movimentacao m INNER JOIN categoriacaixa c ON m.categoriaMovimentacao_idCategoria = c.categoriacaixa_id "
                                    . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE MONTH(m.dataMovimentacao) = $mes && YEAR(m.dataMovimentacao) = $ano "
                                    . " GROUP BY c.categoriacaixa_id "
                                    . "   ORDER BY m.dataMovimentacao DESC");
                        }

                        while ($row = mysqli_fetch_array($qr)) {
//echo $datafiltro->format('d/m/Y');
                            //$datafiltro = ($row['dataMovimentacao']);


                            $data = new DateTime($row['dataMovimentacao']);
                            ?>

                            <option 
                            <?php //if (isset($_GET['mes']) && $_GET['mes']==$row['dataMovimentacao'])echo "selected=selected"  ?>
                                <?php if (isset($_GET['idCat']) && $_GET['idCat'] == $row['categoriacaixa_id ']) echo "selected=selected" ?> value="<?php echo $row['categoriacaixa_id '] ?>"
                                >
                                    <?php echo $row['categoriacaixa_nome'] ?>
                            </option>


                        <?php } ?>
                        </select>
<!--                        <input type="submit" value="Filtrar" class="botao" /><br/><br/>-->
                                    
                      </form>
                    
                    <br/>
                    <form action="index.php?p=bdate" method="post"> 
                    <p style="">Pesquisar por periodo
                    <input type="date" name="datainicio"> até <input type="date" name="datafim">  
                    <input type="hidden" value="<?php $row['categoriacaixa_id'] ?>" name="idCat">
                    <input type="submit" value="Filtrar" class="botao" /> 
                    </p>                 
                      </form>
<!--                         <form action="index.php?p=bdate" method="POST">-->
            
            
<!--        </form>-->
                    <h3 class="pb-3 mb-4 font-italic border-bottom">
                        Movimento do mês!
                    </h3>          
                    <!--          MOVIMENTO DO MES DETALHADO TABELA-->
                    <div class="blog-post">
                        <!-- TABELA -->                
                        <div class="col-lg-9 table-responsive-lg table-striped table-hover ">
                            <!--          <h2>Meus Pedidos</h2>         -->
                            <table class="table" id="tblMM">
                                <thead class="thead-dark">
                                    <tr>                  
                                        <td scope="col">Data da Movimentação</td>
                                        <td scope="col">Categoria</td>
                                        <td scope="col"> Descriçao</td>
                                        <td scope="col">Valor </td>               

                                    </tr>
                                </thead>
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
//                         if  (isset($_GET['datainicio']) && isset($_GET['idCat']) && (!empty($_GET['idCat']))) {
//                                    $datainicio = $_GET['datainicio'];
//                            $datafim = $_GET['datafim'];
//                             $id = $_SESSION['id'];
//                            $kok = $_GET['idCat']; 
//                                    $resultado_sql = "SELECT * FROM movimentacao m INNER JOIN categoriacaixa c ON m.categoriaMovimentacao_idCategoria = $kok "
//                                            . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario =  $id WHERE c.idCategoriaCaixa = $kok AND m.dataMovimentacao BETWEEN ('$datainicio') AND ('$datafim')  "
//                                            //. " AND c.idCategoriaCaixa = $kok "
//                                            . " GROUP BY m.idMovimentacao "
//                                            //   . " GROUP BY m.dataMovimentacao AND m.idMovimentacao "
//                                            . "   ORDER BY m.dataMovimentacao DESC"
//                                    ;
//                                }
//                                elseif  (isset ($_GET['datainicio']) ) {
//                            $datainicio = $_GET['datainicio'];
//                            $datafim = $_GET['datafim'];
//                             $id = $_SESSION['id'];
//                            $kok = $_GET['idCat'];     
//                              $resultado_sql = "SELECT * FROM movimentacao m INNER JOIN categoriacaixa c ON m.categoriaMovimentacao_idCategoria = c.idCategoriaCaixa "
//                                            . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = $id WHERE m.dataMovimentacao BETWEEN ('$datainicio') AND ('$datafim') "
//                                            //    . " AND idCategoria = $kok "
//                                            . " GROUP BY m.idMovimentacao "
//                                            // . " GROUP BY m.idMovimentacao "
//                                            . "   ORDER BY m.dataMovimentacao DESC"
//                                    ;
//                            }
                             
                            
                            if  (isset($_GET['mes'])  && isset($_GET['idCat']) && (!empty($_GET['idCat']))) {
                                    $sqlano = $_GET['ano'];
                                    $sqlmes = $_GET['mes'];
                                    $id = $_SESSION['idUsuario'];
                                    $kok = $_GET['idCat'];
                                    $resultado_sql = "SELECT * FROM movimentacao m INNER JOIN categoriacaixa c ON m.categoriaMovimentacao_idCategoria = $kok "
                                            . " LEFT JOIN usuario u ON m.usuarioMovimentacao_idUsuario =  $id WHERE MONTH(m.dataMovimentacao) = $sqlmes  && YEAR(m.dataMovimentacao) = $sqlano   "
                                            . " AND c.categoriacaixa_id = $kok "
                                            . " GROUP BY m.idMovimentacao "
                                            //   . " GROUP BY m.dataMovimentacao AND m.idMovimentacao "
                                            . "   ORDER BY m.dataMovimentacao DESC"
                                    ;
                                } elseif (isset($_GET['mes']) ) {
                                    $sqlano = $_GET['ano'];
                                    $sqlmes = $_GET['mes'];
                                    $id = $_SESSION['idUsuario'];
                                    $resultado_sql = "SELECT * FROM movimentacao m INNER JOIN categoriacaixa c ON m.categoriaMovimentacao_idCategoria = c.categoriacaixa_id  "
                                            . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = $id WHERE MONTH(m.dataMovimentacao) = $sqlmes && YEAR(m.dataMovimentacao) = $sqlano "
                                            //    . " AND idCategoria = $kok "
                                            . " GROUP BY m.idMovimentacao "
                                            // . " GROUP BY m.idMovimentacao "
                                            . "   ORDER BY m.dataMovimentacao DESC"
                                    ;
                                } else {
                                    $resultado_sql = "SELECT * FROM movimentacao m INNER JOIN categoriacaixa c ON m.categoriaMovimentacao_idCategoria = c.categoriacaixa_id "
                                            . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE MONTH(m.dataMovimentacao) = $mes && YEAR(m.dataMovimentacao) = $ano "
                                            . " GROUP BY m.idMovimentacao "
                                            . "   ORDER BY m.dataMovimentacao DESC";
                                }

//$resultado_sql = "SELECT * FROM movimentacao INNER JOIN cliente ON (itens_pedido.itens_pedido_id_pedido = '".$id_produto."') INNER JOIN pedido ON (pedido.pedido_id = '".$id_produto."')INNER JOIN produto ON (produto.produto_id = itens_pedido_id_produto) WHERE cliente.id_cliente = '".$_SESSION['id']."'";
//              $resultado_sql = "SELECT * FROM itens_pedido as i, usuario u, pedido p  WHERE i.itens_pedido_id_pedido = {$id_produto} AND i.id_usuario = {$_SESSION['id'] WHERE tab1.campo = 'valor'";
                                $resultado_query = mysqli_query($conn, $resultado_sql);
// $resultado = mysqli_fetch_assoc($resultado_query); //quero so um resultado ASSOC
// $resultado = mysqli_fetch_assoc($resultado_query);
//  while ($resultado = mysqli_fetch_array($resultado_query))   
                                while ($resultado = mysqli_fetch_array($resultado_query)) { //varios itens
//        {if(count($resultado_query) > 0) //se tiver comentario no bd
//                {
//                foreach ($resultado_query as $resultado)
//                {
                                    //$datapega = date_format(new DateTime($resultado['dataMovimentacao']),'d/m/Y');
                                    $data = new DateTime($resultado['dataMovimentacao']);
                                    $hora = new DateTime($resultado['dataMovimentacao']);
                                    $valor = $resultado['valorMovimentacao'];
                                    if ($resultado['tipoMovimentacao'] == 1) {
                                        @$totalissimo1 += $valor;
                                    } elseif ($resultado['tipoMovimentacao'] == 2) {
                                        @$totalissimo2 += $valor;
                                    }
                                    @$sobrou = $totalissimo1 - $totalissimo2;
//                        if($resultado['tipoMovimentacao'] == 3){
//                             @$totalissimo3 += $valor;
//                        }
//                        elseif($resultado['tipoMovimentacao'] == 4){
//                            @$totalissimo4 += $valor; 
//                           $qed  = $sobrou  - $totalissimo4;
//               }
                                    ?>                        
                                    <tbody>
                                        <tr>
                                            <?php if ($resultado['tipoMovimentacao'] == 1 || $resultado['tipoMovimentacao'] == 2) { ?>          
                                                <td> <?php echo $data->format('d/m/Y') ?></td>
                                                                                        
                                                 <?php
                                                 if(isset($_GET['datainicio']) || isset($_GET['datafim'])){
                                                     $datainicio = $_GET['datainicio'];
                                                          $datafim =   $_GET['datafim'];
                                                 }
                                                 ?>
                                                
                                                      <td><a href="index.php?p=fc&mes=<?php echo $data->format('m') ?>&ano=<?php echo $data->format('Y') ?>&idCat=<?php echo $resultado['categoriaMovimentacao_idCategoria'] ?>"><?php echo $resultado['categoriacaixa_nome'] ?></a></td>                  
                                                
                                                <td><?php echo $resultado['nomeMovimentacao'] ?></td>         
                                                <?php if ($resultado['tipoMovimentacao'] == 1) { ?>          
                                                    <td><?php echo number_format($resultado['valorMovimentacao'], 2, ',', '.') ?></td>        
                                                <?php } else { ?>
                                                    <td style="color: red;">-<?php echo number_format($resultado['valorMovimentacao'], 2, ',', '.') ?></td>            
                                                <?php } ?> 
                                                <td><a class="" data-toggle="modal" data-target="#myModal<?php echo $resultado['idMovimentacao'] ?>" href="#myModal<?php echo $resultado['idMovimentacao'] ?>">Editar</a></td>
                                            </tr>  
                                            <?php
                                        }
                                    }
                                    ?> 
                                    <!--  MOVIMENTO DETALHADO FIIIM-->          
                                </tbody>
                            </table>         
                            
                                <?php if (!empty($_GET['idCat']))  {
                                    if(@$sobrou){
                                        if (@$sobrou >= 0) {
                                           echo '<h4 style="float: center"> Total: '.number_format(@$sobrou, 2, ',', '.').'</h4>';         
                                    }   else { 
                                    echo '<h4 style="float: center; color: red;">Total: '.number_format($sobrou, 2, ',', '.').' </h4>'; 
                                }
                                   } } ?>
                                
                                <?php if  (empty($_GET['idCat'])) { ?>
                                <?php if (@$sobrou) { ?>
                             
                                <?php if (@$sobrou >= 0) { ?>
                                    <h4 style="float: center"> Total: <?php echo number_format(@$sobrou, 2, ',', '.') ?> </h4>         
                                    
                                <?php } else { ?>
                                    <h4 style="float: center; color: red;">Total: <?php echo number_format($sobrou, 2, ',', '.')?> </h4> 
                                    
                                    
                                <?php
                            } }  if (@$resultado_mesG ){ 
                                if ($resultado_mesG >= 0) { ?>
                              <h4 style="float: center"> Total no geral: <?php echo number_format($resultado_mesG, 2, ',', '.') ?> </h4>         
                            <?php } else { ?>
                            <h4 style="float: center; color: red;">Total no geral: <?php echo number_format($resultado_mesG, 2, ',', '.') ?> </h4>  
                            <?php
                            
                                }} else {
                                ?>
                                <h4 style="float: center;"><?php echo 'Ainda não há movimentação aqui'; ?></h4>
                                <style type="text/css">
                                    #tblMM{display: none}

                                </style>                       

<?php } }?>

                        </div>  </div>  </div>        </div>                        <!-- /TABELA -->

                        <!-- /. MOVIMENTO DO MES DETALHADO TABELA E EDITAR JUNTOS-->
                        <!-- /.blog-main -->



                       


                <!-- Inicio Modal Editar MES GERAL-->
                <?php
                if ((isset($_GET['mes'])) || isset($_GET['idCat']) || isset($resultado['categoriacaixa_id'])) {

                    $mesul = $_GET['mes'];
                    $resultado_sql = "SELECT * FROM movimentacao m INNER JOIN categoriacaixa c ON  c.categoriacaixaid_usuarioid  =  " . $_SESSION['idUsuario'] . ""
                            . " INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . " WHERE MONTH(m.dataMovimentacao) = $mesul  "
                            . " GROUP BY m.idMovimentacao "
                            . "   ORDER BY m.dataMovimentacao DESC";
                }
                @$data = new DateTime($resultados['dataMovimentacao']);
                @$hora = new DateTime($resultados['dataMovimentacao']);

                $resultado_query = mysqli_query($conn, $resultado_sql);
//foreach($resultado_query as $resultados){
                while ($resultados = mysqli_fetch_array($resultado_query)) {
                    ?>
                    <!-- Modal EDITAR MOVIMENTACAO -->
                    <div id="myModal<?php echo $resultados['idMovimentacao'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Editar Movimentação</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="POST" action="index.php?p=proceditarM">
                                        <div class="form-group">
                                            <input id="id"  class="form-control" value=" <?php echo $resultados['categoriaMovimentacao_idCategoria']; ?> " name="id" type="hidden">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="hidden" name="idR" class="form-control" required placeholder="" value="<?php echo $resultados['idMovimentacao'] ?>" >

                                                </div>
                                                Data:
                                                <div class="form-line">

                                                    <?php
                                                    // $data_formatada = DateTime::createFromFormat('d/m/Y', $resultados['dataMovimentacao']); 
                                                    $dataaqui = new DateTime($resultados['dataMovimentacao']);
                                                    ?>
                                                    <input type="date" maxlength="10" onkeypress="return dateMask(this, event);" 
                                                           id="saida" name="data" value="<?php echo $dataaqui->format('Y-m-d'); ?>"
                                                           class="form-control" required  name="dataMovimentacao"/>
                                                </div>

                                                <label>Categoria: </label> 

                                                <?php
                                                $qr = mysqli_query($conn, "SELECT * FROM usuario u INNER JOIN categoriacaixa c ON c.categoriacaixaid_usuarioid  = " . $_SESSION['idUsuario'] . ""
                                                        . " GROUP BY c.categoriacaixa_nome "
                                                        . " ORDER BY c.categoriacaixa_nome ASC"
                                                        . "");
                                                ?>


                                                <div class="">
                                                    <select name="categoria">
                                                        <?php
                                                        while ($row = mysqli_fetch_array($qr)) {
                                                            $idCatnovo = $resultados['categoriaMovimentacao_idCategoria'];
                                                            //$idCatnovo = $resultado['idCategoria'];
                                                            ?>
                                                            <option <?php if (isset($idCatnovo) && $idCatnovo == $row['categoriacaixa_id']) echo "selected=selected" ?> value="<?php echo $row['categoriacaixa_id'] ?>"><?php echo $row['categoriacaixa_nome'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                            Descrição:
                                            <div class="form-line">
                                                <input type="text" class="form-control" required placeholder="" value="<?php echo $resultados['nomeMovimentacao'] ?>" name="nome">

                                            </div>
                                            Valor:
                                            <div class="form-line">
                                                <input type="text" class="form-control" required  value="<?php echo number_format($resultados['valorMovimentacao'], 2, ',', '.') ?>" name="valor" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});" title="Preencha com um valor" placeholder="000,00">

                                            </div><br/>
                                            <?php if ($resultados['tipoMovimentacao'] == 4 || $resultados['tipoMovimentacao'] == 3) { ?>
                                                Pagamento Parcial:<small>Se houver pagamento parcial, coloque o valor no campo abaixo em seguida click no botão: <h5 style="color: green"> PAGO PARCIAMENTE (VERDE)</h5></small>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" required  value="0" name="pagParcial" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});" title="Preencha com um valor" placeholder="000,00">

                                                </div>
                                            <?php } ?>
                                            Tipo:
                                            <div class="form-line">                        

                                                <label for="tipo_receita" style="color:#030"><input type="radio" name="tipo" value="1" id="tipo_receita" required="on" <?php echo ($resultados['tipoMovimentacao'] == 1) ? "checked" : null; ?>/> Receita!</label>&nbsp; 

                                                <label for="tipo_despesa" style="color:#C00"><input type="radio" name="tipo" value="2" id="tipo_despesa" required="on" <?php echo ($resultados['tipoMovimentacao'] == 2) ? "checked" : null; ?>/> Despesa!</label>
                                                


                                            </div>

                                        </div>
                                </div>
                                <div class="modal-footer">

                                    <input type="hidden" value="<?php echo $resultados['idMovimentacao'] ?>" name="idEditar">
                                    <?php if ($resultados['tipoMovimentacao'] == 4) { ?>
                                        <button id="btnPagParcialQED" name="btnPagParcialQED" class="btn btn-success" type="submit" >PAGO PARCIALMENTE</button><br/><br/><br/> 
                                    <?php } ?>
                                         <?php if ($resultados['tipoMovimentacao'] == 3) { ?>
                                        <button id="btnPagParcialQMD" name="btnPagParcialQMD" class="btn btn-success" type="submit" >PAGO PARCIALMENTE</button><br/><br/><br/> 
                                    <?php } ?>
                                    <button id="btnEditar" name="btnEditar" class="btn btn-warning" type="submit">ALTERAR</button> 

                                    </form>
                                    <!--style="font-size:10px; color:#666"-->
                                    <form action="index.php?p=procapagarM&idCat=<?php echo $resultados['idMovimentacao'] ?>" method="POST">
                                        <input type="hidden" value="<?php echo $resultados['idMovimentacao'] ?>" name="idApagar">
                                        <button  onclick="return confirm('Tem certeza que deseja apagar esta movimentação ?')" title="APAGAR" id="APAGAR" name="apagar" class="btn btn-danger" type="submit">APAGAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php ?>
                    <!-- Fim Modal EDITAR MES GERAL->
                <?php } ?>     
                
                
                
                







                <br/><br/>  




                <!--ARQUIVO-->
                <aside class="col-md-4 blog-sidebar">
                    <div class="p-3">
                        <h4 class="font-italic">Arquivos</h4>
                        <ol class="list-unstyled mb-0">
                            <?php
                            $qr = mysqli_query($conn, "SELECT MONTH(m.dataMovimentacao) as 'mes', YEAR(m.dataMovimentacao) as 'ano'  FROM movimentacao m INNER JOIN usuario u ON m.usuarioMovimentacao_idUsuario = " . $_SESSION['idUsuario'] . ""
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

                                    <li><a href="index.php?p=fc&mes=<?php echo $mes ?>&ano=<?php echo $ano ?>"><?php echo $mesc ?> de <?php echo $ano ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ol>
                    </div>
                    <!--/ARQUIVO-->








                    <!--ONDE ME ENCONTRA-->
                    <div class="p-3">
                        <h4 class="font-italic">Onde me encontrar:</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                    <!--/ONDE ME ENCONTRAR-->
                    <!--SOBRE MIM-->

                    <div class="p-3 mb-3 bg-light rounded">
                        <h4 class="font-italic">Sobre Mim</h4>
                        <p class="mb-0">Meu nome é <em>Emmanoel Lopes Fernandes</em> Formado na área de sistemas, faço sistema para aprender mais sobre programação.</p>
                    </div>          

                    <!--/SOBRE MIM-->


                    <!--FOOTTER-->
                </aside><!-- /.blog-sidebar -->

                <!--/FOOTER-->
                <!-- /.row -->
            </div><br/>
            <footer class="blog-footer">
                <p class="mt-5 mb-3 text-muted"><em>Sistema Financeiro</em> <strong></strong> - Desenvolvido por <a href="https://www.linkedin.com/in/emmanoelfernandes/Emmanoel Fernandes">Emmanoel Lopes Fernandes</a>. <em>Versão Beta 1.1 (26/03/2020) &copy;  2019-2020</em></p>
                <p>
                    <a href="#">Voltar ao topo</a>
                </p>
            </footer>
        </main><!-- /.container -->


    </div> <!--/CONTENER-->
    <!-- Principal JavaScript do Bootstrap -->
 

    
    
    <script>
        $(document).ready(function () {

            $("#btnAddCat").click(function () {
                $("#formAddCat").toggle();
            });
            $("#btnAddMov").click(function () {
                $("#formAddMov").toggle();
            });
        });
    </script>


    