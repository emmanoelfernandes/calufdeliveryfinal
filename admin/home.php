<!--PAGIMA INICIAL DO ADMINISTRADOR-->
    <?php if (@$_SESSION['idUsuario'] == 0 ) { 
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=home'>";
exit();  }  ?>
    
    
    <?php
     echo "<META HTTP-EQUIV=REFRESH CONTENT = '30;URL='>";
//  unlink ($dir.$dname);
 // echo "<meta HTTP-EQUIV='refresh' CONTENT='15;URL=index.php?p=admin'>";
?>
    <div class="container">
    
    <div class="row">
       
            <?php $atual = date('d-m-Y'); ?>
            <h1 class="mt-5"><br>Área do Administrador - <?php echo $atual; ?> </h1><br/>

            <div id="setTimeAdmin" class="table-responsive" >
            <table class="table table-striped table-sm" id="tblProcessando">               
                 
           <?php                               
                           
                    if ($status_pedido = "Novo Pedido") {
                        
                        ?>
         
<!--                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
                    <h2 id="hProcessando" >Novo Pedido</h2>
                        <tr>
                             <td>Código</td>
                            <td>Data e Horário do Pedido</td>
                            <td>Cliente</td>
<!--                            <td>Endereço</td>                                  -->
                            <td>Valor Total </td>
                            <td>Forma de Pagamento</td>
                          
                            <td>Status</td>
                             <td>Alterar Status</td>
                            <td>Ações</td>
                          
                        </tr> 
                  

                    <?php } ?> 
                    <?php 
