<?php
if (@$_SESSION['idUsuario'] == 0) {
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=home'>";
    exit();
}
?>
<!DOCTYPE html>
<!--<header>
<script type="text/javascript">setTimeout("window.close();", 167000);</script>
</header>-->
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5"><br>Área do Administrador </h1>


            <div class="table-responsive-xl">
                <table class="table">
                    <tr>

                        <td>Data e Horário do Pedido</td>

                        <td>Produto</td>
<!-- <td>Descrição Completa</td>-->
                        <td>Quantidade</td>
                        <td>Valor Unitário</td>



                    </tr>

                    <?php
                    if (isset($_GET['id']));
// $id_produto_carrinho = '0';
                    $read_pedido = mysqli_query($conn, "SELECT * FROM itens_pedido INNER JOIN cliente ON (itens_pedido.id_usuario = cliente.id_cliente)"
                            . " INNER JOIN pedido ON (pedido.pedido_id = itens_pedido.itens_pedido_id_pedido)"
                            . " INNER JOIN produto ON (produto.produto_id = itens_pedido.itens_pedido_id_produto) "
                            . " WHERE pedido.pedido_id = '" . $_GET['id'] . "'"
                    );
                    if (mysqli_num_rows($read_pedido) > '0') {

                        foreach ($read_pedido as $read_pedido_view) {
                             $cell = mysqli_real_escape_string($conn, trim($read_pedido_view['celular_cliente']));
        $cel = str_replace(',', '.', str_replace('(', '', $cell));
        $ce = str_replace(',', '.', str_replace(')', '', $cel));
        $c = str_replace(',', '.', str_replace(' ', '', $ce));
        $whatsapp = str_replace(',', '.', str_replace('-', '', $c));
                            
                            
                            
                            
                            $resultadoFinal = $read_pedido_view['itens_pedido_valor_produto'];
                            $data = new DateTime($read_pedido_view['pedido_data']);
                            $hora = new DateTime($read_pedido_view['pedido_data_hora']);



                            if ($read_pedido_view['pedido_status'] == '0') {
                             ?>
                    <script type="text/javascript"> 
                          document.dataForm.submit()
                     </script>
                             <?php
                                $status_pedido = "Processando";
                                $_SESSION['statusPedido'] = $status_pedido;
                            } elseif ($read_pedido_view['pedido_status'] == '1') {
                                $status_pedido = "Preparando";
                                  $_SESSION['statusPedido'] = $status_pedido;
                            } elseif ($read_pedido_view['pedido_status'] == '2') {
                                $status_pedido = "Saiu Para Entrega";
                                  $_SESSION['statusPedido'] = $status_pedido;
                            } elseif ($read_pedido_view['pedido_status'] == '3') {
                                $status_pedido = "Entregue - Finalizado";
                                  $_SESSION['statusPedido'] = $status_pedido;
                            }
                            echo '<tr>
                        
              
                  <td>' . $data->format('d/m/Y') . ' - ' . $hora->format('H:i:s') . '</td>               
 
                      
                                

 <td>' . $read_pedido_view['produto_nome'] . '</td>
                                          <td>' . $read_pedido_view['itens_pedido_quantidade'] . '</td>
                                    <td>' . number_format($resultadoFinal, 2, ',', '.') . '</td>
                                                 
                                                      
          

                     
                  
                      
                  
              
 
              </tr>';
                   }
                    }    
                    ?>
                </table>
            </div>
