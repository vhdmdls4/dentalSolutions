<?php

class DentistaParceiro extends Dentista
{
  protected array $renda;

  public function __construct(string $cro, string $nome, string $telefone, string $email,  string $CPF, Endereco $endereco, $habilitacoes, Agenda $agenda)
  {
    parent::__construct($cro, $nome, $telefone, $email, $CPF, $endereco, $habilitacoes, $agenda);
    $this->renda = array();
  }

  static public function getFilename()
  {
    return 'DentistaParceiro.txt';
  }

  public function addRenda(Procedimento $procedimento, DateTime $data)
  {
    $participacao = $this->getComissao($procedimento->getEspecialidade());
    if (!isset($this->renda[$data->format('d/m/y')])) {
      $this->renda[$data->format('d/m/y')] = $procedimento->getValorUnitario() * $participacao;
    } else {
      $this->renda[$data->format('d/m/y')] += $procedimento->getValorUnitario() * $participacao;
    }
  }

  public function getRenda(DateTime $dataInicial, DateTime|null $dataFinal = null): float
  {
    $renda = 0.0;
    $data = clone $dataInicial;

    if ($dataFinal) {
      while ($data <= $dataFinal) {
        $renda += $this->renda[$data->format('d/m/y')] ?? 0.0;
        $data->add(new DateInterval('P1D'));
      }
      return $renda;
    }

    $dataFinal = clone $dataInicial;
    $dataFinal->add(new DateInterval('P1M'));

    while ($data < $dataFinal) {
      $renda += $this->renda[$data->format('d/m/y')] ?? 0.0;
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
