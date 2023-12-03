<?php

require_once 'global.php';

class Agenda extends persist
{
    protected string $segunda;
    protected string $terca;
    protected string $quarta;
    protected string $quinta;
    protected string $sexta;
    protected string $sabado;
    protected array $dias = array();

    /**
     * @param string $segunda 9:00-12:00,14:00-18:00
     */

     static public function getFilename()
     {
         return 'agenda.txt';
     }

    public function __construct(string $segunda, string $terca, string $quarta, string $quinta, string $sexta, string $sabado = "")
    {
        $this->segunda = $segunda;
        $this->terca = $terca;
        $this->quarta = $quarta;
        $this->quinta = $quinta;
        $this->sexta = $sexta;
        $this->sabado = $sabado;
    }

    public function criaAgendaMes(DateTime $mes)
    {
        $data = clone $mes;
        $data->setDate($mes->format('Y'), $mes->format('m'), 1);
        $data->setTime(0, 0, 0);
        $dataFinal = clone $data;
        $dataFinal->add(new DateInterval('P1M'));
        $dataFinal->sub(new DateInterval('P1D'));
        $dataFinal->setTime(23, 59, 59);

        while ($data <= $dataFinal) {
            $diaSemana = $data->format('w');
            switch ($diaSemana) {
                case 1:
                    $this->criaAgendaDia($data, $this->segunda);
                    break;
                case 2:
                    $this->criaAgendaDia($data, $this->terca);
                    break;
                case 3:
                    $this->criaAgendaDia($data, $this->quarta);
                    break;
                case 4:
                    $this->criaAgendaDia($data, $this->quinta);
                    break;
                case 5:
                    $this->criaAgendaDia($data, $this->sexta);
                    break;
                case 6:
                    if ($this->sabado != "") {
                        $this->criaAgendaDia($data, $this->sabado);
                    }
                    break;
            }
            $data->add(new DateInterval('P1D'));
        }
    }

    public function criaAgendaDia(DateTime $data, string $horario)
    {
        $dia = array();
        $horarios = explode(',', $horario);
        foreach ($horarios as $hora) {
            $hora = trim($hora);
            $hora = explode('-', $hora);
            $horaInicial = new DateTime($hora[0]);
            $horaFinal = new DateTime($hora[1]);
            while ($horaInicial < $horaFinal) {
                $dia[$horaInicial->format("H:i")] = true;
                $horaInicial->add(new DateInterval('PT30M'));
            }
            $dia[$horaFinal->format("H:i")] = false;
        }
        $this->dias[$data->format("d/m/y")] = $dia;
    }

    public function imprimeAgenda(DateTime $mes, bool $dia = false)
    {
        if ($dia) {
            echo "Data: " . $mes->format('d/m/y') . "\n";
            foreach ($this->dias[$mes->format('d/m/y')] as $horario => $disponibilidade) {
                if ($disponibilidade) {
                    echo $horario . " - Disponível\n";
                }
            }
            return;
        }
        foreach ($this->getDias($mes) as $data => $horarios) {
            if (count($horarios) == 0) {
                continue;
            }
            echo "Data: $data\n";
            foreach ($horarios as $horario => $disponibilidade) {
                if ($disponibilidade) {
                    echo $horario . " - Disponível\n";
                }
            }
            echo "\n";
        }
    }

    public function agendaConsulta(Procedimento $procedimento, DateTime $dataHora): bool
    {
        $disponivel = false;
        $horarios = $this->dias[$dataHora->format('d/m/y')];
        $duracao = $procedimento->getTempoEstimado();

        $inicio = clone $dataHora;
        if ($inicio->format('i') >= "30") {
            $inicio->setTime($inicio->format('H'), 30, 0);
        } else {
            $inicio->setTime($inicio->format('H'), 0, 0);
        }
        $inicio = $inicio->format('H:i');

        $fim = clone $dataHora;
        $fim->add(new DateInterval('PT' . $duracao . 'M'));
        if ($fim->format('i') > "30") {
            $fim->setTime($fim->format('H'), 30);
        } else {
            $fim->setTime($fim->format('H'), 0);
        }
        $fim = $fim->format('H:i');

        foreach ($horarios as $hora => $disponibilidade) {
            if ($hora < $inicio) {
                continue;
            }
            if ($hora == $fim && $disponibilidade) {
                $disponivel = true;
                break;
            }
            if (!$disponibilidade) {
                $disponivel = false;
                break;
            }
        }

        if ($disponivel) {
            foreach ($horarios as $hora => $disponibilidade) {
                if ($hora < $inicio) {
                    continue;
                }
                $this->dias[$dataHora->format('d/m/y')][$hora] = false;
                if ($hora == $fim) {
                    break;
                }
            }
        }

        return $disponivel;
    }

    public function abrirAgenda(DateTime $data, string $horario)
    {
        $horarios = explode(',', $horario);
        foreach ($horarios as $hora) {
            $hora = trim($hora);
            $hora = explode('-', $hora);
            $horaInicial = new DateTime($hora[0]);
            $horaFinal = new DateTime($hora[1]);
            while ($horaInicial < $horaFinal) {
                $this->dias[$data->format('d/m/y')][$horaInicial->format("H:i")] = true;
                $horaInicial->add(new DateInterval('PT30M'));
            }
            $this->dias[$data->format('d/m/y')][$horaFinal->format("H:i")] = false;
        }
        ksort($this->dias[$data->format('d/m/y')]);
    }

    public function fecharAgenda(DateTime $data, string|null $horario = null)
    {
        if ($horario == null) {
            $this->dias[$data->format('d/m/y')] = array();
            return;
        }
        $horarios = explode(',', $horario);
        foreach ($horarios as $hora) {
            $hora = trim($hora);
            $hora = explode('-', $hora);
            $horaInicial = new DateTime($hora[0]);
            $horaFinal = new DateTime($hora[1]);
            while ($horaInicial < $horaFinal) {
                $this->dias[$data->format('d/m/y')][$horaInicial->format("H:i")] = false;
                $horaInicial->add(new DateInterval('PT30M'));
            }
        }
    }

    public function getDias(DateTime|null $mes = null): array
    {
        if ($mes == null) {
            return $this->dias;
        }

        $dias = array();

        foreach ($this->dias as $data => $horarios) {
            $data = DateTime::createFromFormat('d/m/y', $data);
            if ($data->format('m') == $mes->format('m') && $data->format('y') == $mes->format('y')) {
                $dias[$data->format('d/m/y')] = $horarios;
            }
        }
        return $dias;
    }

    static public function rotinaAutomatica(DateTime $mes)
    {
        $parceiros = DentistaParceiro::getRecords();
        $funcionarios = DentistaFuncionario::getRecords();

        foreach ($parceiros as $parceiro) {
            $parceiro->getAgenda()->criaAgendaMes($mes);
            $parceiro->save();
        }
        foreach ($funcionarios as $funcionario) {
            $funcionario->getAgenda()->criaAgendaMes($mes);
            $funcionario->save();
        }
    }
    
}
