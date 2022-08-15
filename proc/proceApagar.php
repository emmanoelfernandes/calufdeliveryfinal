<?php
	
 if(isset($_POST['apagar']) ){
    $id = $_POST['idApagar'];

        
	$result_cursos = "DELETE FROM movimentacao WHERE idMovimentacao = '$id'";
	$resultado_cursos = mysqli_query($conn, $result_cursos);	
if(mysqli_affected_rows($conn) == 1 ){

 
		
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Movimento Apagado com Sucesso.\");
				</script>
			";	
 } else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"ERRO; movimento não foi Apagado com Sucesso.\");
				</script>
			";	
 } }?>



<?php 
if(isset($_POST['idApagarCat'])){
$id = $_POST['idApagarCat'];
@$idapaga = $_GET['apagaC'];
  
    $qr=mysqli_query($conn,"SELECT * FROM movimentacao m  INNER JOIN categoriacaixa c ON "
            . " c.categoriacaixa_id = m.categoriaMovimentacao_idCategoria "
            . " WHERE $id = m.categoriaMovimentacao_idCategoria && c.categoriacaixa_id = $id ");
    if (mysqli_num_rows($qr)>0){
        	echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Categoria não pode ser apagado, existe um movimento associado com esta categoria.\");
				</script>
			";
        exit();
    }         
	$result_cursos = "DELETE FROM categoriacaixa WHERE categoriacaixa_id = '$id'";
	$resultado_cursos = mysqli_query($conn, $result_cursos);	
if(mysqli_affected_rows($conn) == 1 ){



 
		
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Categoria Apagado com Sucesso.\");
				</script>
			";	
 } else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '10;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"ERRO; Categoria não foi Apagado com Sucesso.\");
				</script>
			";	
 } }?>    
<?php 

if(isset($_POST['apagarCliente'])){
$id = $_POST['idApagarClienteINPUT'];
@$idapaga = $_GET['idac'];
  
   
	$result_cursos = "DELETE FROM cliente WHERE id_cliente = '$idapaga'";
	$resultado_cursos = mysqli_query($conn, $result_cursos);	
if(mysqli_affected_rows($conn) == 1 ){



 
		
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '10;URL=index.php?p=lc'>
				<script type=\"text/javascript\">
					alert(\"Apagado com Sucesso.\");
				</script>
			";	
 } else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '10;URL=index.php?p=lc'>
				<script type=\"text/javascript\">
					alert(\"ERRO;  não foi Apagado com Sucesso.\");
				</script>
			";	
 } }?>    
