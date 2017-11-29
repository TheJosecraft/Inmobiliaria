//window.addEventListener("load", Inicio);
//
//function Inicio(){
//    var bsumbit = document.querySelector("#enviar");
//    bsumbit.addEventListener("click", Validar);
//    var inombre = document.querySelector("#nombre");
//    inombre.addEventListener("blur", ValidarNombre);
//}
//
//function ValidarNombre(){
//    if(this.value.trim() == ""){
//        Aviso("El nombre no puede estar vacío");
//    }
//
//    if(this.value.length < 4){
//       Aviso("El nombre es muy corto");
//    }
//}
//
//function Aviso(msg){
//    alert(msg);
//}
//
//function Validar(event){
//    var inombre = document.querySelector("#nombre");
//    var itelefono1 = Document.querySelector("#telefono1");
//
//    if(inombre.value.length == 0){
//        alert("El nombre no puede estar vacío");
//        info_event.preventDefault();
//    }
//
//}

function Inicio(){
    var inombre = document.querySelector("#nombre");
    inombre.addEventListener("blur", ValidarNombre);
}

function ValidarNombre(event){
    if(this.value.trim() == ""){
        Aviso(this, "El nombre no puede estar vacío");
        event.preventDefault();
    }else{
        QuitarAviso(this);
    }

    if(this.value.length > 50){
        Aviso(this,"El nombre es demasiado largo");
        event.preventDefault();
    }else{
        QuitarAviso(this);
    }
}

function Aviso(campo, mensaje){
    campo.className += " error_entrada";
    campo.nextSibling.innerHTML = mensaje;
    campo.nextSibling.className = "error_mensaje";
    campo.nextSibling.style.display = "inline-block";
}

function QuitarAviso(campo){
    campo.className = "form-control";
    campo.nextSibling.className = " ";
    campo.nextSibling.style.display = "none";
}

window.addEventListener("load", Inicio);
