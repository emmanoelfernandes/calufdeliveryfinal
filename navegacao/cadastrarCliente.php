
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <div class="navbar-header">
                      
        </div>

          <div style="text-align:right" class="col-sm-15 text-right h3">
<!--           <form method="get" class="form-group col-md-4" action="abusca.php">calendario datapicker 
    <input type="text" class="form-control input-lg" name="busca" placeholder="nome ou cod e enter"></form>-->
<!--    <form method="get" class="form-group col-md-1" name="menuForm" action="abusca.php">
     <select class="form-control input-lg" name="busca" onchange="document.forms['menuForm'].submit();">
         <option value="">#</option>
          <option value="a">A</option>
          <option value="b">B</option>
          <option value="c">C</option>
          <option value="d">D</option>
          <option value="e">E</option>
          <option value="f">F</option>
          <option value="g">G</option>
          <option value="h">H</option>
          <option value="i">I</option>
          <option value="j">J</option>
          <option value="k">K</option>
          <option value="l">L</option>
          <option value="m">M</option>
          <option value="n">N</option>
          <option value="o">O</option>
          <option value="p">P</option>
          <option value="q">Q</option>
          <option value="r">R</option>
          <option value="s">S</option>
          <option value="t">T</option>
          <option value="u">U</option>
          <option value="v">V</option>
          <option value="w">W</option>
          <option value="x">X</option>
          <option value="y">Y</option>
          <option value="z">Z</option>
     </select>
</form>-->
<!--         <h4>teste<br></h4>-->
<body onload="startTime()">
<div><font color="#084E6C" id="txt"></font>   
<!--    <a class="btn btn-warning" href="agenda.php" title="Agenda"><i class="fas fa-calendar-alt"></i></a>
      <a class="btn btn-primary btn-lg" href="addtbc.php" title="Preencha Formulário"><i class="fas fa-plus"></i></a> 
      <a style="display:show" class="btn btn-success" href="admin.php" title="Admin"><i class="fas fa-user"></i></a>
      <a class="btn btn-danger btn-sm" href="sair.php" title="Sair"><i class="fas fa-user-lock"></i></a>-->
       
     </div>
  <font color="red"></font>
</div>
              </div><!--/.navbar-collapse -->

            </div>
    </nav>
    <main class="container">
  

  </body>
 </html><h3>Preencha Formulário</h3>
<form  method="post" name="adiciona" action="index.php?p=procCC" autocomplete='off'>
  <hr />
    <div class="form-group col-md-8">
      <label for="inputlg" for="name">Nome Completo</label>
      <input type="text"  class="form-control"  name="nome" maxlength="150" value="" required="required" autocomplete="user-password">
    </div>
  <div class="form-group col-md-4">
      <label for="campo3">Celular</label>
      <input type="text" maxlength="15" class="form-control" id="celular" name="celular" value="" autocomplete="user-password" required="required" >
    </div>
<!--    <div class="form-group col-md-2">
      <label for="campo2">CNPJ</label>
      <input type="text" maxlength="15" class="form-control" id="cnpj" name="cnpj" value="" autocomplete="off" onkeyup="somenteNumeros(this);">
    </div>-->
<!--    <div class="form-group col-md-2">
      <label for="campo2">Inscrição Estadual</label>
      <input type="text" maxlength="15" class="form-control" id="inscestadual" name="inscestadual" value="" autocomplete="off" onkeyup="somenteNumeros(this);">
    </div>
    <div class="form-group col-md-4">
      <label for="inputlg" for="name">Responsável</label>
      <input type="text"  class="form-control"  name="responsavel" maxlength="150" value="" required="required" autocomplete="user-password">
    </div>-->
<!--    <div class="form-group col-md-2">
      <label for="campo3">Data de Nasc</label>
      <input type="text" maxlength="10" class="form-control" placeholder="00/00/0000" autocomplete='off' id="datanasc" name="datanasc" value=""  required="required"  onkeyup="somenteNumeros(this);">
    </div>
        <div class="form-group col-md-2">
      <label for="campo2">RG</label>
      <input type="text" maxlength="15" class="form-control" name="rg" value="" autocomplete="off">
    </div>
    <div class="form-group col-md-2">
      <label for="campo2">CPF</label>
      <input type="text" maxlength="15" class="form-control" name="cpf" value="" autocomplete="off" onkeyup="somenteNumeros(this);">
    </div>-->
