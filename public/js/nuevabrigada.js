$( document ).ready(function() 
{
    url = window.location.pathname;
    idJefatura = url.split('/')[2];
    $.get("/jefatura.brigadas/"+idJefatura, function(data, status)
    {
        
        $('#brigada').children().children('select').val(data[0].idBrigada ).change();
        data.shift();
        data.forEach(function( info) 
        {
           agregarBrigada( info.idBrigada);
        
        });

    });
    
});

var banderaBrigada = 0;
function agregarBrigada(idBrigada = 0)
{
    banderaBrigada++;
    brigadaFlag = 'borrarBrigada'+banderaBrigada;

    $("#agregarBrigada").clone()
        
        .addClass(brigadaFlag)
        .removeClass("hidden")
        .appendTo("#brigada")
        ;

    if(idBrigada > 0)
    {
        // $("#agregarBrigada").clone()
        // .addClass(brigadaFlag)
        // .removeClass("hidden")
        // .appendTo("#brigada")
        select = $('.'+brigadaFlag).children();
        select.val(idBrigada).change();
        select.attr('required',true)
        
    }
    else
    {
        // $("#agregarBrigada").clone()
        // .addClass(brigadaFlag)
        // .children().attr('required',true)
        // .removeClass("hidden")
        // .appendTo("#brigada")
        // ;

        select =   $('.'+brigadaFlag).children();
        select.attr('required',true)
    }
    
    $('#btnDelBrigada').removeClass('hidden');
}

var banderaCargo = 0;
function agregarCargo()
{
    banderaCargo++;
    var nuevoCargo = $("#agregarCargo").clone().addClass('borrarCargo' + banderaCargo).removeClass("hidden");
    nuevoCargo.find('select[name="idCargo[]"]').attr('name', 'idCargo[' + banderaCargo + ']');
    nuevoCargo.appendTo("#cargo");
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

