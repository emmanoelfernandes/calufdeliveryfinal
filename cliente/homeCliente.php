

  <body>


    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Refeições Caluf - Delivery</h1>
          <h1 class="jumbotron-heading">Bem-Vindo(a) 
              <?php
          if(isset($_SESSION['nomeCompleto']))
          {     echo $_SESSION['nomeCompleto']; }
          if(!isset($_SESSION['nomeCompleto'])){
              echo "Visitante";    
              }
              
           ?>
          </h1>
<!--          <p class="lead text-muted">Algo curto e direto, sobre a coleção abaixo (conteúdo, criador e etc). Faça com que seja curto e legal, mas não tão curto ao ponto de as pessoas pularem ele.</p>-->
<!--          <p>
            <a href="#" class="btn btn-primary my-2">Call-to-action principal</a>
            <a href="#" class="btn btn-secondary my-2">Call-to-action secundário</a>
          </p>-->
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

     
 
 
 
 
  <h2>Principais Pratos</h2>
          <div class="row">
         

         <?php //listar produtos PF
       
      
       $sqlProduto = mysqli_query($conn, "SELECT * "
             . "  FROM produto"      
          . " WHERE produto_categoria_id = 1  OR produto_categoria_id = 6 OR produto_categoria_id = 7"
               );
        if(mysqli_num_rows($sqlProduto) > '0'){
            foreach ($sqlProduto as $mostraProduto){
        ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                 
                <img class="card-img-top" src="./imgProduto/<?php echo $mostraProduto['produto_img']?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?php echo $mostraProduto['produto_nome']?></p>
                   <small class="text-muted">R$ <?php echo number_format($mostraProduto['produto_preco'],2,",",".")?></small> 
                  <p class="card-text"></p>
                   
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group"> 
                          <button type="button" class="btn btn-sm btn-outline-secondary"><a href="./index.php?p=maisDetalhes&idProduto=<?php echo $mostraProduto['produto_id'];?>">Comprar</a></button> &zwj;&zwnj;
                         
                          
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
    <?php //listar produtos PF
        }        }
        ?>  

          </div>
  
  
  <h2>Bebidas</h2>
          <div class="row">
         

         <?php //listar produtos PF
       
      
       $sqlProduto = mysqli_query($conn, "SELECT * "
             . "  FROM produto"      
          . " WHERE produto_categoria_id = 3  "
               );
        if(mysqli_num_rows($sqlProduto) > '0'){
            foreach ($sqlProduto as $mostraProduto){
        ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                 
                <img class="card-img-top" src="./imgProduto/<?php echo $mostraProduto['produto_img']?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?php echo $mostraProduto['produto_nome']?></p>
                   <small class="text-muted">R$ <?php echo number_format($mostraProduto['produto_preco'],2,",",".")?></small> 
                  <p class="card-text"></p>
                   
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group"> 
                          <button type="button" class="btn btn-sm btn-outline-secondary"><a href="./index.php?p=maisDetalhes&idProduto=<?php echo $mostraProduto['produto_id'];?>">Comprar</a></button> &zwj;&zwnj;
                         
                          
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
    <?php //listar produtos PF
        }        }
        ?>  

          </div>
  
  
  
  
  <h2>Os Mais Pedidos</h2>
 <div class="col-lg-9">
 <div class="row">      
            
<?php //listar produtos no centro

          
  
  
  //mais pedidos
     $read_produto = mysqli_query($conn, "SELECT *,"
             . " SUM(itens_pedido.itens_pedido_quantidade)  as 'soma' FROM itens_pedido"
             . " left JOIN produto on itens_pedido.itens_pedido_id_produto = produto.produto_id"
             . " GROUP BY itens_pedido.itens_pedido_id_produto ORDER BY soma DESC");
        if(mysqli_num_rows($read_produto) > '0'){
            foreach ($read_produto as $read_produto_view){
               
       $read_pedido = mysqli_query($conn,  "SELECT cliente.id_cliente, cliente.nome_cliente,"
               . " COUNT(pedido.pedido_id) as 'qtd' FROM cliente"
               . " left JOIN pedido on cliente.id_cliente = pedido.id_usuario GROUP BY pedido.id_usuario");
            ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
<!--                <a href="./index.php?p=produto&id=<?php echo $read_produto_view['produto_img'];?>"> <img class="card-img-top" src="./midias/<?php echo $read_produto_view['produto_img']?>"  alt="Imagem do Produto"></a>-->
              <div class="card-body">
                <h4 class="card-title">
                    <a href="./index.php?p=maisDetalhes&idProduto=<?php echo $read_produto_view['produto_id'];?>"><?php echo  $read_produto_view['produto_nome'];?></a>
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
   </div>      </div> 
        </div>
      </div>

    </main>

    

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
 
