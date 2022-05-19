<?= $this->extend('template/app') ?>

<?= $this->section('titulo') ?>
Reportes de compras por cliente
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header  text-white bg-secondary">
        <strong>Reportes de compras por cliente</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="reporte">Clientes</label>
                    <select name="cliente_id" id="cliente_id" class="form-control">
                        <option value=""></option>
                        <?php foreach($clientes as $cliente): ?>
                            <option value="<?= $cliente->id ?>"><?= $cliente->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="fecha_fin">Fecha Fin</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button class="btn btn-info" id="buscar">Buscar</button>
                </div>
            </div>
        </div>
    <div>
    <div class="card-body">
        <div id="datos_resultados">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>Poducto</th>
                            <th>Empresa</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>$ Total</th>
                            <th>Fecha</th>
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
        $('#buscar').on('click', function(e){
            e.preventDefault();
            var cliente_id = $('#cliente_id').val() != "" ? $('#cliente_id').val() : 0;
            var fecha_inicio = $('#fecha_inicio').val() != "" ? $('#fecha_inicio').val() : 0;
            var fecha_fin = $('#fecha_fin').val() != "" ? $('#fecha_fin').val() : 0;

            $.ajax({
                url: '<?= site_url('/admin/reportes/datoscompraporcliente/') ?>'+cliente_id+'/'+fecha_inicio+'/'+fecha_fin,
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