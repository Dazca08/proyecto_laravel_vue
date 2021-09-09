<template>
    <div>
        <div class="breadcrumb">
            <h1>Roles</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear-usuario">
                        <i class="i-Key"></i>
                        Crear Rol
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal fade" id="crear-usuario" tabindex="-1" role="dialog" aria-labelledby="rolLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rolLabel">Nuevo Rol</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="tab-pane fade active show" id="homePIll" role="tabpanel" aria-labelledby="home-icon-pill">    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre">Nombre Rol:</label>
                                                <input type="text" id="nombre" name="nombre" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre">Módulo:</label>
                                                <select name="modulo" id="modulo" class="form-control">
                                                    <option>[Seleccionar]</option>
                                                    <option value="1">Modulo 1</option>
                                                    <option value="2">Modulo 2</option>
                                                    <option value="3">Modulo 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre">Categorías:</label>
                                                <select name="modulo" id="modulo" class="form-control">
                                                    <option>[Seleccionar]</option>
                                                    <option value="1">Categoría 1</option>
                                                    <option value="2">Categoría 2</option>
                                                    <option value="3">Categoría 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre">Tareas:</label>
                                                <select name="modulo" id="modulo" class="form-control">
                                                    <option>[Seleccionar]</option>
                                                    <option value="1">Tarea 1</option>
                                                    <option value="2">Tarea 2</option>
                                                    <option value="3">Tarea 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="form-group">
                                                <label for="ver">Ver:</label>
                                                <input type="checkbox" id="ver" name="ver">
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="form-group">
                                                <label for="crear">Crear:</label>
                                                <input type="checkbox" id="crear" name="crear">
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="form-group">
                                                <label for="editar">Editar:</label>
                                                <input type="checkbox" id="editar" name="editar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="button" class="btn btn-primary" title="Asignar Permisos">
                                                <i class="i-Cursor-Click"></i>
                                                Asignar Permisos
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h2>Permisos Asignados</h2>
                                                </div>
                                                <div class="card-body">
                                                            <ul>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-4">Modulo 1/ Categoría 1/Tarea 1</div>
                                                                <div class="col-md-2">
                                                                    <a href="#">Ver</a>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a href="#">Crear</a>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a href="#">Editar</a>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a href="#" class="text-danger mr-2">
                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-4">Modulo 2/ Categoría 3/Tarea 4</div>
                                                                <div class="col-md-2">
                                                                    <a href="#">Ver</a>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a href="#">Crear</a>
                                                                </div>
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-2">
                                                                    <a href="#" class="text-danger mr-2">
                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title ">
                                <h3 class="card-title">Lista de Roles</h3>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="card ul-card__border-radius">
                                    <div class="card-header ">
                                        <h6 class="card-title mb-0">
                                            <a data-toggle="collapse" class="text-default collapsed" href="#rol-1" aria-expanded="false">Rol 1</a>
                                        </h6>
                                    </div>
                                    <div id="rol-1" class="collapse" data-parent="#accordionExample" style="">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-4">Modulo 1/ Categoría 1/Tarea 1</div>
                                                        <div class="col-md-2">
                                                            <a href="#">Ver</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">Crear</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">Editar</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#" class="text-success mr-2">
                                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                            </a>
                                                            <a href="#" class="text-danger mr-2">
                                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-4">Modulo 2/ Categoría 3/Tarea 4</div>
                                                        <div class="col-md-2">
                                                            <a href="#">Ver</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">Crear</a>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-2">
                                                            <a href="#" class="text-success mr-2">
                                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                            </a>
                                                            <a href="#" class="text-danger mr-2">
                                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card ul-card__border-radius">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">
                                            <a class="collapsed text-default" data-toggle="collapse" href="#rol-2">Rol 2</a>
                                        </h6>
                                    </div>
                                    <div id="rol-2" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-4">Modulo 2/ Categoría 1/Tarea 3</div>
                                                        <div class="col-md-2">
                                                            <a href="#">Ver</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">Crear</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">Editar</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#" class="text-success mr-2">
                                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                            </a>
                                                            <a href="#" class="text-danger mr-2">
                                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-4">Modulo 2/ Categoría 3/Tarea 4</div>
                                                        <div class="col-md-2">
                                                            <a href="#">Ver</a>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-2">
                                                            <a href="#" class="text-success mr-2">
                                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                            </a>
                                                            <a href="#" class="text-danger mr-2">
                                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card ul-card__border-radius">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">
                                            <a class="collapsed text-default" data-toggle="collapse" href="#rol-3">Rol 3</a>
                                        </h6>
                                    </div>
                                    <div id="rol-3" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-4">Modulo 1/ Categoría 3/Tarea 1</div>
                                                        <div class="col-md-2">
                                                            <a href="#">Ver</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">Crear</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">Editar</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#" class="text-success mr-2">
                                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                            </a>
                                                            <a href="#" class="text-danger mr-2">
                                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-4">Modulo 2/ Categoría 3/Tarea 4</div>
                                                        <div class="col-md-2">
                                                            <a href="#">Ver</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">Crear</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#">Editar</a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href="#" class="text-success mr-2">
                                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                            </a>
                                                            <a href="#" class="text-danger mr-2">
                                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            years:[],
        }
    },
    mounted() {

    },
    methods: {
        
    }
}
</script>