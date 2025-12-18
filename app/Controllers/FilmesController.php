<?php 

    namespace App\Controllers;

    use App\DAO\FilmeDAO;
use App\Models\Filme;

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

        public function salvar(){
            if(session_status() === PHP_SESSION_NONE) session_start();

            if(!isset($_SESSION['id_usuario'])){
                header('Location: /MyFilmes/login');
                exit;
            }

            $nomeImagem = 'padrao.jpg';
            if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                $novoNome = uniqid() . "." . $extensao;
                $destino = __DIR__ . "/../../public/assets/uploads/" . $novoNome;
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
                    $nomeImagem = $novoNome;
                }
            }

            $filme = new Filme();
            $filme->setIdUsuario($_SESSION['id_usuario']);
            $filme->setTitulo($_POST["titulo"]);
            $filme->setNota($_POST["nota"]);
            $filme->setImagem($nomeImagem);

            $dao = new FilmeDAO();
            if($dao->inserir($filme)){
                header('Location: /MyFilmes/filmes');
            } else {
                echo "Erro ao salvar filme!";
            }
        }
    }
?>