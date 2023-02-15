const logForm = document.getElementById("log_user");
const msgAlertErroReg = document.getElementById("msgAlertErroReg");

logForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    if(document.getElementById("emailUser").value === ""){
        msgAlertErroReg.innerHTML = "<div class='alert alert-danger' role='alert'> Preencha o campo de E-mail </div>";
    }else if(document.getElementById("senhaUser").value === ""){
        msgAlertErroReg.innerHTML = "<div class='alert alert-danger' role='alert'> Preencha o campo da Senha </div>";
    }else{
        const dadosForm = new FormData(logForm);

        console.log(logForm);

        const dados = await fetch("../src/validaUser.php",{
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