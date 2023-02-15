const cadForm = document.getElementById("cad_user");
const msgAlertErroReg = document.getElementById("msgAlertErroReg");

cadForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    if(document.getElementById("nomeUser").value === ""){
        msgAlertErroReg.innerHTML = "<div class='alert alert-danger' role='alert'> Preencha o campo de Nome </div>";
    }else if(document.getElementById("emailUser").value === ""){
        msgAlertErroReg.innerHTML = "<div class='alert alert-danger' role='alert'> Preencha o campo de E-mail </div>";
    }else if(document.getElementById("senhaUser").value === ""){
        msgAlertErroReg.innerHTML = "<div class='alert alert-danger' role='alert'> Preencha o campo da Senha </div>";
    }else{
        const dadosForm = new FormData(cadForm);

        console.log(cadForm);

        const dados = await fetch("../src/criarUser.php",{
            method : "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if(resposta['erro']){
                msgAlertErroReg.innerHTML = resposta['msg'];
        }else{
            window.location.href= "../index.php";
        }

        
    }
});