<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Productos
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header text-white bg-secondary">
        <strong>Productos</strong>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <form method="POST" action="<?= $producto ? site_url('admin/productos/update') : site_url('admin/productos/store') ?>" autocomplete="off">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $producto ? $producto->nombre : old('nombre') ?>" />
                <?php if($validation->getError('nombre')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('nombre'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" id="precio" class="form-control" value="<?= $producto ? $producto->precio : old('precio') ?>" />
                <?php if($validation->getError('precio')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('precio'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="proveedor_id">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id" class="form-control">
                    <option value=""></option>
                <?php foreach($proveedores as $proveedor): ?>
                    <option value="<?= $proveedor->id ?>" <?= (($proveedor->id)==$producto->proveedor_id->id) ? "selected='selected'" : "" ?>><?= $proveedor->empresa ?></option>
                <?php endforeach; ?>
                </select>
                <?php if($validation->getError('proveedor_id')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('proveedor_id'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?= base_url('admin/productos/index') ?>" class="btn btn-info">Cancelar</a>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $producto ? $producto->id : '' ?>" />
        </form>
    </div>
</div>
<?= $this->endSection() ?>