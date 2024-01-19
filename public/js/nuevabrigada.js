$( document ).ready(function() 
{
    
});

var banderaBrigada = 0;
function agregarBrigada()
{
    banderaBrigada++;
    $("#agregarBrigada").clone().addClass('borrarBrigada'+banderaBrigada).removeClass("hidden").appendTo("#brigada");
    $('#btnDelBrigada').removeClass('hidden');
}

var banderaCargo = 0;
function agregarCargo()
{
    banderaCargo++;
    $("#agregarCargo").clone().addClass('borrarCargo'+banderaCargo).removeClass("hidden").appendTo("#cargo");
    $('#btnDelCargo').removeClass('hidden');
    
}


function eliminarElemento(tipo)
{
   if(tipo == 'brigada')
    {
        $('.borrarBrigada'+banderaBrigada).remove();
        banderaBrigada--;
        if( banderaBrigada == 0 )
        {
            $('#btnDelBrigada').addClass('hidden');
        }
    }
}

function eliminarElemento(tipo)
{
   if(tipo == 'cargo')
    {
        $('.borrarCargo'+banderaCargo).remove();
        banderaCargo--;
        if( banderaCargo == 0 )
        {
            $('#btnDelCargo').addClass('hidden');
        }
    }
}