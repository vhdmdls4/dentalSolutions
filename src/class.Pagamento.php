<?php

enum FormaPagamento
{
    case Dinheiro;
    case Credito;
}

class Pagamento
{
    private FormaPagamento $forma;
    private int $parcelas;

    public function __construct(FormaPagamento $forma, int $parcelas = 1)
    {
        if ($forma == FormaPagamento::Dinheiro && $parcelas != 1) {
            $parcelas = 1;
        }
        if ($parcelas > 6) {
            $parcelas = 6;
        }
        $this->forma = $forma;
        $this->parcelas = $parcelas;
    }

    public function getForma(): FormaPagamento
    {
        return $this->forma;
    }

    public function getParcelas(): int
    {
        return $this->parcelas;
    }

    public function setForma(FormaPagamento $forma)
    {
        if ($forma == FormaPagamento::Dinheiro && $this->parcelas != 1) {
            $this->parcelas = 1;
        }
        $this->forma = $forma;
    }

    public function setParcelas(int $parcelas)
    {
        if ($this->forma == FormaPagamento::Dinheiro && $parcelas != 1) {
            $parcelas = 1;
        }
        $this->parcelas = $parcelas;
    }
}

?>