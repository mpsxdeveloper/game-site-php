<?php

class Idioma {
    
    static function getDicionario() {
        $idioma = substr(filter_input(INPUT_SERVER, "HTTP_ACCEPT_LANGUAGE"), 0, 2);
        if($idioma == "en") {
            $dicionario = parse_ini_file("config/en.ini");
        }
        else {
            $dicionario = parse_ini_file("config/pt-BR.ini");
        }        
        return $dicionario;
    }
    
}
