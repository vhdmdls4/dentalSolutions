<?php

class Habilitacao extends persist
{
    private Especialidade $especialidade;
    private float $comissao;

    public function __construct(Especialidade $especialidade, float $comissao = 1.0)
    {
        // Caso nao seja informada a comissao, como para o dentista funcionario, a comissão será 1.0.
        $this->especialidade = $especialidade;
        $this->comissao = $comissao;
    }
    public function getEspecialidade(): Especialidade
    {
        return $this->especialidade;
    }
    public function getComissao(): float
    {
        return $this->comissao;
    }
    public function setEspecialidade(Especialidade $especialidade)
    {
        $this->especialidade = $especialidade;
    }
    public function setComissao(float $comissao)
    {
        $this->comissao = $comissao;
    }
    static public function getFilename()
    {
        return 'habilitacoes.txt';
    }
}
