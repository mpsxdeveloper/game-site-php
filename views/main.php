<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Game Site - Principal</title>
        <link rel="stylesheet" type="text/css" href="../css/principal.css" />
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

        <?php $atual = "home"; ?>
	    <?php require "header.php"; ?>       
        <?php require "menu.php"; ?>
	
	    <?php require_once("./footer.php"); ?>	
        
    </body>
    
</html>
