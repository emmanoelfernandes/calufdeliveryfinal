<?php   if (!isset($_SESSION)) {
  session_start();

  
  
}
?>
    <?php
    //if(empty($_SESSION['id'])){
    //    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=login/login.php'>";
    //    exit();
    //}  
    //?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

    <html lang="pt-br"> 


<!-- HTML5 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
<meta http-equiv="Content-Language" content="pt-br">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="Caluf Delivery Refeições" content="Caluf Delivery Refeições">
  <meta name="Emmanoel Lopes Fernandes" content="Emmanoel Lopes Fernandes">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./imgSite/fundo.jpg">
    <head>
        <meta charset="UTF-8">
  <title>Caluf's Refeições - Delivery </title>
    </head>
    <body>
        



<!--CSS-->
<link href="css/offcanvas.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/all.css">
<!--<link rel="stylesheet" href="css/bootstrap.css">-->
  
<?php include_once ("config/conexao.php");?>








 

<?php 
foreach ($_REQUEST as $___opt => $___val) {
  $$___opt = $___val;
}        $valor = @$_GET['p'];


//PAGINA DE IMPRIMIR TIRANDO O RODAPÉ
    if($valor == 'imp'){ include 'admin/imprimir.php'; 
    exit;
    }
if($valor == 'imprimir'){ include 'admin/imprimirPedido.php';
exit;

}


include_once("nav/barraDeNavegação.php");

if(empty($valor)) {include('admin/home.php');} 



    
    
    

    
    
//LOGIN
//if($valor == 'login') {include('login/login.php');} 
if($valor == 'entrar') {include('login/login.php');} 


//PROCESSAMENTO
//
//if($valor == 'pLogin'){ include 'proc/procLogin.php';}
if($valor == 'procCC'){ include 'proc/procCC.php';}
if($valor == 'pfv'){ include 'proc/pfv.php';}
if($valor == 'pfvadmin'){ include 'proc/pfvadmin.php';}
if($valor == 'sair'){ include 'proc/proceSair.php';}
if($valor == 'procCCat') {include('proc/ProcCadastraCategoria.php');} 
if($valor == 'procCMov') {include('proc/proceCadastraMovimento.php');} 
if($valor == 'proceditarM') {include('proc/proceEditar.php');} 
if($valor == 'procapagarM') {include('proc/proceApagar.php');} 
if($valor == 'apagaC') {include('proc/proceApagar.php');} 
if($valor == 'editCat') {include('proc/proceEditar.php');} 
if($valor == 'procECC'){ include 'proc/procECC.php';}
if($valor == 'apagaCli') {include('proc/proceApagar.php');} 
if($valor == 'pLogin') {include('proc/procLogin.php');} 
//if($valor == 'procapagarM') {include('proc/proceApagar.php');} 


//FILTRO
if($valor == 'mes' ){ include 'navegacao/fluxoCaixa.php?';}


//NAVEGAÇÃO
if($valor == 'cc'){ include 'navegacao/cadastrarCliente.php';}
if($valor == 'fc'){ include 'navegacao/fluxoCaixa.php';}
if($valor == 'fv'){ include 'navegacao/fazerVenda.php';}
if($valor == 'b'){ include 'navegacao/busca.php';}
if($valor == 'd'){ include 'navegacao/delivery.php';}
if($valor == 'rv'){ include 'navegacao/relatorioVenda.php';}

//CLIENTE
if($valor == 'home') {include('home/home.php');}     
if($valor == 'maisDetalhes'){ include 'cliente/maisDetalhes.php';}
if($valor == 'carrinho'){ include 'cliente/carrinho.php';}
if($valor == 'meusPedidos'){ include 'cliente/meusPedidos.php';}
if($valor == 'detalhesPedido'){ include 'cliente/detalhesPedido.php';}


//ADMIN
if($valor == 'verPedidosVenda'){ include 'admin/verPedidosVenda.php';}
if($valor == 'lc'){ include 'admin/listarCliente.php';}
if($valor == 'qtdcliente'){ include 'admin/qtdcliente.php';}
if($valor == 'edc'){ include 'admin/editarCliente.php';}
if($valor == 'bdate'){ include 'admin/bscDate.php';}
if($valor == 'admin'){ include 'admin/home.php';}




        ?>





        <?php include_once("nav/rodaPe.php");?>
    <!-- RODAR CAROUSEL -->

    
    
   
    </body>
</html>





 
 <!--JS-->
<script src="js/offcanvas.js"></script>
<script src="js/holder.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<!--JS--><!--BUSCAR-->

<!--
BUSCA FUNCAO
<script>
      $("#busca").keyup(function(){
        var busca = $("#busca").val();
        $.post('index.php?p=b', {busca: busca},function(data){
          $("#result").html(data);
        });
      });
