<?php

class Pagamento extends persist
{
    private FormaPagamento $forma;
    private bool $pago;
    private DateTime $data;
    private float $valorFaturado;
    private static float $impostos = 0.1;

    public function __construct(FormaPagamento $forma, bool $pago, DateTime $data, float $valorFaturado)
    {
        $this->forma = $forma;
        $this->pago = $pago;
        $this->data = $data;
        $this->valorFaturado = $valorFaturado;
    }

    static public function getFilename()
    {
        return 'pagamentos.txt';
    }

    public function calculaImposto(): float
    {
        return $this->valorFaturado * self::$impostos;
    }

    public function calculaTaxa(): float
    {
        return $this->valorFaturado * $this->forma->getTaxa();
    }

    public function calculaReceita(): float
    {
        return $this->valorFaturado - $this->calculaImposto() - $this->calculaTaxa();
    }

    public function getForma(): FormaPagamento
    {
        return $this->forma;
    }

    public function getPago(): bool
    {
        return $this->pago;
    }

    public function getData(): DateTime
    {
        return $this->data;
    }

    public function getValorFaturado(): float
    {
        return $this->valorFaturado;
    }

    public function getImpostos(): float
    {
        return self::$impostos;
    }

    public function setForma(FormaPagamento $forma): void
    {
        $this->forma = $forma;
    }

    public function setPago(bool $pago): void
    {
        $this->pago = $pago;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function setValorFaturado(float $valorFaturado): void
    {
        $this->valorFaturado = $valorFaturado;
    }

    public function setImpostos(float $novoImposto): void
    {
        self::$impostos = $novoImposto;
    }
}
