<?php
  


// $frete = 5;
//       @$totalFinal = $frete + $total;
//       if(isset($totalFinal) && $totalFinal == $frete){
//    echo "<script>alert(' Carrinho Vazio ')</script>";
//    echo "<script>window.location = './'</script>";
//}



 

if(isset($_POST['id_txt']) || isset($_POST['enviar']) ){
 //isso tudo vem do formulario maisDetalhes
    @$id = mysqli_real_escape_string($conn, trim($_POST['id_txt']));
    @$nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    @$quantidade = mysqli_real_escape_string($conn, trim($_POST['quantidade']));
    @$preco = mysqli_real_escape_string($conn, trim($_POST['preco']));     
    @$descricao = mysqli_real_escape_string($conn, trim($_POST['descricao'])); 
            @$itens_pedido_obs = mysqli_real_escape_string($conn, trim($_POST['itens_pedido_obs']));
            
            
            
  @$meucarrinho [] = array ('id' => $id, 'nome' => $nome, 'quantidade' => $quantidade, 'preco' => $preco, 'descricao' => $descricao,   'itens_pedido_obs' => $itens_pedido_obs);
} 
//$_SESSION['carrinho'] = $meucarrinho;

if(isset($_SESSION['carrinho'])){    
     $meucarrinho = $_SESSION['carrinho'] ;
    if(isset($_POST['id_txt'])){
    @$id = mysqli_real_escape_string($conn, trim($_POST['id_txt']));
    @$nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    @$quantidade = mysqli_real_escape_string($conn, trim($_POST['quantidade']));
    @$preco = mysqli_real_escape_string($conn, trim($_POST['preco']));
    @$descricao = mysqli_real_escape_string($conn, trim($_POST['descricao']));
    @$itens_pedido_obs = mysqli_real_escape_string($conn, trim($_POST['itens_pedido_obs']));
    
    
    //indice no mesmo local
    @$pos = -1;
    for ($i=0; $i< count($meucarrinho); $i++){
        if($id == @$meucarrinho[$i]['id'] ){
            $pos = $i;
            //vai agrupar se for verdadeiro
        }
    }   
    
    

    //incrementar quantidade se for diferente de menos 1 eee somando uma qunatidade com a outra
//  if($pos<>-1 && isset($meucarrinho['adcional'])){
//        $quant = $meucarrinho[$pos]['quantidade'] + $quantidade;
//     //   $prec = $meucarrinho[$pos]['preco'] + $preco;
//     //   $no = $meucarrinho[$pos]['nome'] + $nome;
//    $meucarrinho [] = array ('id' => $id, 'nome' => $nome, 'quantidade' => $quantidade, 'preco' => $preco, 'descricao' => $descricao,  'adcional' => $adcional, 'tamanho' => $tamanho, 'itens_pedido_obs' => $itens_pedido_obs, 'adcionaltxt' => $adcionaltxt);
//  }
    if($pos<>-1){
        $quant = $meucarrinho[$pos]['quantidade'] + $quantidade;
     //   $prec = $meucarrinho[$pos]['preco'] + $preco;
    //    $no = $meucarrinho[$pos]['nome'] + $nome;
  @$meucarrinho [$pos] = array ('id' => $id, 'nome' => $nome, 'quantidade' => $quant, 'preco' => $preco, 'descricao' => $descricao,   'itens_pedido_obs' => $itens_pedido_obs);
    }else{
  
  $meucarrinho [] = array ('id' => $id, 'nome' => $nome, 'quantidade' => $quantidade, 'preco' => $preco, 'descricao' => $descricao, 'itens_pedido_obs' => $itens_pedido_obs);
}
}}

    







//atualizar quantidade manual no carrinho
if(isset($_POST['id2'])){
$indice = $_POST['id2'];
$quant = $_POST['quantidade2'];
$meucarrinho[$indice]['quantidade'] = $quant;
    
}//excluir
if(isset($_POST['id3'])){
    $indice = $_POST['id3'];
$meucarrinho[$indice] = NULL;
    
}
 


if(isset($meucarrinho)) $_SESSION['carrinho'] = $meucarrinho;



?>








<h4 class="mb-3"></h4><br/>
<div class="container">


