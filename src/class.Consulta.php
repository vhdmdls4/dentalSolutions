<?php

class Consulta extends persist
{
    protected Procedimento $procedimento;
    protected Paciente $paciente;
    protected Dentista $dentistaExecutor;
    protected DateTime $data;
    protected DateTime $horario;
    protected int $duracao;

    public function __construct(Procedimento $procedimento, Paciente $paciente, Dentista $dentistaExecutor, DateTime $data, DateTime $horario, int $duracao)
    {
        $this->procedimento = $procedimento;
        $this->paciente = $paciente;

       //verificacao se o dentistaExecutor escolhido tem a especialidade para realizara consulta
       $possui_especialidade = False;
       foreach($dentistaExecutor->getHabilitacoes() as $habilitacao){
           if($habilitacao->getEspecialidade() == $procedimento->getEspecialidade()){
               $this->dentistaExecutor = $dentistaExecutor;
               $possui_especialidade = True;
               break;
           }
           if($possui_especialidade != True){
                   throw new Exception("O dentista Executor não possui especialidade pra esta consulta");
           }
       }
       
        $this->data = $data;
        $this->horario = $horario;
        $this->duracao = $duracao;
    }

    static public function getFilename()
    {
        return 'Consulta.txt';
    }

    public function getProcedimento(): Procedimento
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

    public function setProcedimento(Procedimento $procedimento)
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
