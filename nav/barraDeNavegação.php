


<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    
        <!--INICIO ADMIN-->
<?php if (isset($_SESSION['idUsuario'])) {   ?>
    <a class="navbar-brand mr-auto mr-lg-0" href="index.php?p=admin">Pedidos</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>
   <?php  } else {
         
     
    ?> 
    
    
     <!--INICIO CLIENTE-->
<?php  ?>
    <a class="navbar-brand mr-auto mr-lg-0" href="index.php?p=home">Caluf's Refeições</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>
<?php  } ?>
    
    
    
    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">


            <!--CARRINHO  -->
            <!--              <?php //  if(isset($_SESSION['carrinho'])) {  ?>
                         <a href="./index.php?p=carrinho" class="navbar-brand d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="13" r="4"></circle></svg>
                        <strong>Carrinho</strong>
                      </a>
            <?php // }  ?>
            -->

            <!--PUBLICO-->

            <?php  if((@count(@$_SESSION['carrinho']) > 0 )  and  (isset($_SESSION['tipo_cliente'])))  { ?>
                <a href="./index.php?p=carrinho" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="13" r="4"></circle></svg>
                    <strong>Carrinho</strong>
                </a>
<?php } ?>


            <!--BOTAO ENTRAR nao aparecer se tiver logado usuario ou cliente-->
<?php if (!isset($_SESSION['id']) && !isset($_SESSION['idUsuario'])) { ?>
<a href="./index.php?p=entrar" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="13" r="4"></circle></svg>
                    <strong>Entrar</strong>
                </a> 
            <?php } else { ?>
                   
<?php } ?>




            <!--CLIENTE-->
<?php if (isset($_SESSION['tipo_cliente'])) {
//                 if($_SESSION['tipo_cliente'] == "2"){
    ?>
                <a href="./index.php?p=meusPedidos" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="13" r="4"></circle></svg>
                    <strong>Meus Pedidos</strong>
                </a>               

<?php } ?>


                <!--ADMINSITRADOR-->

<?php if (isset($_SESSION['idUsuario'])) {
    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=fv">Fazer Uma Venda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fluxo de Cliente</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown02">
                            <a class="dropdown-item" href="index.php?p=cc">Cadastrar Cliente</a>
                            <a class="dropdown-item" href="index.php?p=lc">Lista de Clientes</a>
                            <!--              <a class="dropdown-item" href="#">Saídas</a>-->

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fluxo de Caixa</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="index.php?p=fc">Geral (Entradas e Saida)</a>
                            <a class="dropdown-item" href="index.php?p=rv">Relatórios de Vendas</a>
                            <!--              <a class="dropdown-item" href="#">Saídas</a>-->

                        </div>
                    </li>





                    <!-- <a href="./index.php?p=inicioAdmin" class="navbar-brand d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="13" r="4"></circle></svg>
                                <strong>Início Administrador</strong>
                              </a>
                    
                              <a href="./index.php?p=todosPedidos" class="navbar-brand d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="13" r="4"></circle></svg>
                                <strong>Todos os Pedidos</strong>
                              </a>
                             
                              <a href="./index.php?p=sair" class="navbar-brand d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="13" r="4"></circle></svg>
                                <strong>Sair</strong>
                              </a>
                                   
                                            <li class="nav-item">
                                                <a class="nav-link" href="./">Site</a>
                                            </li>-->


<?php } ?>

        </ul>  



        <!--BOTAO SAIR ADMIN-->
<?php if (isset($_SESSION['idUsuario'])) {
    ?>
            <li class="nav-item active">


                <a class="btn btn-sm btn-outline-secondary" onclick="return confirm('Tem certeza que deseja sair do sistema ?')" href="index.php?p=sair&id=<?php echo $_SESSION['idUsuario']; ?>" title="Sair">[SAIR]</a>



            </li> <?php } ?>






            <!--BOTAO DE SAIR DO CLIENTE-->
<?php if (isset($_SESSION['id'])) {
//                 if($_SESSION['tipo_cliente'] == "2"){
    ?>
                          
                <li class="nav-item active">


                    <a class="btn btn-sm btn-outline-secondary" onclick="return confirm('Tem certeza que deseja sair do sistema ?')" href="index.php?p=sair&id=<?php echo $_SESSION['id']; ?>" title="Sair">[SAIR]</a>

</li> 
<?php } ?>




        <!--        <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="text" placeholder="Pesquisa" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>-->
    </div>
</nav>
<p style="text-align: center;">             <img class="img-fluid "   src="./imgSite/caluf.jpg" alt="Imagem  da logo no topo so site" ></p>
