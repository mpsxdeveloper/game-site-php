<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Game Site - Index</title>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/buttons.css" />
        <link rel="stylesheet" type="text/css" href="css/alerts.css" />
        <link rel="stylesheet" type="text/css" href="css/inputs.css" />
        <link rel="stylesheet" type="text/css" href="css/modals.css" />
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
    
    <body onload="document.getElementById('email').focus()";> 
        
        <?php require_once("views/header.php"); ?>              
        
        <div class="content">
            <div style="text-align: center; margin-top: 100px;">
                <i class="fa-solid fa-gamepad" style="font-size: 96px;"></i>
            </div>
            
            <form>
                <label><?= $dicionario["email"] ?></label>
                <input type="text" placeholder="<?= $dicionario["informeemail"] ?>" id="email" required />
                <label><?= $dicionario["senha"] ?></label>
                <input type="password" placeholder="<?= $dicionario["informesenha"] ?>" id="senha" required /><br />
                <button type="button" class="button-md button-confirm" onclick="login();"
                        style="display: block; margin: auto;">
                    <?= $dicionario["conectar"] ?>
                </button><br />
                
                <div id="alertas" class="alert-md">
                    <span id="mensagens"></span>
                    <span class="alert-button" onclick="this.parentNode.style.display='none'">
                        &times;
                    </span>
                </div>
                
                <div style="float: right;">
                    <a href="#" onclick="createModal('<?=$dicionario["novasenha"] ?>', null, sendnewPassword)"><?= $dicionario["esqueci"] ?></a>
                </div>
                <div style="float: left;">
                    <a href="signup.php"><?= $dicionario["cadastre"] ?></a>
                </div>
                
                <div class="modal">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            <input type="email" placeholder="<?= $dicionario["emailcadastro"] ?>" style="width: 95%;" />
                        </div>
                        <div class="modal-footer"></div>	
                    </div>
                </div>                
            </form>

            <input type="hidden" value="<?= $dicionario["informeemail"] ?>" id="informeemail" />
            <input type="hidden" value="<?= $dicionario["informesenha"] ?>" id="informesenha" />
            
        </div>               
        
        <?php require_once("views/footer.php"); ?>
        
        <script src="js/modals.js"></script>
        <script src="js/login.js"></script>
        
    </body>
    
</html>
