


    <?php
if (isset($_GET['acao'])) {
if ($_GET['acao'] == 'up') {
                        if (is_array($_POST['prod'])) {
                            foreach ($_POST['prod'] as $id => $qtd) {
                                $id = intval($id);
                                $qtd = intval($qtd);
                                if (!empty($qtd) || $qtd <> 0) {
                                    $_SESSION['carrinho'][$id] = $qtd;
                                } else {
                                    unset($_SESSION['carrinho'][$id]);
                                }
                            }
                        }
                    }
                     if ($_GET['acao'] == 'del') {
                        $id = intval($_GET['id']);
                        if (isset($_SESSION['carrinho'][$id])) {
                            unset($_SESSION['carrinho'][$id]);
//                            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>"
				;
                        }
                    }
                }
                ?>
<div class="table-responsive-xl">  
     
    <style type="text/css">
              td:nth-child(2) input { max-width: 50px; } 
              td { text-align: center; } 
/*  td { text-align: center; } 
        */

        </style>
    <?php
//    echo "  -----------NOVO PEDIDO----------- <br/>"; 
   
            ?> 
     <form action="?p=carrinho&acao=up&id" method="post">
   
    <table class="table">
  <caption>Carrinho de Compras</caption>
    <thead>
        <tr style="text-align: center;">
        <th width="14">Produto</th>
        <th width="9">Quantidade</th>
        <th width="9">Pre&ccedil;o</th>
        <th width="10">SubTotal</th>
        <th width="4">Remover</th>
      </tr>
    </thead>
    
    <tfoot>
      
<!--   <td colspan="5"><a href="index.php?p=home">Continuar Comprando</a></td>-->
    </tfoot>
    <tbody>
        
            
     <?php
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
                foreach($_SESSION['carrinho'] as $id => $qtd){
                   
                    
                        $sql   = "SELECT *  FROM produto WHERE produto_id= '$id'";
                        $qr    = mysqli_query($conn,$sql) or die(mysql_error());
                        $ln    = mysqli_fetch_assoc($qr);
                        $nome  = $ln['produto_nome'];
                        $preco = number_format($ln['produto_preco'], 2, ',', '.');
                        $sub   = number_format($ln['produto_preco'] * $qtd, 2, ',', '.');
                        $total += $ln['produto_preco'] * $qtd;
                         
                   
                   
                        
                        if(isset($_POST['desco']))
                            {
                            $valor = mysqli_real_escape_string($conn, $_POST['desco']);
$number = str_replace(',','.',str_replace('.','',$valor));
        $numberr = str_replace(',','.',str_replace(',','.',$number));
          $numberrr = str_replace(',','.',str_replace('R$','',$numberr));
                            $descontodigitado = $numberrr;
                        $_SESSION['desco'] =  $descontodigitado;
                            @$desconto = $total - $descontodigitado;
                        $_SESSION['total']  =   @$desconto;
                            } else {
                        $_SESSION['total']  =   $total ;        
                            }
                        echo '
              <tr >       
                <td>'.$nome.'</td>
                <td style="size = "2%"; ><input  type="number" min="1"  name="prod['.$id.']" value="'.$qtd.'" /></td>
                <td>R$ '.$preco.'</td>
                <td>R$ '.$sub.'</td>
                <td><a href="?p=carrinho&acao=del&id='.$id.'"> <h6 style="color: red"> X </h6>                    </a>
                    </td>
                            </tr>';
                }
               // $total = number_format($total, 2, ',', '.');
                echo '<tr>                         
              <td colspan=""></td>
              <td colspan=""></td> <td colspan=""></td> 
             
<td colspan="5"></td>

    
              
                    </tr>
        '; ?>
<!--
 <td>Desconto</td>
<td><input id="desco" type="text" size="13" name="desco" value="<?php $_SESSION['desco']?>" onkeypress="$(this).mask('R$ 999.990,00',{reverse: true});" title="Preencha com um valor" placeholder="000,00" /></td>  -->
      
          
         
               
               
               </tr>
       
      <?php
          
                }
      
          ?>
        

   
        
        

    
   
         </tbody>
  

 </table>
 
      <strong> <?php echo "Total R$ " .number_format($_SESSION['total'], 2, ',', '.')      ?>  </strong><br/>
      <input  width="5%" type="submit" class="btn-outline-info" value="Atualizar Carrinho" /> <br/><br/>
  </form>
</div>        
<!--      BOTOES BUSCAR E DELIVERY-->
    <!--      BOTOES BUSCAR E DELIVERY-->
                <?php if(count($_SESSION['carrinho']) >= 1){     ?>  
<!--                 
<nav class="blog-pagination" class="container-fluid" style="text-align: center;">
    <span style="color: red;">Escolha um forma de entrega </span> <br/>  
    <input id="btnBuscar" class="btn btn-outline-primary" name="btnBuscar" value="Buscar no Local" readonly="on">
    <input id="btnDelivery" class="btn btn-outline-secondary" name="btnDelivery" value="Delivery" readonly="on">
</nav><br/>-->
                        <?php } ?>
