<?php

class Pagamento extends persist
{
    protected FormaPagamento $forma;
    protected bool $pago = False;
    protected DateTime $data;
    protected float $valorFaturado;
    protected Orcamento $orcamento;
    protected static float $impostos = 0.2;

    public function __construct(FormaPagamento $forma, DateTime $data, float $valorFaturado, Orcamento $orcamento)
    {
        $this->forma = $forma;
        $this->data = $data;
        $this->valorFaturado = $valorFaturado;
        $this-> orcamento = $orcamento;
    }

    static public function getFilename()
    {
        return 'Pagamento.txt';
    }

    public function valorParcelas(): float
    {
        return $this->valorFaturado / $this->forma->getParcelas();
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

    public function setForma(FormaPagamento $forma)
    {
        $this->forma = $forma;
    }

    public function Pago()
    {
        if(($this->orcamento)->getTratamentoAprovado() == True){
            $this->pago = true;
        }
        else{
            throw new Exception("Não é possível realizar o pagamento sem a aprovação do Orcamento!");
        }
    }

    public function setData(DateTime $data)
    {
        $this->data = $data;
    }

    public function setValorFaturado(float $valorFaturado)
    {
        $this->valorFaturado = $valorFaturado;
    }

    public function setImpostos(float $novoImposto)
    {
        self::$impostos = $novoImposto;
    }
}
