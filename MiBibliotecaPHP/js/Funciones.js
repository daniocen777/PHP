// SE LLAMA EN EL HEAD
function Limpiar(){
    document.Insertar_Frm.reset(); // LO CARGO EN EL BODY CON ONLOAD
    document.Insertar_Frm.cod.focus();
}

function Validar(){
    var form = document.Insertar_Frm;
    if(form.cod.value == 0){
        alert("Ingrese su código ");
        form.cod.value == "";
        form.cod.focus();
        return false;
    }
    if(form.nombre_cat.value == 0){
        alert("Ingrese su nombre de categpria");
        form.nombre_cat.value == "";
        form.nombre_cat.focus();
        return false;
    }
    
    form.submit();
}

function Eliminar(url){
    if(confirm("¿Realmente desea eliminar el registro?")){
        window.location =  url;
    }
}
