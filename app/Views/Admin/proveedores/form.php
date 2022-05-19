<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Proveedores
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header text-white bg-secondary">
        <strong>Proveedores</strong>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <form method="POST" action="<?= $proveedor ? site_url('admin/proveedores/update') : site_url('admin/proveedores/store') ?>" autocomplete="off">
            <div class="form-group">
                <label for="cuit">CUIT</label>
                <input type="text" name="cuit" id="cuit" class="form-control" value="<?= $proveedor ? $proveedor->cuit : old('cuit') ?>" />
                <?php if($validation->getError('cuit')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('cuit'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <input type="text" name="empresa" id="empresa" class="form-control" value="<?= $proveedor ? $proveedor->empresa : old('empresa') ?>" />
                <?php if($validation->getError('empresa')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('empresa'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="zona">Zona</label>
                <input type="text" name="zona" id="zona" class="form-control" value="<?= $proveedor ? $proveedor->zona : old('zona') ?>" />
                <?php if($validation->getError('zona')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('zona'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?= base_url('admin/proveedores/index') ?>" class="btn btn-info">Cancelar</a>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $proveedor ? $proveedor->id : '' ?>" />
        </form>
    </div>
</div>
<?= $this->endSection() ?>