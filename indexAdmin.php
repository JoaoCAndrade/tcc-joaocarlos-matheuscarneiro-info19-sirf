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
            <ul class="navbar-nav text-center">
                <li class="nav-item active">
                    <a class="nav-link active" href="#">Inventário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/registros.php">Registros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/usuarios.php">Usuários</a>
                </li>
            </ul>
            <div class="container text-end">
                <a class="nav-link log" href="pages/login.php">Sair</a>
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
            <div class="col-8 justify-content-end align-items-end text-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modalAdd" class="btn filter-btn-plus txt-dft" style="margin-right:80px">+</button>
            </div>
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
            <div class="col-1">
                <div class="txt-dft">Editar</div>
            </div>
        </div>
        <div class="row" style="height: 22px;"></div>
        <!--Linha tabela-->
        <span id="tabelaItem"></span>
        <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="plusModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-default">
                    <!-- Receber os dadods -->
                    <?php
                        $dadosItem = filter_input_array(INPUT_POST, FILTER_DEFAULT);


                        if(!empty($dadosItem['SalvarItem'])){
                            
                            $query_item = "INSERT INTO item (nome_item, desc_item, qtde_item, categoria_id) VALUES (:nome_item, :desc_item, :qtde_item, :categoria_id)";
                            $cad_item = $conn->prepare($query_item);
                            $cad_item->bindParam(':nome_item', $dadosItem['nome_Item'], PDO::PARAM_STR);
                            $cad_item->bindParam(':desc_item', $dadosItem['desc_Item'], PDO::PARAM_STR);
                            $cad_item->bindParam(':qtde_item', $dadosItem['qtde_Item'], PDO::PARAM_INT);
                            $cad_item->bindParam(':categoria_id', $dadosItem['tipo_Item'], PDO::PARAM_STR);
                            $cad_item->execute();

                            if($cad_item->rowCount()){

                            }else{
                                echo "<p style='color:red;'>ERRO<\p>";
                            }

                        }
                    ?>
                    <div class="modal-header" style="border:0">
                        <h1 class="modal-title fs-7 txt-dft" id="plusModalLabel" style="padding-left: 34.5px">Item</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>  
                    <div class="modal-body">
                        <form name="cad_item" method="POST" action="" enctype="multipart/formdata">
                            <div class="container align-items-center justify-content-center">
                                <div class="row align-items-center">
                                    
                                    <div class="col">
                                    <!-- Infos -->
                                    <!-- Nome -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating">
                                                    <input type="text" class="form-control" id="nome_Item" name="nome_Item" placeholder="name@example.com" required>
                                                    <label for="nome_Item">Nome:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space-modal"></div>
                                        <!-- Tipo -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <?php
                                                        $query_cat="SELECT id, nome_categoria FROM categoria_item ORDER BY nome_categoria ASC";
                                                        $result_cat=$conn->prepare($query_cat);
                                                        $result_cat->execute();
                                                    ?>
                                                    <select class="form-select" id="tipo_Item" name="tipo_Item" aria-label="Floating label select example" required>
                                                        <?php
                                                            while($row_categoria = $result_cat->fetch(PDO::FETCH_ASSOC)){
                                                                extract($row_categoria);
                                                                echo"<option value='$id'>$nome_categoria</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    <label for="tipo_Item">Tipo:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space-modal"></div>
                                        <!-- Quantidade -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="qtde_Item" name="qtde_Item" placeholder="0" required>
                                                    <label for="qtde_Item">Quantidade:</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="height: 48px;"></div>
                                <!-- Descrição -->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating" style="padding-left: 0px;">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="desc_Item" name="desc_Item" style="height: 150px;" required></textarea>
                                            <label for="desc_Item">Descrição:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center" style="border: 0;">
                                <input type="submit" class="btn txt-dft" value="Salvar" name="SalvarItem"> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="Js/filtro.js"></script>
</body>
</html>