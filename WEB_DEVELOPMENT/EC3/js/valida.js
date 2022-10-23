function validacion() {

    if (document.getElementById("txtnombre").value.length == 0) {
        alert("Favor de escribir su nombre");
        doument.frm.txtnombre.focus();
        return false;
    }
    if (document.getElementById("txtapp").value.length == 0) {
        alert("Favor de escribir su apellido paterno");
        doument.frm.txtapp.focus();
        return false;
    }
    if (document.getElementById("txtapm").value.length == 0) {
        alert("Favor de escribir su apellido materno");
        doument.frm.txtapm.focus();
        return false;
    }

    if (document.getElementById("txtedad").value.length == 0) {
        alert("Favor de escribir su edad");
        doument.frm.txtedad.focus();
        return false;
    }
    frm.submit();
}
