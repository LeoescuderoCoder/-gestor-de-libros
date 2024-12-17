<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color:rgb(192, 177, 126);
        }
        .navbar, .card {
            background-color: #1f1f1f;
        }
        .btn-primary {
            background-color: #6200ea;
            border-color: #6200ea;
        }
        .btn-danger {
            background-color: #b00020;
            border-color: #b00020;
        }
        .sidebar {
            background-color: #212529;
            height: 100vh;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('libros'); ?>">Gestor de Libros</a>

            <form class="d-flex" action="<?= site_url('libros/buscar'); ?>" method="GET">
                <input class="form-control me-2" type="search" placeholder="Buscar libros..." aria-label="Buscar" name="query" required>
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
            <div class="btn-group" role="group">
                <button class="btn btn-primary" onclick="location.href='<?= site_url('libros'); ?>'">Inicio</button>
                <button class="btn btn-success" onclick="location.href='<?= site_url('libros/crear'); ?>'">Agregar Libro</button>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group sidebar">
                    <h5 class="list-group-item active">Filtros</h5>
                    <h6 class="list-group-item">Género</h6>
                    <ul>
                        <?php if (isset($generos) and is_array($generos)){ ?>
                            <?php foreach ($generos as $genero){ ?>
                                <li>
                                <a href="<?= site_url('libros/filtrar/genero/' . $genero['id']) ?>">
                                    <?= $genero['nombre'] ?>
                                </a>
                                </li>
                            <?php } ?>
                            <?php }else{?>
                            <p>No se encontraron géneros disponibles.</p>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <h3 class="text-white">Libros</h3>
                <div class="row">
                    <?php foreach ($libros as $libro){ ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $libro['titulo'] ?></h5>
                                    <p class="card-text">Autor: <?= $libro['autor'] ?></p>
                                    <p class="card-text">Género: <?= $libro['genero'] ?></p>
                                    <a href="<?= site_url('libros/editar/' . $libro['id']) ?>" class="btn btn-warning">Editar</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
