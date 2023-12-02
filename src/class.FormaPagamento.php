<?php

enum TipoPagamento
{
    case Dinheiro;
    case Pix;
    case Credito;
    case Debito;
}

class FormaPagamento
{
    protected TipoPagamento $tipo;
    protected int $parcelas;
    protected string $operadora;
    protected float $taxa;

    public function __construct(TipoPagamento $tipo, int $parcelas = 1, string $operadora = "", float $taxa = 0.0)
    {
        $this->tipo = $tipo;
        $this->parcelas = $parcelas;
        $this->operadora = $operadora;
        $this->taxa = $taxa;
    }

    public function getTipo(): TipoPagamento
    {
        return $this->tipo;
    }
    public function getParcelas(): int
    {
        return $this->parcelas;
    }
    public function getOperadora(): string
    {
        return $this->operadora;
    }
    public function getTaxa(): float
    {
        return $this->taxa;
    }
    public function setTipo(TipoPagamento $tipo)
    {
        $this->tipo = $tipo;
    }
    public function setParcelas(int $parcelas)
    {
        $this->parcelas = $parcelas;
    }
    public function setOperadora(string $operadora)
    {
        $this->operadora = $operadora;
    }
    public function setTaxa(float $taxa)
    {
        $this->taxa = $taxa;
    }
}
