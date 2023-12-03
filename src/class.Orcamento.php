<?php

require_once 'persist.php';
require_once 'class.Profissional.php';

class Orcamento extends persist
{
    protected Paciente $paciente;
    protected Dentista $dentistaResponsavel;
    protected DateTime $dataOrcamento;
    protected array $procedimentos = array();
    protected float $valorTotal = 0;
    protected bool $tratamentoAprovado = false;
    protected Pagamento $pagamento;
    protected string $descricao;
    protected array $consultas = array();

    public function __construct(
        Paciente $paciente,
        Dentista $dentistaResponsavel,
        DateTime $dataOrcamento,
        array $procedimentos,
        float $valorTotal,
        Pagamento $pagamento,
        string $descricao,
        array $consultas
    ) {
        $this->paciente = $paciente;
        $this->dentistaResponsavel = $dentistaResponsavel;
        $this->dataOrcamento = $dataOrcamento;
        $this->procedimentos = $procedimentos;
        $this->valorTotal = $valorTotal;
        $this->pagamento = $pagamento;
        $this->descricao = $descricao;
        $this->consultas = $consultas;
    }

    // function __destruct()
    // {
    //     print "Destroying " . __CLASS__ . "\n";
    // }

    static public function getFilename()
    {
        return 'Orcamento.txt';
    }


    public function aprovaTratamento(Pagamento $pagamento)
    {
        $this->tratamentoAprovado = true;
        $this->pagamento = $pagamento;
    }

    public function addProcedimento(Procedimento $procedimento, bool $realizado, DateTime $dataConclusão)
    {
        $procedimentoMap = [
            'realizado' => $realizado,
            'dataConclusão' => $dataConclusão,
            'procedimentoRealizado' => $procedimento,
        ];
        array_push($this->procedimentos, $procedimentoMap);
    }

    public function getProcedimentos(): array
    {
        $procedimentosData = [];
        foreach ($this->procedimentos as $procedimento) {
            $procedimentoData = [
                'realizado' => $procedimento['realizado'],
                'dataConclusao' => $procedimento['dataConclusao'],
                'procedimentoRealizado' => $procedimento['procedimentoRealizado'],
            ];
            $procedimentosData[] = $procedimentoData;
        }
        return $procedimentosData;
    }

    public function delProcedimento(Procedimento $procedimento)
    {
        foreach ($this->procedimentos as $key => $procedimentoMap) {
            if ($procedimentoMap['procedimentoRealizado'] === $procedimento) {
                unset($this->procedimentos[$key]);
                break;
            }
        }
    }

    public function valorParcelas(): float
    {
        return $this->valorTotal / $this->pagamento->getForma()->getParcelas();
    }

    public function getValorTotal(): float
    {
        return $this->valorTotal;
    }

    public function getPaciente(): Paciente
    {
        return $this->paciente;
    }

    public function getDentistaResponsavel(): Dentista
    {
        return $this->dentistaResponsavel;
    }

    public function getDataOrcamento(): DateTime
    {
        return $this->dataOrcamento;
    }

    public function getTratamentoAprovado(): bool
    {
        return $this->tratamentoAprovado;
    }

    public function getPagamento(): Pagamento
    {
        return $this->pagamento;
    }

