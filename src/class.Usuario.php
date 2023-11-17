<?php

class Usuario
{

    protected string $login;
    protected string $senha;
    protected string $email;
    protected Perfil $perfil;

    public function __construct(string $login, string $senha, string $email, Perfil $perfil)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->email = $email;
        $this->perfil = $perfil;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login)
    {
        $this->login = $login;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }
}
