<?php 

    namespace App\Models;

    class User{
        public function __construct(
            private int $id_usuario = 0, private string $nome = "", private string $email = "", private string $senha = ""
        )
        {}

        // Getters

        public function getId()
        {
            return $this->id_usuario;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getSenha()
        {
            return $this->senha;
        }

        // Setters

        public function setNome($nome) 
        {
            $this->nome = $nome;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setSenha($senha)
        {
            $this->senha = $senha;
        }
    }
