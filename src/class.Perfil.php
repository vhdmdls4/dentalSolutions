<?php

require_once("class.Funcionalidade.php");

class Perfil {

    private string $nomePerfil;
    private array $funcionalidades;
    
    public function __construct(string $nomePerfil, array $funcionalidades)
    {
      $this-> nomePerfil = $nomePerfil;
      $this-> funcionalidades = $funcionalidades;
    }

    public function getNomePerfil(): string
    {
        return $this-> nomePerfil;
    } 

    public function setNomePerfil(int $nomePerfil)
    {
        $this->nomePerfil = $nomePerfil;
    }

    public function getFuncionalidades(){
        return $this -> funcionalidades;
    }

    public function addFuncionalidade(Funcionalidade $funcionalidade)
    {
        array_push($this->funcionalidades, $funcionalidade);
    }

    public function delFuncionalidade(Funcionalidade $funcionalidade)
    {
    $key = array_search($funcionalidade, $this->funcionalidades);
        if ($key === false) {
            return;
        }
        unset($this->funcionalidades[$key]);
    }
}


?>
