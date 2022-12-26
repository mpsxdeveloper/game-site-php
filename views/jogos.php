<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Game Site - Jogos</title>
        <link rel="stylesheet" type="text/css" href="../css/buttons.css" />
        <link rel="stylesheet" type="text/css" href="../css/menu.css" />
        <link rel="stylesheet" type="text/css" href="../css/footer.css" />
    </head>
    
    <body style="margin: 0; padding: 0;">       
        
        <?php 
            require_once '../controllers/SessionController.php'; 
            if(!isSessionActive()) { 
                header("Location: ../index.php");
            }
        ?>        

        <?php $atual = "jogos"; ?>
	    <?php require "./header.php"; ?>       
        <?php require "./menu.php"; ?>
        
        <div id="escolha" style="text-align: center; margin-top: 50px;">
            <span>Escolha um jogo</span>
            <a href="#" class="button-md button-confirm" style="margin-right: 5px; text-decoration: none;">
                Jogo - 1
            </a>
            <a href="#" class="button-md button-confirm" style="margin-right: 5px; text-decoration: none;">
                Jogo - 2
            </a>
            <a href="#" class="button-md button-confirm" style="text-decoration: none;">
                Jogo - 3
            </a>
        </div>
        <div id="container" style="padding-left: 10px; text-align: center; margin-top: 50px;">            
            <?php
                $gameid = filter_input(INPUT_GET, "gameid");
                if($gameid == null || $gameid == '') {
                    echo "Nenhum jogo selecionado";                    
                }
            ?>                        
        </div>
	
	    <?php require "./footer.php"; ?>
        
    </body>
    
</html>
