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


function agregarCargo()
{
    $("#agregarCargo").clone().removeClass("hidden").appendTo("#cargo");
    
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