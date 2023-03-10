<?php
    include_once "../src/conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Meta-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../style/default.css">
    <link rel="stylesheet" href="../style/inventory.css">
    <link rel="stylesheet" href="../style/login.css">
    <!--Tab-->
    <link rel="icon" href="../resources/imgs/logo.png">
    <title>SIRF</title>
</head>
<body class="bg-default">
    <div class="bg-image d-flex justify-content-center align-items-center">
        <div class="container bg-cnt br-25 log-cont">
            <form id="cad_user" name="cad_user" method="POST" action="" enctype="multipart/formdata">
                <div class="d-flex align-items-center logo-box shadow-sm">
                    <div class="col-logo logo-img">
                        <img class="logo" src="../resources/imgs/logo.png">
                    </div>
                    <div class="col text-start">
                        <img class="logo-text" src="../resources/imgs/logo-text.png">
                    </div>
                </div>
                <div class="log-row justify-content-start txt-dft log-email-top-pad">    
                    <span id="msgAlertErroReg"></span>
                    <div class="row">
                        <div class="txt-dft">Nome</div>
                    </div>
                    <div class="row lb-log">
                        <input type="text" id="nomeUser" name="nomeUser" class="form-control lb-log-bg" placeholder="SeuNome"/>
                    </div>
                </div>
                <div class="log-row justify-content-start txt-dft">
                    <div class="row">
                        <div class="txt-dft">E-mail</div>
                    </div>
                    <div class="row lb-log">
                        <input type="email" id="emailUser" name="emailUser" class="form-control lb-log-bg" placeholder="exemplo@gmail.com"/>
                    </div>
                </div>
                <div class="log-row justify-content-start txt-dft log-senha-bot-pad">
                    <div class="row">
                        <div class="txt-dft">Senha</div>
                    </div>
                    <div class="row lb-log">
                        <input type="password" id="senhaUser" name="senhaUser" class="form-control lb-log-bg" placeholder="suasenha1234"/>
                    </div>
                </div>
                <div class="log-row text-center log-btn">
                    <input type="submit" class="btn btn-log br-15" value="Criar" name="CriarUser">
                </div>
                <div class="log-row text-center log-criar-cnt">
                    <a class="crt-cnt" href="login.php">J?? tem conta?</a>
                </div>
                <div class="log-row text-center log-criar-cnt">
                    <a class="esq-sen" href="#">Esqueceu a senha?</a>
                </div>
            </form>
        </div>
    </div> 
    <!--JS-->
    <script src="../Js/login.js"></script>
</body>