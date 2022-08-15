 <!--CADASTRAR CATERGORIA-->
<?php
     $_SESSION['idUsuario'];
    if (isset($_POST['acao']) && $_POST['acao'] == 2) {

    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    }
    mysqli_query($conn,"INSERT INTO categoriacaixa (categoriacaixa_nome,categoriacaixaid_usuarioid) values ('$nome','".$_SESSION['idUsuario']."')");
    
if(mysqli_insert_id($conn) == 0){
    echo mysqli_error($conn);
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '10;URL=index.php'>
				<script type=\"text/javascript\">
					alert(\"ERRO ao cadastrar categoria.\");
				</script>";
    exit();
} else {
    
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=fc'>
				<script type=\"text/javascript\">
					alert(\"Categoria Cadastrada com Sucesso.\");
				</script>";
       
    exit();
}

 ?>