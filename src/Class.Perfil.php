<?php

require_once("class.Funcionalidades.php");

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

    public function addFuncionalidade(Funcionalidades $funcionalidade)
    {
        array_push($this->funcionalidades, $funcionalidade);
    }

    public function delFuncionalidade(Funcionalidades $funcionalidade)
    {
    $key = array_search($funcionalidade, $this->funcionalidades);
        if ($key === false) {
            return;
        }
        unset($this->funcionalidades[$key]);
    }
}


?>