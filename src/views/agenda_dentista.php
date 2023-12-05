<?php require('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 800px;">
    <h1>Visualizar Agenda da Clínica</h1>
    <div class="alert alert-warning mt-3" role="alert">
        Esta página está em implementação. Algumas funcionalidades podem não estar disponíveis.
    </div>
    <!-- Display the schedule for the selected dentist here -->
    <div id="calendar" style="height: 600px;"></div>
</main>

<?php require_once('./footer.php'); ?>

<!-- Add this to the head section of your HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

<script>
    function updateCalendar() {
        var selectedDentist = $('#dentista').val();

        // Make an AJAX request to fetch the schedule for the selected dentist
        $.ajax({
            url: 'get_schedule.php', // Replace with the actual endpoint to fetch schedule
            method: 'POST',
            data: {dentist: selectedDentist},
            success: function (response) {
                // Parse the response and update the calendar events
                var events = JSON.parse(response);

                $('#calendar').fullCalendar('destroy'); // Destroy existing calendar instance
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'
                    },
                    contentHeight: 600, // Adjust the height as needed
                    events: events
                });
            },
            error: function (error) {
                console.log('Error fetching schedule:', error);
            }
        });
    }
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
            contentHeight: 600,
            events: [
                {
                    title: 'Consulta Dr. Victor Hugo',
                    description: 'Paciente: José da Silva \nProcedimneto: Limpeza Simples',
                    start: '2023-12-05T10:00:00',
                    end: '2023-12-05T11:30:00'
                },
                {
                    title: 'Consulta Dr. Victor Hugo',
                    description: 'Paciente: Maria da Silva \nProcedimento: Limpeza Geral',
                    start: '2023-12-15T14:00:00',
                    end: '2023-12-15T15:30:00'
                },
                {
                    title: 'Consulta Dr. Henrique',
                    description: 'Paciente: Lucas da Silva \nProcedimento: Remoção de Siso',
                    start: '2023-12-08T11:00:00',
                    end: '2023-12-08T12:30:00'
                },
                {
                    title: 'Consulta Dr. Henrique',
                    description: 'Paciente: Pedro da Silva \nProcedimento: Restauração',
                    start: '2023-12-20T13:00:00',
                    end: '2023-12-20T16:30:00'
                },
                {
                    title: 'Consulta Dr. Victor Hugo',
                    description: 'Paciente: Luiz da Silva \nProcedimento: Clareamento',
                    start: '2023-12-05T15:00:00',
                    end: '2023-12-05T17:30:00'
                }
            ],
            eventClick: function (calEvent, jsEvent, view) {
            var formattedStartDate = calEvent.start.format('DD/MM/YYYY HH:mm');
            var formattedEndDate = calEvent.end.format('DD/MM/YYYY HH:mm');
            alert('Título: ' + calEvent.title + '\nInício: ' + formattedStartDate + '\nFim: ' + formattedEndDate + '\nDescrição: ' + calEvent.description);
            }
        
        });
        
    });
</script>
