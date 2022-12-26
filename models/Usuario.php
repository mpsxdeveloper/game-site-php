<?php

class Usuario implements JsonSerializable {
    
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $nascimento;
    
    public function __construct() {
    }
    
    public function jsonSerialize() : mixed {
        $vars = get_object_vars($this);
        return $vars;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNascimento() {
        return $this->nascimento;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }
    
}
