<?php
    include_once "conexao.php";


    $dadosUser = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (empty($dadosUser['emailUser'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Preencha o campo de E-mail </div>"];
    }elseif (empty($dadosUser['senhaUser'])){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Preencha o campo de Senha </div>"];
    }else{
        $query_user = "SELECT email_user, nome_user, senha_user FROM user WHERE email_user=:email_user";
        $result_user = $conn->prepare($query_user);
        $result_user->bindParam(':email_user', $dadosUser['emailUser'], PDO::PARAM_STR);
        $result_user->execute();

        if(($result_user) and ($result_user->rowCount()!= 0)){
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'> Cadastrar</div>"];
        }else{
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Email ou Senha inválidos!</div>"];
        }       
    }
    echo json_encode($retorna);
    
?>