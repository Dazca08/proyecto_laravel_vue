<template>
 <div>

  <div class="breadcrumb">
        <div class="col-lg-10">
        
        <h1>Clases</h1>
        </div>

       <div class="col-lg-2 ">
          <button style='color:white' @click="modificar=false; abrirModal();" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_clases">
            <i class="fas fa-plus"></i>
             NUEVO
           </button>
        
      </div>
    </div>
    <div class="separator-breadcrumb border-top"></div>
          <div class="col-lg-12">
                    <div class="card text-left">

                        <div class="card-body">
                          <div class="table-responsive">
                            <table name ="tabla_clases" id="tabla_clases" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Estado</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Descripcion</th>
                              <th scope="col">Matriz asociada</th>
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
                               <td>{{clase.matriz.nombre}}</td>
                               <td>
     
                                <a style='color:white' @click="modificar=true; abrirModal(clase);"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_clases">
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
      <div class="modal-dialog modal-lg">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre">Nombre :</label>
                                                <input v-model="clase.nombre" type="text" id="nombre" name="nombre" class="form-control" required>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="matriz">Matriz:</label>
                                                <!--<select v-model="clase.matriz_id" class="form-control" id="matriz_id" required>
                                                    <option v-for="matriz in matrices" :value="matriz.id">{{matriz.nombre}}</option>
                                                </select>-->
                                                <Multiselect
                                                    v-model="clase.matriz_id"
                                                    v-bind="selectMatrices"
                                                  ></Multiselect>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descripcion">Descripcion:</label>
                                                <textarea v-model="clase.descripcion" class="form-control" name="" rows="2" cols="40"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tipo">Agentes generadores</label>
                                                    <Multiselect
                                                      v-model="selectAgentes.value"
                                                      v-bind="selectAgentes"
                                                    ></Multiselect>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
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

                                          <button @click="cerrarModal();" type="button" class="btn btn-secondary"data-dismiss="modal">
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
        matrices:[],

        clase:{
            nombre:'',
            descripcion:'',
            matriz_id:'',
            estado:1,
            agentes:[] 
            },
          
          id:0,
          modificar:true,
          modal:0,
          tituloModal:'',


            selectAgentes: {
            mode: 'tags',
            value: [],
            placeholder: 'Seleccione los agentes generadores',
            searchable: true,
            createTag: true,
           //required: true,
            options: [] , 
            },

            selectMatrices: {
              value: 0,
              placeholder: 'Seleccione la matriz a asociar',
              searchable: true,
              required: true,
              options: []
            },




        }
    },
    mounted() {
      this.listar();
      this.listarMatrices();
      this.listarAgentesActivos();
    },
    methods: {
        save: function ( event) {
        this.guardar();
        this.cerrarModal();
        },

        async listar(){
         await axios.get('clases/lista').then(res=>{
            this.clases =res.data;
            this.tabla();
          });
        } ,


        tabla() {
          $('#tabla_clases').DataTable().destroy()
          this.$tablaGlobal('#tabla_clases')
            
        },


        async listarMatrices(){
          await axios.get('clases/lista-matrices').then(res=>{
            this.selectMatrices.options = res.data;
          });
        },

         async listarAgentesActivos(){
          await axios.get('clases/lista-agentes-activos').then(res=>{
            this.selectAgentes.options = res.data;
          });
        },

        async listarAgentesAsignados(id){
          await axios.get('clases/lista-agentes-asignados/'+id).then(res=>{
            this.selectAgentes.value = res.data;

          });
        },


        async guardar() {
          this.clase.agentes =this.selectAgentes.value;
          if(this.modificar){
              try {
                 await axios.put('clases/'+this.id , this.clase) ;
                      swal({
                            type: "success",
                            title: "Operación exitosa",
                            text: "Clase modificada con exito",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-lg btn-success",
                            confirmButtonText: "Cerrar"
                        });
              } catch (err) {
                  swal({
                      type: "error",
                      title: "Error!",
                      text:"'Lo sentimos ocurrio un error al modificar la clase",
                      confirmButtonText: "Cerrar",
                      buttonsStyling: false,
                      confirmButtonClass: "btn btn-lg btn-danger"
                     });
              }
         }else{
              try {
                await axios.post('clases' , this.clase) ;
                swal({
                       type: "success",
                       title: "Operación exitosa",
                       text: "Clase creada con exito",
                       buttonsStyling: false,
                       confirmButtonClass: "btn btn-lg btn-success",
                       confirmButtonText: "Cerrar"
                    }); 
              } catch (err) {
                swal({
                      type: "error",
                      title: "Error!",
                      text:"Lo sentimos ocurrio un error al crear la clase",
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
                    title: "Esta seguro de eliminar esta clase?",
                    type: "warning",
                    showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Si ,Eliminar"
                }).then((result)=> {
                    if (result) {

                      axios.delete('clases/' + idClase)
                      .then(response => {
                        swal({
                             type: "success",
                             title: "Operación exitosa",
                             text:"Clase eliminada con exito",
                             buttonsStyling: false,
                             confirmButtonClass: "btn btn-lg btn-success",
                             confirmButtonText: "Cerrar"
                          });

                        this.listar();
                      }).catch(error => {
                        swal({
                            type: "error",
                            title: "Error!",
                            text:"Lo sentimos ocurrio un error al eliminar la clase",
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
        this.selectAgentes.value = [];
        if(this.modificar){
          this.listarAgentesAsignados(data.id);
          this.id=data.id;
          this.tituloModal="EDITAR CLASE";
          this.clase.nombre=data.nombre;
          this.clase.descripcion=data.descripcion;
          this.clase.matriz_id=data.matriz_id;
          this.clase.estado=data.estado;

        }else{
          this.id=0;
          this.tituloModal="NUEVA CLASE";
          this.clase.nombre='';
          this.clase.descripcion='';
          this.clase.matriz_id='';
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

<style src="@vueform/multiselect/themes/default.css"></style>
