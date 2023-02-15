async function filtrar(){
    var id = document.getElementById("tipo_Item").value;
    
    var dados = await fetch("src/filtrar.php?id=" + id);

    var resposta =await dados.json();

    console.log(resposta);

    if(!resposta['status']){
        document.getElementById('tabelaItem').innerHTML = resposta['msg'];
    }else{
        document.getElementById('tabelaItem').innerHTML = resposta['msg'];
    }
}