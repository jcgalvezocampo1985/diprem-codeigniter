<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Poducto</th>
                <th>Empresa</th>
                <th>Cliente</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>$ Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($registros as $registro): ?>
                <tr>
                    <td><?= $registro->producto ?></td>
                    <td><?= $registro->empresa ?></td>
                    <td><?= $registro->cliente ?></td>
                    <td><?= $registro->precio ?></td>
                    <td><?= $registro->cantidad ?></td>
                    <td><?= $registro->total ?></td>
                    <td><?= $registro->fecha ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>