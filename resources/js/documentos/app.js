/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

window.Vue = require('vue').default;

import Datatable from 'datatables.net-dt';
import "datatables.net-dt/css/jquery.dataTables.min.css";
require( 'datatables.net-buttons/js/dataTables.buttons' );
require( 'datatables.net-buttons/js/buttons.html5.js' );
import jszip from 'jszip/dist/jszip';
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";

pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = jszip;
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('tipos-documento', require('../components/documentos/ajustes/TiposDocumento.vue').default);
 Vue.component('gestionar', require('../components/documentos/documentos/Gestionar.vue').default);
 Vue.component('buscador', require('../components/documentos/BuscadorDocumentos.vue').default);

 Vue.prototype.$tablaGlobal = function(nombreTabla) {
	this.$nextTick(() => {		
    $(nombreTabla).DataTable({
      "order": [[ 0, 'desc' ]],
      dom: "<'row'<'col-sm-12 mb-3'B>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "No se encontró nada, lo sentimos",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
        "search": "Buscar:",
        "paginate": {
            "first":      "Primera",
            "last":       "Ultima",
            "next":       "Siguiente",
            "previous":   "Anterior"
        },
    },
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
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     el: '#app',
 });