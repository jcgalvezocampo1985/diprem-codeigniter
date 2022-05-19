<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->renderSection('titulo') ?></title>
        <?= $this->include('template/styles') ?>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <?= $this->include('template/header') ?>
        Sistema de libros
        <main role="main" class="container">
            <?= $this->renderSection('contenido') ?>
        </main>
        <?= $this->include('template/scripts') ?>
        <?= $this->renderSection('javascript') ?>
     </body>
</html>