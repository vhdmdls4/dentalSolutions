<?php require('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Visualizar Agenda por Dentista</h1>
    <form action="processar_agenda.php" method="post">
        <label for="dentista">Selecione o Dentista:</label>
        <select name="dentista" id="dentista">
            <option value="dentista1">Dentista 1</option>
            <option value="dentista2">Dentista 2</option>
            <!-- Configurar corretamente exibição dos dentistas cadastrados-->
        </select>
        <button type="submit">Visualizar Agenda</button>
    </form>

</main>

<?php require('./footer.php'); ?>
