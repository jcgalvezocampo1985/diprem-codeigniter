<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Libros
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header text-white bg-secondary">
        <strong>Crear Libro</strong>
    </div>
    <div class="card-body">
        <form method="post" action="<?= site_url('libros/store') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" />
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control-file" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>