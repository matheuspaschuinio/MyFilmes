<?php 

    namespace App\Controllers;

    use App\DAO\FilmeDAO;

    class FilmesController{
        public function index(){
            if(session_status() === PHP_SESSION_NONE) session_start();

            if(!isset($_SESSION['id_usuario'])){
                header('Location: /MyFilmes/login');
                exit;
            }

            $dao = new FilmeDAO();
            $filmes = $dao->listarPorUsuario($_SESSION['id_usuario']);

            require __DIR__ . "/../Views/dashboard.php";
        }
    }
?>