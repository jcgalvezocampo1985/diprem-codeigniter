<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Proveedores
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header  text-white bg-secondary">
        <strong>Listado de Proveedores</strong>
    </div>
    <div class="card-body">
        <a href="<?= base_url('admin/proveedores/create') ?>" class="btn btn-info">Nuevo Registro</a>
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
                        <th>CUIT</th>
                        <th>Empresa</th>
                        <th>Zona</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($proveedores as $proveedor):
                    ?>
                    <tr>
                        <td><?= $proveedor->id ?></td>
                        <td><?= $proveedor->cuit ?></td>
                        <td><?= $proveedor->empresa ?></td>
                        <td><?= $proveedor->zona ?></td>
                        <td>
                            <a href="<?= base_url('admin/proveedores/edit/'.$proveedor->id) ?>" class="btn-sm btn-info">Editar</a>
                            <a href="<?= base_url('admin/proveedores/delete/'.$proveedor->id) ?>" class="btn-sm btn-danger">Borrar</a>
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