//      $("#busca").focusout(function(){
//        $("#result").html("Pesquisar Por Clientes!");
//      })
    </script>
    
    DELIVERY FUNCAO
<script>
      $("#buscad").keyup(function(){
        var busca = $("#buscad").val();
        $.post('index.php?p=d', {buscad: busca},function(data){
          $("#resultd").html(data);
        });
      });
//      $("#buscad").focusout(function(){
//        $("#resultd").html("Pesquisar Por Clientes!");
//      })
    </script>-->


<!--TIPO DE ENTREGA BUSCAR OU DELIVERY-->
<script>
        $(document).ready(function () {

            $("#btnDelivery").click(function () {
                $("#divDelivery").toggle();
                $('#divBuscar').hide();
            });
            $("#btnBuscar").click(function () {
                $("#divBuscar").toggle();
                $('#divDelivery').hide();
            });
        });
    </script>



<!-- relogio top-->

<script type="text/javascript">
 function startTime() {
     var today=new Date();
     var h=today.getHours();
     var m=today.getMinutes();
     var s=today.getSeconds();
     // add a zero in front of numbers<10
     m=checkTime(m);
     s=checkTime(s);
     document.getElementById('txt').innerHTML=h+":"+m+":"+s;
     t=setTimeout('startTime()',500);
 }

 function checkTime(i){
 if (i<10) {
     i="0" + i;
 }
     return i;
 }
 </script>
 <!-- relogio top-->
  <!-- mascara-->
  <script type="text/javascript">
    $("#datanasc").mask("00/00/0000");
    $(".datapro").mask("00/00/0000");
    $("#data").mask("00/00/0000");
    $("#telefone").mask("(00) 0000-0000");
    $("#telcom").mask("(00) 0000-0000");
    $("#celular").mask("(00) 00000-0000");
