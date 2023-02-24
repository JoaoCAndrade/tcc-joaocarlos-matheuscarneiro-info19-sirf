<?php
    include_once 'conexao.php';

    $edititem = filter_input(INPUT_POST, 'editaItem', FILTER_SANITIZE_STRING);

    if($edititem){
        
        $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
        $nome_item = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
        $qtde_item = filter_input(INPUT_POST,'qtde',FILTER_SANITIZE_STRING);
        $desc_item = filter_input(INPUT_POST,'desc',FILTER_SANITIZE_STRING);

        $query_item = "UPDATE item SET nome_item=:nome_item, desc_item=:desc_item, qtde_item=:qtde_item WHERE id=$id";
        
        $result_item = $conn->prepare($query_item);
        
        $result_item->bindParam(':nome_item',$nome_item);
        $result_item->bindParam(':desc_item',$desc_item);
        $result_item->bindParam(':qtde_item',$qtde_item);

        if($result_item->execute()){
            header('Location: ../indexAdmin.php');
        }else{
            header('Location: ../indexAdmin.php');
        }
    }
?>