<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Let's Playstation - Signup</title>
        <link rel="stylesheet" type="text/css" href="css/buttons.css" />
        <link rel="stylesheet" type="text/css" href="css/inputs.css" />        
        <link rel="stylesheet" type="text/css" href="css/alerts.css" />
        <link rel="stylesheet" type="text/css" href="css/footer.css" />        
    </head>

    <?php        
        require_once "controllers/SessionController.php";
        require 'models/Idioma.php';
        if((bool)isSessionActive() == true) {
            header("Location: views/main.php");
        }
        $dicionario = Idioma::getDicionario();
        
    ?>
    
    <body style="margin: 0; padding: 0;">
       
        <?php require_once("views/header.php"); ?>
        
        <div id="main" style="width: 45%; margin: 0 auto; margin-top: 30px;">
        
        <form>
            <label>Nome:</label>
            <input type="text" placeholder="Informe seu nome" name="name" id="name" required />
            <label>E-mail:</label>
            <input type="text" placeholder="Informe seu e-mail" name="email" id="email" required />
            <label>Confirmar E-mail:</label>
            <input type="text" placeholder="Confirme seu e-mail" name="emailconfirm" id="emailconfirm" required />
            <label>Senha:</label>
            <input type="password" placeholder="Escolha uma senha" name="password" id="password" required />
            <label>Nascimento:</label>
            <div>
                <select name="day" id="day" style="width: 15%;" required>
                    <option value="">Dia</option>
                </select>
                <select name="month" id="month" style="width: 30%;" required><option value="">Mês</option>
                    <option value="01">JANEIRO</option>
                    <option value="02">FEVEREIRO</option>
                    <option value="03">MARÇO</option>
                    <option value="04">ABRIL</option>
                    <option value="05">MAIO</option>
                    <option value="06">JUNHO</option>
                    <option value="07">JULHO</option>
                    <option value="08">AGOSTO</option>
                    <option value="09">SETEMBRO</option>
                    <option value="10">OUTUBRO</option>
                    <option value="11">NOVEMBRO</option>
                    <option value="12">DEZEMBRO</option>
                </select>
                <select name="year" id="year" style="width: 15%;" required>
                    <option value="">Ano</option>
                </select>
            </div>
            <div style="text-align: right;">
                <label>Eu concordo com os <a href="#">termos</a> ao me cadastrar nesse site</label>
                <input type="checkbox" name="agreement" id="agreement" required />
            </div>
            <div style="margin-top: 10px;">
                <div class="alert-md" id="alertsdiv">
                    <span class="alert-button" onclick="this.parentElement.style.display='none';">&times;</span>&nbsp;
                    <span class="alert-msg" id="msgspan"></span>
                </div>
            </div>
            <button type="button" class="button-md button-alert" style="float: left;" onclick="window.location.href='index.php';">
                Cancelar
            </button>
            <button type="button" class="button-md button-confirm" style="float: right;" onclick="save();">
                Cadastrar
            </button>
        </form>
            
        </div>
       
        <?php require_once("views/footer.php"); ?>

        <script src="../js/signup.js"></script>
        <script src="../js/date.js"></script>
        
    </body>
    
</html>
