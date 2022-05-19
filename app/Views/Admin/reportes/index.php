<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Reportes
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header  text-white bg-secondary">
        <strong>Reportes</strong>
    </div>
    <div class="card-body">
        <div class="form-group col-md-3">
            <label for="reporte">Tipo de Reporte</label>
            <select name="reporte" id="reporte" class="form-control">
                <option value=""></option>
                <option value="compra_zona">Mayor compra por zona</option>
                <option value="venta_zona">Menor venta po zona</option>
                <option value="total_cliente">Compra por cliente</option>
            </select>
        </div>
        <div id="contenido_reporte"></div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(function(){
        $('#reporte').on('change', function(){
            var reporte = $(this).val();

            if(reporte == 'compra_zona')
            {
                compra_zona();
            }
        });

         $('#zona').on('change', function(){
            var zona = $(this).val() != "" ? $(this).val() : 0;

            $.ajax({
                url: '<?= site_url('/admin/reportes/datosventaporzona/') ?>'+zona,
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
    function compra_zona()
    {
        $.ajax({
            url: '<?= site_url('/admin/reportes/ventaPorZona/') ?>',
            type: 'GET',
            beforeSend: function(){
                $('#contenido_reporte').empty();
            },
            success: function(data){
                $('#contenido_reporte').html(data);
            }
        });
    }
</script>
<?= $this->endSection() ?>