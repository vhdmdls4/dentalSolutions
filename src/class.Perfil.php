<?php

class Perfil extends persist
{

    private string $nomePerfil;
    private array $funcionalidades;

    public function __construct(string $nomePerfil, array $funcionalidades)
    {
        $this->nomePerfil = $nomePerfil;
        $this->funcionalidades = $funcionalidades;
    }

    static public function getFilename()
    {
        return 'Perfil.txt';
    }

    public function getNomePerfil(): string
    {
        return $this->nomePerfil;
    }

    public function setNomePerfil(int $nomePerfil)
    {
        $this->nomePerfil = $nomePerfil;
    }

    public function getFuncionalidades(): array
    {
        return $this->funcionalidades;
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
