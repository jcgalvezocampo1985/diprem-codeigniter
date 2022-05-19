<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Usuarios
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header text-white bg-secondary">
        <strong>Registro de Usuarios</strong>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <form method="POST" action="<?= site_url('auth/registro/store') ?>" autocomplete="off">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= old('email') ?>" />
                <?php if($validation->getError('email')): ?>
                    <p class="text-danger">
                        <?= $error = $validation->getError('email'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= old('username') ?>" />
                <?php if($validation->getError('username')): ?>
                    <p class="text-danger">
                        <?= $error = $validation->getError('username'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
                <?php if($validation->getError('password')): ?>
                    <p class="text-danger">
                        <?= $error = $validation->getError('password'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="repite_password">Repite Password</label>
                <input type="password" name="repite_password" id="repite_password" class="form-control" />
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
                <?php if(session()->is_logged):?>
                <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-info">Cancelar</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>