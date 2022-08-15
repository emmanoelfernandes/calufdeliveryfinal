
<?php
if((isset($_POST['tel'])) && (isset($_POST['senha'])) ){
        $senha = mysqli_real_escape_string($conn, $_POST['senha']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
         //   $_SESSION['MM_Username'] = $usuario;
       
   
//$cpf = md5($cpf);
            
        // ADMINISTRADORR LOGADO Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário ADMINISTRADOR
        
        //("SELECT *, (SELECT nome from usuarios WHERE id = fk_id_usuario) as nome_pessoa from comentarios order by dia desc")
        $resultado_sql = "SELECT * FROM usuario WHERE  senhaUsuario = '$senha' && celularUsuario = '$tel' LIMIT 1";
        $resultado_query = mysqli_query($conn, $resultado_sql);
        $resultado = mysqli_fetch_assoc($resultado_query); //quero so um resultado ASSOC
    
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){
            $_SESSION['idUsuario'] = $resultado['idUsuario'];
           $_SESSION['senhaUsuario'] = $resultado['senhaUsuario'];
            $_SESSION['nomeUsuario'] = $resultado['nomeUsuario'];
           $_SESSION['emailUsuario'] = $resultado['emailUsuario'];
            $_SESSION['celularUsuario'] = $resultado['celularUsuario'];
           // $_SESSION['tipo'] = $resultado['tipoFuncionario'];
          
            
            echo "<script>window.location = 'index.php?p=admin'</script>";
            
       
         
        
         
} else {
    
      //CLIENTE LOGADO
      //caso nao houver usuario administrador .... Buscar na tabela cliente que corresponde com os dados digitado no formulário ADMINISTRADOR
              //("SELECT *, (SELECT nome from usuarios WHERE id = fk_id_usuario) as nome_pessoa from comentarios order by dia desc")
        $resultado_sql2 = "SELECT * from cliente WHERE   senha_cliente = '$senha' && celular_cliente = '$tel' LIMIT 1";
        $resultado_query2 = mysqli_query($conn, $resultado_sql2);
        $resultado2 = mysqli_fetch_assoc($resultado_query2); //quero so um resultado ASSOC
          if(isset($resultado2)){
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        
            $_SESSION['id'] = $resultado2['id_cliente'];
            $_SESSION['nomeCompleto'] = $resultado2['nome_cliente'];
//            $_SESSION['cpf'] = $resultado2['cpf_cliente'];
               $_SESSION['login'] = $resultado2['login_cliente'];
            $_SESSION['email'] = $resultado2['email_cliente'];
            $_SESSION['celular'] = $resultado2['celular_cliente'];
            $_SESSION['endereco']  = $resultado2['endereco_cliente'];
           $_SESSION['tipo_cliente'] = $resultado2['tipo_cliente'];
            $_SESSION['cep'] = $resultado2['cep_cliente'];
            $_SESSION['numero'] = $resultado2['numeroCasa_cliente'];
      
                echo "<script>window.location = 'index.php?p=home'</script>";
            
     }  
  
 else {
            //se nao houver na tabela usuario o usuário que corresponde com os dados digitado no formulário ADMINISTRADOR ou CLIENTESSS
     echo "<script>alert(' Celular ou Senha Inválido ')</script>";
     //header("Location: ");
//echo "<script>window.location = '../index.php?p=entrar'</script>";
 
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=entrar'>";
 
      
}
            
                //}else{
              //  header("Location: cliente.php");
         // }
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
   
               
       //Váriavel global recebendo a mensagem de erro
         
       
     
   // O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
//    }else{
//        $_SESSION['loginErro'] = "preencha os campos";
//        header("Location: fazerLogin.php");
//    }
} }     
      
?>





