/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');
import Vue from 'vue';
import { Datetime } from 'vue-datetime'
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'
import { Settings } from 'luxon'

Settings.defaultLocale = 'es'
window.Vue = require('vue');

import VueCompositionAPI from '@vue/composition-api'
Vue.use(VueCompositionAPI)

Vue.use(Datetime)

Vue.directive('uppercase', {
	update (el) {
		el.value = el.value.toUpperCase()
	},
})
 
 Vue.component('usuarios', require('../components/administracion/seguridad/usuarios.vue').default);
 Vue.component('roles', require('../components/administracion/seguridad/roles.vue').default);
 Vue.component('temporizadores', require('../components/administracion/datos_basicos/temporizadores.vue').default);
 Vue.component('unidadesdemedida', require('../components/administracion/datos_basicos/unidades_de_medida.vue').default);
 
 Vue.prototype.$tablaGlobal = function(nombreTabla) {
	this.$nextTick(() => {		
    $(nombreTabla).DataTable({
        autoWidth: false,
        responsive: true,
        pageLength: 10,
        "language": {
            "lengthMenu": "Ver _MENU_ registros por página",
            "zeroRecords": "No hay información, lo sentimos.",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Filtrar",
            "paginate": {
                "first": "Primera",
                "last": "Última",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
      "order": [[ 0, 'desc' ]],
      dom: "<'row'<'col-sm-12 mb-3'B>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      buttons: [
        {
          "extend": "excelHtml5",
          "text": "<i class='fas fa-file-excel'></i> Excel",
          "titleAttr": "Exportar a Excel",
          "className": "btn btn-success"
        },
      ]
    });
  });
}

 const app = new Vue({
     el: '#app',
 });
