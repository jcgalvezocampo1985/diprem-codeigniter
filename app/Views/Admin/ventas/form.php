<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Ventas
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header text-white bg-secondary">
        <strong>Ventas</strong>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <form method="POST" action="<?= $venta ? site_url('admin/ventas/update') : site_url('admin/ventas/store') ?>" autocomplete="off">
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control">
                    <option value=""></option>
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?= $cliente->id ?>" <?= ($cliente->id == $venta->cliente_id->id) ? "selected='selected'" : "" ?>><?= $cliente->nombre ?></option>
                <?php endforeach; ?>
                </select>
                <?php if($validation->getError('cliente_id')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('cliente_id'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="proveedor_id">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id" class="form-control">
                    <option value=""></option>
                    <?php foreach($proveedores as $proveedor): ?>
                        <option value="<?= $proveedor->id ?>" <?= ($proveedor->id == $venta->producto_id->proveedor_id->id) ? "selected='selected'" : "" ?>><?= $proveedor->empresa ?></option>
                    <?php endforeach; ?>
                    </select>
                    <?php if($validation->getError('proveedor_id')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('proveedor_id'); ?>
                    </p>
                    <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="producto_id">Producto</label>
                <select name="producto_id" id="producto_id" class="form-control">
                    <?php if($venta): ?>
                    <option value=""></option>
                    <?php foreach($productos as $producto): ?>
                    <option value="<?= $producto->id ?>"  <?= ($producto->id == $venta->producto_id->id) ? "selected='selected'" : "" ?>><?= $producto->nombre ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </select>
                <?php if($validation->getError('producto_id')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('producto_id'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="text" name="cantidad" id="cantidad" class="form-control" value="<?= $venta ? $venta->cantidad : old('cantidad') ?>" <?= $venta ? '' : 'readonly'; ?> />
                <?php if($validation->getError('cantidad')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('cantidad'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" id="precio" class="form-control" value="<?= $venta ? $venta->producto_id->precio : old('total') ?>" readonly />
                <?php if($validation->getError('precio')): ?>
                <p class="text-danger">
                    <?= $validation->getError('precio'); ?>
                </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" id="total" class="form-control" value="<?= $venta ? $venta->total : old('total') ?>" readonly />
                <?php if($validation->getError('total')): ?>
                    <p class="text-danger">
                        <?= $validation->getError('total'); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?= base_url('admin/ventas/index') ?>" class="btn btn-info">Cancelar</a>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $venta ? $venta->id : '' ?>" />
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(function(){
        $('#proveedor_id').on('change', function(){
            var proveedor_id = $(this).val();

            $.ajax({
                url: '<?= site_url('/admin/productos/listaporproveedor/') ?>'+proveedor_id,
                type: 'GET',
                dataType: 'json',
                beforeSend: function(){
                    $('#producto_id').empty();
                    $('#precio').val('');
                    $('#cantidad').prop('readonly', true);
                },
                success: function(data){
                    $('#producto_id').append('<option value=""></option>');
                    $.each(data, function(i, item){
                        $('#producto_id').append('<option value="'+item.id+'">'+item.nombre+'</option>');
                    });
                }
            });
        });

        $('#producto_id').on('change', function(){
            var producto_id = $(this).val();
            $('#precio').val('');
            $('#cantidad').prop('readonly', true);

            if(producto_id != "")
            {           
                $.ajax({
                    url: '<?= site_url('/admin/productos/precioproducto/') ?>'+producto_id,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function(){
                        $('#cantidad').prop('readonly', false);
                    },
                    success: function(data){
                        $('#precio').val(data.toFixed(2));
                    }
                });
            }
        });

        $('#cantidad').on('keyup', function(){
            let precio = $('#precio').val();
            let cantidad = $(this).val();
            let total = cantidad * precio;

            if(cantidad != "")
            {
                $('#total').val(total.toFixed(2));
            }
        });
    });
</script>
<?= $this->endSection() ?>