<div class="row">

    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    En el módulo PRODUCTOS podrá agregar nuevos productos al sistema, actualizar datos de los productos,
                    eliminar o actualizar la imagen de los productos, imprimir códigos de barras o SKU de cada producto,
                    buscar productos en el sistema, ver todos los productos en almacén, ver los productos más vendido y
                    filtrar productos por categoría.
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Agregar productos <i
                                class="fas fa-box"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link producto-almacen" data-toggle="tab" href="#menu1">Productos en almacen <i
                                class="fas fa-boxes"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link producto-minimo" data-toggle="tab" href="#menu2">Productos en stock minimo <i
                                class="fas fa-stopwatch-20"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link producto-caducado" data-toggle="tab" href="#menu3">Productos a punto de
                            caducar <i class="fas fa-stopwatch"></i></a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="tab-pane active"><br>
                        <?=view('productos/agregarProducto')?>
                    </div>
                    <div id="menu1" class="tab-pane fade"><br>
                        Lista de productos
                    </div>
                    <div id="menu2" class="tab-pane fade"><br>
                        Lista de productos minimos
                    </div>
                    <div id="menu3" class="tab-pane fade"><br>
                        Lista de productos caducados
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>