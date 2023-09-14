<?php

class Menu {
    public function exibirMenu() {
        echo "Menu:\n";
        echo "1. Consultar Pessoas\n";
        echo "2. Cadastrar Pessoa\n";
        echo "3. Sair\n";
    }
    
    public function lerOpcao() {
        echo "Digite a opção desejada: ";
        $opcao = trim(fgets(STDIN));
        return $opcao;
    }
}

$menu = new Menu();

while (true) {
    $menu->exibirMenu();
    $opcao = $menu->lerOpcao();

    if ($opcao == 1) {
        $filename = "dataFiles/pessoa.txt";
        $pessoas = file_get_contents($filename);
    
        if (empty($pessoas)) {
            echo "Não há cadastros.\n";
        } else {
            echo "Lista de Pessoas:\n";
            echo "\n";
            echo $pessoas;
        }
    
        // Limpe o buffer de saída e force a exibição imediata
        flush();
    } else if ($opcao == 2) {
        include_once("Pessoa.php");
        $pessoa = new Pessoa("", "", "", "");
        $pessoa->cadastrarPessoa();
        $pessoa->salvarPessoa("dataFiles/pessoa.txt");
    } else if ($opcao == 3) {
        break;
    } else {
        echo "Opção inválida.\n";
    }
}