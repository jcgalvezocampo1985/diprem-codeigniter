
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
            <?php
                $total_comprado = 0;
                foreach($registros as $registro):
                    $total_comprado = $total_comprado + $registro->total;
            ?>
                <tr>
                    <td><?= $registro->producto ?></td>
                    <td><?= $registro->empresa ?></td>
                    <td>$<?= number_format($registro->precio, 2) ?></td>
                    <td><?= $registro->cantidad ?></td>
                    <td class="text-right">$<?= number_format($registro->total, 2) ?></td>
                    <td><?= $registro->fecha ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"></td>
                <td class="text-right">$<?= number_format($total_comprado, 2) ?></td>
            </tr>
        </tfoot>
    </table>
</div>