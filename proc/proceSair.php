<?php 
//if(isset($_GET['sairMermo'])){


//     
//
   unset(
//         $_SESSION['id'], 
$_SESSION['id_cliente'],
           $_SESSION['idUsuario'] 
//
//            
 ); 
    
 session_destroy();
    echo "<script>alert(' Usuário deslogado com sucesso!!! ')</script>";
    echo "<script>window.location = 'index.php?p=home'</script>";
    //redirecionar o usuario para a página de login
    //header("Location: ./index.php");
//} if(isset($_POST['cancelouMermo'])) {
  //  echo "<script>alert(' Cancelado com sucesso!!! ')</script>";
//    echo "<script>window.location = 'index.php'</script>";
//     if($_SESSION['tipo'] == "1"){
//                header("Location: ../admin/indexAdmin.php");
//            }elseif($_SESSION['tipo'] == "2"){
//                header("Location: ../funcionario/funcionarioSingle.php");
//        }
//}
?>