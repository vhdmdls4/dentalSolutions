<?php

class Financeiro
{
    public function calculaGastosSalario(DateTime $mes): float
    {
        $gastos = 0.0;
        $auxiliares = Auxiliar::getRecords();
        $secretarios = Secretario::getRecords();
        $dentistas = DentistaFuncionario::getRecords();
        $parceiros = DentistaParceiro::getRecords();

        foreach ($auxiliares as $auxiliar) {
            $gastos += $auxiliar->getSalario();
        }

        foreach ($secretarios as $secretario) {
            $gastos += $secretario->getSalario();
        }

        foreach ($dentistas as $dentista) {
            $gastos += $dentista->getSalario();
        }

        foreach ($parceiros as $parceiro) {
            $gastos += $parceiro->getRenda($mes);
        }

        return $gastos;
    }

    public function calculaResultadoMensal(DateTime $mes): float
    {
        $pagamentos = Pagamento::getRecords();
        $receita = 0.0;
        $gastos = $this->calculaGastosSalario($mes);

        foreach ($pagamentos as $pagamento) {
            if ($pagamento->getData()->format('y-m') == $mes->format('y-m') && $pagamento->getPago()) {
                $receita += $pagamento->calculaReceita();
            }
        }

        return $receita - $gastos;
    }
}
