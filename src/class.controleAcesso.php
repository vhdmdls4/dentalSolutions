<?php

require_once("global.php");

//FUNCOES DE VERIFICACAO DA PERMISSAO

function verificaPermissao(Usuario $usuario, Funcionalidade $funcionalidade){
        $perfil_usuario_logado = $usuario->getPerfil();
        if(!in_Array($funcionalidade, $perfil_usuario_logado->getFuncionalidades())){
                echo "\nAcesso negado\n";
                return False;
        }
        else{
                echo "\nAcesso permitido!\n";
                return True;
        }
}

?>