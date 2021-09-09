 require('../bootstrap');
 import Vue from 'vue';
 window.Vue = require('vue');
import VueCompositionAPI from '@vue/composition-api'


//import VueSweetAlert2 from 'vue-sweetalert2';
import Datatable from 'datatables.net-dt';
//import "sweetalert2/dist/sweetalert2.min.css";
import "datatables.net-dt/css/jquery.dataTables.min.css";
require( 'datatables.net-buttons/js/dataTables.buttons' );
require( 'datatables.net-buttons/js/buttons.html5.js' );
import print from 'datatables.net-buttons/js/buttons.print.js'
import jszip from 'jszip/dist/jszip';
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";

pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = jszip
Vue.use(VueCompositionAPI)
//Vue.use(VueSweetAlert2)
Vue.component('agentes-generadores', require('../components/riesgos/ajustes/agentes-generadores/inicio-agentes-generadores.vue').default);
Vue.component('clases-controles', require('../components/riesgos/ajustes/clases-controles/inicio-clases-controles.vue').default);
Vue.component('clases', require('../components/riesgos/ajustes/clases/inicio-clases.vue').default);
Vue.component('Multiselect' , require('@vueform/multiselect/dist/multiselect.vue2.js').default);

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