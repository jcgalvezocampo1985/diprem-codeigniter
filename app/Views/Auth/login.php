
<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<?php if(session('msg')): ?>
    <div class="alert alert-<?= session('msg.type') ?> mt-2" id="alerta">
        <?= session('msg.body') ?>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header  text-white bg-secondary">
        <strong>Login</strong>
    </div>
    <div class="card-body">
         <?php $validation = \Config\Services::validation(); ?>
        <form method="POST" action="<?= site_url('auth/login/sigin') ?>" autocomplete="off">
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
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
                <?php if($validation->getError('password')): ?>
                    <p class="text-danger">
                        <?= $error = $validation->getError('password'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button class="btn btn-info" type="submit">Ingresar</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript')?>
<script>
const myTimeout = setTimeout(myGreeting, 3000);

function myGreeting() {
  $('#alerta').hide();
}
</script>
<?= $this->endSection() ?>