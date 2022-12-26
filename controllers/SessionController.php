<?php

session_start();

$query = filter_input(INPUT_GET, "query");
if($query == "sair") {
    sair();
}

function isSessionActive() {
    if(isset($_SESSION['id'])) {
        $uid = $_SESSION["id"];
    }
    if(isset($uid) && !empty($uid)) {
        return true;
    }
    else {
        return false;
    }
}

function sair() {
    unset($_SESSION["uid"]);
    unset($_SESSION["unome"]);
    $_SESSION = array();
    session_destroy();
    header("Location: ../index.php");
}
