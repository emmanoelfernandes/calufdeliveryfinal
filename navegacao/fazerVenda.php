    <?php
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
?>

                   
       <?php if (@$_SESSION['idUsuario'] == 0 ) { 
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=home'>";
exit();  }  ?>
            
    

    
    <main role="main" >
            <?php // $atual = date('d-m-Y'); ?>
<!--            <h1 class="mt-5"><br>Área do Administrador - <?php // echo $atual; ?> </h1><br/>-->
        <div class="album py-5 bg-light" >

            <div class="container" style=" margin-top: -50px;"  > <br/>
<!--                <h2> <input id="btnCat" class="btn btn-outline-primary" name="cat" value="Nossas Categorias" readonly="on"></h2>-->
              <div class="d-flex flex-row bd-highlight mb-3">
<!--                NOMES DAS CATEGORIAS EM CIMA DOS PRODUTOS-->
                    <?php
                    $selectCategoria = mysqli_query($conn, "SELECT * FROM categoria c INNER    JOIN produto p"
                            . " ON p.produto_categoria_id = c.categoria_id"                            
                            . " WHERE c.categoria_id =  p.produto_categoria_id AND p.produto_ativo = 1"                          
                            . " GROUP BY categoria_descricao"
                            . " ORDER BY  categoria_descricao ASC");
                    ?>
                    <?php while ($resultadoCategoria = mysqli_fetch_array($selectCategoria)) { ?>
<a href="index.php?p=fv&cat=<?php echo $resultadoCategoria['categoria_id']; ?> ">
                   
   <button type="button"  class="btn btn-secondary d-inline p-2 bg-primary text-white"><?php echo $resultadoCategoria['categoria_descricao']; ?></button>
</a>         

                <?php } ?>

                </div>
 
 
<!--                FILTAR  PRODUTOS AO PEGAR O GET-->
                <?php
                if (isset($_GET['cat'])) {
                    $cat = $_GET['cat'];
                    $selectProduto = mysqli_query($conn, "SELECT * FROM produto p INNER JOIN categoria c"
                            . " ON p.produto_categoria_id = c.categoria_id"
                            . " WHERE c.categoria_id = $cat AND p.produto_ativo = 1"
                            . " ORDER BY p.produto_preco ASC"
                            . "");
                    $resultadoProduto = mysqli_fetch_array($selectProduto);
                    echo "<h3>" . $resultadoProduto['categoria_descricao'] . "</h3>";
                } else {
                    $cat1 = 1;
                    $selectProduto = mysqli_query($conn, "SELECT * FROM produto p INNER JOIN categoria c"
                            . " ON p.produto_categoria_id = c.categoria_id"
                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1 "
                            . " ORDER BY p.produto_preco ASC"
                            . "");
                    $resultadoProduto = mysqli_fetch_array($selectProduto);
                    echo "<h3>" . $resultadoProduto['categoria_descricao'] . "</h3>";
                }
                ?>
                <?php
                if (isset($_GET['cat'])) {
                    $cat = $_GET['cat'];
                    $selectProduto = mysqli_query($conn, "SELECT * FROM produto p INNER JOIN categoria c"
                            . " ON p.produto_categoria_id = c.categoria_id"
                            . " WHERE c.categoria_id = $cat AND p.produto_ativo = 1"
                            . " ORDER BY p.produto_preco ASC"
                            . "");
                } else {
                    $cat1 = 1;
                    $selectProduto = mysqli_query($conn, "SELECT * FROM produto p INNER JOIN categoria c"
                            . " ON p.produto_categoria_id = c.categoria_id"
                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1"
                            . " ORDER BY p.produto_preco ASC "
                            . "");
                }
               
                //SESSION CARRINHO
                if (isset($_GET['acao'])) {
                    //ADICIONAR CARRINHO NORMAL qtd=1
//    if($_GET['acao'] == 'add'){ 
//      $id = intval($_GET['id']); 
//      if(!isset($_SESSION['carrinho'][$id])){ 
//        $_SESSION['carrinho'][$id] = 1; 
//      } else { 
//        $_SESSION['carrinho'][$id] += 1; 
//      } 
//                        } 
                    //ADICIONAR AO CARRINHO COM SELECT OPTION
                       if($_GET['acao'] == 'add'){ 
                           echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
  <strong>Oloco, meu!</strong> Item adicionado ao carrinho com sucesso!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
//       echo "<script>javascript:alert('Item adicionado ao carrinho com sucesso!');</script>";
// 
//      echo "<script>window.location = '#'</script>";
                           ?>      
         
                
    <?php	
                    if (is_array(@$_POST['prod'])) {
                        foreach ($_POST['prod'] as $id => $qtd) {
                            $id = intval($id);
                            $qtd = intval($qtd);
                            if (!empty($qtd) || $qtd <> 0) {
                                $_SESSION['carrinho'][$id] = $qtd;
       
                       } } }} else {
                                unset($_SESSION['carrinho'][$id]);
                
                }}
                        
                ?>





                <!--ROWS E PRATOS PRINCIPAIS-->
               

                    <div class="row">
                        <!--PRODUTO-->
