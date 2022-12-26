function sendnewPassword() {
                
}

function validarEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function login() {

    var email = document.getElementById("email").value.trim().toLowerCase();
    var senha = document.getElementById("senha").value;
    var alertas = document.getElementById("alertas");
    var mensagens = document.getElementById("mensagens");
    if(email === "") {
        mensagens.innerHTML = document.getElementById('informeemail').value;
        alertas.classList.add("alert-warning");                    
        alertas.style.display = "block";
        document.getElementById("email").focus();
        return;
    }
    else if(validarEmail(email) === false) {                    
        mensagens.innerHTML = "O e-mail não é válido";
        alertas.classList.add("alert-warning");                    
        alertas.style.display = "block";
        document.getElementById("email").focus();
        return;
    }
    else if(senha === "") {
        mensagens.innerHTML = document.getElementById('informesenha').value;
        alertas.classList.add("alert-warning");
        alertas.style.display = "block";
        document.getElementById("senha").focus();
        return;
    }
                    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            var resposta = JSON.parse(this.responseText);
            if(resposta === true) {
                window.location.href = "views/main.php";
            }
            else {
                mensagens.innerHTML = "Erro ao tentar fazer login. Verifique o e-mail e a senha";
                alertas.classList.remove("alert-warning");
                alertas.classList.add("alert-error");
                alertas.style.display = "block";
            }
        }
    };
    xhttp.open("POST", "controllers/UsuarioController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("query=login&email=" + email + "&senha=" + senha);

}