<!--  BUSCAR-->
<!--<form action="index.php?p=pfv" method="POST">          
    <div id="divBuscar" style="display: " class="container-fluid" style="text-align: center;">     
                     FORMA DE PAGAMENTO
        <div>
            <label>Escolha uma Forma de Pagamento:</label>
            <select id="fdp" name="fdp" required="on">
                <option value="">Escolher......</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Cartão">Cartão</option>  
            </select>               

            <div id="abriCartao" style="display: none;" >
                <p style="font-family: cursive; color: purple;">Levaremos a maquineta até você</p>
                <strong>Tipo de Cartão:<br /></strong>
                <label for="credito" ><input type="radio" name="tipo" value="Crédito" id="credito"  /> Crédito!</label>&nbsp; 
                <label for="debito" ><input type="radio" name="tipo" value="Débito" id="debito"  /> Débito!</label>
                <br />
            </div>           
            <div id="abriDinheiro"  style="display: none;">
                <input name="troco"  class="form-control form-control-sm" type="text" placeholder="Para quanto é o troco?" alt="Se for dinheiro; para quanto é o troco?" ><br/>
            </div>     </div>  FORMA DE PAGAMENTO   
            
            
        <input name="obspedido" class="form-control form-control-sm" type="text" placeholder="Observação do pedido" ><br/>   
       
        
        
        <form method="get" class="form-group col-md-6" action="">calendario datapicker 
    <input type="text" required="on" id="busca" class="form-control input-lg" name="busca" placeholder="Buscar por cliente pelo nome ou celuar" ></form><br/><br/>
    
        
        <input name="nome" class="form-control form-control-sm" type="text" placeholder="Nome Completo" required="on"><br/> 
        <input type="hidden" value="Nosso endereço de busca é: Rua da Olaria, nº 980, entre Barão e Rua da Paz, Guamá." name="nossoEnd">
         <p id="result"></p>
        <INPUT class="btn btn-primary" type="submit" name="finalizar" value="Finalizar">      
    </div>
    
    
    BUSCAR
</form> -->







<form action="index.php?p=pfv" method="POST">     
    <div id="divDelivery" style="display: " class="container-fluid" style="text-align: center;" >         
        
<!--     FORMA DE PAGMENTOO-->        
        <!--             FORMA DE PAGAMENTO-->
        <div>
            <label>Escolha uma Forma de Pagamento:</label>
            <select id="fdp2" name="fdp" required="on">
                <option value="">Escolher......</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="PIX - NOSSA CHAVE PIX">PIX</option>
                <option value="Cartão">Cartão</option>  
            </select>
            
            <div id="abripix2" style="display: none;" >
                  
                <strong><p>91981605460 ou 91981558383 (Wesley da Silva Caluf)</p>
                
                </strong>
        
            </div>  
            
            <div id="abriCartao2" style="display: none;" >
                  <p>Levaremos a maquineta até você. Obs: acréscimo de R$ 1,00</p>
                <strong>Tipo de Cartão:<br /></strong>
                <label for="credito" ><input type="radio" name="tipo" value="Crédito" id="credito" /> Crédito!</label>&nbsp; 
                <label for="debito" ><input type="radio" name="tipo" value="Débito" id="debito"  /> Débito!</label>
                <br />
            </div>           
           
            <div id="abriDinheiro2"  style="display: none;">Troco ??? 
                R$ <input   name="troco" type="text" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});" title="Preencha com um valor" placeholder="000,00">

                <br/>
            </div>     </div>  <!--FORMA DE PAGAMENTO-->  
        <input type="hidden" name="id_txt" value="<?php echo $mostraProduto['produto_id'] ?>">
            <input name="obspedido" class="form-control form-control-sm" type="text" placeholder="Observação do pedido" ><br/>  
        <input name="modo"  class="form-control form-control-sm" type="hidden" value="1" >
<!--         <input name="modo"  class="form-control form-control-sm" type="hidden" value="1" >-->
         <INPUT class="btn btn-primary" type="submit" name="finalizar" value="Finalizar" >   
<!--        <form method="get" class="form-group col-md-6" action="">calendario datapicker 
            <input type="text" required="on" id="buscad" class="form-control input-lg" name="busca" placeholder="Buscar por cliente pelo nome ou celuar" ></form><br/><br/>
     <p id="resultd"></p>
</form>        -->
<!--        
        <input name="nome" class="form-control form-control-sm" type="text" placeholder="Nome Completo" required="on"><br/>
        <input name="end" class="form-control form-control-sm" type="text" placeholder="Endereço: Rua, Avenida, Alameda e etc." required="on">
        <input name="n" class="form-control form-control-sm" type="text" placeholder="Número" required="on"> 
        <input name="b" class="form-control form-control-sm" type="text" placeholder="Bairro" required="on"> 
        <input name="c" class="form-control form-control-sm" type="text" placeholder="Complemento" required="on"> 
        <input name="p" class="form-control form-control-sm" type="text" placeholder="Ponto De Referência" required="on"> <br/>-->
       


       
    </div>
</form>
<!--                /DIVDELIVERY-->
<!--CANCELAR-->
   <?php
 
//                              if (empty($subtotal)) {
//        echo "<script>alert(' Carrinho está vazio ')</script>";
//        echo "<script>window.location = './'</script>";
//    }
    
    ?>