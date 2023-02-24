async function mudaPermissao(){
    var perm = document.getElementById("perm").value;

    var dados = await fetch("../src/mudaPerm.php?id=" + perm);

    var resposta =await dados.json();

    console.log(resposta);
}