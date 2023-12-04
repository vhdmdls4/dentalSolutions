<?php
require_once('./index.php');

$nome = "Nome do Usuário";
$email = "usuario@example.com";
$telefone = "123-456-7890";
$endereco = "Rua Exemplo, 123";
$especialidades = "Especialidade 1, Especialidade 2";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $especialidades = $_POST["especialidades"];
}

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h1>Editar Dados do Usuário</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone; ?>">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $endereco; ?>">
        </div>
        <div class="mb-3">
            <label for="especialidades" class="form-label">Especialidades:</label>
            <textarea class="form-control" id="especialidades" name="especialidades"><?php echo $especialidades; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

</main>

<?php require_once('./footer.php'); ?>
