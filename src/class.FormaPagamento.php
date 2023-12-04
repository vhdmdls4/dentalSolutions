<?php

require_once 'persist.php';

enum TipoPagamento
{
    case Dinheiro;
    case Pix;
    case Credito;
    case Debito;
}

class FormaPagamento extends persist
{
    protected TipoPagamento $tipo;
    protected int $parcelas;
    protected float $taxa;

    static public function getFilename()
    {
        return 'formaPagamento.txt';
    }

    public function __construct(TipoPagamento $tipo, int $parcelas = 1, float $taxa = 0.0)
    {
        $this->tipo = $tipo;
        $this->parcelas = $parcelas;
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
    public function setTaxa(float $taxa)
    {
        $this->taxa = $taxa;
    }
}
