<?php require('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Calendário</h1>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>

    <style>
        .calendar-inline {
        display: flex;
        justify-content: center;
        align-items: center;
        }
    </style>

    <div class="calendar-inline" id="calendario"></div>

    <script>
        // Inicialize o Flatpickr no modo inline, configurando o idioma para português
        flatpickr("#calendario", {
            inline: true,
            locale: "pt",
            // Adicione opções de configuração do Flatpickr aqui, se necessário
        });
    </script>

</main>

<?php require_once('./footer.php'); ?>