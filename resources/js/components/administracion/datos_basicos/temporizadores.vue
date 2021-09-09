<template>
    <div>
        <div class="breadcrumb">
            <h1>Temporizadores</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear-temporizador">
                        <i class="i-Clock"></i>
                        CREAR TEMPORIZADOR
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal fade" id="crear-temporizador" tabindex="-1" role="dialog" aria-labelledby="rolLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rolLabel">Nuevo Temporizador</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="tab-pane fade active show" id="homePIll" role="tabpanel" aria-labelledby="home-icon-pill">   
                                    <form class="needs-validation" v-on:submit.prevent="validarCampos"> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre:</label>
                                                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                                                    <div class="invalid-feedback">
                                                        Por favor ingrese el nombre
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="clase">Clase:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label v-for="(parametro,i) in clasesTemporizadores" :key="i" class="radio radio-primary pr-5 mb-3" style="display:inline !important">
                                                    <input type="radio" name="radio" v-bind:value="parametro.value" v-model="clase">
                                                    <span>{{parametro.name}}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <label for="parámetros">Parámetros:</label>
                                                        <div v-if="clase==1">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label for="parámetros">Meses:</label>
                                                                    <input type="number" v-model="intervalo.meses" min="0" max="12" value="0" id="meses" name="meses" class="form-control" required>
                                                                    <div class="invalid-feedback">
                                                                        Ingrese un número
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="parámetros">Días:</label>
                                                                    <input type="number" v-model="intervalo.dias" min="0" max="31" value="0" id="dias" name="dias" class="form-control" required>
                                                                    <div class="invalid-feedback">
                                                                        Ingrese un número
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="parámetros">Horas:</label>
                                                                    <input type="number" v-model="intervalo.horas" min="0" max="23" value="0" id="horas" name="horas" class="form-control" required>
                                                                    <div class="invalid-feedback">
                                                                        Ingrese un número
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="parámetros">Minutos:</label>
                                                                    <input type="number" v-model="intervalo.minutos" min="0" max="59" value="0" id="minutos" name="minutos" class="form-control" required>
                                                                    <div class="invalid-feedback">
                                                                        Ingrese un número
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-if="clase==2">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="parámetros">Mes:</label>
                                                                    <Multiselect v-model="evento.mes" v-on:input="getDiasMes" :options="optionsMes" :canClear="false" :canDeselect="false" trackBy="value" label="name" :required="true"/>
                                                                    <div class="invalid-feedback">
                                                                        Ingrese el mes
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="parámetros">Día:</label>
                                                                    <Multiselect v-model="evento.dia" :options="optionsDia" :canClear="false" :canDeselect="false" trackBy="value" label="name" :required="true"/>
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <label class="checkbox checkbox-primary">
                                                                        <input type="checkbox" v-model="evento.precision" v-on:click="setPrecision">
                                                                        <span>Sin precisión de horas y minutos</span>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6" v-if="evento.precision == false">
                                                                    <label for="parámetros">Hora:</label>
                                                                    <Multiselect v-model="evento.hora" :options="optionsHoras" :canClear="false" :canDeselect="false"/>
                                                                </div>
                                                                <div class="col-md-6" v-if="evento.precision == false">
                                                                    <label for="parámetros">Minuto:</label>
                                                                    <Multiselect v-model="evento.minuto" :options="optionsMinutos" :canClear="false" :canDeselect="false"/>
                                                                </div>
                                                                <!-- <div class="col-md-6 form-group mb-3">
                                                                    <label for="picker2">Hora y minuto</label>
                                                                    <datetime type="time" class="form-control" v-model="evento.horas_minutos" value-zone="America/Bogota" v-on:input="setHorasMinutos"></datetime>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <div v-if="clase==3">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                        <label for="parámetros">Día:</label>
                                                                        <Multiselect id="dia_especifico_mes" v-model="dia_especifico.dia" :options="optionsDiaSemana" v-on:input="evaluarTipoCada" :canClear="false" :canDeselect="false" trackBy="value" label="name" :required="true"/>
                                                                </div>
                                                                <div class="col-md-6 mt-3">
                                                                    <label for="parámetros"></label>
                                                                        <label class="checkbox checkbox-primary">
                                                                            <input type="checkbox" v-model="dia_especifico.precision" v-on:click="setPrecision">
                                                                            <span>Sin precisión de horas y minutos</span>
                                                                            <span class="checkmark"></span>
                                                                        </label>
                                                                </div>
                                                                <div class="col-md-6" v-if="dia_especifico.precision == false">
                                                                    <label for="parámetros">Hora:</label>
                                                                    <Multiselect v-model="dia_especifico.hora" :options="optionsHoras" :canClear="false" :canDeselect="false"/>
                                                                </div>
                                                                <div class="col-md-6" v-if="dia_especifico.precision == false">
                                                                    <label for="parámetros">Minuto:</label>
                                                                    <Multiselect v-model="dia_especifico.minuto" :options="optionsMinutos" :canClear="false" :canDeselect="false"/>
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="parámetros">CADA (Opcional):</label>
                                                                </div>
                                                                <div class="col-md-6 mt-2">
                                                                    <input type="number" v-model="dia_especifico.numeroCada" :disabled="disabledNumeroCada" class="form-control" :required="true">
                                                                </div>
                                                                <div class="col-md-6 mt-2">
                                                                    <Multiselect v-model="dia_especifico.tipoCada" :options="optionsTipoCada" v-on:input="evaluarTipoCada" :canClear="false" :canDeselect="false" trackBy="value" label="name" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <div class="float-right">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                            </div> -->
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
import Sweetalert2 from 'sweetalert2';
import { Datetime } from 'vue-datetime'

