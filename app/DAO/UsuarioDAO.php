<?php

use Core\Database;

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
    }