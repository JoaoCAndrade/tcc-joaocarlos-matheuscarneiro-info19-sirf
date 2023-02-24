<?php 
    include_once "src/conexao.php";
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
    <link rel="stylesheet" href="style/default.css">
    <link rel="stylesheet" href="style/inventory.css">
    <!--Tab-->
    <link rel="icon" href="resources/imgs/logo.png">
    <title>SIRF</title>
</head>
<body class="bg-default">
    <nav class="navbar navbar-expand-lg shadow-sm">
        <img class="logo" src="resources/imgs/logo.png">
        <img class="logo-text" src="resources/imgs/logo-text.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="container text-end">
                <a class="nav-link log" style="padding:0; width:50px; margin-left:1282px;" href="pages/login.php">Sair</a>
            </div>
        </div>
    </nav>
    <div class="container text-center">
        <div class="row" style="height: 62px;"></div>
        <!--Linha Filtro-->
        <div class="d-flex flex-row align-items-center filter bg-cnt br-5">
            <div class="col-1">
                <div class="txt-dft filter-txt">Filtrar:</div>
            </div>
            <select style="width:25%;" class="form-select" id="tipo_Item" name="tipo_Item" aria-label="Floating label select example" onchange="filtrar()"  required>
                <?php
                    $query_cat="SELECT id, nome_categoria FROM categoria_item ORDER BY nome_categoria ASC";
                    $result_cat=$conn->prepare($query_cat);
                    $result_cat->execute();
                    while($row_categoria = $result_cat->fetch(PDO::FETCH_ASSOC)){
                        extract($row_categoria);
                        echo"<option value='$id'>$nome_categoria</option>";
                    }
                ?>
            </select>
        </div>
        <div class="row" style="height: 22px;"></div>
        <!--Linha pré-tabela-->
        <div class="row bg-cnt br-5 align-items-center text-center pre-tab">
            <div class="col">
                <div class="txt-dft">Nome</div>
            </div>
            <div class="col">
                <div class="txt-dft">Descrição</div>
            </div>
            <div class="col">
                <div class="txt-dft">Quantidade</div>
            </div>
            <div class="col">
                <div class="txt-dft">Tipo</div>
            </div>
        </div>
        <div class="row" style="height: 22px;"></div>
        <!--Linha tabela-->
        <span id="tabelaItem"></span>
    </div>
    <script src="Js/filtrarUser.js"></script>
</body>
</html>