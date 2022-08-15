
<?php
     
    if (isset($_POST['nome']) && $_POST['salvar']) {

//  
//     $data = $_POST['data'];
//      $tipo =  $_POST['tipo'];
         $senha = mysqli_real_escape_string($conn, trim($_POST['senha']));
        $email = "email";
       $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
        $cep = mysqli_real_escape_string($conn, trim($_POST['cep']));
        $end = mysqli_real_escape_string($conn, trim($_POST['end']));
        $num = mysqli_real_escape_string($conn, trim($_POST['num']));
        $comp = mysqli_real_escape_string($conn, trim($_POST['comp']));
        $ponto = mysqli_real_escape_string($conn, trim($_POST['ponto']));
        $bairro = mysqli_real_escape_string($conn, trim($_POST['bairro']));
        @$uf = mysqli_real_escape_string($conn, trim($_POST['uf']));
        @$cidade = mysqli_real_escape_string($conn, trim($_POST['cidade']));
        $celular = mysqli_real_escape_string($conn, trim($_POST['celular']));
//        $valor = mysqli_real_escape_string($conn, trim($_POST['valor']));
//        $number = str_replace(',','.',str_replace('.','',$valor));
//        $numberr = str_replace(',','.',str_replace(',','.',$number));
//          $numberrr = str_replace(',','.',str_replace('R$','',$numberr));
        $login = "login";
    }
       
$resultado_sql = "SELECT email_cliente from cliente WHERE celular_cliente = '".$celular."'  LIMIT 1";
        $resultado_query = mysqli_query($conn, $resultado_sql);
       ($resultado = mysqli_fetch_assoc($resultado_query)); //quero so um resultado ASSOC      
       
       if(!empty($resultado)){
          
       
         echo "<script>alert(' Celular  já cadastrado em nosso sistema !!!  ')</script>";
       echo "<script>window.location = './index.php?p=cc'</script>";
        }
        
//        $resultado_sql = "SELECT senha_cliente from cliente WHERE senha_cliente = '".$senha."'  LIMIT 1";
//        $resultado_query = mysqli_query($conn, $resultado_sql);
//       ($resultado = mysqli_fetch_assoc($resultado_query)); //quero so um resultado ASSOC      
//       
//       if(!empty($resultado)){
//          
//       
//         echo "<script>alert(' Login já existe  ')</script>";
//        // echo "<script>window.location = './index.php?p=cadastroCliente'</script>";
//        
//         
//         
//       }   
        
        
        else{
    
    
    mysqli_query($conn,"INSERT INTO cliente (nome_cliente,senha_cliente,login_cliente,email_cliente,cep_cliente,endereco_cliente,numeroCasa_cliente,cliente_complemento,bairro_cliente,estado_cliente,cidade_cliente,celular_cliente,ponto_cliente) values "
            . "('$nome','$senha','$login','$email','$cep','$end','$num','$comp','$bairro','$uf','$cidade','$celular','$ponto')");
    
if(mysqli_insert_id($conn) == 0){
    echo mysqli_error($conn);
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
				<script type=\"text/javascript\">
					alert(\"ERRO ao cadastrar o cliente.\");
				</script>";
    exit();
} else {
    
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=entrar'>
				<script type=\"text/javascript\">
					alert(\"Cliente cadastrado com Sucesso.\");
				</script>";
       
    exit();
}
        }

 ?>