//  if(isset($_GET['id']));
// $id_produto_carrinho = '0';
//                    echo  "<script type=\"text/javascript\">
	
                               //alert(\"Há um novo pedido.\");
				//</script>"; 
                    
                    $hoje = date('Y-m-d');
                    $pedidoStatus = '0';
                    $read_pedido = mysqli_query($conn, "SELECT * FROM itens_pedido "
                            . "LEFT JOIN cliente ON (itens_pedido.id_usuario = cliente.id_cliente)"
                            . "LEFT JOIN pedido ON (pedido.pedido_id = itens_pedido.itens_pedido_id_pedido)"
                            . "LEFT JOIN produto ON (produto.produto_id = itens_pedido.itens_pedido_id_produto)  "
                            . " WHERE pedido_status = '" . $pedidoStatus . "'"
                            . "AND pedido.pedido_data = '" . $hoje . "' "
                       . "GROUP BY pedido.pedido_id "
                        . " ORDER BY pedido.pedido_data_hora DESC"
                    ); // WHERE pedido.pedido_data = 'NOW()' 
                    if (mysqli_num_rows($read_pedido) > '0') {     ?> 
         <script>
function showNotification(){
    const notification =  new Notification("NOVO PEDIDO", {
            body: "HEY, NOVO PEDIDO AI,     ATENDAAAA!!!!!!",
        icon: ""   
     }) ;
     notification.onclick     = (e) => {
         window.location.href = "index.php?p=verPedidosVenda&id=' . $read_pedido_view['pedido_id'] . '";
     };
}

console.log(Notification.permission);

if(Notification.permission === "granted"){
  showNotification();
    }else if (Notification.permission !== "denied"){
        Notification.requestPermission().then(permission => {
             if(permission === "granted"){
                 showNotification();
             }
       });
    
    
    
}
</script>
    <?php 
                        foreach ($read_pedido as $read_pedido_view) {
//                            
//                        echo    "<embed src='./sonsDoSite/sino.mp3' width='1' height='1'>";
//                        
//             echo "<audio autoplay='true' src='./sonsDoSite/sino.mp3' ></audio>";    
//		  echo    "<embed src='./sonsDoSite/sino.mp3' width='1' height='1'>";
//                        
//             echo "<audio autoplay='true' src='./sonsDoSite/sino.mp3' ></audio>";    
//             echo    "<embed src='./sonsDoSite/sino.mp3' width='1' height='1'>";
//                        
//             echo "<audio autoplay='true' src='./sonsDoSite/sino.mp3' ></audio>";    ?> 
 

<audio src="./sonsDoSite/sino.mp3" autoplay></audio>
                       
                            
                       
                            <!-- onchange="form_filtro_cat0.submit()"      //IMPRIMIR ISSO-->                           
                       <?php     
                            
                       $data = new DateTime($read_pedido_view['pedido_data']);
                            $hora = new DateTime($read_pedido_view['pedido_data_hora']);
                         @$totalmostra =   number_format($read_pedido_view['pedido_valor'], 2, ',', '.');
                            ?>
                            
                                        
                            
                            
                            <?php
                            echo '<tr>
                <td>' . $read_pedido_view['pedido_id'] . '</td>
                  <td>' . $data->format('d/m/Y') . ' - ' . $hora->format('H:i:s') . '</td>
                      <td>' . $read_pedido_view['nome_cliente'] . '</td>
                         
             
';
                          
     if ($read_pedido_view['pedido_fdp'] == "Cartão"){   
         $acres = 1.;
         $acre = $read_pedido_view['pedido_valor'] + $acres;
         ?>
          
          <td>    <?php   echo number_format($acre,2,',','.');     ?> </td>
      
          <?php  } else {   ?>
        
          <td> <?php  echo  number_format($read_pedido_view['pedido_valor'],2,',','.');     ?> </td>
    
 <?php
          }           

    ?>
                 
                  <?php               
echo ' 
  <td>
       '. $read_pedido_view['pedido_fdp'] .'
        
 </td>                  

    
<td>' . $status_pedido . ' </td>                   
        <td>
        <form action="" method="POST" name="form0">
                     <select name="processo0" onchange="form0.submit()">
                         if ($status_pedido == "Novo Pedido) selected=selected  <option  value="0">Novo Pedido</option>
                            
                            
                            <option  value="1">Preparando</option>
                            <option value="2">Saiu Para Entrega</option>
                            <option value="3" >Entregue - Finalizado</option>                            
                        </select>
          
     <input type="hidden" name="idalterastatus0" value="'. $read_pedido_view['pedido_id'].'">
                        
                        <button type="submit" >Atualizar</button>
                    </form>
 
          </td>                     
 
 <td><a href="index.php?p=verPedidosVenda&id=' . $read_pedido_view['pedido_id'] . '">Ver Pedido</a></td>                  
 
</tr>'                                    
                                    ;                
                        }
                    }             
                    else { ?>
                        <h2>Não há novos pedidos (ainda)</h2> 
                        <hr>
                       <style type="text/css">
#tblProcessando {display: none}
#hProcessando {display: none; text-align: center;}

                       </style>                       
<?php
}                    ?>
                 </table>  
            </div>
           
            
            
            
            
            
            
<!--            Tabela Preparando-->
            
                

           <div class="table-responsive">
            <table class="table table-striped table-sm" id="tblPreparando">               
                 
           <?php                               
                           
                    if ($status_pedido = "Preparando") {
                        ?>
                    <h2 id="hPreparando">Preparando</h2>
                        <tr>
                             <td>Código</td>
                            <td>Data e Horário do Pedido</td>
                            <td>Cliente</td>
<!--                            <td>Endereço</td>                                  -->
                            <td>Valor Total </td>
                            <td>Forma de Pagamento</td>
                          
                            <td>Status</td>
                        <td>Alterar Status</td>
                            <td>Ações</td>
                        </tr> 
                  
                    <?php } ?> 
                    <?php
//  if(isset($_GET['id']));
// $id_produto_carrinho = '0';
//                    echo  "<script type=\"text/javascript\">
	
                               //alert(\"Há um novo pedido.\");
				//</script>"; 
                    
                    $hoje = date('Y-m-d');
                    $pedidoStatus = '1';
                    $read_pedido = mysqli_query($conn, "SELECT * FROM itens_pedido "
                            . "LEFT JOIN cliente ON (itens_pedido.id_usuario = cliente.id_cliente)"
                            . "LEFT JOIN pedido ON (pedido.pedido_id = itens_pedido.itens_pedido_id_pedido)"
                            . "LEFT JOIN produto ON (produto.produto_id = itens_pedido.itens_pedido_id_produto)  "
                            . " WHERE pedido_status = '" . $pedidoStatus . "'"
                            . "AND pedido.pedido_data = '" . $hoje . "' "
                       . "GROUP BY pedido.pedido_id "
                        . " ORDER BY pedido.pedido_data_hora DESC"
                    ); // WHERE pedido.pedido_data = 'NOW()' 
                    if (mysqli_num_rows($read_pedido) > '0') {


                        foreach ($read_pedido as $read_pedido_view) {
                            
                            
                            
                      ?>  
                            <!--      //IMPRIMIR ISSO-->                           
                       <?php     
                            
                       $data = new DateTime($read_pedido_view['pedido_data']);
                            $hora = new DateTime($read_pedido_view['pedido_data_hora']);
                         @$totalmostra =   number_format($read_pedido_view['pedido_valor'], 2, ',', '.');
                            ?>        
                            <?php
                            echo '<tr>
                <td>' . $read_pedido_view['pedido_id'] . '</td>
                  <td>' . $data->format('d/m/Y') . ' - ' . $hora->format('H:i:s') . '</td>
                      <td>' . $read_pedido_view['nome_cliente'] . '</td>
                         
';
                          
     if ($read_pedido_view['pedido_fdp'] == "Cartão"){   
         $acres = 1.;
         $acre = $read_pedido_view['pedido_valor'] + $acres;
         ?>
          
          <td>    <?php   echo number_format($acre,2,',','.');     ?> </td>
      
          <?php  } else {   ?>
        
          <td> <?php  echo  number_format($read_pedido_view['pedido_valor'],2,',','.');     ?> </td>
    
 <?php
          }           

    ?>
                 
                  <?php               
echo '                                                     
<td>' . $read_pedido_view['pedido_fdp'] . '</td>                  

    
<td>' . $status_pedido . ' </td>                   
        <td>
        <form action="" method="POST" name="form1">
                     <select name="processo1"  onchange="form1.submit()">
                          if ($status_pedido == "Preparando) selected=selected                             <option  value="1">Preparando</option>

                            
                            <option  value="0">Novo Pedido</option>
                            <option value="2">Saiu Para Entrega</option>
                            <option value="3" >Entregue - Finalizado</option>                            
                        </select>
          
     <input type="hidden" name="idalterastatus1" value="'. $read_pedido_view['pedido_id'].'">
                        
                        <button type="submit" value="">Atualizar</button>
                    </form>
 
          </td>                     
 
 <td><a href="index.php?p=verPedidosVenda&id=' . $read_pedido_view['pedido_id'] . '">Ver Pedido</a></td>                 
 
</tr>'                                    
                                    ;   
                        }
                    }          
                    else { ?>
<!--                        <h2>Não há novos pedidos (ainda)</h2> -->
                       <style type="text/css">
#tblPreparando {display: none}
#hPreparando {display: none; text-align: center;}

                       </style>                       
<?php
}                    ?>
          
                 </table>  
            </div>
                    
            
            
            
            
            
            
            
            
            
<!--            TABELA SAIU PRA ENTREGA-->
           
              <div class="table-responsive">
            <table class="table table-striped table-sm" id="tblSaiuParaEntrega">               
                 
           <?php                               
                           
                    if ($status_pedido = "Saiu Para Entrega") {
                        ?>
                    <h2 id="hSaiuParaEntrega">Saiu Para Entrega</h2>
                        <tr>
                             <td>Código</td>
                            <td>Data e Horário do Pedido</td>
                            <td>Cliente</td>
<!--                            <td>Endereço</td>                                  -->
                            <td>Valor Total </td>
                            <td>Forma de Pagamento</td>
                          
                            <td>Status</td>
                           <td>Alterar Status</td>
                            <td>Ações</td>
                        </tr> 
                  
                    <?php } ?> 
                    <?php
//  if(isset($_GET['id']));
// $id_produto_carrinho = '0';
//                    echo  "<script type=\"text/javascript\">
	
                               //alert(\"Há um novo pedido.\");
				//</script>"; 
                    
                    $hoje = date('Y-m-d');
                    $pedidoStatus = '2';
                    $read_pedido = mysqli_query($conn, "SELECT * FROM itens_pedido "
                            . "LEFT JOIN cliente ON (itens_pedido.id_usuario = cliente.id_cliente)"
                            . "LEFT JOIN pedido ON (pedido.pedido_id = itens_pedido.itens_pedido_id_pedido)"
                            . "LEFT JOIN produto ON (produto.produto_id = itens_pedido.itens_pedido_id_produto)  "
                            . " WHERE pedido_status = '" . $pedidoStatus . "'"
                            . "AND pedido.pedido_data = '" . $hoje . "' "
                       . "GROUP BY pedido.pedido_id "
                        . " ORDER BY pedido.pedido_data_hora DESC"
                    ); // WHERE pedido.pedido_data = 'NOW()' 
                    if (mysqli_num_rows($read_pedido) > '0') {


                        foreach ($read_pedido as $read_pedido_view) {
                            
                            
                            
                      ?>  
                            <!--      //IMPRIMIR ISSO-->                           
                       <?php     
                            
                       $data = new DateTime($read_pedido_view['pedido_data']);
                            $hora = new DateTime($read_pedido_view['pedido_data_hora']);
                         @$totalmostra =   number_format($read_pedido_view['pedido_valor'], 2, ',', '.');
                            ?>        
                            <?php
                            echo '<tr>
                <td>' . $read_pedido_view['pedido_id'] . '</td>
                  <td>' . $data->format('d/m/Y') . ' - ' . $hora->format('H:i:s') . '</td>
                      <td>' . $read_pedido_view['nome_cliente'] . '</td>
                         
             
';
                          
     if ($read_pedido_view['pedido_fdp'] == "Cartão"){   
         $acres = 1.;
         $acre = $read_pedido_view['pedido_valor'] + $acres;
         ?>
          
          <td>    <?php   echo number_format($acre,2,',','.');     ?> </td>
      
          <?php  } else {   ?>
        
          <td> <?php  echo  number_format($read_pedido_view['pedido_valor'],2,',','.');     ?> </td>
    
 <?php
          }           

    ?>
                 
                  <?php               
echo '                                                       
<td>' . $read_pedido_view['pedido_fdp'] . '</td>                  

    
<td>' . $status_pedido . ' </td>                   
          <td>
       <form action="" method="POST" name="form2">
                     <select name="processo2"  onchange="form2.submit()">
                        if ($status_pedido == "Saiu Para Entrega") selected=selected <option value="2">Saiu Para Entrega</option>
                          
                            <option  value="0">Novo Pedido</option>
                            <option  value="1">Preparando</option>
                            
                            <option value="3" >Entregue - Finalizado</option>                            
                        </select>
          
     <input type="hidden" name="idalterastatus2" value="'. $read_pedido_view['pedido_id'].'">
                        
                        <button type="submit" value="">Atualizar</button>
                    </form>
 
          </td>                     
 
 <td><a href="index.php?p=verPedidosVenda&id=' . $read_pedido_view['pedido_id'] . '">Ver Pedido</a></td>    
 
</tr>'                                    
                                    ;   
                        }
                    }          
                    else { ?>
<!--                        <h2>Não há novos pedidos (ainda)</h2> -->
                       <style type="text/css">
#tblSaiuParaEntrega {display: none}
#hSaiuParaEntrega {display: none; text-align: center;}

                       </style>                       
<?php
}                    ?>
          
                 </table>  
            </div>
            
            
            
            
            
<!--            TABELA FINALIZADO-->
            <div class="table-responsive">
            <table class="table table-striped table-sm" id="tblFinalizado">               
                 
           <?php                               
                           
                    if ($status_pedido = "Finalizado") {
                        ?>
                    <h2 id="hFinalizado">Finalizado</h2>
                        <tr>
                             <td>Código</td>
                            <td>Data e Horário do Pedido</td>
                            <td>Cliente</td>
<!--                            <td>Endereço</td>                                  -->
                            <td>Valor Total </td>
                            <td>Forma de Pagamento</td>
                          
                            <td>Status</td>
                            <td>Alterar Status</td>
                            <td>Ações</td>
                        </tr> 
                  
                    <?php } ?> 
                    <?php
//  if(isset($_GET['id']));
// $id_produto_carrinho = '0';
//                    echo  "<script type=\"text/javascript\">
	
                               //alert(\"Há um novo pedido.\");
				//</script>"; 
                    
                    $hoje = date('Y-m-d');
                    $pedidoStatus = '3';
                    $read_pedido = mysqli_query($conn, "SELECT * FROM itens_pedido "
                            . "LEFT JOIN cliente ON (itens_pedido.id_usuario = cliente.id_cliente)"
                            . "LEFT JOIN pedido ON (pedido.pedido_id = itens_pedido.itens_pedido_id_pedido)"
                            . "LEFT JOIN produto ON (produto.produto_id = itens_pedido.itens_pedido_id_produto)  "
                            . " WHERE pedido_status = '" . $pedidoStatus . "'"
                            . "AND pedido.pedido_data = '" . $hoje . "' "
                       . "GROUP BY pedido.pedido_id "
                        . " ORDER BY pedido.pedido_data_hora DESC"
                    ); // WHERE pedido.pedido_data = 'NOW()' 
                    if (mysqli_num_rows($read_pedido) > '0') {


                        foreach ($read_pedido as $read_pedido_view) {
                            
                            
                            
                      ?>  
                            <!--      //IMPRIMIR ISSO-->                           
                       <?php     
                            
                       $data = new DateTime($read_pedido_view['pedido_data']);
                            $hora = new DateTime($read_pedido_view['pedido_data_hora']);
                         @$totalmostra =   number_format($read_pedido_view['pedido_valor'], 2, ',', '.');
                            ?>        
                            <?php
                            echo '<tr>
                <td>' . $read_pedido_view['pedido_id'] . '</td>
                  <td>' . $data->format('d/m/Y') . ' - ' . $hora->format('H:i:s') . '</td>
                      <td>' . $read_pedido_view['nome_cliente'] . '</td>
                         
';
                          
     if ($read_pedido_view['pedido_fdp'] == "Cartão"){   
         $acres = 1.;
         $acre = $read_pedido_view['pedido_valor'] + $acres;
         ?>
          
          <td>    <?php   echo number_format($acre,2,',','.');     ?> </td>
      
          <?php  } else {   ?>
        
          <td> <?php  echo  number_format($read_pedido_view['pedido_valor'],2,',','.');     ?> </td>
    
 <?php
          }           

    ?>
                 
                  <?php               
echo '                                                     
<td>' . $read_pedido_view['pedido_fdp'] . '</td>                  

    
<td>' . $status_pedido . ' </td>                   
        <td>
     <form action="" method="POST" name="form3">
                    
<select name="processo3"  onchange="form3.submit()">
                      

                        
                           if ($status_pedido == "Finalizado") selected=selected  <option value="3" >Entregue - Finalizado</option>         
                        
                          
                            <option  value="0">Novo Pedido</option>
                            <option  value="1">Preparando</option>
                            <option value="2">Saiu Para Entrega</option>
                                                      
                        </select>
          
      
                 <input type="hidden"  name="idalterastatus3" value="'. $read_pedido_view['pedido_id'].'">
                        <button type="submit" name="btn3">Atualizar</button>
                    </form>
 
          </td>                     
 
 <td><a href="index.php?p=verPedidosVenda&id=' . $read_pedido_view['pedido_id'] . '">Ver Pedido</a></td>
      
    
</tr>'                                    
                                    ;   
                        }
                    }          
                    else { ?>
<!--                        <h2>Não há novos pedidos (ainda)</h2> -->
                       <style type="text/css">
#tblFinalizado {display: none}
#hFinalizado {display: none; text-align: center;}

                       </style>                       
<?php
}                    ?>
          
                 </table>  
            </div>
            
        

    </div>
        
</div>

<!--FIIIM VENDAS-->





























<?php
if (isset($_GET['idimprime'])){
    ;
// $id_produto_carrinho = '0';
$read_pedido = mysqli_query($conn, "SELECT * FROM itens_pedido INNER JOIN cliente ON (itens_pedido.id_usuario = cliente.id_cliente)"
        . " INNER JOIN pedido ON (pedido.pedido_id = itens_pedido.itens_pedido_id_pedido)"
        . " INNER JOIN produto ON (produto.produto_id = itens_pedido.itens_pedido_id_produto) "
       
        . " WHERE pedido.pedido_id = '" . @$_GET['idimprime'] . "'"
);
?>







<!--      //IMPRIMIR ISSO-->
        <form method="post"  name="dataForm" action="index.php?p=imprimir" target="_blank">
            
<!--            <input type="hidden"  name="caluf" value="CALUF'S REFEIÇÕES">
            <input type="hidden"  name="novo" value="NOVO PEDIDO">-->
<?php
           
if (mysqli_num_rows($read_pedido) > '0') {
foreach ($read_pedido as $read_pedido_view) {
  $resultadoFinal = $read_pedido_view['itens_pedido_valor_produto'] ;                  
        $data = new DateTime($read_pedido_view['pedido_data']);
        $hora = new DateTime($read_pedido_view['pedido_data_hora']);

     ?>     
            <input type="hidden"  name="id[]" value="<?php echo $read_pedido_view['produto_id'] ?>">
            <input type="hidden"  name="dataehora" value="<?php echo $data->format('d/m/Y') . ' - ' . $hora->format('H:i:s')?>">            
            <input type="hidden"  name="produtoNome[<?php echo $read_pedido_view['produto_id'] ?>]" value="<?php echo $read_pedido_view['produto_nome'] ?>">
            <input type="hidden"  name="qtd[<?php echo $read_pedido_view['produto_id'] ?>]" value="<?php echo $read_pedido_view['itens_pedido_quantidade'] ?>">
            <input type="hidden"  name="precoUnt[<?php echo $read_pedido_view['produto_id'] ?>]" value="<?php echo number_format($resultadoFinal,2,',','.') ?>">     
                                

<?php }} ?>
            
                            <?php
                            
    if ($read_pedido_view['pedido_fdp'] == "Cartão") {
        //echo " Forma de Pagamento: Cartão <br/>";
        echo "  <input type='hidden'  name='fdp' value='". $read_pedido_view['pedido_fdp'] ."'>";
        $sub =$read_pedido_view['pedido_valor'] + $read_pedido_view['pedido_desco'];
        
        
        echo "   <input type='hidden'  name='sub' value='". number_format($sub, 2, ",", ".") ."'>";
        echo "   <input type='hidden'  name='desco' value='". number_format($read_pedido_view['pedido_desco'], 2, ",", ".") ."'>";
        echo "  <input type='hidden'  name='total' value='". number_format($read_pedido_view['pedido_valor'], 2, ",", ".") ."'>";
        //echo " Total:  R$ " . number_format($read_pedido_view['pedido_valor'], 2, ",", ".") . "<br/>";
        echo "   <input type='hidden'  name='tipo' value='". $read_pedido_view['pedido_tipo'] . "'>"; 
        
        //echo " Tipo de cartão:  " . $read_pedido_view['pedido_tipo'] . "<br/><br/>";
    }
    if ($read_pedido_view['pedido_troco'] > 0) {
        @$levartroco = $read_pedido_view['pedido_troco'] - $read_pedido_view['pedido_valor'];
        //echo " Forma de Pagamento: Dinheiro <br/>";
        $sub =$read_pedido_view['pedido_valor'] + $read_pedido_view['pedido_desco'];
        
        
        echo "   <input type='hidden'  name='sub' value='". number_format($sub, 2, ",", ".") ."'>";
        echo "   <input type='hidden'  name='desco' value='". number_format($read_pedido_view['pedido_desco'], 2, ",", ".") ."'>";
        
        echo "   <input type='hidden'  name='troco' value='". number_format($read_pedido_view['pedido_troco'], 2, ",", ".") ."'>";
echo "  <input type='hidden'  name='levatroco' value='". number_format($levartroco, 2, ",", ".") ."'>";        
//echo " Total:  R$ " . number_format($read_pedido_view['pedido_valor'], 2, ",", ".") . "<br/>";
        //echo " Troco para:  R$ " . number_format($read_pedido_view['pedido_troco'], 2, ",", ".") . "<br/>";
        //echo " Troco:  R$ " . number_format($levartroco, 2, ",", ".") . "<br/><br/>";
    }
    if ($read_pedido_view['pedido_fdp'] == "Dinheiro") {
        echo "   <input type='hidden'  name='total' value='". number_format($read_pedido_view['pedido_valor'], 2, ",", ".") ."'>";
        echo "  <input type='hidden'  name='fdp' value='". $read_pedido_view['pedido_fdp'] ."'>";
    }
    if ($read_pedido_view['pedido_obs'] != "") {
        echo "<input type='hidden'  name='obs' value='". $read_pedido_view['pedido_obs']."'>";
        //echo " Observação do Pedido: " . $read_pedido_view['pedido_obs'] . "<br/><br/>";
    }
    if ($read_pedido_view['pedido_modo'] == "") {
        //echo "Buscar no local<br/>";
        echo "   <input type='hidden'  name='nome' value='". $read_pedido_view['nome_cliente'] . "'>"; 
        //echo " Cliente: " . $read_pedido_view['nomeCliente'] . "<br/>";
        echo "   <input type='hidden'  name='celular' value='". $read_pedido_view['celular_cliente'] . "'>"; 
        //echo " Celular: " . $read_pedido_view['celularCliente'] . "<br/>";
    } else {
       // echo "Modo Delivery<br/> ";
        echo "   <input type='hidden'  name='nome' value='". $read_pedido_view['nome_cliente'] . "'>"; 
        //echo " Cliente: " . $read_pedido_view['nomeCliente'] . "<br/>";
        echo "   <input type='hidden'  name='celular' value='". $read_pedido_view['celular_cliente'] . "'>"; 
        //echo " Celular: " . $read_pedido_view['celularCliente'] . "<br/>";
    }
    if ($read_pedido_view['pedido_modo'] != "") {
       //echo " Endereço: " . $read_pedido_view['endCliente'] . "<br/>";
        echo "   <input type='hidden'  name='end' value='". $read_pedido_view['endereco_cliente'] . "'>"; 
        //echo " Número: " . $read_pedido_view['numCliente'] . "<br/>";
        echo "   <input type='hidden'  name='num' value='". $read_pedido_view['numeroCasa_cliente'] . "'>"; 
        //echo " Bairro: " . $read_pedido_view['bairroCliente'] . "<br/>";
        echo "   <input type='hidden'  name='bairro' value='". $read_pedido_view['bairro_cliente'] . "'>"; 
        //echo " Bairro: " . $read_pedido_view['bairroCliente'] . "<br/>";
        echo "  <input type='hidden'  name='comp' value='". $read_pedido_view['cliente_complemento'] . "'>"; 
    }
    
      echo "  <input type='hidden'  name='msg' value='Obrigado por comprar conosco, bom almoço, Deus te abençoe e volte sempre.'>"; 
?> <!--            
            <script type="text/javascript">
document.dataForm.submit()
</script> 
            -->
            
             
            
            
<button type="submit" class="btn btn-default" title="Imprimir"><i class="fa fa-print" ></i></button>
  
        </form>

<?php

}


?>
  <?php 
    if(isset($_REQUEST['processo0'])){
  $processo = $_REQUEST['processo0'];
    $idalterastatus = $_REQUEST['idalterastatus0'];
 $update_pedido = "UPDATE pedido SET  pedido_status = '".$processo."' WHERE pedido_id = '".$idalterastatus."'";
    mysqli_query($conn, $update_pedido); //executar query
    
    echo "<script>alert(' Status Alterado Com Sucesso')</script>";
    echo "<script>window.location = 'index.php?p=admin'</script>"; 
    
    }
    
        if(isset($_REQUEST['processo1'])){
  $processo1 = $_REQUEST['processo1'];
    $idalterastatus1 = $_REQUEST['idalterastatus1'];
 $update_pedido = "UPDATE pedido SET  pedido_status = '".$processo1."' WHERE pedido_id = '".$idalterastatus1."'";
    mysqli_query($conn, $update_pedido); //executar query
    
    echo "<script>alert(' Status Alterado Com Sucesso')</script>";
    echo "<script>window.location = 'index.php?p=admin'</script>"; 
    
    }
     if(isset($_REQUEST['processo2'])){
  $processo2 = $_REQUEST['processo2'];
    $idalterastatus2 = $_REQUEST['idalterastatus2'];
 $update_pedido = "UPDATE pedido SET  pedido_status = '".$processo2."' WHERE pedido_id = '".$idalterastatus2."'";
    mysqli_query($conn, $update_pedido); //executar query
    
    echo "<script>alert(' Status Alterado Com Sucesso')</script>";
    echo "<script>window.location = 'index.php?p=admin'</script>"; 
    
    }
    
        if(isset($_REQUEST['idalterastatus3'])){
  $processo3 = $_REQUEST['processo3'];
    $idalterastatus3 = $_REQUEST['idalterastatus3'];
 $update_pedido = "UPDATE pedido SET  pedido_status = '".$processo3."' WHERE pedido_id = '".$idalterastatus3."'";
    mysqli_query($conn, $update_pedido); //executar query
    
    echo "<script>alert(' Status Alterado Com Sucesso')</script>";
    echo "<script>window.location = 'index.php?p=admin'</script>"; 
    
    }
    
    ?>


<!--<a href="index.php?p=imp&idimprime=' . $read_pedido_view['pedido_id'] . '">
<button type="submit" class="btn btn-default" title="Imprimir"    target="_blank"><i class="fa fa-print" ></i>

</button></a>-->
