$( function() {
    
    /*$( '#tabReportes' ).tabs({
        fx: {height: 'toggle', opacity: 'toggle'}
    });*/
    cargarCalendarios();
    //readAuditoria();
}); //end document ready


//funcion que retorna lista completa de reserva al cargar la pagina
function readAuditoria() {
    $.ajax({
        url: "index.php/c_log_auditoria/getAuditorias",
        dataType: 'json',
        success: function( response ) {
            //clear old rows
            $( '#detLog > tbody' ).html( '' );
            //append new rows
            $( '#readTemplateLog' ).render( response ).appendTo( "#detLog > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTableLog == 'undefined' )
                dataTableLog = $( '#detLog' ).dataTable({"bJQueryUI": true});
        }
    });
} // end readUsers

//obtine la lista de auditorias de acuerdo a las fechas indicadas
function getAuditoria() 
{;
    if(compararFechas('logFecha1','logFecha2')){
        return false;
    };
    var fecha1 = document.getElementById('logFecha1').value;
    var fecha2 = document.getElementById('logFecha2').value;
    var usuario = document.getElementById('textUsuario').value;
    var ddwComponente = document.getElementById('ddwComponente');
    var componente = ddwComponente[ddwComponente.selectedIndex].innerHTML;
    if(componente == "-Todos-"){
        componente = "";
    }
    var codigo = document.getElementById('textCodigo').value
    $.ajax({
            type: "POST",
            url: "index.php/c_log_auditoria/getAuditorias",
            data: 'fecha1='+fecha1+'&fecha2='+fecha2+'&usuario='+usuario+'&componente='+componente+'&codigo='+codigo,
            dataType: 'json',
            success: function( response ) {
                //clear old rows
                $('#detLog').dataTable().fnClearTable();
                //$( '#detLog > tbody' ).html( '' );
                //append new rows
                //$( '#readTemplateLog' ).render( response ).appendTo( "#detLog > tbody" );
                for( var i in response ) {
                    $('#detLog').dataTable().fnAddData( [
                        response[i].usuario,
                        response[i].nombre,
                        response[i].apellido,
                        response[i].rol,
                        response[i].fecha_log,
                        response[i].componente,
                        response[i].codigo_componente,
                        response[i].accion ]
                    );
                }
            }
    });
    
    return false;
}

function generarPdfAuditoria() 
{
    if(compararFechas('logFecha1','logFecha2')){
        return false;
    };
    var fecha1 = document.getElementById('logFecha1').value;
    var fecha2 = document.getElementById('logFecha2').value;
    var usuario = document.getElementById('textUsuario').value;
    var ddwComponente = document.getElementById('ddwComponente');
    var componente = ddwComponente[ddwComponente.selectedIndex].innerHTML;
    if(componente == "-Todos-"){
        componente = "";
    }
    var codigo = document.getElementById('textCodigo').value
    var user='Diego';
    window.open("index.php/c_log_auditoria/generarPdfAuditoria?fecha1="+fecha1+"&fecha2="+fecha2+"&usuario="+usuario+"&componente="+componente+"&codigo="+codigo+"&user="+user);
}

function cargarCalendarios()
{
    $("#logFecha1").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $("#logFecha2").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es']);
}

function getDatepicker()
{
    datepicker = {
        closeText: 'Cerrar',
        prevText: '&#x3c;Ant',
        nextText: 'Sig&#x3e;',
        currentText: 'Hoy',
        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
        'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
        'Jul','Ago','Sep','Oct','Nov','Dic'],
        dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
        dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
        weekHeader: 'Sm',
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    return datepicker;
}

//funcion que controla el ingreso de las fechas
function compararFechas(idFecha1, idFecha2)
{
    var str1 = document.getElementById(idFecha1).value;
    var str2 = document.getElementById(idFecha2).value;
    var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);
    if(date2 < date1)
    {
        alert("La fecha del campo 'Desde:' debe ser mayor a la fecha del campo 'Hasta:'");
        return true;
    }
}