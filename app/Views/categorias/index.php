<?=$this->extend('dashboard')?>
<?=$this->section('titulo')?>
Categorias
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<div class="row">

    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    En el módulo CATEGORÍA usted podrá registrar las categorías que servirán para agregar productos.
                    Además de lo antes
                    mencionado, puede actualizar los datos de las categorías, realizar búsquedas de categorías o
                    eliminarlas si así lo desea.
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Nueva categoria <i
                                class="fas fa-tags"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link lista-categorias" data-toggle="tab" href="#menu1">Lista de categoria <i
                                class="fas fa-clipboard"></i></a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="tab-pane active"><br>
                        <?=view('categorias/guardarCategoria')?>
                    </div>
                    <div id="menu1" class="tab-pane fade"><br>
                        <?=view('categorias/listarCategorias')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar Categoria</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="" id="" class="form-control inputcategory">
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary saveCategory">Guardar <i
                                class="fas fa-save    "></i></button>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>
<?=$this->endSection()?>