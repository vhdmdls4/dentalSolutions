<?php 
require_once('./index.php');

$nome = "João da Silva";
$email = "joaosilva@dentesoft.com";
$telefone = "123-456-7890";
$endereco = "Av. Pres. Antônio Carlos, 6627 - Pampulha, Belo Horizonte - MG, 31270-901";
$especialidades = "Odontopediatria, Clínico Geral";
$perfil = "Administrador";

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h1>Informações do Usuário</h1>

    <div class="alert alert-warning mt-3" role="alert">
        Esta página está em implementação. Algumas funcionalidades podem não estar disponíveis ou apresentar dados imprecisos.
    </div>

    <div class="card">
        <div class="card-body">
            <i class="bi bi-person"></i> 
            <h5 class="card-title"><?php echo $nome; ?></h5>
            <p class="card-text"><strong>E-mail:</strong> <?php echo $email; ?></p>
            <p class="card-text"><strong>Telefone:</strong> <?php echo $telefone; ?></p>
            <p class="card-text"><strong>Endereço:</strong> <?php echo $endereco; ?></p>
            <p class="card-text"><strong>Especialidades:</strong> <?php echo $especialidades; ?></p>
            <p class="card-text"><strong>Perfil:</strong> <?php echo $perfil; ?></p>
            <a disabled class="btn btn-primary" title="Funcionalidade ainda em implementação" style="cursor: not-allowed;"><i class="bi bi-pencil"></i></a>
        </div>
    </div>

    <script>
        document.getElementById('editarIcon').addEventListener('click', function() {
            alert('Funcionalidade em implementação.');
        });
    </script>

</main>

<?php require_once('./footer.php'); ?>
