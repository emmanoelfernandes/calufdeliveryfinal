<?php 


$id_produto = addslashes($_GET['idProduto']);
 $sqlProduto = mysqli_query($conn, "SELECT * FROM produto  "
         //"p LEFT JOIN categoria c             . "
         //. " ON c.categoria_id = p.produto_categoria_id "
         //. " LEFT JOIN adicionais a ON a.adicionais_categoria_id = p.produto_adc"
         . " WHERE produto_id = '". $id_produto ."'   "
//. "      AND p.produto_adc = a.adicionais_categoria_id 
         //." GROUP BY p.produto_id "
         //. " ORDER BY p.produto_descricao ASC"
         );
        if(mysqli_num_rows($sqlProduto) > '0'){
        
           
            
       ?>




      <div class="col-lg-9">
          <form action="index.php?p=carrinho" method="POST">
           <div class="card mt-4">
               <?php 
//             if(isset($read_produto_view['categoria_id'])  &&  ($read_produto_view['categoria_id'] == 2)){
                 foreach ($sqlProduto as $mostraProduto){
             ?>
               <img class="card-img-bottom"  height="462" width="22" title="<?php echo $mostraProduto['produto_nome']?>  " src="./imgProduto/<?php echo $mostraProduto['produto_img']?>" alt="<?php echo $mostraProduto['produto_nome']?> ">
               <div  class="card-body">
                   <label class="text-warning">Nome: </label>
                    <?php echo $mostraProduto['produto_nome']?> &zwnj;<input style="border: 0 none;" type="hidden" readonly="on" name="nome" value="<?php echo ($mostraProduto['produto_nome']);?>"><br/>
                    
    <label class="text-warning">Acompanhamento: </label>
     <?php echo $mostraProduto['produto_descricao']?> &zwnj;<input style="border: 0 none;" type="hidden" readonly="on" name="descricao" value="<?php echo ($mostraProduto['produto_descricao']);?>"><br/>

              <h7>     
                  <label class="text-warning">Preço:</label>
                  <input type="hidden" name="preco"  value="<?php echo $mostraProduto['produto_preco'];?>" />  <?php echo number_format($mostraProduto['produto_preco'],2,",",".");?>
                     
        <?php }}  

?>                     
 
                       <br/>
                       Quantidade: <input type="number" min="1" name="quantidade" value="1" style="width:  50px;"  oninput="validity.valid ? this.save = value : value = this.save;">
            </h7>
<!--             AQUI VAI PRO CARRINHO-->
         

            <br/>           
     
<!--                         <label class="text-warning">Observação do Produto</label><br/>
                            <textarea   style="border: 30 none;" name="itens_pedido_obs" ></textarea>-->
           
                            <input type="hidden" name="id_txt" value="<?php echo $mostraProduto['produto_id']?>">
            
          </div>
          <div class="text-right">
              <input class="btn btn-success" type="submit" value="Insisir no Carrinho" />
           </div>
          </div>
</form>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
 