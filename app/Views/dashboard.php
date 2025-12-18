<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Filmes - CineFile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">🎬 CineFile</a>
            <div class="d-flex">
                <span class="navbar-text me-3">Olá, <?= $_SESSION['nome'] ?></span>
                <a href="login/sair" class="btn btn-outline-danger btn-sm">Sair</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Meus Filmes Assistidos</h2>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFilme">
                + Adicionar Filme
            </button>
        </div>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            
            <?php foreach($filmes as $filme): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="/MyFilmes/public/assets/uploads/<?= $filme['imagem'] ?>" class="card-img-top" ...>
                        <div class="card-body">
                            <h5 class="card-title"><?= $filme['titulo'] ?></h5>
                            <span class="badge bg-warning text-dark">Nota: <?= $filme['nota'] ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

    <div class="modal fade" id="modalFilme" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Novo Filme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="filmes/salvar" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="acao" value="cadastrar">
                        
                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" class="form-control" name="titulo" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Nota (0 a 10)</label>
                            <input type="number" class="form-control" name="nota" step="0.1" min="0" max="10" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pôster (Imagem)</label>
                            <input type="file" class="form-control" name="imagem" accept="image/*" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Salvar Filme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>