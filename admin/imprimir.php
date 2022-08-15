   <?php if (@$_SESSION['idUsuario'] == 0 ) { 
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=home'>";
exit();  }  ?>
<!--IMPRIMIR CUPOM DE INICIO ADMIN-->
        

<header><!--fecha a janela depois de imprimir-->
 <script type="text/javascript">setTimeout("window.close();",0000)
  <?php echo "<script>window.location = 'index.php?p=admin'</script>"; 
      echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=admin'>";
      ?>
      </script> 
</header>


<?php
if (isset($_REQUEST['idimprime']))
    ;
// $id_produto_carrinho = '0';
$read_pedido = mysqli_query($conn, "SELECT * FROM itens_pedido INNER JOIN cliente ON (itens_pedido.id_usuario = cliente.id_cliente)"
        . " INNER JOIN pedido ON (pedido.pedido_id = itens_pedido.itens_pedido_id_pedido)"
        . " INNER JOIN produto ON (produto.produto_id = itens_pedido.itens_pedido_id_produto) "
       
        . " WHERE pedido.pedido_id = '" . $_REQUEST['idimprime'] . "' AND  itens_pedido.itens_pedido_id_pedido = '" . $_REQUEST['idimprime'] . "' "
);
 if (mysqli_num_rows($read_pedido) > '0') {


                        foreach ($read_pedido as $read_pedido_view) {
?>

<?php


   $idd = $_REQUEST['idimprime'];
    $produtoNome = $read_pedido_view['itens_pedido_id_produto'];
    @$qtd = $read_pedido_view['itens_pedido_quanidade'];
    @$precoUtd = $read_pedido_view['itens_pedido_valor_produto'];
    
    @$obs = $read_pedido_view['pedido_obs'];

  @$modo = $read_pedido_view['pedido_modo'];
    @$tipo = $read_pedido_view['pedido_tipo'];
    @$troco = $read_pedido_view['pedido_troco'];
    
   
 
    
    @$fdp = $read_pedido_view['pedido_fdp'];
    
    
      @$total = $read_pedido_view['pedido_valor'];  
    @$desco = $read_pedido_view['pedido_desco'];
    
    
    @$sub = $total + $desco;
    
       @$levatroco =  $troco - $total;
   
   
    @$caluf = $read_pedido_view['caluf'];
@$novo =  $read_pedido_view['novo'];
$dataehora = new DateTime($read_pedido_view['pedido_data_hora']);


$msg = "Obrigado por comprar conosco, bom almoço, Deus te abençoe e volte sempre.";

$nome = $read_pedido_view['nome_cliente'];
$celular = $read_pedido_view['celular_cliente'];
 @$end = $read_pedido_view['endereco_cliente'];
 @$num = $read_pedido_view['numneroCasa_cliente'];
  @$bairro = $read_pedido_view['bairro_cliente'];
  @$comp = $read_pedido_view['cliente_complemento'];
                        }
 ?>
<div class="carousel-item active" style="text-align: center;">
    <img class="featurette-image img-fluid mx-auto" src="./imgSite/logo2.jpg" alt="" title="" width="420" height="30px">
     </div>           

     
 <?php
echo "<hr>";







 foreach ( $read_pedido as $read_pedido_view2) {
 echo $read_pedido_view2['itens_pedido_quantidade'] ." ".  $read_pedido_view2['produto_nome']. " ". $read_pedido_view2['itens_pedido_valor_produto']; 
 echo "<br>"; }  
echo "<hr>";



//$produtoNome = $_POST['produtoNome'];
//$qtd = $_POST['qtd'];
//$precoUnt = $_POST['precoUnt'];


if ($fdp == "Cartão") {
     echo " Forma de Pagamento: Cartão <br/>";
    echo "Sub-Total: R$ $sub" . "<br>";
echo "Desconto: R$ $desco" . "<br>";
     echo "Total: R$ $total" . "<br>";
echo "Tipo de Pagamento: $tipo" . "<br>";
}
if ($fdp == "Dinheiro") {

    echo " Forma de Pagamento: Dinheiro <br/>";
echo "Sub-Total: R$ " .  number_format($sub, 2, ',', '.'). "<br>";
echo "Desconto: R$ ".  number_format($desco, 2, ',', '.') ."<br>";
    
echo "Total: R$ " .  number_format($total, 2, ',', '.'). "<br>";    
    echo "Troco para: R$ " .  number_format($troco, 2, ',', '.') . "<br>";
echo "Levar Troco: R$ " .  number_format($levatroco, 2, ',', '.') . "<br>";
}

if ($troco > 0) {

}
echo "<hr>";
 
if ($modo == "") {
  echo "Modo: Buscar no local<br/>";
 
 echo "Nome do Cliente: $nome" . "<br>";
 echo "Celular: $celular" . "<br>";
}ELSE
{
       echo "Modo: Delivery<br/> ";
    echo "Nome do Cliente: $nome" . "<br>";
 echo "Celular: $celular" . "<br>";
}

if ($end != "") {
 echo "Endereço: $end" . "<br>";
 echo "Número: $num" . "<br>";
 echo "Bairro: $bairro" . "<br>";
 echo "Complemento: $comp" . "<br>";
}
echo "<hr>";
if ($obs != "") {
echo "Observação: $obs" . "<br>";
 }
echo "<hr>";
echo " $msg" . "<br>";
echo "</h1>";
}
 ?>
        <?php
 echo "<h1>";    
 echo "<div style='text-align: center; font-size:20px;'>";
//echo "$caluf" . " <br>";
// echo "$novo" . "<br>";
 echo $dataehora->format('d/m/Y - H:m' )  ;
 echo "</div>";
?>

<!--scrip que faz abrir a tela do windows iniciando a impressao-->

<script type="text/javascript">
 window.print();
</script>

<script type="text/javascript">
 window.onload = function() { window.print(); 
 
    }
</script>