</script>
 <!-- mascaras-->
 <!-- Inicio busca cep -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
      //      document.getElementById('cidade').value=("");
      //      document.getElementById('uf').value=("");
           // document.getElementById('ibge').value=("");
    }
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
      //      document.getElementById('cidade').value=(conteudo.localidade);
      //      document.getElementById('uf').value=(conteudo.uf);
           // document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
     function pesquisacep(valor) {
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
      //          document.getElementById('cidade').value="...";
      //          document.getElementById('uf').value="...";
               // document.getElementById('ibge').value="...";
                //Cria um elemento javascript.
                var script = document.createElement('script');
                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
 </script>

 <script>
    function somenteNumeros(num) {
        var er = /[^0-9-./]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
 </script>
<script>
    $("#cnpj").mask("99.999.999/9999-99");
    $("#cep").mask("00000-000");
    $("#data").mask("00/00/0000");
    $("#datap1").mask("00/00/0000");
    $("#datap2").mask("00/00/0000");
    $("#datap3").mask("00/00/0000");
    $("#telefone").mask("(00) 0000-0000");
    $("#telcom").mask("(00) 0000-0000");
    $("#celular").mask("(00) 00000-0000");
</script>
<script>
$(function() {
  var civil = [
    "Casado",
    "Casada",
    "Solteiro",
    "Solteira"
  ];
  $("#civil" ).autocomplete({
    source: civil
  });
});
</script>
<!-- calendario inicio-->
<style>
 body {
    font-family: Verdana, Arial, sans-serif;
    font-size: 14px;
}
.ui-datepicker-week-end a {
    color: red !important;
}
hr{
  border-color:#aaa;
  box-sizing:border-box;
  width:100%;  
}
</style>
<!--FORMA DE PAGAMENTO-->
<!--BUSCAR-->
<script>
 $("#fdp").change(function() {
    
     $('#abriDinheiro2').hide();
      
        $('#abriCartao2').hide();     
      $('#abripix2').hide();
       
        
    if(this.value == "Dinheiro")
      $('#abriDinheiro').show();

 });
 $("#fdp").change(function() {
  
     $('#abriDinheiro2').hide();
      
        $('#abriCartao2').hide();     
      $('#abripix2').hide();
        
      
    if(this.value == "Cartão")
      $('#abriCartao').show();

 });
 
 $("#fdp2").change(function() {
   
     $('#abriDinheiro2').hide();
     
        $('#abriCartao2').hide();     
      $('#abripix2').hide();
      
    
    if(this.value == "PIX - NOSSA CHAVE PIX")
      $('#abripix').show();

 });
</script>
<!--FORMA DE PAGAMENTO-->
<!--FORMA DE PAGAMENTO-->
<!--DELIVERY-->
<script>
 $("#fdp2").change(function() {
   $('#abriDinheiro').hide();
     
        $('#abriCartao').hide();
    
        
     
        $('#abripix').hide();
    
    if(this.value == "Dinheiro")
      $('#abriDinheiro2').show();

 });
 $("#fdp2").change(function() {
    $('#abriDinheiro').hide();

   
        $('#abriCartao').hide();
            
     
        $('#abripix').hide();
        
    if(this.value == "Cartão")
      $('#abriCartao2').show();

 });
 
 $("#fdp2").change(function() {
    $('#abriDinheiro').hide();
    
        $('#abriCartao').hide();
           
     
        $('#abripix').hide();
        
    if(this.value == "PIX - NOSSA CHAVE PIX")
      $('#abripix2').show();

 });
</script>

  <script>
now = new Date();
    var feriados, i, dias;
    <!-- Array com os feriados -->
    var feriados = [
        "01/01/" + now.getFullYear() + " - Confraternização Universal",
        "08/01/" + now.getFullYear() + " - São Sebastião",
        //Fevereiro
        "09/02/" + now.getFullYear() + " - Carnaval",
        "10/02/" + now.getFullYear() + " - Cinzas",
        //Março
        "01/03/" + now.getFullYear() + " - Aniversário da Cidade",
        "08/03/" + now.getFullYear() + " - Dia Internacional da Mulher",
        "23/03/" + now.getFullYear() + " - Paixão de Cristo",
        //Abril
        "19/04/" + now.getFullYear() + " - Dia do índio",
        "21/04/" + now.getFullYear() + " - Tiradentes",
        "22/04/" + now.getFullYear() + " - Descobrimento do Brasil",
        "23/04/" + now.getFullYear() + " - Dia de São Jorge",
        
        //Maio
        "01/05/" + now.getFullYear() + " - Dia do Trabalho",
        "28/05/" + now.getFullYear() + " - Corpus Cristi",
        //Junho

        //Agosto
        "14/08/" + now.getFullYear() + " - Dia dos Pais",

        //Setembro
        "07/09/" + now.getFullYear() + " - Independência do Brasil",

        //Outubro
        "12/10/" + now.getFullYear() + " - Nsa. Sra. Aparecida",
        "15/10/" + now.getFullYear() + " - Dia dos Professores",
        "19/10/" + now.getFullYear() + " - Dia do Comércio",
        "20/10/" + now.getFullYear() + " - Dia do funcionário Público",

        //Novembro
        "02/11/" + now.getFullYear() + " - Finados",
        "15/11/" + now.getFullYear() + " - Proclamação da Republica",
        "19/11/" + now.getFullYear() + " - Dia da Bandeira",
        "20/11/" + now.getFullYear() + " - Dia da Consciência Negra/Zumbi dos Palmares",

        //Dezembro
        "25/12/" + now.getFullYear() + " - Natal"
    ];
    
    var dias = [
          "01/01/" + now.getFullYear(),
          "08/01/" + now.getFullYear(),

          //Fevereiro
          "09/02/" + now.getFullYear(),
          "10/02/" + now.getFullYear(),

          //Março
          "01/03/" + now.getFullYear(),
          "08/03/" + now.getFullYear(),
          "23/03/" + now.getFullYear(),

          //Abril
          "19/04/" + now.getFullYear(),
          "21/04/" + now.getFullYear(),
          "22/04/" + now.getFullYear(),
          "23/04/" + now.getFullYear(),
          
          //Maio
          "01/05/" + now.getFullYear(),
          "28/05/" + now.getFullYear(),

          //Junho

          //Agosto
          "14/08/" + now.getFullYear(),

          //Setembro
          "07/09/" + now.getFullYear(),

          //Outubro
          "12/10/" + now.getFullYear(),
          "15/10/" + now.getFullYear(),
          "19/10/" + now.getFullYear(),
          "20/10/" + now.getFullYear(),

          //Novembro
          "02/11/" + now.getFullYear(),
          "15/11/" + now.getFullYear(),
          "19/11/" + now.getFullYear(),
          "20/11/" + now.getFullYear(),

          //Dezembro
          "25/12/" + now.getFullYear(),
    ];

  $(function() {
    $(".dataagenda").datepicker({
  minDate: 0,
  setDate: "today",
  language: "pt-BR",
  todayHighlight: "true",
  dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
  dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
  dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
  monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
  monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    dateFormat: 'dd/mm/yy',
    nextText: 'Próximo',
    prevText: 'Anterior',
  inline: true,
  beforeShowDay:function(dateText, inst) {
           var datepickerDay = ('0' + dateText.getDate()).slice(-2) + '/'
      + ('0' + (dateText.getMonth()+1)).slice(-2) + '/'
      + dateText.getFullYear();
    console.log(datepickerDay);
        if(dias.indexOf(datepickerDay.trim()) > -1) {
        return [false, "", feriados[dias.indexOf(datepickerDay)].split('-')[1]];
    }
    return [true, "", ""];
  },
});
$(document).on('click', '#ui-datepicker-div .ui-state-disabled', function() {
    alert('Feriado');
});
});
</script>
 
  
                 <script >


  
    
  
  
  
  </script>

