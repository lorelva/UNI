//expresiones regulares
var expreNomyApe = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;
var expredir = /^[a-zA-Z0-9À-ÿ\s]{1,40}$/;
var expretel = /^\d{7,14}$/;
var expreemail = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;


function validacion(){
    if(document.frm.nombre.value.trim().length <3 || !expreNomyApe.test(document.frm.nombre.value)){
        document.getElementById("nombre").focus();
        nom.style.display=" ";
    }
}