
function validar(){
    if(document.formulario.usuario.value.length == 0)
    {
        document.getElementById("usuario").focus();
        return false;
    }

    if(document.formulario.contrasena.value.length == 0 )
    {
        document.getElementById("contrasena").focus();
        return false;
    }
    formulario.submit();
}