    public function setPagamento(Pagamento $pagamento)
    {
        $this->pagamento = $pagamento;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getConsultas(): array
    {
        return $this->consultas;
    }

    public function addConsulta(Consulta $consulta)
    {
        array_push($this->consultas, $consulta);
    }

    public function delConsulta(Consulta $consulta)
    {
        $key = array_search($consulta, $this->consultas);
        if ($key === false) {
            return;
        }
        unset($this->consultas[$key]);
    }
}


/*
$procedimentoObjeto1 = new Procedimento('limpeza', 'limpa', 32.3, 32);
$procedimentoObjeto2 = new Procedimento('clareamento', 'limpa', 37.3, 10);
$procedimentoObjeto3 = new Procedimento('transplante', 'limpa', 64.3, 50);
$procedimentoObjeto4 = new Procedimento('remoção de dente', 'limpa', 22.3, 20);

$dataAnterior = (new DateTime())->sub(new DateInterval('P10D'));
$hoje = new DateTime();

$procedimentos1 = [
    [
        'realizado' => true,
        'dataConclusao' => $hoje,
        'procedimentoRealizado' => $procedimentoObjeto1,
    ],
    [
        'realizado' => false,
        'dataConclusao' => $hoje,
        'procedimentoRealizado' => $procedimentoObjeto2,
    ],
];

echo "<pre>";
echo "<br><hr>";

$procedimentos2 = [
    [
        'realizado' => true,
        'dataConclusao' => $dataAnterior,
        'procedimentoRealizado' => $procedimentoObjeto3
    ],
    [
        'realizado' => true,
        'dataConclusao' => $dataAnterior,
        'procedimentoRealizado' => $procedimentoObjeto4
    ],
];

$orcamento1 = new Orcamento($procedimentos1, 345);

$orcamento2 = new Orcamento($procedimentos2, 245);

function contarProcedimentosRealizados(array $procedimentos): int
{
    $realizados = array_filter($procedimentos, function ($procedimento) {
        return $procedimento['realizado'] === true;
    });

    return count($realizados);
}

$totalRealizados1 = contarProcedimentosRealizados($procedimentos1);
$totalRealizados2 = contarProcedimentosRealizados($procedimentos2);

echo "Total de procedimentos realizados no primeiro array: $totalRealizados1\n";
echo "<br>Total de procedimentos realizados no segundo array: $totalRealizados2\n";


function filtrarPorIntervaloDeDatas(array $procedimentos, DateTime $dataInicio, DateTime $dataFim): array
{
    return array_filter($procedimentos, function ($procedimento) use ($dataInicio, $dataFim) {
        $dataConclusao = $procedimento['dataConclusao'];
        return $dataConclusao >= $dataInicio && $dataConclusao <= $dataFim;
    });
}


$dataInicio = (new DateTime())->sub(new DateInterval('P7D'));
$dataFim = new DateTime();

$resultado1 = filtrarPorIntervaloDeDatas($procedimentos1, $dataInicio, $dataFim);
$resultado2 = filtrarPorIntervaloDeDatas($procedimentos2, $dataInicio, $dataFim);

echo "<br><br>Procedimentos no intervalo para o primeiro array: " . count($resultado1) . "\n";
echo "<br>Procedimentos no intervalo para o segundo array: " . count($resultado2) . "\n";


echo "<br><br>";

echo "<hr>";

?>

<table border="1">
    <thead>
        <tr>
            <th>Procedimento</th>
            <th>Realizado</th>
            <th>Data de Conclusão</th>
        </tr>
    </thead>
    <tbody id="tabelaProcedimentos">
        <!-- Aqui serão inseridos os procedimentos -->
    </tbody>
</table>

<button onclick="filtrarPorData('primeiro')">Filtrar por Primeira Data</button>
<button onclick="filtrarPorData('segundo')">Filtrar por Segunda Data</button>

<script>
    function filtrarPorData(arraySelecionado) {
        const tabela = document.getElementById('tabelaProcedimentos');
        tabela.innerHTML = '';

        let procedimentos;
        if (arraySelecionado === 'primeiro') {
            procedimentos = <?php echo json_encode($orcamento1->getProcedimentos()); ?>;
        } else if (arraySelecionado === 'segundo') {
            procedimentos = <?php echo json_encode($orcamento2->getProcedimentos()); ?>;
        }

        procedimentos.forEach(procedimento => {
            const tr = document.createElement('tr');
            const realizado = procedimento['realizado'] ? 'Sim' : 'Não';
            const dataConclusao = new Date(procedimento['dataConclusao']).toLocaleDateString();

            tr.innerHTML = `
                <td>${procedimento['procedimentoRealizado']}</td>
                <td>${realizado}</td>
                <td>${dataConclusao}</td>
            `;

            tabela.appendChild(tr);
        });
    }
</script>
*/