// Imprimir Tercero
function imprimir(){
  var printContent = document.getElementById('exportar2');
  var WinPrint = window.open('', '', 'width=1100,height=800');
            
  WinPrint.document.write(printContent.innerHTML);
  WinPrint.document.close();
}

// AL SELECCIONAR LA OPCION DE INACTIVO EN EL DATO ESTADO APERECER FECHA DE RETIRO.
// AL SELECCIONAR LA OPCIÓN DE ACTIVO EN EL DATO ESTADO, NO APARECERA FECHA DE RETIRO.
function cambioEstado(){
      estado=document.getElementById('idEstado').value;
      if(estado==1){ // ACTIVO
          document.getElementById('FechaAscenso').style.display='block';
          document.getElementById('FechaRetiro').style.display='none';
      }
      if(estado==2){ // INACTIVO
          document.getElementById('FechaAscenso').style.display='none';
          document.getElementById('FechaRetiro').style.display='block';
      }
}
// AL SELECCIONAR LA OPCIÓN DE CIVIL EN EL DATO TIPO,APARECERA SOLO INFORMACION PERSONAL.
// AL SELECCIONAR LA OPCIÓN DE TRABAJADOR EN EL DATO TIPO, APARECERA INFORMACION PERSONAL Y INFORMACION INTERNA.
function cambioTipoTercero(){
      estado=document.getElementById('idTipoTercero').value;
      if(estado==1){ // TRABAJADOR
          document.getElementById('InformacionPersonal').style.display='block';
          document.getElementById('InformacionInterna').style.display='block';
      }
      if(estado==2){ // CIVIL
          document.getElementById('InformacionPersonal').style.display='block';
          document.getElementById('InformacionInterna').style.display='none';
      }
}
