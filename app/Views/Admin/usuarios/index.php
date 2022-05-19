<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Usuarios
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header  text-white bg-secondary">
        <strong>Listado de Usuarios</strong>
    </div>
    <div class="card-body">
        <a href="<?= base_url('auth/registro/create') ?>" class="btn btn-info">Nuevo Usuario</a>
    </div>
    <div class="card-body">
        <?php if(session('msg')): ?>
        <div class="alert alert-success mt-2" id="alerta">
            <?= session('msg') ?>
        </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="data_table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $user):?>
                        <tr>
                            <td><?= $user->id ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript')?>
<script>
const myTimeout = setTimeout(myGreeting, 3000);

function myGreeting() {
  $('#alerta').hide();
}

$('#data_table').DataTable();
</script>
<?= $this->endSection() ?>