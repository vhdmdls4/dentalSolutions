<?php

require_once '../global.php';


// $perfil1 = new Perfil("admin", [""]);
// $perfil2 = new Perfil("dentista", [
//   "Alterar orcamento",
//   "Alterar procedimento",
//   "Cadastrar consulta",
//   "Alterar consulta",
// ]);


// $perfil3 = new Perfil("funcionario", [
//   "Cadastrar orcamento",
//   "Alterar orcamento",
//   "Cadastrar procedimento",
//   "Alterar procedimento",
//   "Cadastrar consulta",
//   "Alterar consulta",
//   "Cadastrar cliente",
//   "Alterar cliente",
//   "Cadastrar paciente",
//   "Alterar paciente",
//   "Cadastrar especialidade",
//   "Alterar especialidade",
//   "Cadastrar profissional",
//   "Alterar profissional",
//   "Cadastrar funcionario",
//   "Alterar funcionario"
// ]);

// $usuario = new Usuario("admin", "123", "admin@admin.com", $perfil1);
// $usuario1 = new Usuario('dentista', '123', 'dentista@dentista.com', $perfil2);
// $usuario2 = new Usuario('funcionario', '123', 'funcionario@funcionario.com', $perfil3);

// $arrayNomesFuncionalidades = [
//   "Cadastrar orcamento",
//   "Alterar orcamento",
//   "Cadastrar usuario",
//   "Alterar usuario",
//   "Cadastrar procedimento",
//   "Alterar procedimento",
//   "Cadastrar consulta",
//   "Alterar consulta",
//   "Cadastrar cliente",
//   "Alterar cliente",
//   "Cadastrar paciente",
//   "Alterar paciente",
//   "Cadastrar especialidade",
//   "Alterar especialidade",
//   "Cadastrar profissional",
//   "Alterar profissional",
//   "Cadastrar funcionario",
//   "Alterar funcionario"
// ];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['floatingInput'];
    $senha = $_POST['floatingPassword'];

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
