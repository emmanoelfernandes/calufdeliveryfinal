   <?php if (@$_SESSION['idUsuario'] == 0 ) { 
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=home'>";
exit();  }  ?>
<!--IMPRIMIR CUPOM DE VER PEDIDOS VENDAS,  , pega formulario da pagina ver pedidos dentro do forms ADMIN-->
<header>
 <script type="text/javascript">setTimeout("window.close();",5000)</script> <!--fecha a janela depois de imprimir-->
</header>
<?php
 // Recebe os dados vindo do formulario
// $nome = $_POST['nome'];
// $endereco = $_POST['endereco'];

// //cria a conexao
// $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
//
// //checa a conecção
// if (!$conn) {
//  die("Conecção falhou: " . mysqli_connect_erro());
// }
//
////                                                 AQUI COMEÇA A PARTE NOVA PARAR INSERÇÃO DE VALORES NAS TABELAS !!!
//
// // CASO TUDO ESTEJA OK INSERE DADOS NA BASE DE DADOS
// $sql="INSERT INTO tbteste (nome, endereco) VALUES ('$_POST[nome]','$_POST[endereco]')";
//
//
// // CASO ESTEJA TUDO OK ADICIONA OS DADOS, SENÃO MOSTRA O ERRO
// if (!mysqli_query($conn,$sql))
// {
//     die('Error: ' . mysqli_error($conn));
// }
//
// // MOSTRA A MENSAGEM DE SUCESSO
// echo "Novo Registro Inserido :". "<br>";
//
// mysqli_close($conn);
//                                                 AQUI TERMINA A PARTE NOVA PARAR INSERÇÃO DE VALORES NAS TABELAS !!!
?>

<?php

 

if(isset($_REQUEST["id"])){
   $idd = $_REQUEST['id'];
    $produtoNome = $_REQUEST['produtoNome'];
    $qtd = $_REQUEST['qtd'];
    $precoUtd = $_REQUEST['precoUnt'];
    
    @$obs = $_REQUEST['obs'];

    @$total = $_REQUEST['total'];
    @$tipo = $_REQUEST['tipo'];
    @$troco = $_REQUEST['troco'];
    @$levatroco = $_REQUEST['levatroco'];
    @$fdp = $_REQUEST['fdp'];
    @$sub = $_REQUEST['sub'];
    @$desco = $_REQUEST['desco'];
      @$frete = $_REQUEST['frete'];
    
    
    
    
    @$caluf = $_REQUEST['caluf'];
@$novo =  $_REQUEST['novo'];
@$dataehora = $_REQUEST['dataehora'];
@$pedidoid = $_REQUEST['pedidoid'];
@$msg = $_REQUEST['msg'];
@$fdpp = $_REQUEST['fdpp'];

$nome = $_REQUEST['nome'];
$celular = $_REQUEST['celular'];
 @$end = $_REQUEST['end'];
 @$num = $_REQUEST['num'];
  @$bairro = $_REQUEST['bairro'];
  @$comp = $_REQUEST['comp'];
  @$ponto = $_REQUEST['ponto'];
 ?>
<div class="carousel-item active" style="text-align: center">
    <img class="featurette-image img-fluid mx-auto" src="./imgSite/logo2.jpg" alt="" title="" width="420" height="30px">
     </div>           
        <?php
 echo "<h1>";    
 echo "<div style='text-align: center'>";
//echo "$caluf" . " <br>";
// echo "$novo" . "<br>";
 echo "$dataehora - #$pedidoid" . "<br>";
 echo "</div>";
?>
     
 <?php
echo "<hr>";







 foreach ( $idd as $ix ) {
 echo " $qtd[$ix]  - $produtoNome[$ix]   -   $precoUtd[$ix]    <br>";
  }  
echo "<hr>";



//$produtoNome = $_POST['produtoNome'];
//$qtd = $_POST['qtd'];
//$precoUnt = $_POST['precoUnt'];

 
echo "<hr>";
if ($fdp == "Cartão") {
     echo " Forma de Pagamento: Cartão <br/>";
     echo "Tipo de cartão: $tipo" . "<br>";
    echo "Sub-Total: R$ $sub" . "<br>";
echo "Acréscimo: $acre" . "<br>";
echo "Frete: $frete" . "<br>";
    
    echo "Desconto: R$ $desco" . "<br>";

     echo "Total: R$ $total" . "<br>";



}
if ($fdp == "Dinheiro") {

    echo " Forma de Pagamento: Dinheiro <br/>";
echo "Sub-Total: R$ $sub" . "<br>";
echo "Frete: $frete" . "<br>";
echo "Desconto: R$ $desco" . "<br>";
    
echo "Total: R$ $total" . "<br>";    
    echo "Troco para: R$ $troco" . "<br>";
echo "Levar Troco: R$ $levatroco" . "<br>";
}
if ($fdp == "PIX - NOSSA CHAVE PIX") {

    echo " Forma de Pagamento: $fdpp" . "<br/>";
echo "Sub-Total: R$ $sub" . "<br>";
echo "Frete: $frete" . "<br>";
echo "Desconto: R$ $desco" . "<br>";
    
echo "Total: R$ $total" . "<br>";    
   
}




if ($troco > 0) {

}
echo "<hr>";
if ($end == "") {
  echo "Buscar no local<br/>";
 
 echo "Nome do Cliente: $nome" . "<br>";
 echo "Celular: $celular" . "<br>";
}ELSE
{
       echo "Modo Delivery<br/> ";
    echo "Nome do Cliente: $nome" . "<br>";
 echo "Celular: $celular" . "<br>";
}

if ($end != "") {
 echo "Endereço: $end" . "<br>";
 echo "Número: $num" . "<br>";
 echo "Bairro: $bairro" . "<br>";
 echo "Complemento: $comp" . "<br>";
  echo "Referência: $ponto" . "<br>";
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


<!--scrip que faz abrir a tela do windows iniciando a impressao-->

<script type="text/javascript">
 window.print();
</script>

<script type="text/javascript">
 window.onload = function() { window.print(); }
</script>


