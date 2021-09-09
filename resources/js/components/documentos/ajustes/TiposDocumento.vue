<template>
    <div>
        <div class="breadcrumb">
            <div class="col-lg-6">
                <h1>Tipos de documento</h1>
            </div>
            <div class="col-lg-6 text-right">
                <button
                    class="btn btn-warning"
                    type="button"
                    data-toggle="modal"
                    data-target="#modal-creacion-edicion"
                    @click="
                        modificar = 0;
                        form.nombre = '';
                        form.abreviatura = '';
                    "
                >
                    <i class="fas fa-plus"></i> <strong>NUEVO</strong>
                </button>
            </div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <table
                        id="tabla-tipos-documento"
                        class="table table-hover table-striped table-bordered"
                    >
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Abreviatura</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(tp, index) in tipos_documento"
                                v-bind:key="index"
                            >
                                <td>{{ tp.nombre }}</td>
                                <td>
                                    {{ tp.abreviatura }}
                                </td>
                                <td>
                                    <button
                                        class="btn btn-primary"
                                        type="button"
                                        data-toggle="modal"
                                        data-target="#modal-creacion-edicion"
                                        v-bind:data-index="index"
                                        @click="
                                            modificar = 1;
                                            id_tipo_documento = tp.id;
                                            form.nombre = tp.nombre;
                                            form.abreviatura = tp.abreviatura;
                                        "
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button
                                        class="btn btn-primary"
                                        type="button"
                                        v-bind:data-index="index"
                                        @click="eliminar(tp.id, tp.nombre)"
                                    >
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal -->
            <div
                class="modal fade"
                id="modal-creacion-edicion"
                tabindex="-1"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ modificar == 0 ? "Crear" : "Actualizar" }}
                                tipo de documento
                            </h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="procesar">
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label class="required" for="nombre"
                                            >Nombre</label
                                        >
                                        <input
                                            v-model="form.nombre"
                                            type="text"
                                            class="form-control"
                                            id="nombre"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label
                                            class="required"
                                            for="abreviatura"
                                            >Abreviatura</label
                                        >
                                        <input
                                            v-model="form.abreviatura"
                                            type="text"
                                            class="form-control"
                                            id="abreviatura"
                                            @input="
                                                form.abreviatura = form.abreviatura.toUpperCase()
                                            "
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal"
                                    ref="cerrarModalCreacionEdicion"
                                >
                                    Cerrar
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import Multiselect from "vue-multiselect";
export default {
    // components: { Multiselect },
    data() {
        return {
            form: {
                nombre: "",
                abreviatura: ""
            },
            id_tipo_documento: "",
            tipos_documento: [],
            modificar: 0
        };
    },
    mounted() {
        this.getTiposDocumento();
    },
    methods: {
        procesar: function(e) {
            this.guardar();
        },
        async guardar() {
            try {
                if (this.modificar == 0) {
                    await axios.post("tipos-documento", this.form);
                } else {
                    await axios.put(
                        "tipos-documento/" + this.id_tipo_documento,
                        this.form
                    );
                }

                this.$refs.cerrarModalCreacionEdicion.click();
                swal({
                    type: "success",
                    title: "Operación exitosa",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-lg btn-success",
                    confirmButtonText: "Cerrar"
                });
                this.getTiposDocumento();
                Object.keys(this.form).forEach(key => {
                    this.form[key] = "";
                });
            } catch (error) {
                swal({
                    type: "error",
                    title: "Error!",
                    text:
                        "No se pudo guardar el tipo de documento, por favor intentelo nuevamente",
                    confirmButtonText: "Cerrar",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-lg btn-danger"
                });
            }
        },
        async eliminar(id_tipo_documento, nombre_tipo_documento) {
            swal({
                title:
                    "¿Esta seguro que desea eliminar el tipo de documento <strong>" +
                    nombre_tipo_documento +
                    "</strong>?",
                text: "Esta acción no puede ser deshecha ",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#0CC27E",
                cancelButtonColor: "#FF586B",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "No, cancelar",
                confirmButtonClass: "btn btn-success mr-5",
                cancelButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).then(
                result => {
                    swal({
                        title: "Cargando",
                        text: "Por favor espere",
                        imageUrl: "../../images/load_gif.gif",
                        confirmButtonText: "Cerrar",
                        imageWidth: 70,
                        imageHeight: 70,
                        showConfirmButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false
                    });
                    axios
                        .delete("tipos-documento/" + id_tipo_documento)
                        .then(response => {
                            if (response) {
                                swal.close();
                                swal({
                                    type: "success",
                                    title: "Operación exitosa",
                                    buttonsStyling: false,
                                    confirmButtonClass:
                                        "btn btn-lg btn-success",
                                    confirmButtonText: "Cerrar"
                                });
                                this.getTiposDocumento();
                            }
                        })
                        .catch(error => {
                            swal({
                                type: "error",
                                title: "Error!",
                                text:
                                    "No se pudo eliminar el tipo de documento, por favor intentelo nuevamente",
                                confirmButtonText: "Cerrar",
                                buttonsStyling: false,
                                confirmButtonClass: "btn btn-lg btn-danger"
                            });
                        });
                },
                function(dismiss) {
                    // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                    if (dismiss === "cancel") {
                    }
                }
            );
        },
        async getTiposDocumento() {
            await axios
                .post("../ajustes/tipos/getTiposDocumento", {})
                .then(response => {
                    this.tipos_documento = response.data;
                    $("#tabla-tipos-documento")
                        .DataTable()
                        .destroy();
                    this.$tablaGlobal("#tabla-tipos-documento");
                })
                .catch(error => {
                    swal({
                        type: "error",
                        title: "Error!",
                        text:
                            "No se pudo obtener el listado de tipos de documento, por favor intentelo nuevamente",
                        confirmButtonText: "Cerrar",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-lg btn-danger"
                    });
                });
        }
    }
};
</script>

<style type="text/css">
.required:after {
    content: " *";
    color: red;
}
</style>
