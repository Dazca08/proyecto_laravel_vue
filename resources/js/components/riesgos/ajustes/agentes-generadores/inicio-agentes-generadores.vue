<template>
 <div>

  <div class="breadcrumb">
        <div class="col-lg-10">
        
        <h1>Agentes Generadores</h1>
        </div>

       <div class="col-lg-2 ">
           <button style='color:white' @click="modificar=false; abrirModal();" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_agentes">
            <i class="fas fa-plus"></i>
             NUEVO
          </button>
        
      </div>
    </div>
    <div class="separator-breadcrumb border-top"></div>
          <div class="col-md-12">
                    <div class="card text-left">

                        <div class="card-body">
                          <div class="table-responsive">
                            <table name ="tabla_agentes" id="tabla_agentes" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Estado</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Descripcion</th>
                              <th scope="col">Tipo</th>
                              <th scope="col">Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                           <tr v-for = "agente in agentes">
                               <td>
                                  <span v-if="agente.estado === 0"  class="inactivo"></span>
                                  <span v-else class="activo"></span>
                               </td>
                               <td>{{agente.nombre}}</td>
                               <td>{{agente.descripcion}}</td>
                               <td>{{agente.tipo.descripcion}}</td>
                               <td>
     
                                <a style='color:white' @click="modificar=true; abrirModal(agente);"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_agentes">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button @click="eliminar(agente.id)"  class="btn btn-primary btn-sm"> <i class="fas fa-trash-alt"></i></button>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre">Nombre :</label>
                                                <input v-model="agente.nombre" type="text" id="nombre" name="nombre" class="form-control" required>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tipo">Tipo:</label>
                                                <!--<select v-model="agente.tipo_id" class="form-control" id="tipo_id" required>
                                                    <option v-for="tipo in tipos" :value="tipo.id">{{tipo.descripcion}}</option>
                                                </select>-->
                                                <Multiselect
                                                    v-model="agente.tipo_id"
                                                    v-bind="selectTipos"
                                                  ></Multiselect>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descripcion">Descripcion:</label>
                                                <textarea v-model="agente.descripcion" class="form-control" name="" rows="2" cols="40"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="estado">Estado:</label>
                                                  <br>
                                              <div class="custom-control custom-radio custom-control-inline">  
                                                <input v-model="agente.estado" type="radio" id="activo" name="estado" class="custom-control-input" value="1">
                                                <label class="custom-control-label" for="activo">Activo</label>
                                              </div>
                                              <div class="custom-control custom-radio custom-control-inline">
                                                <input v-model="agente.estado" type="radio" id="inactivo" name="estado" class="custom-control-input" value="0">
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
           agentes:[] ,
           tipos:[],
           agente:{
            nombre:'',
            descripcion:'',
            tipo_id:'',
            estado:1,
            },
          
          id:0,
          modificar:true,
          modal:0,
          tituloModal:'',

          selectTipos: {
              value: 0,
              placeholder: 'Seleccione el tipo',
              searchable: true,
              required: true,
              options: []
            },
       
        }
    },
    mounted() {
      this.listar();
      this.listarTipos();
    },
    methods: {
      
        save: function ( event) {
        this.guardar();
        this.cerrarModal();
        },
        async listar(){
         await axios.get('agentes_generadores/lista-agentes').then(res=>{
            this.agentes =res.data;
            this.tabla();
          });
        } ,
        tabla() {
          $('#tabla_agentes').DataTable().destroy()
          this.$tablaGlobal('#tabla_agentes')            
        },
        async listarTipos(){
          await axios.get('/parametros/retorno-parametros-multiselect/'+3).then(res=>{
            this.selectTipos.options = res.data;
          });


        },
      async guardar() {
        if(this.modificar){
            try {
               await axios.put('agentes_generadores/'+this.id , this.agente) ;
                      swal({
                            type: "success",
                            title: "Operación exitosa",
                            text: "Agente modificado con exito",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-lg btn-success",
                            confirmButtonText: "Cerrar"
                        });
            } catch (err) {
                      swal({
                          type: "error",
                          title: "Error!",
                          text:"'Lo sentimos ocurrio un error al modificar el agente",
                          confirmButtonText: "Cerrar",
                          buttonsStyling: false,
                          confirmButtonClass: "btn btn-lg btn-danger"
                      });
            }
       }else{
            try {
              await axios.post('agentes_generadores' , this.agente) ;
                  swal({
                       type: "success",
                       title: "Operación exitosa",
                       text: "Agente creado con exito",
                       buttonsStyling: false,
                       confirmButtonClass: "btn btn-lg btn-success",
                       confirmButtonText: "Cerrar"
                    }); 
            } catch (err) {
                  swal({
                      type: "error",
                      title: "Error!",
                      text:"Lo sentimos ocurrio un error al crear el agente",
                      confirmButtonText: "Cerrar",
                      buttonsStyling: false,
                      confirmButtonClass: "btn btn-lg btn-danger"
                     });
            }
        }
        this.cerrarModal();
        this.listar();
      },
      async eliminar(idAgente) {

              swal({
                    title: "Esta seguro de eliminar este agente?",
                    type: "warning",
                    showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Si ,Eliminar"
                }).then((result)=> {
                    if (result) {

                      axios.delete('agentes_generadores/' + idAgente)
                        .then(response => {
                          swal({
                             type: "success",
                             title: "Operación exitosa",
                             text:"Agente eliminado con exito",
                             buttonsStyling: false,
                             confirmButtonClass: "btn btn-lg btn-success",
                             confirmButtonText: "Cerrar"
                          });
                          this.listar();
                        }).catch(error => {
                          swal({
                            type: "error",
                            title: "Error!",
                            text:"Lo sentimos ocurrio un error al eliminar el agente",
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
          this.tituloModal="EDITAR AGENTE GENERADOR";
          this.agente.nombre=data.nombre;
          this.agente.descripcion=data.descripcion;
          this.agente.tipo_id=data.tipo_id;
          this.agente.estado=data.estado;
        }else{
          this.id=0;
          this.tituloModal="NUEVO AGENTE GENERADOR";
          this.agente.nombre='';
          this.agente.descripcion='';
          this.agente.tipo_id='';
          this.agente.estado=1;
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