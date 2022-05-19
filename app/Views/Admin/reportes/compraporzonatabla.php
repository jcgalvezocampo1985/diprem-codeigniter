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
            <?php foreach($registros as $registro): ?>
                <tr>
                    <td><?= $registro->empresa ?></td>
                    <td><?= $registro->cuit ?></td>
                    <td><?= $registro->producto ?></td>
                    <td><?= $registro->precio ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>