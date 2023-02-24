<?php
    include_once '../src/conexao.php';
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
    <link rel="stylesheet" href="../style/editarUser.css">
    <!--Tab-->
    <link rel="icon" href="../resources/imgs/logo.png">
    <title>SIRF</title>
</head>
<body class="bg-default">
    <nav class="navbar navbar-expand-lg shadow-sm">
        <img class="logo" src="../resources/imgs/logo.png">
        <img class="logo-text" src="../resources/imgs/logo-text.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <?php
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $query_user = "SELECT * FROM item WHERE id=$id";

        $result=$conn->prepare($query_user);
        $result->execute();
        $row_result=$result->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="d-flex justify-content-center align-items-center" style="padding-top:150px">
        <div class="container bg-cnt br-25 log-cont" style="width:35%;">
            <form method="POST" action="../src/editaItem.php">
                <input type="hidden" name="id" value="
                <?php
                    if(isset($row_result['id'])){
                        echo($row_result['id']);
                    }
                ?>"></input>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <label class="txt-dft">Nome:</label>
                            <input style="width:85%;margin-left:15px;margin-top:5px;" type="text" name="nome" value="
                            <?php
                                if(isset($row_result['nome_item'])){
                                    echo($row_result['nome_item']);
                                }
                            ?>"></input>
                        </div>
                        <div class="row">
                            <label class="txt-dft">Quantidade:</label>
                            <input style="width:85%;margin-left:15px;margin-top:5px;" type="text" name="qtde" value="
                            <?php
                                if(isset($row_result['qtde_item'])){
                                    echo($row_result['qtde_item']);
                                }
                            ?>"></input>
                        </div>
                        <div class="row">
                            <label class="txt-dft">Descrição:</label>
                            <input style="width:85%;margin-left:15px;margin-top:5px;" type="text" name="desc" value="
                            <?php
                                if(isset($row_result['desc_item'])){
                                    echo($row_result['desc_item']);
                                }
                            ?>"></input>
                        </div>
                    </div>
                    <div class="col">
                        <div style="margin-top:225px" class="row justify-content-center">
                            <input name="editaItem" type="submit" style="margin-top:25px;width:50%;border:0px" value="Salvar"></input>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>