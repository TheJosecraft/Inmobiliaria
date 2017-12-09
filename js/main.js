var nombre = false;
var apellidos = false;
var direccion = false;
var telefono1 = false;
var descripcion = false;
var titular = false;
var contenido = false;
var precio = false;
var imagen = false;
var hora = false;
var vfecha = false;
var motivo = false;
var lugar = false;

function Inicio() {

    var inombre = document.querySelector("#nombre");

    if (inombre != null) {
        inombre.addEventListener("blur", ValidarNombre);
    }

    var iapellidos = document.querySelector("#apellidos");

    if (iapellidos != null) {

        iapellidos.addEventListener("blur", ValidarApellidos);
    }

    var idireccion = document.querySelector("#direccion");

    if (idireccion != null) {

        idireccion.addEventListener("blur", ValidarDireccion);
    }

    var itelefono1 = document.querySelector("#telefono1");

    if (itelefono1 != null) {

        itelefono1.addEventListener("blur", ValidarTelefono1);
    }

    var itelefono2 = document.querySelector("#telefono2");

    if (itelefono2 != null) {
        itelefono2.addEventListener("blur", ValidarTelefono2);
    }

    var ifecha = document.querySelector("#fecha");

    if (ifecha != null) {
        ifecha.addEventListener("blur", ValidarFecha);
    }

    var iDescripcion = document.querySelector("#descripcion");

    if (iDescripcion != null) {
        iDescripcion.addEventListener("blur", ValidarDescripcion);
    }

    var iPrecio = document.querySelector("#precio");
    if (iPrecio != null) {
        iPrecio.addEventListener("blur", ValidarPrecio);
    }

    var iImagen = document.querySelector("#imagen");
    if(iImagen != null){
       iImagen.addEventListener("change", ValidarImagen);
    }

    var iCliente = document.querySelector("#cliente");
    if(iCliente != null){
       iCliente.addEventListener("blur", ValidarCliente);
    }

    var iHora = document.querySelector("#hora");
    if(iHora != null){
       iHora.addEventListener("blur", ValidarHora);
    }

    var iTitular = document.querySelector("#titular");
    if(iTitular != null){
        iTitular.addEventListener("blur", ValidarTitular);
    }
    
    var iContenido = document.querySelector("#contenido");
    if(iContenido != null){
       iContenido.addEventListener("blur", ValidarContenido);
    }
    
    var iMotivo = document.querySelector("#motivo");
    if(iMotivo != null){
       iMotivo.addEventListener("blur", ValidarMotivo);
    }

    var iLugar = document.querySelector("#lugar");
    if(iLugar != null){
       iLugar.addEventListener("blur", ValidarLugar);
    }

    var iEnviarInsNoticia = document.querySelector("#enviarInsNoticia");
    if(iEnviarInsNoticia != null){
       iEnviarInsNoticia.addEventListener("click", ValidarInsNoticia);
    }

    var iEnviarInsCliente = document.querySelector("#enviarInsCliente");

    if (iEnviarInsCliente != null) {
        iEnviarInsCliente.addEventListener("click", ValidarInsCliente);
    }

    var iEnviarInsInmueble = document.querySelector("#enviarInsInmueble");

    if(iEnviarInsInmueble != null){
       iEnviarInsInmueble.addEventListener("click", ValidarInsInmueble);
    }

    var iEnviarInsCita = document.querySelector("#enviarInsCita");
    if(iEnviarInsCita != null){
        iEnviarInsCita.addEventListener("click", ValidarInsCita);
    }

}

function ValidarNombre(event) {

    if (this.value.trim() == "") {
        Aviso(this, "El nombre no puede estar vacío");
        nombre = false;
    } else if (this.value.length > 50) {
        Aviso(this, "El nombre es demasiado largo");
        nombre = false;
    } else if (!isNaN(this.value)) {
        Aviso(this, "El nombre no pueden ser números");
    } else {
        QuitarAviso(this);
        nombre = true;
        console.log(nombre);
    }

}

function ValidarMotivo(event) {

    if (this.value.trim() == "") {
        Aviso(this, "El motivo no puede estar vacío");
        motivo = false;
    } else if (this.value.length > 100) {
        Aviso(this, "El motivo es demasiado largo");
        motivo = false;
    } else if (!isNaN(this.value)) {
        Aviso(this, "El motivo no pueden ser números");
    } else {
        QuitarAviso(this);
        motivo = true;
        console.log(nombre);
    }

}

function ValidarApellidos(event) {

    if (this.value.trim() == "") {
        Aviso(this, "Los apellidos no pueden estar vacíos");
    } else if (this.value.length > 50) {
        Aviso(this, "Los apellidos son demasiado largos");
    } else if (!isNaN(this.value)) {
        Aviso(this, "Los apellidos no pueden ser números");
    } else {
        QuitarAviso(this);
        apellidos = true;
    }

}

function ValidarDireccion(event) {

    if (this.value.trim() == "") {
        Aviso(this, "La dirección no puede estar vacía");
        direccion = false;

    } else if (this.value.length > 150) {
        Aviso(this, "La dirección es demasiado larga");
        direccion = false;
    } else {
        QuitarAviso(this);
        direccion = true;
    }

}

function ValidarLugar(event) {

    if (this.value.trim() == "") {
        Aviso(this, "El lugar no puede estar vacío");
        lugar = false;

    } else if (this.value.length > 150) {
        Aviso(this, "El lugar es demasiado largo");
        lugar = false;
    } else {
        QuitarAviso(this);
        lugar = true;
    }

}

