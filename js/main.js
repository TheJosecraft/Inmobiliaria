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

    var iapellidos = document.querySelector("#apellidos");
    iapellidos.addEventListener("blur", ValidarApellidos);

    var idireccion = document.querySelector("#direccion");
    idireccion.addEventListener("blur", ValidarDireccion);

    var itelefono1 = document.querySelector("#telefono1");
    itelefono1.addEventListener("blur", ValidarTelefono1);

    var itelefono2 = document.querySelector("#telefono2");
    itelefono2.addEventListener("blur", ValidarTelefono2);
}

function ValidarNombre(event){

    if(this.value.trim() == ""){
        Aviso(this,"El nombre no puede estar vacío");

    }else if(this.value.length > 50){
        Aviso(this,"El nombre es demasiado largo");
    }else{
        QuitarAviso(this);
    }

}

function ValidarApellidos(event){

    if(this.value.trim() == ""){
        Aviso(this,"Los apellidos no pueden estar vacíos");

    }else if(this.value.length > 50){
        Aviso(this,"Los apellidos son demasiado largos");
    }else{
        QuitarAviso(this);
    }

}

function ValidarDireccion(event){

    if(this.value.trim() == ""){
        Aviso(this,"La dirección no puede estar vacía");

    }else if(this.value.length > 50){
        Aviso(this,"La dirección es demasiado larga");
    }else{
        QuitarAviso(this);
    }

}

function ValidarTelefono1(event){

    if(this.value.trim() == ""){
        Aviso(this,"El teléfono no puede estar vacío");

    }else if(this.value.length > 9){
        Aviso(this,"El teléfono es demasiado largo");
    }else{
        QuitarAviso(this);
    }

}

function ValidarTelefono2(event){

    if(this.value.trim() == ""){
        Aviso(this,"El teléfono no puede estar vacío");

    }else if(this.value.length > 9){
        Aviso(this,"El teléfono es demasiado largo");
    }else{
        QuitarAviso(this);
    }

}

function Aviso(campo, mensaje){
    padre = campo.parentNode;
    padre.className = "form-group has-error has-feedback"
    campo.className += " error_entrada";
    campo.nextSibling.innerHTML = mensaje;
    campo.nextSibling.className = "text-danger";
    campo.nextSibling.style.display = "inline-block";
}

function QuitarAviso(campo){
    padre = campo.parentNode;
    padre.className = "form-group has-success has-feedback"
    campo.className = "form-control";
    campo.nextSibling.className = "fa fa-check form-control-feedback";
    campo.nextSibling.innerHTML = "";
}

window.addEventListener("load", Inicio);
