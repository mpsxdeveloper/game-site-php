<?php

header("Content-Type: application/json; charset=utf-8");

require_once "../models/Usuario.php";
require_once "../dao/UsuarioDAO.php";
require_once "../controllers/SessionController.php";

$query = filter_input(INPUT_POST, "query");

if($query == "save") {
    $nome = filter_input(INPUT_POST, "nome");
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");
    $nascimento = filter_input(INPUT_POST, "nascimento");    
    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setSenha(password_hash($senha, PASSWORD_DEFAULT));
    $usuario->setNascimento($nascimento);
    $usuarioDAO = new UsuarioDAO();
    $result = $usuarioDAO->salvar($usuario);
    if($result == true) {
        echo json_encode(true);
    }
    else {
        echo json_encode(false);
    }
}
else if($query == "login") {
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");
    $usuario = new Usuario();
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
    $usuarioDAO = new UsuarioDAO();
    $user = $usuarioDAO->login($usuario);
    if($user != null) {        
        if(!isSessionActive()) {
            $_SESSION["id"] = $user["id"];
            $_SESSION["nome"] = $user["nome"];
            echo json_encode(true);
        }
        else {
            header("Location: ../views/main.php");
        }
    }
    else {
        echo json_encode(false);
    }
}
