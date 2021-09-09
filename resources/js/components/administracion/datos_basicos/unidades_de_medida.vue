<template>
    <div>
        <div class="breadcrumb">
            <h1>Unidades de Medida</h1>&nbsp;&nbsp;
            <button type="button" v-on:click="bandera_modificar = false; unidad.id = null; unidad.nombre = ''; unidad.simbolo = '';" class="btn btn-warning float-right" data-toggle="modal" data-target="#crear-unidad-de-medida">
                <i class="fas fa-plus"></i>
                <span>NUEVO</span>
            </button>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-sm-12">
                    <table id="tabla_unidades_de_medida" name="tabla_unidades_de_medida" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Símbolo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(elemento, i) in listado_unidades" :key="i">
                               <td>{{elemento.nombre}}</td>
                               <td>{{elemento.simbolo}}</td>
                               <td><a style='color:white' class='btn btn-primary' v-on:click='cargarInfoUnidad(elemento)' data-toggle="modal" data-target="#crear-unidad-de-medida"><i class='fas fa-pencil-alt'></i></a> <a style='color:white' class='btn btn-primary' v-on:click="eliminar(elemento)"><i class='fas fa-times-circle'></i></a></td>
                           </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal fade" id="crear-unidad-de-medida" tabindex="-1" role="dialog" aria-labelledby="rolLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rolLabel" v-if="this.bandera_modificar == false">NUEVA UNIDAD DE MEDIDA</h5>
                                <h5 class="modal-title" id="rolLabel" v-if="this.bandera_modificar">EDITAR UNIDAD DE MEDIDA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="tab-pane fade active show" id="homePIll" role="tabpanel" aria-labelledby="home-icon-pill">   
                                    <form class="needs-validation" v-on:submit.prevent="save"> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre:</label>
                                                    <input v-model="unidad.nombre" type="text" id="nombre" name="nombre" class="form-control" required v-uppercase>
                                                    <div class="invalid-feedback">
                                                        Por favor ingrese el nombre
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nombre">Símbolo:</label>
                                                    <input v-model="unidad.simbolo" type="text" id="simbolo" name="simbolo" class="form-control" required v-uppercase>
                                                    <div class="invalid-feedback">
                                                        Por favor ingrese el símbolo
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="clase">¿Aplica a Planes?:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-10 mb-3">
                                                <label class="checkbox checkbox-primary">
                                                    <input type="checkbox" checked>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <div class="float-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        </div>
                                    </form>
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
<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.multiselect {
    min-height:calc(var(--ms-border-width, 1px)*2 + var(--ms-font-size, 1rem)*var(--ms-line-height, 1.375) + var(--ms-py, .5rem)*1.3)
}
</style>
<script>
import Multiselect from '@vueform/multiselect/dist/multiselect.vue2.js'
import DataTables from "datatables.net";
require( 'jszip' );
require( 'datatables.net-dt' );
require( 'datatables.net-buttons-dt' );
require( 'datatables.net-buttons/js/buttons.html5.js' );
require( 'datatables.net-buttons/js/dataTables.buttons' );
import "datatables.net-dt/css/jquery.dataTables.min.css";
import print from 'datatables.net-buttons/js/buttons.print.js'
import jszip from 'jszip/dist/jszip';
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = jszip
//require( 'datatables.net-responsive-dt');

import { Datetime } from 'vue-datetime'

export default {
    components: {
      Multiselect,
      Datetime
    },
    data () {
        return {
            unidad:{
                nombre: '',
                simbolo: '',
            },
            listado_unidades:[],
            aplica_planes: null,
            bandera_modificar : false,
            tabla_unidades:null
        }
    },
    mounted() {
            this.cargarDatosTabla();
    },
    methods: {
        save(){
            if(this.bandera_modificar == false){
                var titulo = "¡Registro exitoso!";
                var mensaje = "Se ha guardado la Unidad de Medida satisfactoriamente";
                axios
    				.post("unidades-de-medida", this.unidad)
				    .then(response => {
                        swal({
  					    title: titulo,
					    icon: 'success',
  					    confirmButtonText: `OK`,
					    }).then((result) => {
                                this.cargarDatosTabla();
					    })
				    })
				    .catch(error => {
    					swal("Error", "No se pudo guardar la unidad de medida, por favor inténtelo nuevamente", "error");
				    });
            }
            else{
                var titulo = "Actualización exitosa!";
                var mensaje = "Se ha actualizado la Unidad de Medida satisfactoriamente";
                axios
    				.put("unidades-de-medida/"+this.unidad.id, this.unidad)
				    .then(response => {
                        swal({
  					    title: titulo,
					    icon: 'success',
  					    confirmButtonText: `OK`,
					    }).then((result) => {
                            this.cargarDatosTabla();
                            swal.close();
					    })
				    })
				    .catch(error => {
    					swal("Error", "No se pudo actualizar la unidad de medida, por favor inténtelo nuevamente", "error");
				    });
            }
        },
        eliminar(datos){
            swal({
  					title: "¿Desea eliminar la unidad de medida: <strong>"+datos.nombre+"</strong>?",
					icon: 'question',
  					showCancelButton: true,
  					confirmButtonText: "Sí, eliminar",
  					cancelButtonText: `Cancelar`,
				}).then((result) => {
  					if (result) {
						swal({
                    		title: "",
	                    	text: "Espere un poco por favor",
                    		imageWidth: 140,
                    		imageHeight: 70,
                    		showConfirmButton: false,
	                    	backdrop: `rgba(0,0,123,0.4)`,
							allowOutsideClick:false
                		});
						axios
                            .delete("unidades-de-medida/"+datos.id)
                            .then(response => {
                                swal({
                                title: "La Unidad de Medida fue eliminada",
                                icon: 'success',
                                confirmButtonText: `OK`,
                                }).then((result) => {
                                        this.cargarDatosTabla();
                                        swal.close();
                                })
                            })
                            .catch(error => {
                                swal("Error", "No se pudo actualizar la unidad de medida, por favor inténtelo nuevamente", "error");
                            });
  					}
				})
        },
        cargarDatosTabla(){
            axios
				.get("unidades-de-medida/getAll")
				.then(response => {
					this.listado_unidades = response.data;
                    $('#tabla_unidades_de_medida').DataTable().destroy()
                    this.$tablaGlobal('#tabla_unidades_de_medida')
				})
				.catch(error => {
					swal("Error", "No se pudo guardar la unidad de medida, por favor inténtelo nuevamente", "error");
				});
        },
        cargarInfoUnidad(datos){
            this.bandera_modificar = true;
            this.unidad.id = datos.id;
            this.unidad.nombre = datos.nombre;
            this.unidad.simbolo = datos.simbolo;
        },
    }
}
</script>