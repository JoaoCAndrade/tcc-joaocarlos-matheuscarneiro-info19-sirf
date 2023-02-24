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
    <link rel="stylesheet" href="../style/usuarios.css">
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
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a class="nav-link" href="../indexAdmin.php">Inventário</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="#">Registros</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="usuarios.php">Usuários</a>
                </li>
            </ul>
            <div class="container text-end">
                <a class="nav-link log" href="login.php">Sair</a>
            </div>
        </div>
    </nav>
    
    <div class="row" style="height: 62px;"></div>
    <div class="d-flex" style="height:100vh">
        <div class="container text-center">
            <div class="row bg-cnt br-5 align-items-center text-center pre-tab">
                <div class="col border-right">
                    <div class="txt-dft txt-brd-right">Data</div>
                </div>
                <div class="col border-right">
                    <div class="txt-dft txt-brd-right">Aluno</div>
                </div>
                <div class="col border-right">
                    <div class="txt-dft txt-brd-right">Ferramenta</div>
                </div>
                <div class="col border-right">
                    <div class="row">
                        <div class="col">
                            <div class="txt-dft txt-brd-right">Quantidade</div>
                        </div>
                        <div class="col-3">
                            <button style="border:0;margin-top:27px;width:55%;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                                +
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="height:58px"></div>
            <div style="padding:0px;margin:0px;height:90px" class="row bg-cnt">
                <?php
                    $query_data = "SELECT data_emp, qtde_item FROM emprestimo";
                    $result_data=$conn->prepare($query_data);
                    $result_data->execute();

                    $query_user = "SELECT us.nome_user, us.id FROM user AS us INNER JOIN emprestimo AS emp ON us.id=emp.id_ult_user";
                    $result_user=$conn->prepare($query_user);
                    $result_user->execute();

                    $query_item = "SELECT it.nome_item, it.id FROM item AS it INNER JOIN emprestimo AS emp ON it.id=emp.id_item";
                    $result_item=$conn->prepare($query_item);
                    $result_item->execute();

                    while($row_data = $result_data->fetch(PDO::FETCH_ASSOC)){
                        $row_user = $result_user->fetch(PDO::FETCH_ASSOC);
                        $row_item = $result_item->fetch(PDO::FETCH_ASSOC);

                        echo "
                        <div style='padding:0px;margin:0px;height:90px' class='row bg-cnt'>
                            <div style='font-size:22px' class='col txt-dft border-right txt-brd-right'>".
                                $row_data['data_emp']."
                            </div>
                            <div style='font-size:22px' class='col txt-dft border-right txt-brd-right'>".
                                $row_user['nome_user']."
                            </div>
                            <div style='font-size:22px' class='col txt-dft border-right txt-brd-right'>".
                                $row_item['nome_item']."
                            </div>
                            <div style='font-size:22px' class='col txt-dft border-right txt-brd-right'>".
                                $row_data['qtde_item'].
                            "</div>
                        </div>";
                    }
                ?>
            </div>
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content bg-default">
                        <div class="modal-header" style="border:0">
                            <h1 class="modal-title fs-7 txt-dft" id="plusModalLabel" style="padding-left: 34.5px">Empréstimo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>  
                        <div class="modal-body">
                            <form name="cad_emp" method="POST" action="" enctype="multipart/formdata">
                                <div class="container align-items-center justify-content-center">
                                    <div class="col">
                                        <div style='width:50%' class="row">
                                            <select class="br-5" name="id_user" id="id_user" style="margin-left:205px;height:58px;" required>
                                                <option value="">Aluno</option>
                                                <?php
                                                    $query_cat="SELECT id, nome_user FROM user ORDER BY nome_user ASC";
                                                    $result_cat=$conn->prepare($query_cat);
                                                    $result_cat->execute();
                                                    while($row_categoria = $result_cat->fetch(PDO::FETCH_ASSOC)){
                                                        extract($row_categoria);
                                                        echo"<option value='$id'>$nome_user</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="row" style="height:58px;"></div>
                                        <div style='width:50%' class="row">
                                            <select class="br-5" name="id_item" id="id_item" style="margin-left:205px;height:58px;" required>
                                                <option value="">Ferramenta</option>
                                                <?php
                                                    $query_cat="SELECT id, nome_item FROM item ORDER BY nome_item ASC";
                                                    $result_cat=$conn->prepare($query_cat);
                                                    $result_cat->execute();
                                                    while($row_categoria = $result_cat->fetch(PDO::FETCH_ASSOC)){
                                                        extract($row_categoria);
                                                        echo"<option value='$id'>$nome_item</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="row" style="height:58px;"></div>
                                        <div style='width:50%' class="row">
                                            <div class="form-floating" style="margin-left:205px;padding:0px">
                                                <input type="text" class="form-control" id="qtde_item" name="qtde_item" placeholder="0" required>
                                                <label for="qtde_Item">Quantidade:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $dadosItem = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                                    
                                    var_dump($dadosItem);

                                    if(!empty($dadosItem['SalvarEmp'])){

                                        $query_item = "INSERT INTO emprestimo (id_ult_user, id_item, data_emp, qtde_item) VALUES (:id_ult_user, :id_item, NOW() , :qtde_item)";
                                        $cad_item = $conn->prepare($query_item);
                                        $cad_item->bindParam(':id_ult_user', $dadosItem['id_user'], PDO::PARAM_INT);
                                        $cad_item->bindParam(':id_item', $dadosItem['id_item'], PDO::PARAM_INT);
                                        $cad_item->bindParam(':qtde_item', $dadosItem['qtde_item'], PDO::PARAM_INT);
                                        $cad_item->execute();

                                        if($cad_item->rowCount()){

                                        }else{
                                            echo "<p style='color:red;'>ERRO<\p>";
                                        }

                                    }
                                ?>
                                <div class="modal-footer justify-content-center" style="border: 0;">
                                    <input type="submit" class="btn txt-dft" value="Salvar" name="SalvarEmp"> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>