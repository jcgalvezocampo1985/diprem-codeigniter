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
        <form method="post" action="<?= $libro ? site_url('libros/update') : site_url('libros/store') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $libro ? $libro['nombre'] : '' ?>" />
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <?php if($libro): ?>
                <img src="<?= base_url().'/uploads/'.$libro['imagen'] ?>" class="img-thumbnail" width="100" alt="<?= $libro['nombre'] ?>" />
                <?php endif; ?>
                <input type="file" name="imagen" id="imagen" class="form-control-file" />
                <input type="hidden" name="id" id="id" value="<?= $libro ? $libro['id'] : '' ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit"><?= $libro ? 'Actualizar' : 'Guardar' ?></button>
                <a href="<?= base_url('libros/index') ?>" class="btn btn-info">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>