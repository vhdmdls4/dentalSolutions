<?php

require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
// FILEPATH: /c:/Users/vhdua/Desktop/dev/dentalSolutions/tests/ClienteTest.php

require './src/class.Cliente.php';

class ClienteTest extends TestCase
{
  public function testConstruct()
  {
    $nome = 'Test Name';
    $telefone = '1234567890';
    $email = 'test@example.com';
    $cpf = '12345678901';
    $rg = '123456789';

    $cliente = new Cliente($nome, $telefone, $email, $cpf, $rg);

    $this->assertEquals($nome, $cliente->$nome);
    $this->assertEquals($telefone, $cliente->$telefone);
    $this->assertEquals($email, $cliente->$email);
    $this->assertEquals($cpf, $cliente->$cpf);
    $this->assertEquals($rg, $cliente->$rg);
  }

  public function testInvalidParameters()
  {
    $this->expectException(InvalidArgumentException::class);

    $nome = '';
    $telefone = '';
    $email = '';
    $cpf = '';
    $rg = '';

    $cliente = new Cliente($nome, $telefone, $email, $cpf, $rg);
  }

  public function testInvalidCPF()
  {
    $this->expectException(InvalidArgumentException::class);

    $nome = 'Test Name';
    $telefone = '1234567890';
    $email = 'test@example.com';
    $cpf = 'invalid cpf';
    $rg = '123456789';

    $cliente = new Cliente($nome, $telefone, $email, $cpf, $rg);

    echo $cliente;
  }

  public function testGetFilename()
  {
    $this->assertEquals('clientes.txt', Cliente::getFilename());
  }
}

// é possível testar com o comando na raiz do projeto : 
// vendor/bin/phpunit
