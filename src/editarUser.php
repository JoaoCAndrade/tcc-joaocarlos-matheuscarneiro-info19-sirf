<?php
    include_once 'conexao.php';

    $editUser = filter_input(INPUT_POST, 'editaUser', FILTER_SANITIZE_STRING);

    if($editUser){
        
        $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
        $perm = filter_input(INPUT_POST,'perm',FILTER_SANITIZE_NUMBER_INT);

        $query_user = "UPDATE user SET email_user=:email, nome_user=:nome, isEstagiario=:perm WHERE id=$id";
        
        $result_user = $conn->prepare($query_user);
        
        $result_user->bindParam(':nome',$nome);
        $result_user->bindParam(':email',$email);
        $result_user->bindParam(':perm',$perm);

        if($result_user->execute()){
            header('Location: ../pages/usuarios.php');
        }else{
            header('Location: ../pages/usuarios.php');
        }
    }
?>