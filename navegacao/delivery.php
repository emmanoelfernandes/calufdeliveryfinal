<?php include_once ("../config/conexao.php");?>
<?php


if(isset($_POST['buscad'])){
$buscad =  $_POST['buscad'];

}
$selectFuncionario = mysqli_query($conn, "SELECT * FROM cliente WHERE nome_cliente LIKE '%$buscad%' OR celular_cliente LIKE '%$buscad%'");

if (mysqli_num_rows($selectFuncionario) > '0') {
                foreach ($selectFuncionario as $mostraFuncionario) {
?>
      
         
<input style="border: 0" name="nome" class="form-control form-control-sm"  value="<?php echo $mostraFuncionario['nome_cliente'] ?>">
<input style="border: 0" name="celular" class="form-control form-control-sm"  value="<?php echo $mostraFuncionario['celular_cliente'] ?>">
<input style="border: 0" name="end" class="form-control form-control-sm"  value="<?php echo $mostraFuncionario['endereco_cliente'] ?>">
<input style="border: 0" name="n" class="form-control form-control-sm"  value="<?php echo $mostraFuncionario['numeroCasa_cliente'] ?>">
<input style="border: 0" name="b" class="form-control form-control-sm"  value="<?php echo $mostraFuncionario['bairro_cliente'] ?>">
<input style="border: 0" name="c" class="form-control form-control-sm"  value="<?php echo $mostraFuncionario['cliente_complemento'] ?>">
<input style="border: 0" name="p" class="form-control form-control-sm"  value="<?php echo $mostraFuncionario['ponto_cliente'] ?>">
<input  type="hidden" name="idCliente" class="form-control form-control-sm"  value="<?php echo $mostraFuncionario['id_cliente'] ?>">
 <INPUT class="btn btn-primary" type="submit" name="finalizar" value="Finalizar" >   
    <?php
       
}}else{
      echo ' NADA ENCONTRADO <br /><hr>';
 exit();
}
?>