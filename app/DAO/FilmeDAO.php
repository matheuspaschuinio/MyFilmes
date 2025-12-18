<?php

namespace App\DAO;

use App\Models\Filme;
use Core\Database;
use PDO;
use PDOException;

    class FilmeDAO{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function inserir(Filme $f)
        {
            try
            {
                $sql = "INSERT INTO filmes (usuario_id, titulo, imagem, nota) VALUES (?, ?, ?, ?)";

                $stmt = $this->db->prepare($sql);

                $stmt->bindValue(1, $f->getIdUsuario());
                $stmt->bindValue(2, $f->getTitulo());
                $stmt->bindValue(3, $f->getImagem());
                $stmt->bindValue(4, $f->getNota());

                return $stmt->execute();
            }
            catch(PDOException $e)
            {
                return false;
            }
        }

        public function listarPorUsuario($id)
        {
            try
            {
                $sql = "SELECT * FROM filmes WHERE usuario_id = ?";

                $stmt = $this->db->prepare($sql);

                $stmt->execute([$id]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e)
            {
                return false;
            }
        }

        public function excluir($id)
        {
            try
            {
                $sql = "DELETE FROM filmes WHERE id_filme = ?";

                $stmt = $this->db->prepare($sql);

                $stmt->execute([$id]);

                return "Filme excluido com sucesso";
            }
            catch(PDOException $e)
            {
                return false;
            }
        }
    }