<?php while ($resultadoProduto = mysqli_fetch_array($selectProduto)) { 
            if ($resultadoProduto['produto_ativo'] == 1) {?>
                       <div class="my-3 p-3 bg-white rounded shadow-sm">
        
        
        
        <div class="media text-muted pt-3">
<!--          <img src="./imgProduto/<?php echo $resultadoProduto['produto_img'] ?>" alt="" class="mr-2 rounded">-->
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">
                  <h7>  <input type="text"  name="n1" size="40%" value="<?php echo $resultadoProduto['produto_nome'] ?>" style="border: none" readonly="on" ></h7>
                  </strong>
                <a href="#">   <h4> <input type="hidden" name="p1" size="20%"  value="R$ <?php echo $resultadoProduto['produto_preco'] ?>" style="border: none; " readonly="on"> <?php echo number_format($resultadoProduto['produto_preco'], 2, ",", ".") ?></h4  ></a>
            </div>
            <span class="d-block"><p class="font-weight-normal">ARROZ, FEIJÃO, MACARRÃO, SALADA E FAROFA</p></span>
          <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $resultadoProduto['produto_id']; ?>">Adicionar!!!</button>
          </div>
          
        </div>
<!--        <small class="d-block text-right mt-3">
          <a href="#">Todas sugestões</a>
        </small>-->
      </div>
                                   
<!--                                            <button type="button" data-toggle="modal" class="btn btn-xs btn-warning"  data-target="#exampleModal" data-whatever="<?php echo $resultadoProduto['produto_id']; ?>" data-whatevernome="<?php echo $resultadoProduto['produto_nome']; ?>" data-whateverdetalhes="<?php echo $resultadoProduto['produto_preco']; ?>">QUERO!!!</button>-->
                                            
                                       
<!--                  MESSAGEM SUCESSO MODAL-->
           <div id="msgCadSucesso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success text-center">
						<h5 class="modal-title" id="visulUsuarioModalLabel">Usuário</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Usuário cadastrado com sucesso!
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
                    
                    <!-- Modal -->
<div class="modal fade" id="myModal<?php echo $resultadoProduto['produto_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicione uma quantidade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="insert_form" action="?p=fv&acao=add&id=<?php echo $resultadoProduto['produto_id']; ?>" method="post">
               
<!--              <input name="id1" type="text" class="form-control" id="id-curso" value="<?php echo $resultadoProduto['produto_id']; ?>">-->
              <div class="form-group">
<!--		<h7>  <input type="text"  name="n1" size="20%" id="recipient-name" value="R$ <?php echo $resultadoProduto['produto_nome'] ?>" style="border: none" readonly="on" ></h7>			-->
				  </div>
              <div class="form-group">
<!--             <h4> <input type="text" name="p1" size="20%" value="R$ <?php echo number_format($resultadoProduto['produto_preco'], 2, ",", ".") ?>"  id="detalhes" style="border: none; " readonly="on"></h4  >-->
             </div>
        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Quantidade</label>
                                                </div>
            <input type="number" name="prod[<?php echo $resultadoProduto['produto_id'] ?>]" value="1" >
<!--            <select class="custom-select"  name="prod[<?php echo $resultadoProduto['produto_id'] ?>]" value="<?php echo $qtd ?>"  >
                                                    <option selected>Escolher...</option>

                                                    <option >1</option>
                                                    <option >2</option>
                                                    <option >3</option>
                                                    <option >4</option>
                                                    <option  >5</option>
                                                    <option >6</option>
                                                    <option >7</option>
                                                    <option >8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                </select>-->
        </div>
<!--              <div class="modal-footer">-->

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary" value="Adicionar">
<!--      </div>-->
      </form>
      </div>
      
    </div>
  </div>
</div>
                 
     <?php  }} ?><!--/PRODUTO-->                    
                
  </div> <!--/ROWS E PRATOS PRINCIPAIS-->
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
                            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>"
				;
                        }
                    }
                }
                ?>
