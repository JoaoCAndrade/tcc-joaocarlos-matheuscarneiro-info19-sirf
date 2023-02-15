<?php
    include_once "conexao.php";


    $dadosUser = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (empty($dadosUser['emailUser'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Preencha o campo de E-mail </div>"];
    }elseif (empty($dadosUser['senhaUser'])){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Preencha o campo de Senha </div>"];
    }elseif (empty($dadosUser['nomeUser'])){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Preencha o campo de confirmar Senha </div>"];
    }else{
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'> Cadastrar</div>"];
        $query_user = "INSERT INTO user (email_user, nome_user, senha_user) VALUES (:email_user, :nome_user, :senha_user)"; 
        $cad_usuario = $conn->prepare($query_user);
        $cad_usuario->bindParam(':email_user', $dadosUser['emailUser'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':nome_user', $dadosUser['nomeUser'], PDO::PARAM_STR);
        $senha_cript = password_hash($dadosUser['senhaUser'], PASSWORD_DEFAULT);
        $cad_usuario->bindParam(':senha_user', $senha_cript, PDO::PARAM_STR);

        $cad_usuario->execute();
    }
    echo json_encode($retorna);
    
    
?>