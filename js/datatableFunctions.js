// Tabla para mis consultas - consultas aceptadas
$(document).ready(function () {
    $("#example1").DataTable({
      //"responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "scrollX": true,
      "language": {
        "lengthMenu": "Display _MENU_ records per page",
        "zeroRecords": "Nada que ver. Lo sentimos.",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "Sin datos disponibles.",
        "infoFiltered": "(Filtrado de _MAX_ datos totales.)",
        "paginate": {
          "first":    'Pimero',
          "previous": "Anterior",
          "next": "Siguiente",
          "last": "Último",
        },
        "search": "Buscar: "
      },
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

//Tabla para administrar medicos
$(document).ready(function () {
  $("#tableAdminMedico").DataTable({
    //"responsive": true, 
    "lengthChange": false, 
    "autoWidth": false,
    "scrollX": true,
    "language": {
      "lengthMenu": "Display _MENU_ records per page",
      "zeroRecords": "Nada que ver. Lo sentimos.",
      "info": "Mostrando página _PAGE_ de _PAGES_",
      "infoEmpty": "Sin datos disponibles.",
      "infoFiltered": "(Filtrado de _MAX_ datos totales.)",
      "paginate": {
        "first":    'Pimero',
        "previous": "Anterior",
        "next": "Siguiente",
        "last": "Último",
      },
      "search": "Buscar: "
    },
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#tableAdminMedico_wrapper .col-md-6:eq(0)');
});