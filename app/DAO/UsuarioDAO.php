<?php

namespace App\DAO;

use App\Models\User;
use Core\Database;
use PDO;
use PDOException;

    class UsuarioDAO{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function buscarPorEmail($email)
        {
            try
            {
                $sql = "SELECT * FROM usuarios WHERE email = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$email]);

                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e)
            {
                return false;
            }
        }

        public function inserir(User $usuario) 
        {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            
            $stmt = $this->db->prepare($sql);
            
            $stmt->bindValue(1, $usuario->getNome());
            $stmt->bindValue(2, $usuario->getEmail());
            $stmt->bindValue(3, $usuario->getSenha()); 

            return $stmt->execute();
        }
    }