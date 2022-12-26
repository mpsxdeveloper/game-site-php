window.onload = function() {
    var daySelect = document.getElementById("day");
    for(var i = 1; i < 32; i++) {
        var option = document.createElement("option");
        option.value = (i < 10 ? "0" + i : i);
        option.text = (i < 10 ? "0" + i : i);
        daySelect.appendChild(option);
    }
    var yearSelect = document.getElementById("year");
    for(i = ((new Date().getFullYear()) - 18); i > 1959; i--) {
        var option = document.createElement("option");
        option.value = i;
        option.text = i;
        yearSelect.appendChild(option);
    }
}

function validarEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function save() {
            
    var name = document.getElementById("name").value.trim().toUpperCase();
    var email = document.getElementById("email").value.trim().toLowerCase();
    var emailconfirm = document.getElementById("emailconfirm").value.trim().toLowerCase();
    var password = document.getElementById("password").value;
    var day = document.getElementById("day").value;
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;
    var birthdate = year + "-" + month + "-" + day;
    var agreement = document.getElementById("agreement");
    var alertsdiv = document.getElementById("alertsdiv");                
    var msgspan = document.getElementById("msgspan");
    if(name === "") {
        msgspan.innerHTML = "O nome precisa ser informado";
        alertsdiv.classList.add("alert-warning");
        alertsdiv.style.display = "block";
        document.getElementById("name").focus();
    }
    else if(email === "") {
        msgspan.innerHTML = "O e-mail precisa ser informado";
        alertsdiv.classList.add("alert-warning");
        alertsdiv.style.display = "block";
        document.getElementById("email").focus();
    }
    else if(emailconfirm === "") {
        msgspan.innerHTML = "O e-mail precisa ser confirmado";
        alertsdiv.classList.add("alert-warning");
        alertsdiv.style.display = "block";
        document.getElementById("emailconfirm").focus();
    }
    else if(validarEmail(email) === false) {                    
        msgspan.innerHTML = "O e-mail não é válido";
        alertsdiv.classList.remove("alert-warning");
        alertsdiv.classList.add("alert-error");
        alertsdiv.style.display = "block";
        document.getElementById("email").focus();
    }
    else if(emailconfirm !== email) {
        msgspan.innerHTML = "Os e-mails não estão iguais";
        alertsdiv.classList.add("alert-warning");
        alertsdiv.style.display = "block";
        document.getElementById("emailconfirm").focus();
    }
    else if(password === "") {
        msgspan.innerHTML = "A senha precisa ser informada";
        alertsdiv.classList.add("alert-warning");
        alertsdiv.style.display = "block";
        document.getElementById("password").focus();
    }
    else if(day === "" || month === "" || year === "") {
        msgspan.innerHTML = "A data de nascimento precisa ser informada";
        alertsdiv.classList.add("alert-warning");
        alertsdiv.style.display = "block";
        document.getElementById("day").focus();
    }
    else if(checkDate(birthdate) === false) {
        msgspan.innerHTML = "Data de nascimento inválida, verifique os dados informados";
        alertsdiv.classList.remove("alert-warning");
        alertsdiv.classList.add("alert-error");
        alertsdiv.style.display = "block";
    }
    else if(!agreement.checked) {
        msgspan.innerHTML = "É preciso aceitar os termos para prosseguir com o registro";
        alertsdiv.classList.remove("alert-error");
        alertsdiv.classList.add("alert-warning");
        alertsdiv.style.display = "block";
        agreement.focus();
    }
    else {               
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState === 4 && this.status === 200) {
                var resposta = JSON.parse(this.responseText);
                if(resposta === true) {
                    msgspan.innerHTML = "Inscrição realizada com sucesso, redirecionando...";
                    alertsdiv.classList.remove("alert-warning", "alert-error");
                    alertsdiv.classList.add("alert-success");
                    alertsdiv.style.display = "block";
                    setTimeout(function() {
                        window.location.href = "views/main.php";
                    }, 3000);                    
                }
                else {
                    msgspan.innerHTML = "Erro ao tentar fazer a inscrição";
                    alertsdiv.classList.remove("alert-warning");
                    alertsdiv.classList.add("alert-error");                            
                    alertsdiv.style.display = "block";
                }                        
            }
        };
        xhttp.open("POST", "../controllers/UsuarioController.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("query=save&nome=" + name + "&email=" + email + "&senha=" + password + "&nascimento=" + birthdate + "&acordo=" + agreement.checked);
    }
}
