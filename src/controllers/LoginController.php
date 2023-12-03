<?php

require_once '../global.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['floatingInput'];
    $senha = $_POST['floatingPassword'];

    $perfil = new Perfil("admin", ["Acesso total"]);
    $usuario = new Usuario("admin", "senha123", "admin@example.com", $perfil);

    // Verificar se o usuário é válido
    if ($usuario->getEmail() == $email && $usuario->getSenha() == $senha) {
      // Criar uma instância de Login e realizar o login
      $login = Login::getInstance();
      $login->logar($usuario);

      // Redirecionar para alguma página de sucesso
      header("Location: dashboard.php"); // Substitua 'dashboard.php' pela página desejada
      exit();
    } else {
      // Caso as credenciais sejam inválidas, você pode redirecionar para uma página de erro
      header("Location: login.php?error=invalid"); // Substitua 'login.php' pela página de login e adicione o parâmetro de erro
      exit();
    }
  }
}
