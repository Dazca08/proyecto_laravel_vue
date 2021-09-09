<template>
    <div>
        <div class="breadcrumb">
            <div class="col-lg-6">
                <h1>Gestionar</h1>
            </div>
            <div class="col-lg-6">
                <button
                    class="btn btn-block btn-primary"
                    type="button"
                    data-toggle="modal"
                    data-target="#modal-creacion-documento"
                >
                    Crear
                </button>
            </div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="container-fluid mt-5">
            <buscador @documentos="documentos = $event"></buscador>

            <div class="col-lg-12">
                <table
                    class="table table-bordered table-striped"
                    width="100%"
                    v-show="documentos != ''"
                >
                    <thead>
                        <tr>
                            <th>Descargar</th>
                            <th>Nombre</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Versión</th>
                            <th>Palabras clave</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(documento, index) in documentos"
                            v-bind:key="index"
                        >
                            <td>
                                <a v-bind:href="documento.archivo" download
                                    ><i class="fas fa-file-download fa-2x"></i
                                ></a>
                            </td>
                            <td>{{ documento.nombre }}</td>
                            <td>{{ documento.codigo }}</td>
                            <td>{{ documento.tipo_documento.nombre }}</td>
                            <td>version</td>
                            <td>{{ documento.palabras_clave }}</td>
                            <td>{{ documento.estado }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div
                class="modal fade"
                id="modal-creacion-documento"
                tabindex="-1"
                aria-hidden="true"
                role="dialog"
            >
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                Creación del documento
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
                        <form
                            @submit.prevent="crearNuevoDocumento"
                            class="needs-validation"
                            novalidate
                        >
                            <div class="modal-body">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="card-title mb-3">
                                            Información del documento
                                        </div>
                                        <form>
                                            <div class="row">
                                                <div
                                                    class="col-md-12 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="nombre"
                                                        >Nombre</label
                                                    >
                                                    <input
                                                        v-model="form.nombre"
                                                        type="text"
                                                        class="form-control"
                                                        id="nombre"
                                                        required
                                                    />
                                                    <div
                                                        class="invalid-feedback"
                                                    >
                                                        Completa este campo
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-md-12 form-group mb-3"
                                                >
                                                    <label for="descripcion"
                                                        >Descripción</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.descripcion
                                                        "
                                                        class="form-control"
                                                        id="descripcion"
                                                        name="descripcion"
                                                        required
                                                    ></textarea>
                                                </div>

                                                <div
                                                    class="col-md-6 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="tipo-documento"
                                                        >Tipo documento</label
                                                    >
                                                    <select
                                                        v-model="
                                                            form.tipo_documento
                                                        "
                                                        class="form-control"
                                                        name="tipo-documento"
                                                        id="tipo-documento"
                                                    >
                                                        <option
                                                            v-for="option in options_tipo_documento"
                                                            v-bind:key="
                                                                option.value
                                                            "
                                                            v-bind:value="
                                                                option.value
                                                            "
                                                        >
                                                            {{ option.text }}
                                                        </option>
                                                    </select>
                                                </div>

                                                <div
                                                    class="col-md-6 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="flujo-documento"
                                                        >Flujo documento</label
                                                    >
                                                    <select
                                                        v-model="
                                                            form.flujo_documento
                                                        "
                                                        class="form-control"
                                                        name="flujo-documento"
                                                        id="flujo-documento"
                                                    >
                                                        <option value="1"
                                                            >1</option
                                                        >
                                                        <option value="2"
                                                            >2</option
                                                        >
                                                    </select>
                                                </div>

                                                <div
                                                    class="col-md-6 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="codigo"
                                                        >Código</label
                                                    >
                                                    <input
                                                        v-model="form.codigo"
                                                        type="text"
                                                        class="form-control"
                                                        id="codigo"
                                                        name="codigo"
                                                        required
                                                    />
                                                    <div
                                                        class="invalid-feedback"
                                                    >
                                                        Completa este campo
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-md-6 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="proceso"
                                                        >Proceso</label
                                                    >
                                                    <select
                                                        v-model="form.proceso"
                                                        class="form-control"
                                                        name="proceso"
                                                        id="proceso"
                                                    >
                                                        <option value="1"
                                                            >1</option
                                                        >
                                                        <option value="2"
                                                            >2</option
                                                        >
                                                    </select>
                                                </div>

                                                <div
                                                    class="col-md-6 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="jefatura"
                                                        >Jefatura</label
                                                    >
                                                    <select
                                                        v-model="form.jefatura"
                                                        class="form-control"
                                                        name="jefatura"
                                                        id="jefatura"
                                                    >
                                                        <option value="1"
                                                            >1</option
                                                        >
                                                        <option value="2"
                                                            >2</option
                                                        >
                                                    </select>
                                                </div>

                                                <div
                                                    class="col-md-6 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="documento-referente"
                                                        >Documento
                                                        referente</label
                                                    >
                                                    <select
                                                        v-model="
                                                            form.documentos_referentes
                                                        "
                                                        class="form-control"
                                                        name="documento-referente"
                                                        id="documento-referente"
                                                    >
                                                        <option value="1"
                                                            >1</option
                                                        >
                                                        <option value="2"
                                                            >2</option
                                                        >
                                                    </select>
                                                </div>
                                                <div
                                                    class="col-md-6 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="responsable"
                                                        >Responsable</label
                                                    >
                                                    <select
                                                        v-model="
                                                            form.responsable
                                                        "
                                                        class="form-control"
                                                        name="responsable"
                                                        id="responsable"
                                                        required
                                                    >
                                                        <option value="1"
                                                            >1</option
                                                        >
                                                        <option value="2"
                                                            >2</option
                                                        >
                                                    </select>
                                                </div>

                                                <div
                                                    class="col-md-6 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="palabras-clave"
                                                        >Palabras clave</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.palabras_clave
                                                        "
                                                        type="text"
                                                        class="form-control"
                                                        id="palabras-clave"
                                                        name="palabras-clave"
                                                        required
                                                    />
                                                </div>

                                                <div
                                                    class="col-md-12 col-sm-12 form-group mb-3 row"
                                                >
                                                    <div
                                                        class="col-lg-2 col-sm-4 col-5"
                                                    >
                                                        <label
                                                            for="listado-maestro"
                                                            >Listado
                                                            maestro</label
                                                        >
                                                    </div>
                                                    <div
                                                        class="col-lg-9 col-sm-8 col-7"
                                                    >
                                                        <label
                                                            class="checkbox checkbox-secondary"
                                                        >
                                                            <input
                                                                v-model="
                                                                    form.listado_maestro
                                                                "
                                                                type="checkbox"
                                                                id="listado_maestro"
                                                                name="listado_maestro"
                                                            />
                                                            <span
                                                                class="checkmark"
                                                            ></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="card-title mb-3">
                                            Información de la versión
                                            <div class="row">
                                                <div
                                                    class="col-md-12 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="autor"
                                                        >Autor</label
                                                    >
                                                    <select
                                                        v-model="form.autor"
                                                        class="form-control"
                                                        name="autor"
                                                        id="autor"
                                                        required
                                                    >
                                                        <option value="1"
                                                            >1</option
                                                        >
                                                        <option value="2"
                                                            >2</option
                                                        >
                                                    </select>
                                                </div>

                                                <div
                                                    class="col-md-12 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="archivo"
                                                        >Archivo adjunto</label
                                                    >
                                                    <div class="custom-file">
                                                        <input
                                                            type="file"
                                                            class="custom-file-input"
                                                            id="archivo"
                                                            @change="
                                                                onFileChange
                                                            "
                                                            required
                                                        />
                                                        <label
                                                            class="custom-file-label"
                                                            for="archivo"
                                                            >{{
                                                                label_archivo
                                                            }}</label
                                                        >
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-md-12 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="comentario-version"
                                                        >Comentario</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.comentario_version
                                                        "
                                                        class="form-control"
                                                        id="comentario-version"
                                                        name="comentario-version"
                                                        required
                                                    ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="card-title mb-3">
                                            Aprobación
                                            <div class="row">
                                                <div
                                                    class="col-md-12 form-group mb-3"
                                                >
                                                    <label
                                                        class="required"
                                                        for="comentario_revision"
                                                        >Comentario: Revisión y
                                                        ajustes por parte del
                                                        solicitante
                                                    </label>
                                                    <textarea
                                                        v-model="
                                                            form.comentario_revision
                                                        "
                                                        class="form-control"
                                                        id="comentario_revision"
                                                        name="comentario_revision"
                                                        required
                                                    ></textarea>
                                                </div>
                                            </div>
                                        </div>
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
                descripcion: "",
                tipo_documento: "",
                flujo_documento: "",
                codigo: "",
                proceso: "",
                jefatura: "",
                documentos_referentes: "",
                responsable: "",
                palabras_clave: "",
                listado_maestro: "",
                autor: "",
                archivo: "",
                comentario_version: "",
                comentario_revision: ""
            },
            options_tipo_documento: [],
            documentos: "",
            label_archivo: "Seleccionar archivo",
            array: "",
            var: ""
        };
    },
    mounted() {
        this.getListadoTiposDocumento();
    },
    methods: {
        getListadoTiposDocumento() {
            this.tipos_documento = [];
            axios
                .post("../ajustes/tipos/getListadoTiposDocumento", {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                })
                .then(response => {
                    this.options_tipo_documento = response.data;
                })
                .catch(error => {
                    swal({
                        type: "error",
                        title: "Error!",
                        text:
                            "No se pudo guardar el tipo de documento, por favor intentelo nuevamente",
                        confirmButtonText: "Cerrar",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-lg btn-danger"
                    });
                });
        },
        onFileChange: function(e) {
            this.form.archivo = e.target.files[0];
            this.label_archivo = e.target.files[0].name;
        },
        crearNuevoDocumento: function(e) {
            let config = { headers: { "content-type": "multipart/form-data" } };
            let datos = new FormData();

            let json = JSON.stringify(this.form);

            datos.append("form", json);
            datos.append("archivo", this.form.archivo);

            axios
                .post(
                    "../documentos/gestionar/crearNuevoDocumento",
                    datos,
                    config
                )
                .then(response => {
                    // Swal.close();

                    swal({
                        type: "success",
                        title: "Operación exitosa",
                        text: "Se creó el documento correctamente",
                        confirmButtonText: "Cerrar",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-lg btn-success"
                    });

                    // this.label_archivo = "Seleccionar archivo";
                    // Object.keys(this.form).forEach(key => {
                    //     this.form[key] = "";
                    // });
                })
                .catch(error => {
                    swal({
                        type: "error",
                        title: "Error",
                        text:
                            "No se pudo crear el documento, por favor intentelo nuevamente",
                        confirmButtonText: "Cerrar",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-lg btn-danger"
                    });
                });
        }
    }
};
</script>
<style>
.modal-lg {
    max-width: 900px;
}
textarea.form-control {
    min-height: 60px !important;
    max-height: 60px !important;
}
</style>