<div class="container-fluid" style="text-align: center;">
    <?php
//    echo "  -----------NOVO PEDIDO----------- <br/>";
  ?>    <table>
    <caption>Carrinho de Compras</caption>
    <thead>
      <tr>
        <th width="244">Produto</th>
        <th width="79">Quantidade</th>
        <th width="89">Pre&ccedil;o</th>
        <th width="100">SubTotal</th>
        <th width="64">Remover</th>
      </tr>
    </thead>
    <form action="?p=fv&acao=up&id" method="post">
    <tfoot>
      
<!--   <td colspan="5"><a href="index.php?p=home">Continuar Comprando</a></td>-->
    </tfoot>
    <tbody>
     <?php
        if(count($_SESSION['carrinho']) == 0){
          echo '
        <tr>
          <td colspan="5">Não há produto no carrinho</td>
        </tr>
      ';
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
              <tr>       
                <td>'.$nome.'</td>
                <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                <td>R$ '.$preco.'</td>
                <td>R$ '.$sub.'</td>
                <td><a href="?p=fv&acao=del&id='.$id.'">Remove</a></td>
                            </tr>';
                }
               // $total = number_format($total, 2, ',', '.');
                echo '<tr>                         
              <td colspan=""></td>
              <td colspan=""></td>
<td colspan=""></td>              
<td colspan=""><strong> Total    '.number_format($_SESSION['total'], 2, ',', '.').'          </strong></td>

    
              
                    </tr>
         <td>Desconto</td>'; ?>
<td><input id="desco" type="text" size="13" name="desco" value="<?php $_SESSION['desco']?>" onkeypress="$(this).mask('R$ 999.990,00',{reverse: true});" title="Preencha com um valor" placeholder="000,00" /></td>  
        <td colspan=""></td>              <td colspan=""></td>
          <td colspan="5"><input type="submit" class="btn-outline-info" value="Atualizar Carrinho" /></td>
      </tr>
      
      <?php
          
                }
      
          ?>
        
</form>


       
         </tbody>
    </form>
 </table>
    
</div>        
<!--      BOTOES BUSCAR E DELIVERY-->
    <!--      BOTOES BUSCAR E DELIVERY-->
                <?php if(count($_SESSION['carrinho']) >= 1){     ?>  
                 
<nav class="blog-pagination" class="container-fluid" style="text-align: center;">
    <span style="color: red;">Escolha um forma de entrega </span> <br/>  
    <input id="btnBuscar" class="btn btn-outline-primary" name="btnBuscar" value="Buscar no Local" readonly="on">
    <input id="btnDelivery" class="btn btn-outline-secondary" name="btnDelivery" value="Delivery" readonly="on">
</nav><br/>
                        <?php } ?>
<!--  BUSCAR-->
<form action="index.php?p=pfvadmin" method="POST">          
    <div id="divBuscar" style="display: none;" class="container-fluid" style="text-align: center;">     
        <!--             FORMA DE PAGAMENTO-->
        <div>
            <label>Escolha uma Forma de Pagamento:</label>
            <select id="fdp" name="fdp" required="on">
                <option value="">Escolher......</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Cartão">Cartão</option>
                <option value="PIX - NOSSA CHAVE PIX">PIX</option>  
            </select>               

            <div id="abriCartao" style="display: none;" >
                <p style="font-family: cursive; color: purple;">Levaremos a maquineta até você</p>
                <strong>Tipo de Cartão:<br /></strong>
                <label for="credito" ><input type="radio" name="tipo" value="Crédito" id="credito"  /> Crédito!</label>&nbsp; 
                <label for="debito" ><input type="radio" name="tipo" value="Débito" id="debito"  /> Débito!</label>
                <br />
            </div>           
            <div id="abriDinheiro"  style="display: none;">
                <input id="troco" type="text" size="13" name="troco"  onkeypress="$(this).mask('R$ 999.990,00',{reverse: true});" title="Preencha com um valor" placeholder="000,00" />
                
            </div>     </div>  <!--FORMA DE PAGAMENTO-->   
            
            
        <input name="obspedido" class="form-control form-control-sm" type="text" placeholder="Observação do pedido" ><br/>   
       
        
        
        <form method="get" class="form-group col-md-6" action=""><!--calendario datapicker -->
    <input type="text" required="on" id="busca" class="form-control input-lg" name="busca" placeholder="Buscar por cliente pelo nome ou celuar" >
        </form><br/><br/>
    
        
