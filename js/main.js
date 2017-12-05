function Inicio(){
    var inombre = document.querySelector("#nombre");
    
    if(inombre != null){
       inombre.addEventListener("blur", ValidarNombre);
    }
    
    var iapellidos = document.querySelector("#apellidos");
    
    if(iapellidos != null){
       iapellidos.addEventListener("blur", ValidarApellidos);
    }

    var idireccion = document.querySelector("#direccion");
    
    if(idireccion != null){
       idireccion.addEventListener("blur", ValidarDireccion);
    }
    
    var itelefono1 = document.querySelector("#telefono1");
    
    if(itelefono1 != null){
       itelefono1.addEventListener("blur", ValidarTelefono1);
    }

    var itelefono2 = document.querySelector("#telefono2");
    
    if(itelefono2 != null){
        itelefono2.addEventListener("blur", ValidarTelefono2);
    }       
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
    }else if(this.value.length < 9){
        Aviso(this,"El teléfono es demasiado corto");
    }else if(isNaN(this.value)){
        Aviso(this,"El teléfono es no es un número");
    }else{
        QuitarAviso(this);
    }

}

//function ValidarTelefono2(event){
//
//    if(this.value.trim() == ""){
//        Aviso(this,"El teléfono no puede estar vacío");
//
//    }else if(this.value.length > 9){
//        Aviso(this,"El teléfono es demasiado largo");
//    }else{
//        QuitarAviso(this);
//    }
//
//}

function ValidarImagen(event){
    if(this.value.indexOf(".jpg") == -1 && this.value.type != file){
        event.preventDefault();
        Aviso(this,"La imagen no es correcta");
    }else if(this.value.indexOf(".png") == -1 && this.value.type != file){
        event.preventDefault();
        Aviso(this,"La imagen no es correcta");
    }else{
        QuitarAviso(this);
    }
}

function Aviso(campo, mensaje){
    padre = campo.parentNode;
    padre.className = "form-group has-error has-feedback"
    span = campo.nextSibling;
    siguiente = span.nextSibling;
    campo.className += " error_entrada";
    siguiente.innerHTML = mensaje;
    siguiente.className = "text-danger";
    campo.nextSibling.className = "text-danger fa fa-remove form-control-feedback";
    campo.nextSibling.style.display = "inline-block";
    siguiente.style.display = "inline-block";
}

function QuitarAviso(campo){
    padre = campo.parentNode;
    span = campo.nextSibling;
    siguiente = span.nextSibling;
    padre.className = "form-group has-success has-feedback"
    campo.className = "form-control";
    campo.nextSibling.className = "fa fa-check form-control-feedback";
    campo.nextSibling.innerHTML = "";
    campo.nextSibling.style.display = "inline-block";
    siguiente.style.display = "none";
}

window.addEventListener("load", Inicio);