<!--  <label>Valor Total:  </label> <?php echo number_format($read_pedido_view['pedido_valor'], 2, ',', '.') ?><br/>                  
<label>Observação:  </label> <?php echo $read_pedido_view['pedido_obs'] ?><br/>
            -->
         <!--                    <label>Valor Total Com o Frete:  </label> <?php echo number_format($read_pedido_view['pedido_valor'] + 5, 2, ',', '.') ?><br/>-->

            <div class="container-fluid" style="text-align: center;">                  

                <?php
                if ($read_pedido_view['pedido_fdp'] == "Cartão") {
                    echo " Forma de Pagamento: Cartão <br/>";
                    $valortotal = $read_pedido_view['pedido_valor'];
                    $desconto = $read_pedido_view['pedido_desco'];
                     echo " Tipo de cartão:  " . $read_pedido_view['pedido_tipo'] . "<br/>";
                    $acre = 1.;

                   $valortotalacres =  $valortotal + $acre;

                    $subpedidos = $valortotal + $desconto;

                    
                    echo " Sub-Total:  R$ " . number_format($subpedidos , 2, ",", ".") . "<br/>";
                    echo " Acréscimo R$ " . number_format($acre, 2, ",", ".") . "<br/>";
                      echo " Frete:  R$ " . number_format($read_pedido_view['itens_pedido_frete'], 2, ",", ".") . "<br/>";
                    echo " Desconto:  R$ " . number_format($desconto, 2, ",", ".") . "<br/>";
                   
                    echo " Total:  R$ " . number_format($valortotalacres, 2, ",", ".") . "<br/><br/>";
                   
                }


                if ($read_pedido_view['pedido_troco'] == 0) {
                    @$levartroco = $read_pedido_view['pedido_troco'];
                } else {
                    @$levartroco = $read_pedido_view['pedido_troco'] - $read_pedido_view['pedido_valor'];
                    }
                if ($read_pedido_view['pedido_fdp'] == "Dinheiro") {
                    $sub = $read_pedido_view['pedido_desco'] + $read_pedido_view['pedido_valor'];
                
                    echo " Forma de Pagamento: Dinheiro <br/>";
                    echo " Sub-Total:  R$ " . number_format($sub, 2, ",", ".") . "<br/>";
                      echo " Frete:  R$ " . number_format($read_pedido_view['itens_pedido_frete'], 2, ",", ".") . "<br/>";
                    echo " Desconto:  R$ " . number_format($read_pedido_view['pedido_desco'], 2, ",", ".") . "<br/>";                  

                    echo " Total:  R$ " . number_format($read_pedido_view['pedido_valor'], 2, ",", ".") . "<br/>";                   
                    
                    echo " Troco para:     R$ " . number_format($read_pedido_view['pedido_troco'], 2, ",", ".") . "<br/>";
                    echo " Levar troco: R$ " . number_format($levartroco, 2, ",", ".") . "<br/><br/>";
                }


                if ($read_pedido_view['pedido_fdp'] == "PIX - NOSSA CHAVE PIX") {
                    echo " Forma de Pagamento: PIX <br/>";
                    $sub = $read_pedido_view['pedido_valor'] - $read_pedido_view['pedido_desco'];
                    echo " Sub-Total:  R$ " . number_format($sub, 2, ",", ".") . "<br/>";
                     echo " Frete:  R$ " . number_format($read_pedido_view['itens_pedido_frete'], 2, ",", ".") . "<br/>";
                    echo " Desconto:  R$ " . number_format($read_pedido_view['pedido_desco'], 2, ",", ".") . "<br/>";
                    echo " Total:  R$ " . number_format($read_pedido_view['pedido_valor'], 2, ",", ".") . "<br/><br/>";
                }




                if ($read_pedido_view['pedido_obs'] != "") {
                    echo " Observação do Pedido: " . $read_pedido_view['pedido_obs'] . "<br/><br/>";
                }

                $msgPix = "Olá, vimos que compraste conosco com a forma de pagamento via PIX, nos envie o comprovante, por favor.";
                if ($read_pedido_view['pedido_modo'] == "") {
                    echo "Modo: Buscar no local<br/>";
                    echo " Cliente: " . $read_pedido_view['nome_cliente'] . "<br/>";

                    echo " Celular:  "
                    ?>
                    <a href="https://api.whatsapp.com/send?phone=  <?php echo "55".$whatsapp ?> &text=   <?php echo $msgPix ?>" style="color: green; text-decoration: none;" target="_blank" rel="noopener noreferrer" >
    <?php echo $read_pedido_view['celular_cliente'] ?> 
                    </a>
                    <br/>   


                    <?php
                } else {
                    echo "Modo: Delivery<br/> ";
                    echo " Cliente: " . $read_pedido_view['nome_cliente'] . "<br/>";
                    echo " Celular:  "
                    ?>
                    <a href="https://api.whatsapp.com/send?phone=  <?php echo "55".$whatsapp ?> &text=   <?php echo $msgPix ?>" style="color: green; text-decoration: none;" target="_blank" rel="noopener noreferrer">
    <?php echo $read_pedido_view['celular_cliente'] ?> 
                    </a>
                    <br/> 



                    <?php
                }
                if ($read_pedido_view['pedido_modo'] != "") {
                    echo " Endereço: " . $read_pedido_view['endereco_cliente'] . "<br/>";
                    echo " Número: " . $read_pedido_view['numeroCasa_cliente'] . "<br/>";
                    echo " Bairro: " . $read_pedido_view['bairro_cliente'] . "<br/>";
                    echo " Complemento: " . $read_pedido_view['cliente_complemento'] . "<br/>";
                     echo " Referência: " . $read_pedido_view['ponto_cliente'] . "<br/>";
                } 
                ?>    

                    
                    
                    
                    
                    
                    
                <!--      //IMPRIMIR ISSO, prepara form para imprimir, jogar para pagina imprimirPedido-->
                <form method="post"  name="dataForm" action="index.php?p=imprimir" target="_blank">

