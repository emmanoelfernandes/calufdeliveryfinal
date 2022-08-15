<!--PAGIMA INICIAL DO CLIENTE-->



  <?php
  if (isset($_SESSION['id']) == 0) {
 echo "<script>window.location = 'index.php?p=entrar'</script>";
}
  
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

?>

                   
           
    
<!--    <img src="./imgSite/caluf.jpg" class="img-fluid"  width="100%" height="1%" alt="Imagem responsiva">-->

    <main role="main" >
        <div class="album py-5 bg-light" >

            <div class="container" style=" margin-top: -50px;"  > <br/> <?php $logado = $_SESSION['nomeCompleto']; ?>      
 <h5>Olá <?php echo $logado; ?></h5>
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
            

<div class="table-responsive">
    <table class="table">
       
    <thead>
      <tr>
          <th>
              
          </th>
     
      </tr>
    </thead>
        <tbody>
     <tr>
            <?php while ($resultadoCategoria = mysqli_fetch_array($selectCategoria)) { ?>
         <td>  
             <a href="index.php?p=home&cat=<?php echo $resultadoCategoria['categoria_id']; ?> ">
    <button type="button" class="btn btn-outline-warning"><?php echo $resultadoCategoria['categoria_descricao']; ?></button>
              
  </a> </td>
     <?php }?>   
      </tr>

         </tbody>
    </table>
  

</div>



              

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
                    $cat1 = 3;
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
                    $cat1 = 3;
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
   Item adicionado ao  <strong> <a href="index.php?p=carrinho"> carinho </a> </strong>    com sucesso!!! 
                             
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
             //               echo "<script>window.location = './'</script>";
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
                       <div class="my-4 p-4 bg-white rounded shadow-sm">
        
        
        
        <div class="media text-muted pt-4">
            <img class="rounded-circle" src="./imgProduto/<?php echo $resultadoProduto['produto_img'] ?>" alt="<?php echo $resultadoProduto['produto_nome'] ?>" title="<?php echo $resultadoProduto['produto_nome'] ?>" width="150" height="140" style="padding-right: 12px;   ">
<!--          <img src="./imgProduto/<?php echo $resultadoProduto['produto_img'] ?>" alt="" class="mr-2 rounded">-->
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">
                  <h6>  <input type="text"  name="n1" size="25%" value="<?php echo $resultadoProduto['produto_nome'] ?>" style="border: none" readonly="on" ></h6>
            
              </strong>
            
            </div>
            <span class="d-block"><p class="font-weight-normal"><?php echo $resultadoProduto['produto_descricao'] ?></p></span>
            <h7> <input type="hidden" name="p1" size="10%"  value=" <?php echo  $resultadoProduto['produto_preco'] ?>" style="border: none; " readonly="on"> <?php echo "R$ ". number_format($resultadoProduto['produto_preco'], 2, ",", ".") ?></h7>
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
          <form id="insert_form" action="?p=home&acao=add&id=<?php echo $resultadoProduto['produto_id']; ?>" method="post">
               
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
            <input type="number"  min="1" name="prod[<?php echo $resultadoProduto['produto_id'] ?>]" value="1" >
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
//if (isset($_GET['acao'])) {
//if ($_GET['acao'] == 'up') {
//                        if (is_array($_POST['prod'])) {
//                            foreach ($_POST['prod'] as $id => $qtd) {
//                                $id = intval($id);
//                                $qtd = intval($qtd);
//                                if (!empty($qtd) || $qtd <> 0) {
//                                    $_SESSION['carrinho'][$id] = $qtd;
//                                } else {
//                                    unset($_SESSION['carrinho'][$id]);
//                                }
//                            }
//                        }
//                    }
//                     if ($_GET['acao'] == 'del') {
//                        $id = intval($_GET['id']);
//                        if (isset($_SESSION['carrinho'][$id])) {
//                            unset($_SESSION['carrinho'][$id]);
//                            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>"
//				;
//                        }
//                    }
//                }
                ?>
<!--<div class="container-fluid" style="text-align: center;">
    <form action="index.php?p=home" >      
        <button type="submit" class="btn btn-danger">Cancelar </button>
    </form>
</div>                /CANCELAR-->

</div>
        </div>       <!--CONTAINER-->    
        
        
        
       <h2>Os Mais Pedidos - TOP 10</h2>
 
 <div class="row">      
            
<?php //listar produtos no centro

          
  
  
  //mais pedidos
     $read_produto = mysqli_query($conn, "SELECT *,"
             . " SUM(itens_pedido.itens_pedido_quantidade)  as 'soma' FROM itens_pedido"
             . " left JOIN produto on itens_pedido.itens_pedido_id_produto = produto.produto_id"
             . " GROUP BY itens_pedido.itens_pedido_id_produto ORDER BY soma DESC LIMIT 10");
        if(mysqli_num_rows($read_produto) > '0'){
            foreach ($read_produto as $read_produto_view){
               
       $read_pedido = mysqli_query($conn,  "SELECT cliente.id_cliente, cliente.nome_cliente,"
               . " COUNT(pedido.pedido_id) as 'qtd' FROM cliente"
               . " left JOIN pedido on cliente.id_cliente = pedido.id_usuario GROUP BY pedido.id_usuario");
            ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                
          
              <div class="card-body">
                <h4 class="card-title">
                <?php echo  $read_produto_view['produto_nome'];?>
                </h4>
                <h5> <?php echo ($read_produto_view['produto_tamanho']);?></h5>
               <h5>R$ <?php echo number_format($read_produto_view['produto_preco'],2,",",".");?></h5>
              </div>
              
            </div>
          </div>

            <?php
       
  }}
  
             else {
             $sql_categoria = "";    
             }

  
  
  
     
            
        
             
     
             
        ?>
    
     
    
    <!-- /.row -->
        </div> 
     
      
    </main>

