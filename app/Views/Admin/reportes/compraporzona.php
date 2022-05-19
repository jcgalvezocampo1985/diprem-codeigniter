<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Reportes de compras por zona
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header  text-white bg-secondary">
        <strong>Reportes de compras por zona</strong>
    </div>
    <div class="card-body">
        <div class="form-group col-md-3">
            <label for="reporte">Zona</label>
            <select name="zona" id="zona" class="form-control">
                <option value=""></option>
                <?php foreach($proveedores as $proveedor): ?>
                    <option value="<?= $proveedor->zona ?>"><?= $proveedor->zona ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <div>
    <div class="card-body">
        <div id="datos_resultados">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>Proveedor</th>
                            <th>CUIT</th>
                            <th>Producto</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(function(){
        $('#zona').on('change', function(){
            var zona = $(this).val() != "" ? $(this).val() : 0;

            $.ajax({
                url: '<?= site_url('/admin/reportes/datoscompraporzona/') ?>'+zona,
                type: 'GET',
                beforeSend: function(){
                    $('#datos_resultados').empty();
                },
                success: function(data){
                    $('#datos_resultados').html(data);
                }
            });
            });
    });
</script>
<?= $this->endSection() ?>