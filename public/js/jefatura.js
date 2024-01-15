//AL SELECCIONAR LA OPCIÓN DE ACTIVO EN EL DATO ESTADO, APARECERA FECHA DE ASCENSO. 
//  En Nuevo / Editar.
//  AL SELECCIONAR LA OPCIÓN DE INACTIVO EN EL DATO ESTADO, APARECERA FECHA DE RETIRO EN VEZ DE FECHA DE ASCENSO.
//  En Nuevo / Editar.
//$(document).ready(function(){
//      });
cambioEstado();
function cambioEstado(){
  idEstado = $("#idEstado").val();
  if(idEstado == 1){    // Activo
    $("#FechaAscenso").show();
  } else {
    $("#FechaAscenso").hide();
  }
  if(idEstado == 2 || idEstado == 3){    // Inactivo Destituido
    $("#FechaRetiro").show();
  } else {
    $("#FechaRetiro").hide();
  }

}


// AL COLOCAR EL DATO DE FECHA DE INGRESO AUTOMATICAMENTE EL SISTEMA ME ARROJARA EL DATO DE ANTIGÜEDAD
calcularAntiguedad();
function calcularAntiguedad() {
    // Si la fecha es correcta, calculamos la edad
    fecha=document.getElementById('FechaIngreso').value;
    if(fecha==''){
        document.getElementById('Antiguedad').value="Sin Fecha Ingreso";
        return
    }
    if (typeof fecha != "string" && fecha && esNumero(fecha.getTime())) {
        fecha = formatDate(fecha, "yyyy-MM-dd");
    }

    var values = fecha.split("-");
    var dia = values[2];
    var mes = values[1];
    var ano = values[0];

    // cogemos los valores actuales
    var fecha_hoy = new Date();
    var ahora_ano = fecha_hoy.getYear();
    var ahora_mes = fecha_hoy.getMonth() + 1;
    var ahora_dia = fecha_hoy.getDate();

    // realizamos el calculo
    var edad = (ahora_ano + 1900) - ano;
    if (ahora_mes < mes) {
        edad--;
    }
    if ((mes == ahora_mes) && (ahora_dia < dia)) {
        edad--;
    }
    if (edad > 1900) {
        edad -= 1900;
    }

    // calculamos los meses
    var meses = 0;

    if (ahora_mes > mes && dia > ahora_dia)
        meses = ahora_mes - mes - 1;
    else if (ahora_mes > mes)
        meses = ahora_mes - mes
    if (ahora_mes < mes && dia < ahora_dia)
        meses = 12 - (mes - ahora_mes);
    else if (ahora_mes < mes)
        meses = 12 - (mes - ahora_mes + 1);
    if (ahora_mes == mes && dia > ahora_dia)
        meses = 11;

    // calculamos los dias
    var dias = 0;
    if (ahora_dia > dia)
        dias = ahora_dia - dia;
    if (ahora_dia < dia) {
        ultimoDiaMes = new Date(ahora_ano, ahora_mes - 1, 0);
        dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
    }
    //console.log(edad + " años, " + meses + " meses y " + dias + " días");
    document.getElementById('Antiguedad').value= edad + " años, " + meses + " meses y " + dias + " días";
    //return edad + " años, " + meses + " meses y " + dias + " días";
}
    
function esNumero(strNumber) {
    if (strNumber == null) return false;
    if (strNumber == undefined) return false;
    if (typeof strNumber === "number" && !isNaN(strNumber)) return true;
    if (strNumber == "") return false;
    if (strNumber === "") return false;
    var psInt, psFloat;
    psInt = parseInt(strNumber);
    psFloat = parseFloat(strNumber);
    return !isNaN(strNumber) && !isNaN(psFloat);
}

// Previsualizar Foto
function colocarFoto() {
    $imagenPrevisualizacion = document.querySelector(".img-thumbnail");
    var userFile = document.getElementById('Foto');
    userFile.src = URL.createObjectURL(event.target.files[0]);
    $imagenPrevisualizacion.src = userFile.src; 
}
// Al presionar X, limpiar Foto
function limpiarFoto () {
    $('.img-thumbnail').attr("src", "");
    $('#Foto').val('');
}
  