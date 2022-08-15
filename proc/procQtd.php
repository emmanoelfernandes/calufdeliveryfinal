<?php if (isset($_GET['acao'])) {
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
                          ?>      
         
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oloco, meu!</strong> Item adicionado ao carrinho com sucesso!
<!-- Para ver o carrinho; <a href="index.php?p=finalizar" class="alert-link">clique aqui!</a>.-->
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 
      <span aria-hidden="true">&times;</span>
 

  </button>
</div>
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


<!--CARRINHO DE COMPRAS-->
                        <?php if(count($_SESSION['carrinho']) >= 1){     ?>     
<form action="index.php?p=&acao=up&id=<?php echo $resultadoProduto['produto_id']; ?>" method="post">          
<table class="container-fluid" style="text-align: center;">
                        <h6>Carrinho de Compras</h6>
                        <thead>
                          <tr>
                            <th width="244">Produto</th>
                            <th width="79">Qtd</th>
                            <th width="89">Pre&ccedil;o</th>
                            <th width="100">SubTotal</th>
                            <th width="64">Remover</th>
                          </tr>
                        </thead>
                     
                        <tfoot>
                          <tr>
                            <td colspan="5"><input type="submit" value="Atualizar Carrinho" /></td>
                          <tr>
<!--                          <td colspan="5"><a href="index.php?p=home">Continuar Comprando</a></td>-->
                        </tfoot>
                        <tbody>
                    <?php
                    

                        $total = 0;
                        foreach ($_SESSION['carrinho'] as $id => $qtd) {
                            $sql = "SELECT *  FROM produto WHERE produto_id= '$id'";
                            $qr = mysqli_query($conn, $sql) or die(mysql_error());
                            $ln = mysqli_fetch_assoc($qr);
                            $nome = $ln['produto_nome'];
                            $preco = number_format($ln['produto_preco'], 2, ',', '.');
                            $sub = number_format($ln['produto_preco'] * $qtd, 2, ',', '.');
                            $total += $ln['produto_preco'] * $qtd;
                            echo '
              <tr>       
                <td>' . $nome . '</td>
                <td><input type="number" size="3" id="quantidade" maxlength="4" style="width:45px;" name="proda[' . $id . ']" value="' . $qtd . '" /></td>
                <td>R$ ' . $preco . ' </td>
                <td>R$ ' . $sub . '</td>
                <td><a href="index.php?p=home&acao=del&id=' . $id . '">Remove</a></td>
                            </tr>';
                        }
                        $total = number_format($total, 2, ',', '.');
                        echo '<tr>                         
              <td colspan=""></td>
              <td colspan=""></td>
<td colspan=""><strong> Total              </strong></td>

     <td colspan="" ><strong> R$ ' . $total . '</strong></td>
              <td colspan=""></td>
              
                    </tr>';
                        }
                    ?>
                           
                             </tbody>
                     </table>
                </form>
                <p></p>
                
