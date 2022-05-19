<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Ventas
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header  text-white bg-secondary">
        <strong>Listado de Ventas</strong>
    </div>
    <div class="card-body">
        <a href="<?= base_url('admin/ventas/create') ?>" class="btn btn-info">Nueva Venta</a>
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
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th>Cantidad</th>
                        <th>$ Total</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($ventas as $venta):
                    ?>
                    <tr>
                        <td><?= $venta->id ?></td>
                        <td><?= $venta->cliente_id->nombre ?></td>
                        <td><?= $venta->producto_id->nombre ?></td>
                        <td><?= $venta->producto_id->proveedor_id->empresa ?></td>
                        <td><?= $venta->cantidad ?></td>
                        <td><?= $venta->total ?></td>
                        <td><?= $venta->fecha ?></td>
                        <td>
                            <a href="<?= base_url('admin/ventas/edit/'.$venta->id) ?>" class="btn-sm btn-info">Editar</a>
                            <a href="<?= base_url('admin/ventas/delete/'.$venta->id) ?>" class="btn-sm btn-danger">Borrar</a>
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