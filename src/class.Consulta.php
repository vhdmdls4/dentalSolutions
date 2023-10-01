<?php

class Consulta
{
    private Procedimentos $procedimento;
    private Paciente $paciente;
    private Dentista $dentistaExecutor;
    private DateTime $data;
    private DateTime $horario;
    private int $duracao;

    public function __construct(Procedimentos $procedimento, Paciente $paciente, Dentista $dentistaExecutor, DateTime $data, DateTime $horario, int $duracao)
    {
        $this->procedimento = $procedimento;
        $this->paciente = $paciente;
        $this->dentistaExecutor = $dentistaExecutor;
        $this->data = $data;
        $this->horario = $horario;
        $this->duracao = $duracao;
    }

    public function getProcedimento(): Procedimentos
    {
        return $this->procedimento;
    }

    public function getPaciente(): Paciente
    {
        return $this->paciente;
    }

    public function getDentistaExecutor(): Dentista
    {
        return $this->dentistaExecutor;
    }

    public function getData(): DateTime
    {
        return $this->data;
    }

    public function getHorario(): DateTime
    {
        return $this->horario;
    }

    public function getDuracao(): int
    {
        return $this->duracao;
    }

    public function setProcedimento(Procedimentos $procedimento)
    {
        $this->procedimento = $procedimento;
    }

    public function setPaciente(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    public function setDentistaExecutor(Dentista $dentistaExecutor)
    {
        $this->dentistaExecutor = $dentistaExecutor;
    }

    public function setData(DateTime $data)
    {
        $this->data = $data;
    }

    public function setHorario(DateTime $horario)
    {
        $this->horario = $horario;
    }

    public function setDuracao(int $duracao)
    {
        $this->duracao = $duracao;
    }
}

?>