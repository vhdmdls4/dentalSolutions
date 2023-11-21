<?php

require_once("global.php");

/*teste de controle de acesso
$funcionalidade1 = new Funcionalidade("Alterar Orcamento");
$Dentista_teste = new Perfil("Dentista", []);

$funcionalidade2 = new Funcionalidade("Agendar consulta");
$Secretario_teste = new Perfil("Secretario", []);

$Dentista_teste->addFuncionalidade($funcionalidade1);
$Secretario_teste->addFuncionalidade($funcionalidade2);

print_r($Dentista_teste->getFuncionalidades());

//como enviar como comando pra procurar qualquer funcao que o usuario esta apertando ao inves de algo generico como "Alterar Orcamento"?
*/

function verificaPermissao(Perfil $perfil, Funcionalidade $funcionalidade){
    return in_Array($funcionalidade, $perfil->getFuncionalidades()); 
}


function permissionCall(Usuario $logado, Funcionalidade $funcionalidade){ //so chamar o getUsuarioLogado() da classe login pra saber quem e o usuario que esta solicitando
    if(verificaPermissao($logado->getPerfil(),$funcionalidade)){
        echo 'Permissão concedida';
        
        switch($funcionalidade->getNome()){
            case "Cadastrar Orcamento":
                //funcao
                break;
            case "Excluir Orcamento":
                //funcao
                break;
            case "Alterar Orcamento":
                //funcao
                break;
                

            case "Cadastrar Usuario":
                //funcao
                break;
            case "Excluir Usuario":
                    //funcao
                    break;
            case "Alterar Usuario":
                    //funcao
                    break;


            case "Cadastrar Procedimento":
                    //funcao
                    break;
            case "Excluir Procedimento":
                    //funcao
                    break;
            case "Alterar Procedimento":
                    //funcao
                    break;


            case "Cadastrar Consulta":
                    //funcao
                    break;
            case "Excluir Consulta":
                    //funcao
                    break;
            case "Alterar Consulta":
                    //funcao
                    break;


            case "Cadastrar Cliente":
                    //funcao
                    break;
            case "Excluir Cliente":
                    //funcao
                    break;
            case "Alterar Cliente":
                    //funcao
                    break;


            case "Entrar no sistema":
                        //funcao
                        break;
            case "Sair do sistema":
                        //funcao
                        break;


            case "Cadastrar profissional":
                        //funcao
                        break;
        }
    }
    else {
        echo 'Permissão Negada';
        //funcao para bloquear a entrada
    }
}

?>