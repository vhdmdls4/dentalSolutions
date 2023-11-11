<?php

require_once("class.Funcionalidade.php");
require_once("class.Perfil.php");
require_once("class.Usuario.php");
require_once("class.Login.php");


//teste de controle de acesso
$funcionalidade1 = new Funcionalidade("Alterar Orcamento","Possivel de alterar o orcamento");
$Dentista_teste = new Perfil("Dentista", []);

$funcionalidade2 = new Funcionalidade("Agendar consulta","Permite agendar consultas no sistema");
$Secretario_teste = new Perfil("Secretario", []);

$Dentista_teste->addFuncionalidade($funcionalidade1);
$Secretario_teste->addFuncionalidade($funcionalidade2);


//como enviar como comando pra procurar qualquer funcao que o usuario esta apertando ao inves de algo generico como "Alterar Orcamento"?
if (in_Array("Alterar Orcamento", $Dentista_teste->getFuncionalidades())){
    echo "Acesso Permitido";
}
else {
    echo "Acesso Negado";
}

?>