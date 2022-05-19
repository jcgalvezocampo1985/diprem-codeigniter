<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Libros
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header  text-white bg-secondary">
        <strong>Listado de Libros</strong>
    </div>
    <div class="card-body">
        <a href="<?= base_url('libros/create') ?>" class="btn btn-info">Nuevo Registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($registros as $libro):
                    ?>
                    <tr>
                        <td><?= $libro['id'] ?></td>
                        <td><img src="<?= base_url().'/uploads/'.$libro['imagen'] ?>" class="img-thumbnail" width="100" alt="<?= $libro['nombre'] ?>" /></td>
                        <td><?= $libro['nombre'] ?></td>
                        <td>
                            <a href="<?= base_url('libros/edit/'.$libro['id']) ?>" class="btn-sm btn-info">Editar</a>
                            <a href="<?= base_url('libros/delete/'.$libro['id']) ?>" class="btn-sm btn-danger">Borrar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>