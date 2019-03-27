$(function () {
  var span = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
};

    $('#person_table').DataTable({
      "processing" : true,
      "serverSide" : true,
      "ajax" : "/admin/person/getData",
      "columns" : [
        {"data" : "id"},
        {"data" : "first_name"},      
        {"data" : "last_name"}, 
        {"data" : "birthday"},
        {"data" : "action", orderable:false, searchable:false},
        {"data" : "radio", orderable:false, searchable:false},
        {"data" : "checkbox", orderable:false, searchable:false}
      ], 
      "language": span
    });
    
  });

///// Insertar o actualizar
$(function () {
  $('#add_data').click(function() {
    $('#person_modal').modal('show');
    $('#person_form')[0].reset();
    $('#form_output').html('');
    $('#button_action').val('insert');
    $('#action').val('Agregar');
    $('#title_h3').text('Nueva Persona');
  });

  $('#person_form').on('submit', function(event) {
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
      url : "/admin/person",
      method : "post",
      data : form_data,
      dataType : "json",
      success : function(data) {
        if (data.error.length > 0) 
        {
          var error_html = '';
          for(var count = 0; count < data.error.length; count++)
          {

            error_html +=  '<div class="alert alert-danger alert-dismissable">' +
                          '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                            data.error[count] + '</div>' ;
          }

          $('#form_output').html(error_html);
        }
        else{
          $('#form_success').html(data.success);
          $('#person_form')[0].reset();
          //$('#action').val('Agregar');
          //$('.modal-title').text('Agregar nueva Categoría');
          //$('#button_action').val('insert');
          $('#person_modal').modal('hide');
          $('#person_table').DataTable().ajax.reload();
        }
      }
    })
  });

});

// Delete
// $(function() {
//   $(document).on('click', '.delete', function() {
//     $('#title_delete_h3').text('Eliminar Persona');
//     var id = $(this).attr("id");
//     $('#person_delete_modal').modal('show');

//     $('#person_delete_form').on('submit', function(event) {
//       event.preventDefault();
//       $.ajax({
//         url : "/admin/person/removedata",
//         method : "get",
//         data :  {id:id},
//         dataType : "json",
//         success : function(data) {
//             $('#person_delete_modal').modal('hide');
//             $('#form_success').html(data.success);
//             $('#person_table').DataTable().ajax.reload();
//         }
//       })
//     });
//   });
// });

// get para Editar
$(function(){
  $(document).on('click', '.edit', function() {
    var id = $(this).attr("id");
    $('#form_output').html('');
    $.ajax({
      url : "/admin/person/fetchData",
      method : "get",
      data :  {id:id},
      dataType : "json",
      success : function(data) {
          $('#first_name').val(data.first_name);
          $('#last_name').val(data.last_name);
          $('#birthday').val(data.birthday);
          $('#person_id').val(id);
          $('#person_modal').modal('show');
          $('#action').val('Editar');
          $('#title_h3').text('Editar Persona');
          $('#button_action').val('update');
      }
    })
  });
});

// Eliminar multiple 
$(function() {
  $(document).on('click', '#bulk_delete', function() {
    var id = [];
    if (confirm("¿Está seguiro de eliminar los registgros?")) {
      $('.person_checkbox:checked').each(function() {
        id.push($(this).val());
      });
      if (id.length > 0) {
        $.ajax({
          url : "/admin/person/removeMassive",
          method : "get",
          data :  {id:id},
          success : function(data) {
            $('#form_success').html(data.success);
            $('#person_table').DataTable().ajax.reload();
          }
        });
      } else {
        alert("Debe seleccionar al menos un registro");
      }
    }
  });

});


// Pruebas
$(function() {
  $(document).on('click', '.person_radio', function() {
    // var id = null;
    // $('.person_radio:checked').each(function() {
    //   id = $(this).val();
    // });
    // alert(id);

   var oRadio = $('input[name="person_radio"]:checked').val();
  

   alert(oRadio);
   
    
  });
});