<!--      <div class="form-group col-md-2">
      <label for="campo2">Estado Civil</label>
      <input type="text" maxlength="50" class="form-control" id="civil" name="estcivil" value="" autocomplete="off" >
    </div>
     <div class="form-group col-md-4">
      <label for="campo2">Profissão</label>
      <input type="text" maxlength="100" class="form-control" name="profissao" value="" autocomplete="off">
    </div>-->
      <div class="form-group col-md-2">
          <label for="campo3">CEP </label>
          
      <input type="text" maxlength="9" class="form-control" id="cep" name="cep" value="" onblur="pesquisacep(this.value);" autocomplete="user-password" onkeyup="somenteNumeros(this);" placeholder="00000-000" >
    </div>
    <div class="form-group col-md-4">
      <label for="campo1">Endereço</label>
      <input type="text" maxlength="60" class="form-control" id="rua" name="end" value="" autocomplete="user-password" required="required">
    </div>
     <div class="form-group col-md-2">
      <label for="campo1">Número</label>
      <input type="text" maxlength="10" class="form-control" id="num" name="num" value="" autocomplete="user-password" required="required">
    </div>
     <div class="form-group col-md-8">
      <label for="campo1">Perímetro</label>
      <input type="text" maxlength="100" class="form-control" id="numcomp" name="comp" value="" autocomplete="user-password" required="required">
    </div>
<div class="form-group col-md-8">
      <label for="campo1">Ponto de Referência</label>
      <input type="text" maxlength="100" class="form-control" id="numcomp" name="ponto" value="" autocomplete="user-password" required="required">
    </div>
      <div class="form-group col-md-4">
          <label for="campo2">Bairro</label>
      <input type="text" maxlength="20" class="form-control" id="bairro" name="bairro" value="" autocomplete="user-password" required="required">
     <div style="color: red;"> <h7>Obs: ENTREGAS SOMENTE NO BAIRRO DO GUAMÁ</h7></div>
      
      </div>
<!--      <div class="form-group col-md-4">
      <label for="campo1">Município</label>
      <input type="text" maxlength="20" class="form-control" id="cidade" name="cidade" value="" autocomplete="user-password">
    </div>
    <div class="form-group col-md-1">
      <label for="campo3">UF</label>
      <input type="text" maxlength="5" class="form-control" id="uf" name="uf" value="" autocomplete="user-password" >
    </div>-->
<!--    <div class="form-group col-md-2">
      <label for="campo2">Telefone</label>
      <input type="text" maxlength="15" class="form-control" placeholder="" id="telefone" name="telefone" value="" autocomplete="user-password">
    </div>-->
        
<!--      <div class="form-group col-md-2">
      <label for="campo3">Tel Com</label>
      <input type="text" maxlength="15" class="form-control" id="telcom" name="telcom" value="" autocomplete="user-password">
    </div>-->
<!--    <div class="form-group col-md-4">
      <label for="campo3">E-mail</label>
      <input type="email" maxlength="60" class="form-control" name="email" value="" autocomplete="user-password">
    </div>-->
 <div class="form-group col-md-4">
      <label for="campo3">Senha</label>
      <input type="password" maxlength="60" class="form-control" name="senha" value="" autocomplete="user-password" required="required">
    </div>
<!--    <div class="form-group col-md-4">
      <label for="campo3">Observações</label>
      <input type="text" maxlength="100" class="form-control" name="obs" value="" autocomplete="user-password">
    </div>-->
  <div class="col-md-12">
<!--    <a href="JavaScript: window.history.back();" class="btn btn-default" title="Voltar"><i class="fa fa-backward"></i></a>-->
      <button type="submit" class="btn btn-success btn-lg" value="Salvar" name="salvar" title="Salvar"><i class="fa fa-save">Salvar</i></button>
     <a href="index.php" class="btn btn-default" title="Home"><i class="fa fa-home">Cancelar</i></a>
    </div>
 
</form>
<form method="get" action=".">
               <input name="cep" type="hidden" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
</form>
</main> <!-- /container -->
<hr></hr>