<!--        <input name="nome" class="form-control form-control-sm" type="text" placeholder="Nome Completo" required="on"><br/> -->
        <input type="hidden" value="Nosso endereço de busca é: Rua da Olaria, nº 980, entre Barão e Rua da Paz, Guamá." name="nossoEnd">
         <p id="result"></p>
<!--        <INPUT class="btn btn-primary" type="submit" name="finalizar" value="Finalizar">      -->
    </div>
    
    
    <!--BUSCAR-->
</form> 





<!--      DELIVERY-->
<form action="index.php?p=pfvadmin" method="POST">     
    <div id="divDelivery" style="display: none;" class="container-fluid" style="text-align: center;" >         
        <!--             FORMA DE PAGAMENTO-->
        <div>
            <label>Escolha uma Forma de Pagamento:</label>
            <select id="fdp2" name="fdp" required="on">
                <option value="">Escolher......</option>
                <option value="Dinheiro">Dinheiro</option>
                <option value="Cartão">Cartão</option> 
                  <option value="PIX - NOSSA CHAVE PIX">PIX</option>  
            </select>     
            <div id="abriCartao2" style="display: none;" >
                  <p>Levaremos a maquineta até você</p>
                <strong>Tipo de Cartão:<br /></strong>
                <label for="credito" ><input type="radio" name="tipo" value="Crédito" id="credito"  /> Crédito!</label>&nbsp; 
                <label for="debito" ><input type="radio" name="tipo" value="Débito" id="debito"  /> Débito!</label>
                <br />
            </div>           
            <div id="abriDinheiro2"  style="display: none;">
                <input name="troco"  class="form-control form-control-sm" type="text" placeholder="Para quanto é o troco?" alt="Se for dinheiro; para quanto é o troco?" ><br/>
            </div>     </div>  <!--FORMA DE PAGAMENTO-->  
        <input name="obspedido" class="form-control form-control-sm" type="text" placeholder="Observação do pedido" ><br/>  
        <input name="modo"  class="form-control form-control-sm" type="hidden" value="1" >
        <form method="get" class="form-group col-md-6" action=""><!--calendario datapicker -->
            <input type="text" required="on" id="buscad" class="form-control input-lg" name="busca" placeholder="Buscar por cliente pelo nome ou celuar" ></form><br/><br/>
     <p id="resultd"></p>
        
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
<!--<div class="container-fluid" style="text-align: center;">
    <form action="index.php?p=home" >      
        <button type="submit" class="btn btn-danger">Cancelar </button>
    </form>
</div>                /CANCELAR-->

</div>
        </div>       <!--CONTAINER-->        
    </main>












<!--BUSCA FUNCAO-->
<script>
      $("#busca").keyup(function(){
        var busca = $("#busca").val();
         $.post('./navegacao/busca.php', {busca: busca},function(data){
          $("#result").html(data);
        });
      });
//      $("#busca").focusout(function(){
//        $("#result").html("Pesquisar Por Clientes!");
//      })
    </script>
    
<!--    DELIVERY FUNCAO-->
<script>
      $("#buscad").keyup(function(){
        var busca = $("#buscad").val();
         $.post('./navegacao/busca.php', {busca: busca},function(data){
          $("#resultd").html(data);
        });
      });
//      $("#buscad").focusout(function(){
//        $("#resultd").html("Pesquisar Por Clientes!");
//      })
    </script>























































