<template>
    <div>
        <div class="breadcrumb">
            <h1>Usuarios</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear-usuario">
                        <i class="i-Add-User"></i>
                        Crear Usuario
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <form
                        ref="formCrearUsuarios"
                        @submit.prevent="crearUsuarios"
                        class="needs-validation"
                        novalidate
                    >
                        <div class="modal fade" id="crear-usuario" tabindex="-1" role="dialog" aria-labelledby="usuariosLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="usuariosLabel">Nuevo Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <ul class="nav nav-pills" id="myPillTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="home-icon-pill" data-toggle="pill" href="#homePIll" role="tab" aria-controls="homePIll" aria-selected="false"><i class="nav-icon i-Add-User"></i>Crear Usuario</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#profilePIll" role="tab" aria-controls="profilePIll" aria-selected="true"><i class="nav-icon i-Checked-User"></i>Asignar Rol</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myPillTabContent">
                                            <div class="tab-pane fade active show" id="homePIll" role="tabpanel" aria-labelledby="home-icon-pill">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nombre">Nombre:</label>
                                                            <input type="text" id="nombre" name="nombre" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="descripcion">descripcion:</label>
                                                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="usuario">Usuario:</label>
                                                            <input type="text" id="usr" name="usr" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="email">Correo Electrónico:</label>
                                                            <input type="email" id="email" name="email" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="dominio">Dominio:</label>
                                                            <select name="dominio" id="dominio" class="form-control">
                                                                <option value="0">Sin Dominio</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="contrasena">Contraseña:</label>
                                                            <input type="password" id="contrasena" name="contrasena" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="confirmar_contrasena">Confirmar Contraseña:</label>
                                                            <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="expiracion">Fecha Expiración de Contraseña:</label>
                                                            <input type="date" id="expiracion" name="expiracion" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="profilePIll" role="tabpanel" aria-labelledby="profile-icon-pill">
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crear-usuario">
                                                            <i class="i-Checked-User"></i>
                                                            Asignar Rol
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" ref="cerrarModalUsuarios">Cerrar</button>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card o-hidden mb-4">
                        <div class="card-header d-flex align-items-center border-0">
                            <h3 class="w-50 float-left card-title m-0">Usuarios del Sistema</h3>
                        </div>
                        <div class="">
                            <div class="table-responsive">
                                <table id="user_table" class="table  text-center">
                                    <thead>
                                        <tr >
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(usuario, i) in usuarios" v-bind:key="i">
                                            <th>{{ usuario.id }}</th>
                                            <td v-text="usuario.name"></td>
                                            <td v-text="usuario.email"></td>
                                            <td v-text="usuario.correo"></td>
                                            <td v-if="usuario.estado==1"><span class="badge badge-success">Activo</span></td>
                                            <td v-else><span class="badge badge-danger">Inactivo</span></td>
                                            <td>
                                                <a href="#" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="#" class="text-danger mr-2">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
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
            usuarios: []
        }
    },
    created(){
        this.verUsuarios();
    },
    mounted() {
        
    },
    methods: {
        crearUsuarios: function(e) {
            if (this.$refs.formCrearUsuarios.checkValidity()) {
                axios
                    .post("/administracion/seguridad/usuarios/crear", {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                        form: JSON.stringify(this.form)
                        
                    })
                    .then(response => {
                        this.$refs.cerrarModalUsuarios.click();
                        swal({
                            type: "success",
                            title: "Usuario Creado Con Éxito",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-lg btn-success",
                            confirmButtonText: "Cerrar"
                        });
                        this.verUsuarios();
                        Object.keys(this.form).forEach(key => {
                            this.form[key] = "";
                        });
                    })
                    .catch(error => {
                        swal({
                            type: "error",
                            title: "Error!",
                            text: "No se pudo guardar el usuario, por favor, guardar nuevamente",
                            confirmButtonText: "Cerrar",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-lg btn-danger"
                        });
                    });
            }
        },
        verUsuarios() {
            axios
                .post("/administracion/seguridad/usuarios/ver", {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                })
                .then(response => {
                    this.usuarios = response.data;
                })
                .catch(error => {
                    swal({
                        type: "error",
                        title: "Error!",
                        text: "No se pudo obtener el listado de tipos de documento, por favor intentelo nuevamente",
                        confirmButtonText: "Cerrar",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-lg btn-danger"
                    });
                });
        }
        
    }
}
</script>