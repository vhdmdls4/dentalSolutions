<?php require('./navbarHome.php'); ?>

<style>
  .centered-buttons {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
  }

  .centered-buttons .btn {
    margin: 10px;
    width: 200px;
    height: 100px;
    text-decoration: none;
    transition: transform 0.1s ease-in-out;
    position: relative;
  }

  .centered-buttons .btn:hover {
    text-decoration: none;
    transform: scale(1.05);
  }

  .centered-buttons .btn .bi {
    margin-left: 10px;
  }

  .centered-buttons .btn .text-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
  }

  #agenda-options,
  #cadastro-options,
  #visualizar-options {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 100%;
    left: 50%;
    /* Posicionando o menu no centro do botão */
    transform: translateX(-50%);
    /* Centralizando horizontalmente */
    background-color: rgba(200, 200, 200, 0.9);
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    font-size: 13px;
    width: 150px;
  }

  #agenda-options a,
  #cadastro-options a,
  #visualizar-options a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #000;
    text-align: center;
    width: 100%;
  }
</style>

<div class="centered-buttons">
  <div class="btn btn-primary btn-lg" id="agenda-btn">
    <div class="text-container">
      Agenda <span class="bi bi-calendar3"></span>
    </div>
    <div id="agenda-options" class="agenda-options">
      <a href="agenda.php"> Calendário Mensal</a>
      <a href="agenda_dentista.php">Dentista</a>
    </div>
  </div>

  <div class="btn btn-primary btn-lg" id="cadastro-btn">
    <div class="text-container">
      Cadastrar <span class="bi bi-person-plus"></span>
    </div>
    <div id="cadastro-options" class="cadastro-options">
      <a href="cadastrar_cliente.php">Cliente</a>
      <a href="cadastrar_dentista.php">Dentista Funcionário</a>
      <a href="cadastrar_dentistaParceiro.php">Dentista Parceiro</a>
      <a href="cadastrar_especialidade.php">Especialidade</a>
      <a href="cadastrar_funcionario.php">Funcionário</a>
      <a href="cadastrar_paciente.php">Paciente</a>
      <a href="cadastrar_procedimento.php">Procedimento</a>
      <a href="cadastrar_usuario.php">Usuário</a>
    </div>
  </div>

  <a href="criarOrcamento.php" class="btn btn-primary btn-lg">
    <div class="text-container">
      Criar Orçamento <span class="bi bi-cash"></span>
    </div>
  </a>

  <a href="simulacao_parcelas.php" class="btn btn-primary btn-lg">
    <div class="text-container">
      Simulador de Tarifas <span class="bi bi-percent"></span>
    </div>
  </a>

  <!--<div class="btn btn-primary btn-lg" id="visualizar-btn">
    <div class="text-container">
      Visualizar <span class="bi bi-eye"></span>
    </div>
    <div id="visualizar-options" class="visualizar-options">
      <a href="visualizar_clientes.php">Clientes</a>
      <a href="visualizar_orcamentos.php">Orçamentos</a>
      <a href="visualizar_procedimentos.php">Procedimentos</a>
      <a href="simulacao_parcelas.php">Simulador de Tarifas</a>
    </div>
  </div>-->

  <a href="informacoes_usuario.php" class="btn btn-primary btn-lg">
    <div class="text-container">
      Meus Dados <span class="bi bi-person-vcard"></span>
    </div>
  </a>
</div>

<?php require_once('./footer.php'); ?>

<script>
  var cadastroTimeoutId;

  document.getElementById('cadastro-btn').addEventListener('mouseenter', function() {
    clearTimeout(cadastroTimeoutId);
    document.getElementById('cadastro-options').style.display = 'flex';
  });

  document.getElementById('cadastro-btn').addEventListener('mouseleave', function() {
    cadastroTimeoutId = setTimeout(function() {
      document.getElementById('cadastro-options').style.display = 'none';
    }, 200);
  });

  document.getElementById('cadastro-options').addEventListener('mouseenter', function() {
    clearTimeout(cadastroTimeoutId);
  });

  document.getElementById('cadastro-options').addEventListener('mouseleave', function() {
    document.getElementById('cadastro-options').style.display = 'none';
  });
</script>

<script>
  var visualizarTimeoutId;

  document.getElementById('visualizar-btn').addEventListener('mouseenter', function() {
    clearTimeout(visualizarTimeoutId);
    document.getElementById('visualizar-options').style.display = 'flex';
  });

  document.getElementById('visualizar-btn').addEventListener('mouseleave', function() {
    visualizarTimeoutId = setTimeout(function() {
      document.getElementById('visualizar-options').style.display = 'none';
    }, 200);
  });

  document.getElementById('visualizar-options').addEventListener('mouseenter', function() {
    clearTimeout(visualizarTimeoutId);
  });

  document.getElementById('visualizar-options').addEventListener('mouseleave', function() {
    document.getElementById('visualizar-options').style.display = 'none';
  });

  document.getElementById('agenda-options').addEventListener('mouseenter', function() {
    clearTimeout(visualizarTimeoutId);
  });

  document.getElementById('agenda-options').addEventListener('mouseleave', function() {
    document.getElementById('agenda-options').style.display = 'none';
  });
</script>

<script>
  var agendaTimeoutId;

  document.getElementById('agenda-btn').addEventListener('mouseenter', function() {
    clearTimeout(agendaTimeoutId);
    document.getElementById('agenda-options').style.display = 'flex';
  });

  document.getElementById('agenda-btn').addEventListener('mouseleave', function() {
    agendaTimeoutId = setTimeout(function() {
      document.getElementById('agenda-options').style.display = 'none';
    }, 200);
  });

  document.getElementById('agenda-options').addEventListener('mouseenter', function() {
    clearTimeout(agendaTimeoutId);
  });

  document.getElementById('agenda-options').addEventListener('mouseleave', function() {
    document.getElementById('agenda-options').style.display = 'none';
  });
</script>