function ValidarTelefono1(event) {

    if (this.value.trim() == "") {
        Aviso(this, "El teléfono no puede estar vacío");
    } else if (isNaN(this.value)) {
        Aviso(this, "El teléfono es no es un número");
    } else if (this.value.length > 9) {
        Aviso(this, "El teléfono es demasiado largo");
    } else if (this.value.length < 9) {
        Aviso(this, "El teléfono es demasiado corto");
    } else {
        QuitarAviso(this);
        telefono1 = true;
    }

}

function ValidarTelefono2(event) {

    if (this.value.trim() != "") {
        if (isNaN(this.value)) {
            Aviso(this, "El teléfono no es un número");
        } else if (this.value.length > 9) {
            Aviso(this, "El teléfono es demasiado largo");
        } else if (this.value.length < 9) {
            Aviso(this, "El teléfono es demasiado corto");
        } else {
            QuitarAviso(this);
        }
    }

}

function ValidarHora(event){
//    var tiempo = this.value;
//    var hoy = new Date();
//    tiempo = tiempo.split(":");
//    var horas = tiempo[0];
//    var minutos = tiempo[1];

//    else if(horas < hoy.getHours()){
//        Aviso(this, "La hora no puede ser anterior a la actual");
//    }

    if(this.value.trim() == ""){
       Aviso(this, "La hora no puede estar vacía");
        hora = false;
    }else{
        QuitarAviso(this);
        hora = true;
    }
}

function ValidarFecha(event) {

    var fecha = new Date(this.value);
    var hoy = new Date();

    console.log("Fecha cita:" + fecha.getDate() + "/" + (fecha.getMonth() + 1) + "/" + fecha.getFullYear());
    console.log("Fecha actual: " + hoy.getDate() + "/" + (hoy.getMonth() + 1) + "/" + hoy.getFullYear());

    if (this.value.trim() == "") {
        Aviso(this, "La fecha no puede estar vacía");
        vfecha = false;
    } else if (fecha.getDate() < hoy.getDate()) {
        Aviso(this, "La fecha no puede ser anterior al día actual");
        vfecha = false;
    }else if (fecha.getMonth() < hoy.getMonth() && fecha.getFullYear >= hoy.getFullYear()) {
        Aviso(this, "El mes no puede ser anterior al mes actual");
        vfecha = false;
    }else if (fecha.getFullYear() < hoy.getFullYear()) {
        Aviso(this, "El año no puede ser anterior al año actual");
        vfecha = false;
    }else {
        QuitarAviso(this);
        vfecha = true;
    }
}

function ValidarImagen(event) {

    extension = this.value.substring(this.value.lastIndexOf('.'));
    if (extension != ".png" && extension != ".jpg") {
        Aviso(this, "La imagen no está en el formato correcto. Introduce una imagen con extensión JPG o PNG");
        imagen = false;
    }else{
        QuitarAviso(this);
        imagen = true;
    }
}

function ValidarDescripcion(event) {
    if (this.value.trim() == "") {
        Aviso(this, "La descripción no puede estar vacía");
        descripcion = false;

    } else if (this.value.length > 1500) {
        Aviso(this, "La dirección es demasiado larga");
        descripcion = false;
    } else {
        QuitarAviso(this);
        descripcion = true;
    }

}

function ValidarPrecio(event) {
    if (this.value.trim() == "") {
        Aviso(this, "El precio no puede estar vacío");
        precio = false;
    } else if (isNaN(this.value)) {
        Aviso(this, "El precio es no es un número");
        precio = false;
    } else if (this.value.length > 12) {
        Aviso(this, "El precio es demasiado largo");
        precio = false;
    } else {
        QuitarAviso(this);
        precio = true;
    }
}

function ValidarTitular(event) {

    if (this.value.trim() == "") {
        Aviso(this, "El titular no puede estar vacío");
        titular = false;
    } else if (this.value.length > 100) {
        Aviso(this, "El titular es demasiado largo");
        titular = false;
    } else if (!isNaN(this.value)) {
        Aviso(this, "El titular no pueden ser números");
        titular = false;
    } else {
        QuitarAviso(this);
        titular = true;
        console.log(nombre);
    }

}

function ValidarContenido(event) {
    if (this.value.trim() == "") {
        Aviso(this, "El contenido no puede estar vacío");
        contenido = false;
    } else if (this.value.length > 1500) {
        Aviso(this, "El contenido es demasiado largo");
        contenido = false;
    } else {
        QuitarAviso(this);
        contenido = true;
    }

}

function ValidarCliente(event){
    QuitarAviso(this);
}

function ValidarInsNoticia(event){
    if (!titular || !contenido || !vfecha || !imagen) {
        event.preventDefault();
        AvisoAlert("Faltan campos por rellenar");
    } else {
        QuitarAvisoAlert(this);
    }
}

function ValidarInsCliente(event) {

    if (!nombre || !apellidos || !direccion || !telefono1) {
        event.preventDefault();
        AvisoAlert("Faltan campos por rellenar");
    } else {
        QuitarAvisoAlert(this);
    }
}

function ValidarInsInmueble(event){

    if(!direccion || !descripcion || !precio || !imagen){
        event.preventDefault();
       AvisoAlert("Faltan campos por rellenar");
    }else{
        QuitarAvisoAlert(this);
    }
}

function ValidarInsCita(event){

    if(!motivo || !lugar || !hora || !vfecha){
        event.preventDefault();
       AvisoAlert("Faltan campos por rellenar");
    }else{
        QuitarAvisoAlert(this);
    }
}

function Aviso(campo, mensaje) {
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

function AvisoAlert(mensaje) {
    campo = document.querySelector("#alerta");
    campo.style.display = "block";
    campo.innerHTML = "<strong>¡Cuidado!</strong> " + mensaje;
}

function QuitarAvisoAlert() {
    campo = document.querySelector("#alerta");
    campo.style.display = "none";
}

function QuitarAviso(campo) {
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
