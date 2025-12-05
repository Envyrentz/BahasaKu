import './bootstrap';
import $ from 'jquery';
import 'dropify/dist/js/dropify.min.js';
import 'dropify/dist/css/dropify.min.css';
import DataTable from 'datatables.net-dt';
import Alpine from 'alpinejs';

window.$ = $;
window.jQuery = $;
window.Alpine = Alpine;

Alpine.start();

$('.dropify').dropify();
$('#dataTable').DataTable({
    responsive: true
});