<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Clientes
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header text-white bg-secondary">
        <strong>Clientes</strong>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <form method="POST" action="<?= $cliente ? site_url('admin/clientes/update') : site_url('admin/clientes/store') ?>" autocomplete="off">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $cliente ? $cliente->nombre : old('nombre') ?>" />
                <?php if($validation->getError('nombre')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('nombre'); ?>
                    </p>
                <?php endif; ?>
            </div>

             <option value="1" <?php $modulo ? ($modulo->requiere_examen = '1' ? 'selected' : '') : ''?>>Si</option>


            <div class="form-group">
                <label for="cuit">CUIT</label>
                <input type="text" name="cuit" id="cuit" class="form-control" value="<?= $cliente ? $cliente->cuit : old('cuit') ?>" />
                <?php if($validation->getError('cuit')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('cuit'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <input type="text" name="empresa" id="empresa" class="form-control" value="<?= $cliente ? $cliente->empresa : old('empresa') ?>" />
                <?php if($validation->getError('empresa')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('empresa'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="zona">Zona</label>
                <input type="text" name="zona" id="zona" class="form-control" value="<?= $cliente ? $cliente->zona : old('zona') ?>" />
                <?php if($validation->getError('zona')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('zona'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $cliente ? $cliente->email : old('email') ?>" />
                <?php if($validation->getError('email')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('email'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?= base_url('admin/clientes/index') ?>" class="btn btn-info">Cancelar</a>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $cliente ? $clienter->id : '' ?>" />
        </form>
    </div>
</div>
<?= $this->endSection() ?>