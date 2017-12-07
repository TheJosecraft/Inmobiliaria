var nombre = false;
var apellidos = false;
var direccion = false;
var telefono1 = false;
var descripcion = false;
var contenido = false;
var precio = false;

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
    
    if(iDescripcion != null){
       iDescripcion.addEventListener("blur", ValidarDescripcion);
    }
    
    var iPrecio = document.querySelector("#precio");
    if(iPrecio != null){
       iPrecio.addEventListener("blur", ValidarPrecio);
    }

    var iEnviarInsCliente = document.querySelector("#enviarInsCliente");
    
    if(iEnviarInsCliente != null){
       iEnviarInsCliente.addEventListener("click", ValidarInsCliente);
    }
    
}

function ValidarNombre(event) {

    if (this.value.trim() == "") {
        Aviso(this, "El nombre no puede estar vacío");
        nombre = false;

    } else if (this.value.length > 50) {
        Aviso(this, "El nombre es demasiado largo");
        nombre = false;
    } else {
        QuitarAviso(this);
        nombre = true;
        console.log(nombre);
    }

}

function ValidarApellidos(event) {

    if (this.value.trim() == "") {
        Aviso(this, "Los apellidos no pueden estar vacíos");

    } else if (this.value.length > 50) {
        Aviso(this, "Los apellidos son demasiado largos");
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

function ValidarTelefono1(event) {

    if (this.value.trim() == "") {
        Aviso(this, "El teléfono no puede estar vacío");
    } else if (isNaN(this.value)) {
        Aviso(this, "El teléfono es no es un número");
    }else if (this.value.length > 9) {
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

function ValidarFecha(event) {

    var dia, mes, anio;
    var diaA, mesA, anioA;

    var fecha = new Date(this.value);
    var hoy = new Date();

    fecha = fecha.split("-");
    hoy = hoy.split("-");

    dia = fecha[2];
    mes = fecha[1];
    anio = fecha[0];

    diaA = hoy[2];
    mesA = hoy[1];
    anioA = hoy[0];

    alert(dia + mes + anio);
    alert(diaA + mesA + anioA);

    if (this.value.trim() == "") {
        Aviso(this, "La fecha no puede estar vacía");
    } else if (fecha.getDate() < hoy.getDate() && fecha.getMonth() + 1 < hoy.getMonth() + 1 && fecha.getFullYear() < hoy.getFullYear()) {
        Aviso(this, "La fecha no puede ser anterior al día actual");
    } else {
        QuitarAviso(this);
    }
}

function ValidarImagen(event) {
    if (this.value.indexOf(".jpg") == -1 && this.value.type != file) {
        event.preventDefault();
        Aviso(this, "La imagen nohrdrytrdud es correcta");
    } else if (this.value.indexOf(".png") == -1 && this.value.type != file) {
        event.preventDefault();
        Aviso(this, "La imagen no es correcta");
    } else {
        QuitarAviso(this);
    }
}

function ValidarDescripcion(event){
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

function ValidarPrecio(event){
    if (this.value.trim() == "") {
        Aviso(this, "El precio no puede estar vacío");
    } else if (isNaN(this.value)) {
        Aviso(this, "El precio es no es un número");
    }else if (this.value.length > 12) {
        Aviso(this, "El precio es demasiado largo");
    } else {
        QuitarAviso(this);
        precio = true;
    }
}

function ValidarInsCliente(event) {

    if (!nombre || !apellidos || !direccion || !telefono1) {
        event.preventDefault();
        AvisoAlert("Faltan campos por rellenar");
    }else{
        QuitarAviso(this);
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

function AvisoAlert(mensaje){
    campo = document.querySelector("#alerta");
    campo.style.display = "block";
    campo.innerHTML = "<strong>¡Cuidado!</strong> " + mensaje;
}

function QuitarAvisoAlert(){
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
