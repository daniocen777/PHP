$(function () {
    frasesQry();
    autoresCbo();
});

function modalClose() {
    $("#autor_ins").val("");
    $("#ins_error").html("");
    $("#modalFrasesIns").modal("hide");
}

function frasesQry() {
    $.ajax({
        url: "../../app/controller/FrasesController.php",
        dataType: "json",
        type: "post",
        data: {
            accion: "QRY"
        },
        success: function (data) {
            var body = "";
            for (var i = 0; i < data.length; ++i) {
                var idfrase = data[i].idfrase;
                var autor = data[i].autor;
                var frase = data[i].frase;

                body += "<tr>"
                        + "<td>" + idfrase + "</td>"
                        + "<td>" + autor + "</td>"
                        + "<td>" + frase + "</td>"
                        + "<th style='text-align: center'><input type='radio' name='idfrase_upd' value='" + idfrase + "'/></th>"
                        + "<th style='text-align: center'><input type='checkbox' name='idfrase_del' value='" + idfrase + "'/></th>"
                        + "</tr>";
            }
            $("#frasesQry").html(body);

        }
    });
}

// Llenar combo de autores
function autoresCbo() {
    $.ajax({
        url: "../../app/controller/FrasesController.php",
        dataType: "json",
        type: "post",
        data: {
            accion: "CBO"
        },
        success: function (data) {

            var msg = $(data).find('msg').text();

            if ($.trim(msg).length !== 0) {
                $("#msg_error").text(msg);
                $("#msg_error").css("visibility", "visible");

            } else {
                var option = "";

                for (var i = 1; i < data.length; ++i) {
                    var idautor = data[i].idautor;
                    var autor = data[i].autor;


                    option += "<option value=\"" + idautor + "\">" + autor + "</option>";
                }
                $("#autorCbo").html(option);
            }
        }
    });
}

// Insertar frase
function frasesIns() {
    $("#ins_error").html("");
    $("#ins_error").css("visibility", "hidden");

    $.ajax({
        url: "../../app/controller/FrasesController.php",
        type: "post",
        dataType: "json",
        data: {
            accion: "INS",
            idautor: $("#autorCbo").val(),
            frase: $("#frase_ins").val()
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
            $("#frase_ins").val("");
            $("#modalFrasesIns").modal("hide");
            $("#ins_ok").html(ok);
            frasesQry();
        }
    });
}


