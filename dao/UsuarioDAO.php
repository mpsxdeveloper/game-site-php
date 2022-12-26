<?php

require_once "../dao/ConnectionFactory.php";
require_once "../models/Usuario.php";

class UsuarioDAO {
    
    public function salvar(Usuario $usuario) {        
        try {
            $connection = ConnectionFactory::connect();
            $sql = "INSERT INTO usuarios (nome, email, senha, nascimento) VALUES (:nome, :email, :senha, :nascimento)";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":nome", $usuario->getNome());
            $rs->bindValue(":email", $usuario->getEmail());
            $rs->bindValue(":senha", $usuario->getSenha());
            $rs->bindValue(":nascimento", $usuario->getNascimento());                        
            $rs->execute();
            if($rs->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
    }
    
    public function login(Usuario $usuario) {
        try {
            $connection = ConnectionFactory::connect();
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":email", $usuario->getEmail());
            $rs->execute();
            if($rs->rowCount() > 0) {
                $user = $rs->fetch(PDO::FETCH_ASSOC); 
                if(password_verify($usuario->getSenha(), $user["senha"])) {
                    return $user;
                }
                else {
                    return null;
                }                
            }
            else {
                return null;
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }        
        
    }
    
}
