<?php
    include_once "conexao.php";
        $query_user = "SELECT email_user, nome_user, isEstagiario FROM user";
        $result_user = $conn->prepare($query_user);
        $result_user->execute();
        $listar_user = "";

    
        if(($result_user) and ($result_user->rowCount() !=0)){
            while($row_user = $result_user->fetch(PDO::FETCH_ASSOC)){
                extract($row_user);
                
                if($row_user['isEstagiario']==1){
                    $listar_user .= "
                    <div class='row bg-cnt br-5 align-items-center text-center pre-tab'>
                        <div class='col border-right'>
                            <div class='txt-dft txt-brd-right'>
                                $nome_user
                            </div>
                        </div>
                        <div class='col border-right'>
                            <div class='txt-dft txt-brd-right'>
                                $email_user
                            </div>
                        </div>
                        <div class='col border-right'>
                            <div class='txt-dft txt-brd-right'>
                                Admin
                            </div>
                        </div>
                    </div>";
                }else{
                    $listar_user .= "
                    <div class='row bg-cnt br-5 align-items-center text-center pre-tab'>
                        <div class='col border-right'>
                            <div class='txt-dft txt-brd-right'>
                                $nome_user
                            </div>
                        </div>
                        <div class='col border-right'>
                            <div class='txt-dft txt-brd-right'>
                                $email_user
                            </div>
                        </div>
                        <div class='col border-right'>
                            <div class='txt-dft txt-brd-right'>
                                Aluno
                            </div>
                        </div>
                    </div>";
                }
                
            }
        }
        
?>    
        $retorna = ['status'=>true,'msg'=>$listar_user];

     
        echo json_encode($retorna);
?>