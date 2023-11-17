<?php

class dentistaParceiro extends Dentista
{
  private array $renda;

  public function __construct($cro, $nome, $telefone, $email, $CPF, $endereco)
  {
    parent::__construct($cro, $nome, $telefone, $email, $CPF, $endereco);
    $this->renda = array();
  }

  //ver se é necessário
  // static public function getFilename()
  // {
  //   return 'dentistas.txt';
  // }

  public function addRenda(Procedimentos $procedimento, DateTime $data): void
  {
    $participacao = $this->getComissao($procedimento->getEspecialidade());
    if (!isset($this->renda[$data->format('d/m/Y')])) {
      $this->renda[$data->format('d/m/Y')] = $procedimento->getValorUnitario() * $participacao;
    } else {
      $this->renda[$data->format('d/m/Y')] += $procedimento->getValorUnitario() * $participacao;
    }
  }

  public function getRenda(DateTime $dataInicial, DateTime $dataFinal = null): float
  {
    $renda = 0.0;
    $data = clone $dataInicial;

    if ($dataFinal) {
      while ($data <= $dataFinal) {
        $renda += $this->renda[$data->format('d/m/Y')] ?? 0.0;
        $data->add(new DateInterval('P1D'));
      }
      return $renda;
    }

    $dataFinal = clone $dataInicial;
    $dataFinal->add(new DateInterval('P1M'));

    while ($data < $dataFinal) {
      $renda += $this->renda[$data->format('d/m/Y')] ?? 0.0;
      $data->add(new DateInterval('P1D'));
    }
    return $renda;
  }

  public function getComissao(Especialidade $especialidade): float
  {
    $habilitacao = $this->habilitacoes[$especialidade->getNome()] ?? null;
    return $habilitacao ? $habilitacao->getComissao() : 0.0;
  }

  public function exibirPessoa()
  {

    $cpfFormatado = substr($this->CPF, 0, 3) . '.' . substr($this->CPF, 3, 3) . '.' . substr($this->CPF, 6, 3) . '-' . substr($this->CPF, 9, 2);

    echo "Nome: " . $this->nome . "\n";
    echo "Telefone: " . $this->telefone . "\n";
    echo "CPF: " . $cpfFormatado . "\n";
    echo "e-mail: " . $this->email . "\n";
    echo "Cro: " . $this->cro . "\n";
    echo "Especialidades: " . $this->getEspecialidades() . "\n";
  }
}