<?php
if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) == 0) {
    
      echo "<script>alert(' Carrinhoxxx Vazio ')</script>";
    echo "<script>window.location = './'</script>";
      ;
} else {

?>  

  






        <div class="card-deck mb-3 ">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Carrinho de Compras</h4>
                </div>
                <div class="card-body">

                    <ul class="list-unstyled mt-3 mb-4">


       <?php 
     
        
        if(isset($meucarrinho)){
           $total = 0;
         for ($i=0; $i< count($meucarrinho); $i++ )   {
      
             if(isset($meucarrinho[$i])<>NULL){
         ?>
                



                                    <form action="" method="POST" name="atualizarQtd" >
                                 <small class="text-muted">   <?php echo $meucarrinho[$i]['nome'] ?></small>
 <?php
                                    @$preco = $meucarrinho[$i]['preco'];
                                    $subtotal = $meucarrinho[$i]['preco'] * $meucarrinho[$i]['quantidade'];
                                    $total += $subtotal;
                                    ?>
                                     <small class="text-muted">   R$:  <?php echo number_format($preco, 2, ",", ".") ?>    <?php ?></small>
                                        <input type="hidden" name="id2" value="<?php echo $i; ?>">
                                        
                                        
                                        <br/>
                                   <small class="text-muted">     Uni: <input type="number" size="3" min="1" style="width: 50px;"  oninput="validity.valid ? this.save = value : value = this.save;" name="quantidade2" value="<?php echo $meucarrinho[$i]['quantidade'] ?>" >
                                        <input type="submit"  value="Atualizar" >

                                        Sub-Total: R$<?php echo number_format($subtotal, 2, ",", ".") ?></small><br/>
                                        <?php
                                        if (!empty($meucarrinho[$i]['itens_pedido_obs'])) {
                                            ?>                  
                                            <label class="text-warning">Observação ao produto: </label>
                                            <label name="itens_pedido_obs" readonly="on" style="border: 0 none;"><?php echo $meucarrinho[$i]['itens_pedido_obs'] ?></label>
                    <?php
                }
                ?> 
                                    </form>



<small class="text-muted"> 
                                    <form method="POST" name="excluir">
                                        <input type="hidden" name="id3" value="<?php echo $i ?>" />
                                        <input type="submit"  value="Remover do Carrinho" />


                                    </form></small>
                        <hr>
                <?php ?>

                <?php
            }
            ?>

            <?php
        }

//       if(isset($totalFinal) && $totalFinal == $frete){
//    echo "<script>alert(' Carrinhoxxx Vazio ')</script>";
//    echo "<script>window.location = './'</script>";
//}
        ?>
                            <?php
                            $frete = 5;

                            $totalFinal = $frete + $total;
                            // $tt = floatval($totalFinal);
                            // echo var_dump($tt);
                        }
                        ?> <h8 class="card-title pricing-card-title"> <small class="text-muted"> Total R$</small>    <?php echo number_format(@$total, 2, ",", ".") ?></h8>   

                    </ul>

                    <form action="index.php?p=pfv" method="POST">

    <!--        <h7 class="card-title pricing-card-title"> <small class="text-muted"> Taxa de entrega</small> R$ <?php echo number_format($frete, 2, ",", ".") ?> </h7>
           
    <h8 class="card-title pricing-card-title"> <small class="text-muted">/ Total sem a taxa</small>    <?php echo number_format($total, 2, ",", ".") ?></h8>    
       
       <h7 class="card-title pricing-card-title">  <small class="text-muted">/ Total com a taxa</small> <?php echo number_format($totalFinal, 2, ",", ".") ?></h7>-->


                     


                        <?php
//listar produtos PF
//if (!isset($_SESSION['carrinho']) || isset($totalFinal) == 5)  {
//    echo "<script>alert(' Carrinho está vazio ')</script>";
//    echo "<script>window.location = './'</script>";
//}   
                    }
                    ?>

                    <!--./index.php?p=finalizar-pedido-->

  
                    <div class="table-responsive-xl">
                        <table class="table">
                            <input type="hidden" name="totalFinal" value="<?php echo $total ?>" >
                            
                            
                            <label class="text-warning">Alguma observação ?</label><br/>
                            <textarea name="obs" rows="4" cols="37" placeholder="Se vai precisar de troco, alguma informão extra"></textarea><br/>


                            <!--             FORMA DE PAGAMENTO-->
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
            </div>     </div>  <!--FORMA DE PAGAMENTO-->  


<?php
if (isset($_SESSION['nomeCompleto']) || isset($_SESSION['endereco'])) {
    ?>
<!--                                <li class="nav-item">
                                <h7>  Endereço: <?php echo $_SESSION['endereco'] ?> - CEP: <?php echo $_SESSION['cep'] ?></h7>


                                </li>-->
<?php } ?>
<?php if (isset($_SESSION['cep']) != (isset($_SESSION['cep']))) { ?>
                                <li class="nav-item">
                                    <h2>Não fazemos entregas neste endereço</h2>
                                </li>
<?php } else {
    ?>







                            <?php }
                            ?>




<br/>

                    <p class="btn btn-lg" colspan="5"><a href="./index.php?p=home">Continuar Comprando</a></p>
<br/>

                            <button type="submit" name="enviar" class="btn btn-lg btn-block btn-outline-primary">
                                Finalizar Pedido</button>




                         
                            <!--    <button  class="btn btn-success">Finalizar Pedido</button>-->
                        </table>   
                    </div>   

   </form>

            </div>  </div>
    </div>        </div>
   <?php
 
                              if (empty($subtotal)) {
        echo "<script>alert(' Carrinho está vazio ')</script>";
        echo "<script>window.location = './'</script>";
    }
    
    ?>