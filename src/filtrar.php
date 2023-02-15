<?php
    include_once 'conexao.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)){
        $query_item="SELECT prod.id, prod.nome_item, prod.desc_item, prod.qtde_item, cat.nome_categoria
        FROM item AS prod
        INNER JOIN categoria_item AS cat ON cat.id=prod.categoria_id
        WHERE categoria_id=:id";
        $result_item=$conn->prepare($query_item);
        $result_item->bindParam(':id', $id);

        $result_item->execute();

        $listar_item = "";

        if(($result_item) and ($result_item->rowCount() !=0)){
            while($row_item = $result_item->fetch(PDO::FETCH_ASSOC)){
                extract($row_item);
                
                $listar_item .= "<div class='row bg-cnt br-5 align-items-center text-center pre-tab'><div class='col'><div class='txt-dft'>$nome_item</div></div><div class='col'><div class='txt-dft'>$desc_item</div></div><div class='col'><div class='txt-dft'>$qtde_item</div></div><div class='col'><div class='txt-dft'>$nome_categoria</div></div></div>";
            }
            $retorna = ['status'=>true,'msg'=>$listar_item];
        }else{
            $retorna = ['status'=>false,'msg'=> "ERRO2"];
        }
    }else{
        $retorna = ['status'=>false,'msg'=> "ERRO"];
    }

    echo json_encode($retorna);
?>