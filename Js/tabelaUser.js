async function createTabela(){
    
    var dados = await fetch("src/tabelaUser.php");

    var resposta =await dados.json();

    console.log(resposta);

    if(!resposta['status']){
        document.getElementById('tabelaUser').innerHTML = resposta['msg'];
    }else{
        document.getElementById('tabelaUser').innerHTML = resposta['msg'];
    }
}