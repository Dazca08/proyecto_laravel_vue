<template>
    <div class="col-lg-12 mt-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3"></div>
                <form @submit.prevent="buscarDocumentos">
                    <div class="form-group row">
                        <label
                            for="nombre-codigo"
                            class="col-sm-2 col-form-label"
                            >Nombre o código</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                id="nombre-codigo"
                                name="nombre-codigo"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label"
                            >Tipo</label
                        >
                        <div class="col-sm-10">
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label"
                            >Responsable</label
                        >
                        <div class="col-sm-10">
                            <select
                                class="form-control"
                                id="responsable"
                                name="responsable"
                            >
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="palabras-claves"
                            class="col-sm-2 col-form-label"
                            >Palabras claves</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                id="palabras-claves"
                                name="palabras-claves"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 offset-sm-4">
                            <button
                                type="submit"
                                class="btn btn-primary btn-block"
                            >
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>
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
            documentos: ""
        };
    },
    mounted() {},
    methods: {
        buscarDocumentos: function(e) {
            swal({
                //type: "error",
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
                .post("../documentos/gestionar/buscarDocumentos", {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                })
                .then(response => {
                    this.documentos = response.data;
                    this.$emit("documentos", this.documentos);
                    swal.close();
                })
                .catch(error => {
                    swal({
                        type: "error",
                        title: "Error!",
                        text:
                            "No se pudo obtener la información de los documentos, por favor intentelo nuevamente",
                        confirmButtonText: "Cerrar",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-lg btn-danger"
                    });
                });
            // this.msg = "hola desde el hijo";
            // this.$emit("data", {
            //     msg: this.msg,
            //     algo: this.ms
            // });
        }
    }
};
</script>
