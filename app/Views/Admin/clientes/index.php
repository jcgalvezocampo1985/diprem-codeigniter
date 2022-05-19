<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Clientes
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header  text-white bg-secondary">
        <strong>Listado de Clientes</strong>
    </div>
    <div class="card-body">
        <a href="<?= base_url('admin/clientes/create') ?>" class="btn btn-info">Nuevo Registro</a>
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
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>CUIT</th>
                        <th>Empresa</th>
                        <th>Zona</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($clientes as $cliente):
                    ?>
                    <tr>
                        <td><?= $cliente->id ?></td>
                        <td><?= $cliente->nombre ?></td>
                        <td><?= $cliente->cuit ?></td>
                        <td><?= $cliente->empresa ?></td>
                        <td><?= $cliente->zona ?></td>
                        <td><?= $cliente->email ?></td>
                        <td>
                            <a href="<?= base_url('admin/clientes/edit/'.$cliente->id) ?>" class="btn-sm btn-info">Editar</a>
                            <a href="<?= base_url('admin/clientes/delete/'.$cliente->id) ?>" class="btn-sm btn-danger">Borrar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
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