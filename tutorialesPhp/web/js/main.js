$(function () {
    tutorialesQry();
});

function tutorialesQry() {
    $.ajax({
        url: "../../app/controller/TutorialController.php",
        dataType: "json",
        type: "post",
        data: {
            accion: "QRY"
        },
        success: function (data) {
            //var idtutorial = data[1].idtutorial;

            var body = "";
            for (var i = 0; i < data.length; ++i) {
                var idtutorial = data[i].idtutorial;
                var titulo = data[i].titulo;
                var tipo = data[i].tipo;
                var precio = data[i].precio;

                body += "<tr>"
                        + "<td>" + idtutorial + "</td>"
                        + "<td>" + titulo + "</td>"
                        + "<td>" + tipo + "</td>"
                        + "<td>" + precio + "</td>"
                        + "<th><input type='radio' name='idtutorial_upd' value='" + idtutorial + "'/></th>"
                        + "<th><input type='checkbox' name='idtutorial_del' value='" + idtutorial + "'/></th>"
                        + "</tr>";
            }
            $("#tutorialesQry").html(body);

        }
    });
}

// Insertar
function tutorialesIns() {
    $.ajax({
        url: "../../app/controller/TutorialController.php",
        type: "post",
        dataType: "json",
        data: {
            accion: "INS",
            titulo: $("#titulo").val(),
            tipo: $("#tipo").val(),
            precio: $("#precio").val()
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
            $("#titulo").val("");
            $("#tipo").val("");
            $("#precio").val("");
            $("#ins_ok").html(ok);
        }

    });
}

// Eliminar
function tutorialesDel() {
    var ids = [];
    var prueba = 10;

    $("input[name='idtutorial_del']:checked").each(function () {
        ids.push($(this).val());
    });

    if (ids.length === 0) {
        message("Advertencia", "Seleccione fila(s) a Retirar");
    } else {
        $("#message").html("¿Retirar registro(s)?");

        $("#dlg_message").dialog({
            modal: true,
            width: 440,
            buttons: {
                "No": function () {
                    $(this).dialog("close");
                },
                "Si": function () {
                    $(this).dialog("close");

                    $.ajax({
                        url: "../../app/controller/TutorialController.php",
                        type: "post",
                        dataType: "json",
                        data: {
                            accion: "DEL",
                            ids: ids.toString()
                        },
                        success: function (error) {
                            var msg = error[0].msg;
                            //alert(msg);

                            if ($.trim(msg).length !== 0 && msg !== 'ok') {
                                $("#msg_error").text(msg);
                                $("#msg_error").css("visibility", "visible");

                            } else {
                                //alert("Entra al else");
                                var ok = "<div class='alert alert-warning alert-dismissable'>";
                                ok += "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                ok += "<strong>¡Registros eliminados!</strong> El(los) registro(s) fueron eliminados";
                                ok += "</div>";
                                $("#del_ok").html(ok);
                                tutorialesQry();
                                $("#msg_error").css("visibility", "hidden");
                            }
                        }
                    });
                }
            }
        });
    }
}

// Actualizar
function tutorialesUpd() {
    var id = $("input[name='idtutorial_upd']:checked").val();
    //alert(id);

    if (isNaN(id)) {
        message("Advertencia", "Seleccione Fila para Actualizar Datos");
    } else {
        $.ajax({
            url: "../../app/controller/TutorialController.php",
            dataType: "json",
            type: "post",
            data: {
                accion: "GET",
                idtutorial: id
            },
            success: function (data) {
                var idtutorial = data[0].idtutorial;
                var titulo = data[0].titulo;
                var tipo = data[0].tipo;
                var precio = data[0].precio;

                $("#idtutorial_upd").val(idtutorial);
                $("#titulo_upd").val(titulo);
                $("#tipo_upd").val(tipo);
                $("#precio_upd").val(precio);
                $("#upd_error").html("");
                $("#upd_error").css("visibility", "hidden");

                $("#dupd").dialog({
                    modal: true,
                    width: 440,
                    buttons: {
                        "Cancelar": function () {
                            $(this).dialog("close");
                        },
                        "Enviar Datos": function () {
                            $.ajax({
                                url: "../../app/controller/TutorialController.php",
                                type: "POST",
                                dataType: "json",
                                data: {
                                    accion: "UPD",
                                    idtutorial: $("#idtutorial_upd").val(),
                                    titulo: $("#titulo_upd").val(),
                                    tipo: $("#tipo_upd").val(),
                                    precio: $("#precio_upd").val()
                                },
                                success: function (error) {
                                    var msg = error[0].msg;
                                    alert("Entra al UPD");
                                    if ($.trim(msg).length !== 0 && msg !== 'ok') {
                                        alert("Entra al if");
                                        var ctos = error.length;

                                        var msg = "<ul>";
                                        for (var i = 0; i < ctos; ++i) {
                                            msg += "<li>" + error[i].msg + "</li>";
                                        }
                                        msg += "</ul>";

                                        $("#upd_error").html(msg);
                                        $("#upd_error").css("visibility", "visible");

                                    }
                                },
                                error: function () {
                                    alert("Entra al else");
                                    var ok = "<div class='alert alert-warning alert-dismissable'>";
                                    ok += "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                    ok += "<strong>¡Registros actualizados!</strong> El(los) registro(s) fueron actualizados";
                                    ok += "</div>";
                                    $("#upd_ok").html(ok);
                                    tutorialesQry();
                                    $("#msg_error").css("visibility", "hidden");
                                    $("#dupd").dialog("close");
                                    tutorialesQry();
                                }
                            });
                        }
                    }
                });

            }
        });
    }
}

