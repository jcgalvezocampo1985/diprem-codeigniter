<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php if(session()->is_logged):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/clientes') ?>">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/productos') ?>">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/proveedores') ?>">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/ventas') ?>">Ventas</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url('admin/reportes/ventaporzona') ?>">Venta a clientes por zona</a>
                        <a class="dropdown-item" href="<?= base_url('admin/reportes/compraporzona') ?>">Compra a proveedor por zona</a>
                        <a class="dropdown-item" href="<?= base_url('admin/reportes/compraporcliente') ?>">Compra por cliente</a>
                    </div>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <?php if(session()->is_logged):?>
                        <a class="nav-link" href="<?= base_url('admin/usuarios') ?>">Usuarios</a>
                    <?php else: ?>
                        <a class="nav-link" href="<?= base_url('auth/create') ?>">Registrarse</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <?php if(session()->is_logged):?>
                        <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a>
                    <?php else: ?>
                        <a class="nav-link" href="<?= base_url('auth/login') ?>">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>
</header>