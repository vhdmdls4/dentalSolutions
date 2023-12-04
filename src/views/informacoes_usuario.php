<?php 
require_once('./index.php');

// Dados do usuário (substitua com seus dados reais ou obtenha essas informações de algum lugar)
$nome = "Nome do Usuário";
$email = "usuario@example.com";
$telefone = "123-456-7890";
$endereco = "Rua Exemplo, 123";
$especialidades = "Especialidade 1, Especialidade 2";

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h1>Informações do Usuário</h1>

    <div class="card">
        <div class="card-body">
            <i class="bi bi-person"></i> 
            <h5 class="card-title"><?php echo $nome; ?></h5>
            <p class="card-text"><strong>E-mail:</strong> <?php echo $email; ?></p>
            <p class="card-text"><strong>Telefone:</strong> <?php echo $telefone; ?></p>
            <p class="card-text"><strong>Endereço:</strong> <?php echo $endereco; ?></p>
            <p class="card-text"><strong>Especialidades:</strong> <?php echo $especialidades; ?></p>
            <a disabled id=editarIcon class="btn btn-primary" title="Funcionalidade ainda em implementação"><i class="bi bi-pencil"></i></a>
        </div>
    </div>

    <script>
        document.getElementById('editarIcon').addEventListener('click', function() {
            alert('Funcionalidade em fase de implementação.');
        });
    </script>

</main>

<?php require_once('./footer.php'); ?>
