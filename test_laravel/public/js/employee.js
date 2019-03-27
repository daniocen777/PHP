$(function () {$('#employee_table').DataTable({
    "processing" : true,
    "serverSide" : true,
    "ajax" : "/admin/employees/getData",
    "columns" : [
      {"data" : "first_name", name: "people.first_name"},
      {"data" : "last_name", name: "people.last_name"},
      {"data" : "salary", name: "employees.salary"},
      {"data" : "action_edit", orderable:false, searchable:false},
      {"data" : "action_delete", orderable:false, searchable:false}
    ]
  });
});

// insert or Updte
$(function() {
  $('#add_data').click(function() {
    $('#employee_modal').modal('show');
    $('#employee_form')[0].reset();
    $('#button_action').val('insert');
    $('#action').val('Enviar Datos');
    $('#title_h3').text('Nueva Persona');
    $('#form_output').html('');
    peopleCBo();
  });

  $('#employee_form').on('submit', function(event) {

    var id = $("#personCbo").val();
    $('#person_id').val(id);
    event.preventDefault();
    var form_data = $(this).serialize();
    
    $.ajax({
      url : "/admin/employees",
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
          $('#employee_form')[0].reset();
          //$('#button_action').val('insert');
          $('#employee_modal').modal('hide');
          $('#employee_table').DataTable().ajax.reload();
        }
      }
    })
  });
});

// Función para llenar combo
function peopleCBo() {
  $.ajax({
    url : "/admin/employees/getpeoplecbo",
    method : "get",
    dataType : "json",
    success : function(data) {
      var option = "";
      option += "<option value='' selected='selected'>[..Seleccione..]</option>";

      var count = Object.keys(data).length;
      var id_update = $("#person_id").val();
  
      for (var i = 0; i < count; ++i) {
          var id = data[i].id;
          var opt = data[i].first_name + " " + data[i].last_name;
          
          if (id == id_update) {
            option += "<option selected='selected' value=\"" + id + "\">" + opt + "</option>";
          } else {
            option += "<option value=\"" + id + "\">" + opt + "</option>";
          }
         
      }
      $("#personCbo").html(option);
    }
  })
}

// Eliminar
$(function() {
  $(document).on('click', '.delete', function() {
    var id = $(this).attr("id");
    $('#employee_delete_modal').modal('show');
    $('#title_delete_h3').text('Eliminar Empleado');

    $('#employee_delete_form').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url : "/admin/employees/removedata",
        method : "get",
        data :  {id:id},
        dataType : "json",
        success : function(data) {
            $('#employee_delete_modal').modal('hide');
            $('#form_success').html(data.success);
            $('#employee_table').DataTable().ajax.reload();
        }
      })
    });
  });
});

// Pruebas
$(function() {
  $('#add_data').click(function() {
    $('#employee_modal').modal('show');
    $('#employee_form')[0].reset();
    peopleCBo()
  }); 
});

