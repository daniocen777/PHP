$(function () {
    autoresQry();
});

// Cerrar el modal
function modalClose() {
    $("#autor_ins").val("");
    $("#ins_error").html("");
    $("#modalIns").modal("hide");
    $("#autorModalDel").modal("hide");
    $("#autorModalDelFail").modal("hide");
    $("#autorModalUpdFail").modal("hide");
    $("#modalUpd").modal("hide");
}

// Listar autores
function autoresQry() {
    $.ajax({
        url: "./app/controller/AutoresController.php",
        dataType: "json",
        type: "post",
        data: {
            accion: "QRY"
        },
        success: function (data) {
            var body = "";
            for (var i = 0; i < data.length; ++i) {
                var idautor = data[i].idautor;
                var autor = data[i].autor;

                body += "<tr>"
                        + "<td>" + idautor + "</td>"
                        + "<td>" + autor + "</td>"
                        + "<th style='text-align: center'><input type='radio' name='idautor_upd' value='" + idautor + "'/></th>"
                        + "<th style='text-align: center'><input type='checkbox' name='idautor_del' value='" + idautor + "'/></th>"
                        + "</tr>";
            }
            $("#autoresQry").html(body);

        }
    });
}

// Insertar
function autoresIns() {
    $("#ins_error").html("");
    $("#ins_error").css("visibility", "hidden");

    $.ajax({
        url: "./app/controller/AutoresController.php",
        type: "post",
        dataType: "json",
        data: {
            accion: "INS",
            autor: $("#autor_ins").val()
        },
        success: function (error) {
            var msg = error[0];

            if ($.trim(msg).length !== 0 && msg !== 'ok') {
                var ctos = error.length;

                var msg2 = "<ul>";
                for (var i = 0; i < ctos; ++i) {
                    msg2 += "<li><div class='alert alert-danger'>" + error[i] + "</div></li>";
                }
                msg2 += "</ul>";

                $("#ins_error").html(msg2);
                $("#ins_error").css("visibility", "visible");
            }

        },
        error: function () {
            var ok = "<div class='alert alert-success alert-dismissable'>";
            ok += "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            ok += "<strong>¡Registro añadido!</strong> El registro se agregó correctamente";
            ok += "</div>";
            $("#ins_error").html("");
            $("#autor_ins").val("");
            $("#modalIns").modal("hide");
            $("#ins_ok").html(ok);
            autoresQry();
        }

    });
}

function autoresDelValidator() {
    var ids = [];
    $("input[name='idautor_del']:checked").each(function () {
        ids.push($(this).val());
    });
    if (ids.length === 0) {
        $("#autorModalDelFail").modal("show");
    } else {
        $("#autorModalDel").modal("show");
    }
}

function autoresDel() {
    var ids = [];

    $("input[name='idautor_del']:checked").each(function () {
        ids.push($(this).val());
    });
    $("#autorModalDel").modal("hide");
    $.ajax({
        url: "./app/controller/AutoresController.php",
        type: "post",
        dataType: "json",
        data: {
            accion: "DEL",
            ids: ids.toString()
        },
        success: function (error) {
            var msg = error[0].msg;

            if ($.trim(msg).length !== 0) {
                alert(msg);
                $("#ins_ok").text(msg);
                $("#ins_ok").css("visibility", "visible");
            }
        },
        error: function () {
            var ok = "<div class='alert alert-warning alert-dismissable'>";
            ok += "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            ok += "<strong>¡Registros eliminados!</strong> El(los) registro(s) fueron eliminados";
            ok += "</div>";
            $("#ins_ok").html(ok);
            autoresQry();
        }
    });
}

// GET
function autoresGet() {
    var id = $("input[name='idautor_upd']:checked").val();
    if (isNaN(id)) {
        $("#autorModalUpdFail").modal("show");
    } else {
        $("#modalUpd").modal("show");
        $.ajax({
            url: "./app/controller/AutoresController.php",
            dataType: "json",
            type: "post",
            data: {
                accion: "GET",
                idautor: id
            },
            success: function (data) {
                var idautor = data[0].idautor;
                var autor = data[0].autor;

                $("#idautor_upd").val(idautor);
                $("#autor_upd").val(autor);

            }
        });
    }
}

// Actualizar
function autoresUpd() {
    $.ajax({
        url: "./app/controller/AutoresController.php",
        type: "POST",
        dataType: "json",
        data: {
            accion: "UPD",
            idautor: $("#idautor_upd").val(),
            autor: $("#autor_upd").val()
        },
        success: function (error) {
            var msg = error[0];

            if ($.trim(msg).length !== 0 && msg !== 'ok') {
                var ctos = error.length;

                var msg2 = "<ul>";
                for (var i = 0; i < ctos; ++i) {
                    msg2 += "<li><div class='alert alert-danger'>" + error[i] + "</div></li>";
                }
                msg2 += "</ul>";

                $("#upd_error").html(msg2);
                $("#upd_error").css("visibility", "visible");

            }
        },
        error: function () {
            var ok = "<div class='alert alert-warning alert-dismissable'>";
            ok += "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            ok += "<strong>¡Registros actualizados!</strong> El registro fue actualizado";
            ok += "</div>";
            $("#modalUpd").modal("hide");
            $("#ins_ok").html(ok);
            autoresQry();
        }
    });
}