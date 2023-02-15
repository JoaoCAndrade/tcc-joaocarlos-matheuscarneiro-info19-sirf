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
    <link rel="stylesheet" href="../style/registers.css">
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
                    <a class="nav-link" href="../index.php">Inventário</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="#">Registros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Usuários</a>
                </li>
            </ul>
            <div class="container text-end">
                <a class="nav-link log" href="login.php">Sair</a>
            </div>
        </div>
    </nav>
    <div class="d-flex justify-content-center align-items-center" style="height:100vh">
        <div class="container">
            <div class="row">
                <div class="col bg-cnt br-15">
                    <div class="row text-center txt-tittle">
                        <div class="txt-dft txt-tam">
                            Últimos Registros
                        </div>
                    </div>
                    <div class="row text-center bg-cnt-wht txt-pre-tab br-10">
                        <div class="col border-right">
                            <div class="txt-dft txt-brd-right">Nome</div>
                        </div>
                        <div class="col border-right">
                            <div class="txt-dft txt-brd-right">Tipo</div>
                        </div>
                        <div class="col border-right">
                            <div class="txt-dft txt-brd-right">Quantidade</div>
                        </div>
                        <div class="col">
                            <div class="txt-dft">Data</div>
                        </div>
                    </div>
                </div>
                <div class="bg-default blk-space"></div>
                <div class="col bg-cnt br-15">
                    <div class="row text-center txt-tittle">
                        <div class="txt-dft txt-tam">Mais Usados</div>
                    </div>
                    <div class="row text-center bg-cnt-wht txt-pre-tab br-10">
                        <div class="col border-right">
                            <div class="txt-dft txt-brd-right">Nome</div>
                        </div>
                        <div class="col border-right">
                            <div class="txt-dft txt-brd-right">Tipo</div>
                        </div>
                        <div class="col border-right">
                            <div class="txt-dft txt-brd-right">Quantidade</div>
                        </div>
                        <div class="col">
                            <div class="txt-dft">Data</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>