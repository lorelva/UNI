
function validarDatos(){
    if(document.frm1.Nombre.value.length==0)
    {
        document.getElementByID("Nombre").focus();
        return false;
    }
    if(document.frm1.Precio.value.length==0)
    {
        document.getElementByID("Precio").focus();
        return false;
    }
    frm1.submit();
}
