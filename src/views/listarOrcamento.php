<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 2000px;">

  <h2 class="mt-5" aria-label="Criação de Orçamentos">Listar Orçamentos</h2>
  <form id="listarOrcamentos" action="" aria-label="Formulário de Criação de Orçamentos" title="Formulário de Criação de Orçamentos">
    <?php
    require_once '../global.php';
    $orcamentosDB = Orcamento::getRecords();
    $orcamentos = [];

    foreach ($orcamentosDB as $orcamento) {
      $procedimentosNames = [];
      foreach ($orcamento->getProcedimentosName() as $procedimento) {
        $procedimentosNames[] = $procedimento;
      }

      $orcamentos[] = [
        'paciente' => $orcamento->getPaciente()->getNome(),
        'dentistaResponsavel' => $orcamento->getDentistaResponsavel()->getNome(),
        'dataOrcamento' => $orcamento->getDataOrcamento()->format('Y-m-d H:i:s'),
        'procedimentos' => $procedimentosNames,
        'descricao' => $orcamento->getDescricao(),
      ];
    }
    // END: be15d9bcejpp

    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Paciente</th>';
    echo '<th scope="col">Dentista Responsável</th>';
    echo '<th scope="col">Data do Orçamento</th>';
    echo '<th scope="col">Procedimentos</th>';
    echo '<th scope="col">Descrição</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($orcamentos as $orcamento) {
      echo '<tr>';
      echo '<td scope="row">' . $orcamento['paciente'] . '</td>';
      echo '<td>' . $orcamento['dentistaResponsavel'] . '</td>';
      echo '<td>' . $orcamento['dataOrcamento'] . '</td>';
      echo '<td>' . implode(', ', $orcamento['procedimentos']) . '</td>';
      echo '<td>' . $orcamento['descricao'] . '</td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script type="module">
    import {
      handleFormGetSubmit
    } from './js/index.js';

    handleFormGetSubmit('listarOrcamentos', '../controllers/OrcamentoController.php');
  </script>
</main>

<?php require_once('./footer.php'); ?>




foreach ($orcamentosDB as $orcamento) {
$orcamentos[] = [
'paciente' => $orcamento->getPaciente()->getNome(),
'dentistaResponsavel' => $orcamento->getDentistaResponsavel()->getNome(),
'dataOrcamento' => $orcamento->getDataOrcamento()->format('Y-m-d H:i:s'),
'procedimentos' => ,
'descricao' => $orcamento->getDescricao(),
];
}

echo '<table class="table">';
  echo '<thead>';
    echo '<tr>';
      echo '<th scope="col">Paciente</th>';
      echo '<th scope="col">Dentista Responsável</th>';
      echo '<th scope="col">Data do Orçamento</th>';
      echo '<th scope="col">Procedimentos</th>';
      echo '<th scope="col">Descrição</th>';
      echo '</tr>';
    echo '</thead>';
  echo '<tbody>';

    foreach ($orcamentos as $orcamento) {
    echo '<tr>';
      echo '<td scope="row">' . $orcamento['paciente'] . '</td>';
      echo '<td>' . $orcamento['dentistaResponsavel'] . '</td>';
      echo '<td>' . $orcamento['dataOrcamento'] . '</td>';
      echo '<td>' . $orcamento['procedimentos'] . '</td>';
      echo '<td>' . $orcamento['descricao'] . '</td>';
      echo '</tr>';
    }

    echo '</tbody>';
  echo '</table>';
?>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="module">
  import {
    handleFormGetSubmit
  } from './js/index.js';

  handleFormGetSubmit('listarOrcamentos', '../controllers/OrcamentoController.php');
</script>
</main>

<?php require_once('./footer.php'); ?>