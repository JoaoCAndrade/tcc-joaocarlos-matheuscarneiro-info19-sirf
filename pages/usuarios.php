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
                <li class="nav-item">
                    <a class="nav-link" href="registros.php">Registros</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="#">Usuários</a>
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
                    <div class="txt-dft txt-brd-right">Nome</div>
                </div>
                <div class="col border-right">
                    <div class="txt-dft txt-brd-right">Email</div>
                </div>
                <div class="col border-right">
                    <div class="txt-dft txt-brd-right">Permissão</div>
                </div>
                <div class='col-1'>
                    <div style="text-decoration:none;font-size:22px" class='txt-dft'>Editar</div>
                </div>
                <div class="row" style="height: 22px;"></div>
                <span style="padding:0;" id="tabelaUser"></span>
                <?php
                    include_once "../src/conexao.php";
                    $query_user = "SELECT id, email_user, nome_user, isEstagiario FROM user";
                    $result_user = $conn->prepare($query_user);
                    $result_user->execute();
                    $listar_user = "";

                
                    if(($result_user) and ($result_user->rowCount() !=0)){
                        while($row_user = $result_user->fetch(PDO::FETCH_ASSOC)){
                            extract($row_user);
                            
                            if($row_user['isEstagiario']==1){
                                echo "
                                <div style='padding:0px;' class='row bg-cnt br-5 align-items-center text-center pre-tab'>
                                    <div class='col border-right'>
                                        <div class='txt-dft txt-brd-right'>"
                                            .$nome_user.
                                        "</div>
                                    </div>
                                    <div class='col border-right'>
                                        <div class='txt-dft txt-brd-right'>"
                                            .$email_user.
                                        "</div>
                                    </div>
                                    <div class='col border-right'>
                                        <div class='txt-dft txt-brd-right'>
                                            Admin
                                        </div>
                                    </div>
                                    <div class='col-1'>
                                        <a class='txt-dft' style='text-decoration:none' href='editar.php?id=".$row_user['id']."'>Editar</a>;
                                    </div>
                                </div>";
                            }else{
                                echo "
                                <div style='padding:0px;' class='row bg-cnt br-5 align-items-center text-center pre-tab'>
                                    <div class='col border-right'>
                                        <div class='txt-dft txt-brd-right'>"
                                            .$nome_user.
                                        "</div>
                                    </div>
                                    <div class='col border-right'>
                                        <div class='txt-dft txt-brd-right'>"
                                            .$email_user.
                                        "</div>
                                    </div>
                                    <div class='col border-right'>
                                        <div class='row'>
                                            <div class='txt-dft txt-brd-right'>
                                                Aluno
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-1'>
                                        <a class='txt-dft' style='text-decoration:none' href='editar.php?id=".$row_user['id']."'>Editar</a>;
                                    </div>
                                </div>";
                            }
                            
                        }
                    }
                ?>    
            </div>
        </div>
    </div>
    <script src="../Js/tabelaUser.js"></script>
</body>

