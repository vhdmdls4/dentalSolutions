<?php

require_once 'global.php';

class Perfil extends persist
{

    protected string $nomePerfil;
    protected array $funcionalidades = [];

    public function __construct(string $nomePerfil, array $funcionalidades)
    {
        if ($nomePerfil == "admin") {
            $this->setTodasFuncionalidades();
        }

        $this->nomePerfil = $nomePerfil;
        $funcionalidadesDB = Funcionalidade::getRecords();

        foreach ($funcionalidadesDB as $funcionalidadeLocal) {
            foreach ($funcionalidades as $funcionalidade) {
                if ($funcionalidadeLocal->getNome() == $funcionalidade) {
                    $this->addFuncionalidade($funcionalidadeLocal);
                }
            }
        }
    }

    public function setTodasFuncionalidades()
    {
        $funcionalidades = Funcionalidade::getRecords();
        foreach ($funcionalidades as $funcionalidade) {
            $this->addFuncionalidade($funcionalidade);
        }
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

$newPerfil = new Perfil("admin", [""]);
