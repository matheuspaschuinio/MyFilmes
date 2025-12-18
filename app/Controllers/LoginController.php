<?php 

    namespace App\Controllers;

use App\DAO\UsuarioDAO;
use App\Models\User;

    class LoginController{
        public function index(){
            require __DIR__ . "/../Views/login.php";
        }

        public function cadastro(){
            require __DIR__ . "/../Views/register.php";
        }

        public function salvar(){
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $user = new User(0, $nome, $email, password_hash($senha, PASSWORD_DEFAULT));

            $dao = new UsuarioDAO();

            if($dao->inserir($user)) {
                header('Location: /MyFilmes/login');
            }
            else {
                echo "Erro ao cadastrar!";
            }
        }

        public function entrar(){
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $dao = new UsuarioDAO();

            $usuarioDados = $dao->buscarPorEmail($email);

            if($usuarioDados && password_verify($senha, $usuarioDados['senha'])) {
                session_start();
                $_SESSION['id_usuario'] = $usuarioDados['id_usuario'];
                $_SESSION['nome'] = $usuarioDados['nome'];

                header('Location: /MyFilmes/filmes');
            }
            else {
                echo "Email ou senha inválidos!";
            }
        }

        public function sair(){
            session_start();
            session_destroy();
            header('Location: /MyFilmes/login');
            exit;
        }
    }
?>