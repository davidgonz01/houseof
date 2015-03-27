var getFacturas   = 'index.php/c_reportes/getFacturas',
    getRestaurants = 'index.php/c_reportes/getRestaurants';


$( function() {
    
    $( '#tabReportes' ).tabs({
        fx: {height: 'toggle', opacity: 'toggle'}
    });
    cargarCalendarios();
    readFactura();
    readRestaurant();
    readReserva();
    readAlojamiento();
}); //end document ready


//funcion que retorna lista completa de reserva al cargar la pagina
function readReserva() {
    $.ajax({
        url: "index.php/c_reportes/getReportesReservas",
        dataType: 'json',
        success: function( response ) {
            //clear old rows
            $( '#detReserva > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplateRes' ).render( response ).appendTo( "#detReserva > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTableRes == 'undefined' )
                dataTableRes = $( '#detReserva' ).dataTable({"bJQueryUI": true});
        }
    });
} // end readUsers

//obtine la lista de reservas de acuerdo a las fechas indicadas
function getReporteReserva() 
{
    if(compararFechas('resFecha1','resFecha2')){
        return false;
    };
    
    var fecha1 = document.getElementById('resFecha1').value;
    var fecha2 = document.getElementById('resFecha2').value;
    var nroHab = document.getElementById('ddwNroHab').value;
    $.ajax({
            type: "POST",
            url: "index.php/c_reportes/getReportesReservas",
            data: 'fecha1='+fecha1+'&fecha2='+fecha2+'&nroHab='+nroHab,
            dataType: 'json',
            success: function( response ) {
                //clear old rows
                //$( '#detReserva > tbody' ).html( '' );
                //append new rows
                //$( '#readTemplateRes' ).render( response ).appendTo( "#detReserva > tbody" );
                $('#detReserva').dataTable().fnClearTable();
                for( var i in response ) {
                    $('#detReserva').dataTable().fnAddData( [
                        response[i].id_habitacion,
                        response[i].cliente,
                        response[i].nro_habitacion,
                        response[i].descripcion,
                        response[i].fecha1,
                        response[i].fecha2,
                        response[i].fecha]
                    );
                }
            }
    });
    return false;
}

function generarPdfReserva() 
{
    if(compararFechas('resFecha1','resFecha2')){
        return false;
    };
    var usuario='Diego';
    var fecha1 = document.getElementById('resFecha1').value;
    var fecha2 = document.getElementById('resFecha2').value;
    var nroHab = document.getElementById('ddwNroHab').value;
    window.open("index.php/c_reportes/generarPdfReserva?fecha1="+fecha1+"&fecha2="+fecha2+"&nroHab="+nroHab+"&usuario="+usuario);
} 

//funcion que retorna lista completa de alojamientos al cargar la pagina
function readAlojamiento() {
    $.ajax({
        url: "index.php/c_reportes/getReportesAlojamientos",
        dataType: 'json',
        success: function( response ) {
            //clear old rows
            $( '#detAlojamiento > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplateAloj' ).render( response ).appendTo( "#detAlojamiento > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTableAloj == 'undefined' )
                dataTableAloj = $( '#detAlojamiento' ).dataTable({"bJQueryUI": true});
        }
    });
} // end readUsers

//obtine la lista de alojamientos de acuerdo a las fechas indicadas
function getReporteAlojamiento() 
{
    if(compararFechas('alojFecha1','alojFecha2')){
        return false;
    };
    
    var fecha1 = document.getElementById('alojFecha1').value;
    var fecha2 = document.getElementById('alojFecha2').value;
    var nroHab = document.getElementById('ddwNroHab2').value;
    $.ajax({
            type: "POST",
            url: "index.php/c_reportes/getReportesAlojamientos",
            data: 'fecha1='+fecha1+'&fecha2='+fecha2+'&nroHab='+nroHab,
            dataType: 'json',
            success: function( response ) {
                //clear old rows
                $( '#detAlojamiento > tbody' ).html( '' );
                //append new rows
                $( '#readTemplateAloj' ).render( response ).appendTo( "#detAlojamiento > tbody" );
            }
    });
    return false;
}

function generarPdfAlojamiento() 
{
    if(compararFechas('alojFecha1','alojFecha2')){
        return false;
    };
    var usuario='Diego';
    var fecha1 = document.getElementById('alojFecha1').value;
    var fecha2 = document.getElementById('alojFecha2').value;
    var nroHab = document.getElementById('ddwNroHab2').value;
    window.open("index.php/c_reportes/generarPdfAlojamiento?fecha1="+fecha1+"&fecha2="+fecha2+"&nroHab="+nroHab+"&usuario="+usuario);
} 

//funcion que retornalista completa de factura al cargar la pagina
function readFactura() {
    $.ajax({
        url: "index.php/c_reportes/getReportesFacturas",
        dataType: 'json',
        success: function( response ) {
            //clear old rows
            $( '#detFactura > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplateFact' ).render( response ).appendTo( "#detFactura > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTableFact == 'undefined' )
                dataTableFact = $( '#detFactura' ).dataTable({"bJQueryUI": true});
        }
    });
} // end readUsers

//obtine la lista de facturas de acuerdo a las fechas indicadas
function getReporteFactura() 
{
    if(compararFechas('factFecha1','factFecha2')){
        return false;
    };
    
    var fecha1 = document.getElementById('factFecha1').value;
    var fecha2 = document.getElementById('factFecha2').value;
    $.ajax({
            type: "POST",
            url: "index.php/c_reportes/getReportesFacturas",
            data: 'fecha1='+fecha1+'&fecha2='+fecha2,
            dataType: 'json',
            success: function( response ) {
                //clear old rows
                $( '#detFactura > tbody' ).html( '' );
                //append new rows
                $( '#readTemplateFact' ).render( response ).appendTo( "#detFactura > tbody" );
            }
    });
    return false;
}

function generarPdfFactura() 
{
    if(compararFechas('factFecha1','factFecha2')){
        return false;
    };
    var usuario='Diego';
    var fecha1 = document.getElementById('factFecha1').value;
    var fecha2 = document.getElementById('factFecha2').value;
    window.open("index.php/c_reportes/generarPdfFactura?fecha1="+fecha1+"&fecha2="+fecha2+"&usuario="+usuario);
} // 


//funcion que retornalista completa de restaurant al cargar la pagina
function readRestaurant() {
    $.ajax({
        url: "index.php/c_reportes/getReportesRestaurants",
        dataType: 'json',
        success: function( response ) {
            //clear old rows
            $( '#detRestaurant > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplateRest' ).render( response ).appendTo( "#detRestaurant > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTableRest == 'undefined' )
                dataTableRest = $( '#detRestaurant' ).dataTable({"bJQueryUI": true});
        }
    });
} // end readUsers

//obtine la lista de facturas de acuerdo a las fechas indicadas
function getReporteRestaurant() 
{
    if(compararFechas('restFecha1','restFecha2')){
        return false;
    };
    var fecha1 = document.getElementById('restFecha1').value;
    var fecha2 = document.getElementById('restFecha2').value;
    var estado = document.getElementById('ddwEstadoRest').value;
    $.ajax({
            type: "POST",
            url: "index.php/c_reportes/getReportesRestaurants",
            data: 'fecha1='+fecha1+'&fecha2='+fecha2+'&estado='+estado,
            dataType: 'json',
            success: function( response ) {
                //clear old rows
                //$( '#detRestaurant > tbody' ).html( '' );
                //append new rows
                //$( '#readTemplateRest' ).render( response ).appendTo( "#detRestaurant > tbody" );
                $('#detRestaurant').dataTable().fnClearTable();
                for( var i in response ) {
                    $('#detRestaurant').dataTable().fnAddData( [
                        response[i].id_restaurante,
                        response[i].cliente,
                        response[i].nombre_plato,
                        response[i].cantidad,
                        response[i].fecha,
                        response[i].submonto,
                        response[i].estado]
                    );
                }
            }
    });
    return false;
}

function generarPdfRestaurant() 
{
    if(compararFechas('restFecha1','restFecha2')){
        return false;
    };
    var usuario='Diego';
    var fecha1 = document.getElementById('restFecha1').value;
    var fecha2 = document.getElementById('restFecha2').value;
    var estado = document.getElementById('ddwEstadoRest').value
    window.open("index.php/c_reportes/generarPdfRestaurant?fecha1="+fecha1+"&fecha2="+fecha2+"&estado="+estado+"&usuario="+usuario);
} //

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
function cargarCalendarios()
{
    $("#resFecha1").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $("#resFecha2").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es']);
    
    $("#factFecha1").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es'])
    $("#factFecha2").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es'])
    
    $("#restFecha1").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es'])
    $("#restFecha2").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es'])
    
    $("#alojFecha1").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es'])
    $("#alojFecha2").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es'])
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