export default {
    components: {
      Multiselect,
      Datetime
    },
    data () {
        return {
            clasesTemporizadores:[],
            optionsMes:[],
            optionsDia:[],
            DiasMes:[31,28,31,30,31,30,31,31,30,31,30,31],
            optionsHoras:['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23'],
            optionsMinutos:['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59'],
            optionsDiaSemana:[],
            optionsTipoCada:[],
            clase:null,
            intervalo:{'meses':0, 'dias':0, 'horas':0, 'minutos':0},
            evento:{'hora':'00', 'minuto':'00','precision':false},
            dia_especifico:{'hora':'00', 'minuto':'00','precision':false, 'tipoCada':0},
            disabledNumeroCada:false,
            showDiaOrdinal:false,
            errors: [],
        }
    },
    mounted() {
        this.getParametroDetalle("clasesTemporizadores",2)
        this.getParametroDetalle("optionsMes",4)
        this.getParametroDetalle("optionsDiaSemana",5)
        this.getParametroDetalle("optionsTipoCada",6)
        this.getParametroDetalle("optionsDiaOrdinal",7)
    },
    methods: {
        getParametroDetalle(variable,parametro){
            axios
                .post("/options/getParametroDetalles", {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                parametro_id: parametro
            })
            .then(response => {
                if(parametro==4) this.optionsMes.push({'name':'Todos los meses', 'value':0});
                response.data.forEach(element => {
                    this[variable].push({'name':element.name, 'value':element.value});
                });
            })
            .catch(error => {
                console.log(error);
            });
        },
        getDiasMes(){
            delete this.evento["dia"];
            var diasMes = this.DiasMes[this.evento.mes-1];
            if(this.evento.mes == 0){
                diasMes = this.DiasMes[1];
                this.optionsDia = [];
            }
            else{
                diasMes = this.DiasMes[this.evento.mes-1];
                this.optionsDia = [{'name':'Todos los días del mes', 'value':0}];
            }
            for (var dia = 1; dia <= diasMes; dia++) {
                this.optionsDia.push({'name':dia, 'value':dia})
            }
        },
        setPrecision(){
            if(this.evento.precision == true){
                this.evento.hora = "00";
                this.evento.minuto = "00";
            }
            if(this.dia_especifico.precision == true){
                this.dia_especifico.hora = "00";
                this.dia_especifico.minuto = "00";
            }
        },
        evaluarTipoCada(){
            if(this.dia_especifico.dia == 8 || this.dia_especifico.dia == 9 || this.dia_especifico.dia == 10){
                this.optionsTipoCada[1].disabled = true;
            }
            else{
                this.optionsTipoCada[1].disabled = false;
            }

            if(this.dia_especifico.tipoCada == 0){
                delete this.dia_especifico["numeroCada"];
                this.disabledNumeroCada = true;
            }
            else{
                this.disabledNumeroCada = false;
            }
        },
        validarCampos(){
            if(this.clase == 1){
                    this.$swal("Guardado", "", "success");
            }

            if(this.clase == 2){
                if(!this.evento.hasOwnProperty('mes') || !this.evento.hasOwnProperty('dia')){
                    this.$swal("", "Debe diligenciar el mes y el día", "warning");
                }
                else{
                    this.$swal("Guardado", "", "success");
                }
            }

            if(this.clase == 3){
                var campos_faltantes = "";
                if(!this.dia_especifico.hasOwnProperty('dia')){
                    $("#dia_especifico_mes").css('border-color', 'red');
                    campos_faltantes = "Día";
                }
                else{
                    $("#dia_especifico_mes").css('border-color', '#4caf50');
                }
                if(this.dia_especifico.tipoCada != 0 && !this.dia_especifico.numeroCada){
                    campos_faltantes = "Campos de la sección 'CADA'";
                }

                if(campos_faltantes != ""){
                    this.$swal("", "Debe diligenciar los campos señalados en rojo", "warning");
                }
                else{
                    this.$swal("Guardado", "", "success");
                }
            }
        }
    }
}
</script>