<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #f5f5f5;
        }
        .navbar, .card {
            background-color: #1f1f1f;
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

    <div class="container">
        <div class="card p-4">
            <h2 class="mb-4">Agregar Nuevo Libro</h2>
            <form action="<?= site_url('libros/crear'); ?>" method="post">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="mb-3">
                    <label for="autor" class="form-label">Autor</label>
                    <input type="text" class="form-control" id="autor" name="autor" required>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <input type="text" class="form-control" id="genero" name="genero">
                </div>
                <div class="mb-3">
                    <label for="anio_publicacion" class="form-label">Año de Publicación</label>
                    <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?= site_url('libros'); ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>
