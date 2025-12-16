<?php

    namespace App\Models;

    class Filme {
        private int $id;
        private int $id_usuario; 
        private string $titulo;
        private float $nota;    
        private string $imagem;  

        // getters e setters

        public function getId() 
        {
            return $this->id;
        }

        public function setId(int $id) 
        {
            $this->id = $id;
        }

        public function getIdUsuario()
        {
            return $this->id_usuario;
        }

        public function setIdUsuario(int $id_usuario)
        {
            $this->id_usuario = $id_usuario;
        }

        public function getTitulo()
        {
            return $this->titulo;
        }

        public function setTitulo(string $titulo)
        {
            $this->titulo = $titulo;
        }

        public function getNota()
        {
            return $this->nota;
        }

        public function setNota(float $nota)
        {
            if ($nota < 0 || $nota > 10) {
                throw new \Exception("A nota deve ser entre 0 e 10");
            }
            $this->nota = $nota;
        }

        public function getImagem()
        {
            return $this->imagem;
        }

        public function setImagem(string $imagem)
        {
            $this->imagem = $imagem;
        }
    }