<!--            <input type="hidden"  name="caluf" value="CALUF'S REFEIÇÕES">
<input type="hidden"  name="novo" value="NOVO PEDIDO">-->
                    <?php
                    if (mysqli_num_rows($read_pedido) > '0') {
                        foreach ($read_pedido as $read_pedido_view) {
                            $resultadoFinal = $read_pedido_view['itens_pedido_valor_produto'];
                            $data = new DateTime($read_pedido_view['pedido_data']);
                            $hora = new DateTime($read_pedido_view['pedido_data_hora']);
                            ?>     
                            <input type="hidden"  name="id[]" value="<?php echo $read_pedido_view['produto_id'] ?>">
                            <input type="hidden"  name="dataehora" value="<?php echo $data->format('d/m/Y') . ' - ' . $hora->format('H:i:s') ?>">            
                            <input type="hidden"  name="produtoNome[<?php echo $read_pedido_view['produto_id'] ?>]" value="<?php echo $read_pedido_view['produto_nome'] ?>">
                            <input type="hidden"  name="qtd[<?php echo $read_pedido_view['produto_id'] ?>]" value="<?php echo $read_pedido_view['itens_pedido_quantidade'] ?>">
                            <input type="hidden"  name="precoUnt[<?php echo $read_pedido_view['produto_id'] ?>]" value="<?php echo number_format($resultadoFinal, 2, ',', '.') ?>">     
 <input type="hidden"  name="pedidoid" value="<?php echo $read_pedido_view['pedido_id'] ?>">

                        <?php }
                    } ?>

                    <?php
                    if ($read_pedido_view['pedido_fdp'] == "Cartão") {
                        $acre = 1.;

                   $valortotalacres =  $valortotal + $acre;

                    $subpedidos = $valortotal + $desconto;
                    
                        //echo " Forma de Pagamento: Cartão <br/>";
                        echo "  <input type='hidden'  name='fdp' value='" . $read_pedido_view['pedido_fdp'] . "'>";
                      //  $sub = $read_pedido_view['pedido_valor'] + $read_pedido_view['pedido_desco'];
  echo "   <input type='hidden'  name='tipo' value='" . $read_pedido_view['pedido_tipo'] . "'>";

                        echo "   <input type='hidden'  name='sub' value='" . number_format( $subpedidos, 2, ",", ".") . "'>";
                         echo "  <input type='hidden'  name='acre' value='" . number_format($acre, 2, ",", ".") . "'>";
                                           echo "   <input type='hidden'  name='frete' value='" . number_format($read_pedido_view['itens_pedido_frete'], 2, ",", ".") . "'>";
                        echo "   <input type='hidden'  name='desco' value='" . number_format($desconto, 2, ",", ".") . "'>";

                         
                         echo "  <input type='hidden'  name='total' value='" . number_format($valortotalacres, 2, ",", ".") . "'>";
                        //echo " Total:  R$ " . number_format($read_pedido_view['pedido_valor'], 2, ",", ".") . "<br/>";
                      

                        //echo " Tipo de cartão:  " . $read_pedido_view['pedido_tipo'] . "<br/><br/>";
                    }


                    if ($read_pedido_view['pedido_troco'] > 0) {
                        @$levartroco = $read_pedido_view['pedido_troco'] - $read_pedido_view['pedido_valor'];
                       } //echo " Forma de Pagamento: Dinheiro <br/>";
                         if ($read_pedido_view['pedido_fdp'] == "Dinheiro") {
                             $sub = $read_pedido_view['pedido_valor'] + $read_pedido_view['pedido_desco'];


                        echo "   <input type='hidden'  name='sub' value='" . number_format($sub, 2, ",", ".") . "'>";
                                                                   echo "   <input type='hidden'  name='frete' value='" . number_format($read_pedido_view['itens_pedido_frete'], 2, ",", ".") . "'>";

                        echo "   <input type='hidden'  name='desco' value='" . number_format($read_pedido_view['pedido_desco'], 2, ",", ".") . "'>";

                        echo "   <input type='hidden'  name='troco' value='" . number_format($read_pedido_view['pedido_troco'], 2, ",", ".") . "'>";
                        echo "  <input type='hidden'  name='levatroco' value='" . number_format($levartroco, 2, ",", ".") . "'>";
//echo " Total:  R$ " . number_format($read_pedido_view['pedido_valor'], 2, ",", ".") . "<br/>";
                        //echo " Troco para:  R$ " . number_format($read_pedido_view['pedido_troco'], 2, ",", ".") . "<br/>";
                        //echo " Troco:  R$ " . number_format($levartroco, 2, ",", ".") . "<br/><br/>";
                    
                  
                        echo "   <input type='hidden'  name='total' value='" . number_format($read_pedido_view['pedido_valor'], 2, ",", ".") . "'>";
                        echo "  <input type='hidden'  name='fdp' value='" . $read_pedido_view['pedido_fdp'] . "'>";
                    }
                    
                    
                        if ($read_pedido_view['pedido_fdp'] == "PIX - NOSSA CHAVE PIX") {
                             $fdpp = 'PIX';
                             echo "  <input type='hidden'  name='fdpp' value='" . $fdpp . "'>";
                   
                    $sub = $read_pedido_view['pedido_valor'] - $read_pedido_view['pedido_desco'];
                   
                    echo "  <input type='hidden'  name='sub' value='" . number_format($sub, 2, ",", ".") . "'>";
                    echo "   <input type='hidden'  name='frete' value='" . number_format($read_pedido_view['itens_pedido_frete'], 2, ",", ".") . "'>";

                    echo "  <input type='hidden'  name='desco' value='" . number_format($read_pedido_view['pedido_desco'], 2, ",", ".") . "'>";
                       echo "  <input type='hidden'  name='total' value='" . number_format($read_pedido_view['pedido_valor'], 2, ",", ".") . "'>";
                          echo "  <input type='hidden'  name='fdp' value='" . ($read_pedido_view['pedido_fdp']) . "'>";
                    
                      
                }
                    
                    if ($read_pedido_view['pedido_obs'] != "") {
                        echo "<input type='hidden'  name='obs' value='" . $read_pedido_view['pedido_obs'] . "'>";
                        //echo " Observação do Pedido: " . $read_pedido_view['pedido_obs'] . "<br/><br/>";
                    }
                    if ($read_pedido_view['pedido_modo'] == "") {
                        //echo "Buscar no local<br/>";
                        echo "   <input type='hidden'  name='nome' value='" . $read_pedido_view['nome_cliente'] . "'>";
                        //echo " Cliente: " . $read_pedido_view['nomeCliente'] . "<br/>";
                        echo "   <input type='hidden'  name='celular' value='" . $read_pedido_view['celular_cliente'] . "'>";
                        //echo " Celular: " . $read_pedido_view['celularCliente'] . "<br/>";
                    } else {
                        // echo "Modo Delivery<br/> ";
                        echo "   <input type='hidden'  name='nome' value='" . $read_pedido_view['nome_cliente'] . "'>";
                        //echo " Cliente: " . $read_pedido_view['nomeCliente'] . "<br/>";
                        echo "   <input type='hidden'  name='celular' value='" . $read_pedido_view['celular_cliente'] . "'>";
                        //echo " Celular: " . $read_pedido_view['celularCliente'] . "<br/>";
                    }
                    if ($read_pedido_view['pedido_modo'] != "") {
                        //echo " Endereço: " . $read_pedido_view['endCliente'] . "<br/>";
                        echo "   <input type='hidden'  name='end' value='" . $read_pedido_view['endereco_cliente'] . "'>";
                        //echo " Número: " . $read_pedido_view['numCliente'] . "<br/>";
                        echo "   <input type='hidden'  name='num' value='" . $read_pedido_view['numeroCasa_cliente'] . "'>";
                        //echo " Bairro: " . $read_pedido_view['bairroCliente'] . "<br/>";
                        echo "   <input type='hidden'  name='bairro' value='" . $read_pedido_view['bairro_cliente'] . "'>";
                        //echo " Bairro: " . $read_pedido_view['bairroCliente'] . "<br/>";
                        echo "  <input type='hidden'  name='comp' value='" . $read_pedido_view['cliente_complemento'] . "'>";
                           echo "  <input type='hidden'  name='ponto' value='" . $read_pedido_view['ponto_cliente'] . "'>";
                        
                        
                    }

                    echo "  <input type='hidden'  name='msg' value='Obrigado por comprar conosco, bom almoço, Deus te abençoe e volte sempre.'>";
                    ?>  
















                    <button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button>

                </form>
            </div>




 <?php if ($_SESSION['statusPedido'] == "Processando") {  ?>  


            <form action="" method="POST">
                <label> Status:  <?php echo $_SESSION['statusPedido']?></label> <select name="processo" >
<!--             <option  value=""><?php echo $_SESSION['statusPedido']?></option>  -->
            <option  value="">  <?php echo "Alterar Status..."?></option> 
                 
                  
                    <option  value="1">Preparando</option>
                    <option value="2">Saiu Para Entrega</option>
                    <option value="3" >Entregue - Finalizado</option>                            
                </select>
                <button type="submit" value="">Atualizar Status</button>
            </form>
            
        <?php   }    ?>
              
              <?php if ($_SESSION['statusPedido'] == "Preparando") {  ?>   
            <form action="" method="POST">
              <label> Status:  <?php echo $_SESSION['statusPedido']?></label> <select name="processo" >
<!--             <option  value=""><?php echo $_SESSION['statusPedido']?></option>  -->
                   <option  value="">  <?php echo "Alterar Status..."?></option>
                    <option  value="0">Processando</option>
                
                    <option value="2">Saiu Para Entrega</option>
                    <option value="3" >Entregue - Finalizado</option>                            
                </select>
                <button type="submit" value="">Atualizar Status</button>
            </form>
            <?php    }   ?>
            
        <?php if ($_SESSION['statusPedido'] == "Saiu Para Entrega") {  ?>       
            <form action="" method="POST">
                <label> Status:  <?php echo $_SESSION['statusPedido']?></label> <select name="processo" >
<!--             <option  value=""><?php echo $_SESSION['statusPedido']?></option>  -->
                   <option  value="">  <?php echo "Alterar Status..."?></option>
                    <option  value="0">Processando</option>
                    <option  value="1">Preparando</option>
                 
                    <option value="3" >Entregue - Finalizado</option>                            
                </select>
                <button type="submit" value="">Atualizar Status</button>
            </form>
            <?php    }    ?>
            
             <?php if ($_SESSION['statusPedido'] == "Entregue - Finalizado") {  ?>  
            <form action="" method="POST">
                <label> Status:  <?php echo $_SESSION['statusPedido']?></label> <select name="processo" >
<!--             <option  value=""><?php echo $_SESSION['statusPedido']?></option>  -->
                   <option  value="">  <?php echo "Alterar Status..."?></option>
                    <option  value="0">Processando</option>
                    <option  value="1">Preparando</option>
                    <option value="2">Saiu Para Entrega</option>
                                          
                </select>
                <button type="submit" value="">Atualizar Status</button>
            </form>
            <?php    }   ?>
            

        </div>
    </div>
</div>
<?php
if (isset($_POST['processo'])) {
    $processo = $_POST['processo'];

    $update_pedido = "UPDATE pedido SET  pedido_status = '" . $processo . "' WHERE pedido_id = '" . $read_pedido_view['pedido_id'] . "'";
    mysqli_query($conn, $update_pedido); //executar query

    echo "<script>alert(' Status Alterado Com Sucesso')</script>";
    echo "<script>window.location = 'index.php?p=admin'</script>";
}
 if ($read_pedido_view['pedido_status'] == '0') {
                             ?>
                    <script type="text/javascript"> 
                          document.dataForm.submit()
                     </script>
                             <?php
                                
                            }
?>


<!--

<script type="text/javascript">

window.print();
//
</script>
<script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>-->