<template>
 <div>

     <div class="breadcrumb">
        <div class="col-lg-10">
        
        <h1>Clases de control</h1>
        </div>

       <div class="col-lg-2 ">
          <button style='color:white' @click="modificar=false; abrirModal();" type="button" class="btn btn-warning" data-toggle="modal" >
              <i class="fas fa-plus"></i>
           NUEVO
          </button>
        
      </div>
    </div>
   

    <div class="separator-breadcrumb border-top"></div>
          <!--tabla-->
          <div class="col-lg-12">
                    <div class="card text-left">

                        <div class="card-body">
                          <div class="table-responsive">
                            <table name ="tabla_clase_controles" id="tabla_clase_controles" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Estado</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Descripcion</th>
                              <th scope="col">Aplica a riesgos de corrupcion</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                           <tr v-for = "clase in clases">
                              <td>
    
                                  <span v-if="clase.estado === 0"  class="inactivo"></span>
                                  <span v-else class="activo"></span>

                                  
                               </td>
                               <td>{{clase.nombre}}</td>
                               <td>{{clase.descripcion}}</td>
                               <td>
                                  <span v-if="clase.estado_riesgos_corrupcion === 0" class="badge badge-light">No aplica</span>
                                  <span v-else class="badge badge-primary">Si aplica</span>
                               </td>
                               <td>
     
                                <a  style='color:white' @click="modificar=true; abrirModal(clase);"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_agentes">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button @click="eliminar(clase.id)"  class="btn btn-primary btn-sm"> <i class="fas fa-trash-alt"></i></button>
                             </td>
                           </tr>
                          </tbody>
                        </table>

                          </div>
                          
                        </div>
                    </div>
          </div>

        
  
     
    <!-- The Modal -->
    <div class="modal" :class="{mostrar: modal}">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">{{tituloModal}}</h4>
            <button @click="cerrarModal();"  type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <!-- Modal body -->
                    <div class="modal-body">
                      <div class="tab-pane fade active show" id="homePIll" role="tabpanel" aria-labelledby="home-icon-pill">  
                            <form  @submit.prevent ="save" id="form">
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label  class="required" for="nombre">Nombre :</label>
                                                <input v-model="clase.nombre" type="text" id="nombre" name="nombre" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descripcion">Descripcion:</label>
                                                <textarea v-model="clase.descripcion" class="form-control" name="" rows="2" cols="40"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="estado_riesgos_corrupcion">Aplica a riesgos de corrupcion ?</label>
                                              <br>

                                              <label class="checkbox checkbox-primary">
                                                    <input v-model="clase.estado_riesgos_corrupcion" type="checkbox" v-on:input="change" id="estado_riesgos_corrupcion"
                                                    name="estado_riesgos_corrupcion" value="0">
                                                    <span class="checkmark"></span>
                                                </label>
                                              

                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="estado">Estado:</label>
                                                  <br>
                                              <div class="custom-control custom-radio custom-control-inline">  
                                                <input v-model="clase.estado" type="radio" id="activo" name="estado" class="custom-control-input" value="1">
                                                <label class="custom-control-label" for="activo">Activo</label>
                                              </div>
                                              <div class="custom-control custom-radio custom-control-inline">
                                                <input v-model="clase.estado" type="radio" id="inactivo" name="estado" class="custom-control-input" value="0">
                                                <label class="custom-control-label" for="inactivo">Inactivo</label>
                                              </div>
                                              
                                            
                                                
                                            </div>
                                        </div>

                                        
   
                                    </div>
                                        <hr>
                                        <div align="right">
                                          

                                           <button @click="cerrarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Cancelar <i class="fas fa-window-close"></i>
                                          </button>
                                          <button  type="submit" class="btn btn-primary" >
                                             Guardar <i class="fas fa-save"></i>
                                          </button>
                                        </div>

                             </form>               
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
        clases:[],
        clase:{
            nombre:'',
            descripcion:'',
            estado:1,
            estado_riesgos_corrupcion:1
            },

          id:0,
          modificar:true,
          modal:0,
          tituloModal:'',
       
        }
    },
    mounted() {
      this.listar();
    },
    methods: {


        save: function ( event) {
        this.guardar();
        this.cerrarModal();
        },

        change: function ( event) {

        },



        async listar(){
          await axios.get('clases_controles/lista').then(res=>{
            this.clases =res.data;
            this.tabla();
          });
        } ,


        tabla() {
          $('#tabla_clase_controles').DataTable().destroy()
          this.$tablaGlobal('#tabla_clase_controles')
           
        },


        async guardar() {
        if(this.modificar){
            try {
               await axios.put('clases_controles/'+this.id , this.clase) ;
                     swal({
                            type: "success",
                            title: "Operación exitosa",
                            text: "Clase de control modificada con exito",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-lg btn-success",
                            confirmButtonText: "Cerrar"
                        });
            } catch (err) {
                 swal({
                      type: "error",
                      title: "Error!",
                      text:"'Lo sentimos ocurrio un error al modificar la clase de control",
                      confirmButtonText: "Cerrar",
                      buttonsStyling: false,
                      confirmButtonClass: "btn btn-lg btn-danger"
                     });

            }
       }else{
            try {
              await axios.post('clases_controles' , this.clase) ;
                  swal({
                       type: "success",
                       title: "Operación exitosa",
                       text: "Clase de control creada con exito",
                       buttonsStyling: false,
                       confirmButtonClass: "btn btn-lg btn-success",
                       confirmButtonText: "Cerrar"
                    });
            } catch (err) {
                 swal({
                      type: "error",
                      title: "Error!",
                      text:"Lo sentimos ocurrio un error al crear la clase de control",
                      confirmButtonText: "Cerrar",
                      buttonsStyling: false,
                      confirmButtonClass: "btn btn-lg btn-danger"
                     });
            }
        }
        this.cerrarModal();
        this.listar();
      },


        async eliminar(idClase) {
          
               swal({
                    title: "Esta seguro de eliminar esta clase de control?",
                    type: "warning",
                    showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Si ,Eliminar"
                }).then((result)=> {
                    if (result) {
                      axios.delete('clases_controles/' + idClase)
                        .then(response => {
                          swal({
                             type: "success",
                             title: "Operación exitosa",
                             text:"Clase de control eliminada con exito",
                             buttonsStyling: false,
                             confirmButtonClass: "btn btn-lg btn-success",
                             confirmButtonText: "Cerrar"
                          });
                          this.listar();
                        }).catch(error => {
                          swal({
                            type: "error",
                            title: "Error!",
                            text:"Lo sentimos ocurrio un error al eliminar la clase de control",
                            confirmButtonText: "Cerrar",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-lg btn-danger"
                           });
                        });
                    }
                });

        },

       

        abrirModal(data={}){
        this.modal=1;
        if(this.modificar){
           this.id=data.id;
          this.tituloModal="EDITAR CLASE DE CONTROL";
          this.clase.nombre=data.nombre;
          this.clase.descripcion=data.descripcion;
          this.clase.estado_riesgos_corrupcion=(data.estado_riesgos_corrupcion === 1 ) ? true :false ;
          this.clase.estado=data.estado;
        }else{
          this.id=0;
          this.tituloModal="NUEVA CLASE DE CONTROL";
          this.clase.nombre='';
          this.clase.descripcion='';
          this.clase.estado_riesgos_corrupcion=false;
          this.clase.estado=1;
        }
      },


      cerrarModal(){
        this.modal=0;
      },

    }
}
</script>
<style>
  .mostrar{
    display: list-item;
    opacity: 1;
    background: rgba(39, 42, 42 , 0.700);
  }

  .activo {
  height: 15px;
  width: 15px;
  background-color: #28B463;
  border-radius: 50%;
  display: inline-block;
}

.inactivo {
  height: 15px;
  width: 15px;
  background-color: #CB4335 ;
  border-radius: 50%;
  display: inline-block;
}
</style>