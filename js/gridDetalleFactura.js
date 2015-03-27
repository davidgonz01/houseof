var readUrl   = 'index.php/c_factura/read',
    readTotalUrl = 'index.php/c_factura/readTotal',
    readRestaurantUrl   = 'index.php/c_factura/readRestaurant';

$( function() {
    cargarCalendarios();
    $( '#tabs' ).tabs({
        fx: {height: 'toggle', opacity: 'toggle'}
    });
    
    $( '#popupTarjeta' ).dialog({
        autoOpen: false,
        buttons: {
            'Aceptar': function() {
                if(!comprobarTarjeta()){
                    return 1;
                }
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                document.getElementById('textTotalPagado').value = document.getElementById('textMontoTarjeta').value;
                document.getElementById('textTotalPagado').setAttribute('disabled', 'false');
                $( this ).dialog( 'close' );
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
            },
            'Cancelar': function() {
                diego = document.getElementById('Tarjeta').checked = false;
                document.getElementById('textNumTarjeta').value = "";
                document.getElementById('textVencTarjeta').value = "";
                document.getElementById('textNroCupon').value = "";
                document.getElementById('textMontoTarjeta').value = "";
                
                document.getElementById('textTotalPagado').removeAttribute('disabled');
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
    });
    
    
    $( '#popupCheque' ).dialog({
        autoOpen: false,
        buttons: {
            'Aceptar': function() {
                if(!comprobarCheque()){
                    return 1;
                }
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                document.getElementById('textTotalPagado').value = document.getElementById('textMontoCheque').value;
                document.getElementById('textTotalPagado').setAttribute('disabled', 'false');
                $( this ).dialog( 'close' );
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
            },
            'Cancelar': function() {
                diego = document.getElementById('Cheque').checked = false;
                document.getElementById('textNumCheque').value = "";
                document.getElementById('textNumCuenta').value = "";
                document.getElementById('textMontoCheque').value = "";
                document.getElementById('textTotalPagado').removeAttribute('disabled');
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
    });
}); //end document ready**/

function readUsers() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    $.ajax({
        url: readUrl + '/' + document.getElementById('idCuenta').value,
        dataType: 'json',
        success: function( response ) {
            if( typeof dataTable == 'undefined' )
                dataTable = $( '#records' ).dataTable({"bJQueryUI": true,"bFilter": false,"bLengthChange": false});
            var totalAlojamiento = 0;
            $('#records').dataTable().fnClearTable();
            for( var i in response ) {
                var dias = diferenciaFechas(response[i].fecha1, response[i].fecha2);
                totalAlojamiento += (response[ i ].precio * dias);
                $('#records').dataTable().fnAddData( [
                        response[i].id_habitacion_detalles,
                        response[i].nro_habitacion,
                        response[i].descripcion,
                        response[i].fecha1,
                        response[i].fecha2,
                        response[i].precio]
                    );
            }
            document.getElementById('textTotalAlojamiento').value = totalAlojamiento;
            //clear old rows
            /*$( '#records > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTable == 'undefined' )
                dataTable = $( '#records' ).dataTable({"bJQueryUI": true,"bFilter": false,"bLengthChange": false});
            //hide ajax loader animation here...*/
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers
function readRestaurant() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    $.ajax({
        url: readRestaurantUrl + '/' + document.getElementById('idCuenta').value,
        dataType: 'json',
        success: function( response ) {
            if( typeof dataTable2 == 'undefined' )
                dataTable2 = $( '#create' ).dataTable({"bJQueryUI": true,"bFilter": false,"bLengthChange": false});
            $('#create').dataTable().fnClearTable();
            var totalRestaurant = 0;
            for( var i in response ) {
                    $('#create').dataTable().fnAddData( [
                        response[i].id_restaurante_detalle,
                        response[i].fecha_consumo,
                        response[i].nombre_plato,
                        response[i].cantidad,
                        response[i].submonto]
                    );
                
                    totalRestaurant += parseInt(response[ i ].submonto);
            }
            document.getElementById('textTotalRestaurant').value = totalRestaurant;
            //clear old rows
            //$( '#create> tbody' ).html( '' );
            
            
            //append new rows
            /*$( '#readTemplate2' ).render( response ).appendTo( "#create > tbody" );
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTable2 == 'undefined' )
                dataTable2 = $( '#create' ).dataTable({"bJQueryUI": true,"bFilter": false,"bLengthChange": false});
            //hide ajax loader animation here...*/
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readRestaurant

function readTotalAPagar() {
    $.ajax({
        url: readTotalUrl + '/' + document.getElementById('idCuenta').value,
        dataType: 'json',
        success: function( response ) {
            var subMonto = 0;
            var iva = 0
            for( var i in response ) {
                document.getElementById('textTotalPagar').value = response[ i ].saldo_deudor;
                iva = parseInt(response[ i ].saldo_deudor) * 0.1;
                subMonto = parseInt(response[ i ].saldo_deudor) - iva;
            }
            document.getElementById('textIva').value = iva;
            document.getElementById('textSubTotal').value = subMonto;
        }
    });
} // end readRestaurant

function readPedido(idCuenta,idPedido) {
    $.ajax({
            type: "POST",
            url: "index.php/c_factura/readPedido",
            data: 'idCuenta='+idCuenta+'&idPedido='+idPedido,
            dataType: 'json',
            async: false,
            success: function( response ) {
                var totalRestaurant = 0;
                for( var i in response ) {
                    totalRestaurant += parseInt(response[ i ].submonto);
                }
                document.getElementById('textTotalRestaurant').value = totalRestaurant;
                //clear old rows
                $( '#create> tbody' ).html( '' );

                //append new rows
                $( '#readTemplate2' ).render( response ).appendTo( "#create > tbody" );
                //apply dataTable to #records table and save its object in dataTable variable
                if( typeof dataTable2 == 'undefined' )
                    dataTable2 = $( '#create' ).dataTable({"bJQueryUI": true,"bFilter": false,"bLengthChange": false});
                //hide ajax loader animation here...
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
            }
        });
        
    $('#tabs a[href="#restaurant"]').tab('show');
        return false;
} // end readRestaurant

function comprobarTarjeta()
{
    document.getElementById('lbNumError').innerText = "";
    document.getElementById('lbFechaError').innerText = "";
    document.getElementById('lbCuponError').innerText = "";
    document.getElementById('lbMontoError').innerText = "";
    val = 1;
    if(document.getElementById('textNumTarjeta').value == ""){
        document.getElementById('lbNumError').innerText = "Campo requerido";
        val = 0;
    }
    if(document.getElementById('textVencTarjeta').value == ""){
        document.getElementById('lbFechaError').innerText = "Campo requerido";
        val = 0;
    }
    if(document.getElementById('textNroCupon').value == ""){
        document.getElementById('lbCuponError').innerText = "Campo requerido";
        val = 0;
    }
    if(document.getElementById('textMontoTarjeta').value == ""){
        document.getElementById('lbMontoError').innerText = "Campo requerido";
        val = 0;
    }
    
    if(compararFechas('textFecha', 'textVencTarjeta')){
        val = 0;
    }
    return val;
}

function comprobarCheque()
{
    document.getElementById('lbNumChequeError').innerText = "";
    document.getElementById('lbCuentaError').innerText = "";
    document.getElementById('lbMontoChequeError').innerText = "";
    
    val = 1;
    if(document.getElementById('textNumCheque').value == ""){
        document.getElementById('lbNumChequeError').innerText = "Campo requerido";
        val = 0;
    }
    if(document.getElementById('textNumCuenta').value == ""){
        document.getElementById('lbCuentaError').innerText = "Campo requerido";
        val = 0;
    }
    if(document.getElementById('textMontoCheque').value == ""){
        document.getElementById('lbMontoChequeError').innerText = "Campo requerido";
        val = 0;
    }
    return val;
}

function numbersonly(myfield, e, dec)
{
    var key;
    var keychar;

    if (window.event)
        key = window.event.keyCode;
    else if (e)
        key = e.which;
    else
        return true;
    keychar = String.fromCharCode(key);

    // control keys
    if ((key==null) || (key==0) || (key==8) || 
        (key==9) || (key==13) || (key==27) )
       return true;

    // numbers
    else if ((("0123456789").indexOf(keychar) > -1))
        return true;

    // decimal point jump
    else if (dec && (keychar == "."))
    {
        myfield.form.elements[dec].focus();
        return false;
    }
    else
        return false;
}

function cargarCalendarios()
{
    $("#textFecha").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es']);
    
    $("#textVencTarjeta").datepicker();
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
        alert("La tarjeta de credito ya expiro");
        return true;
    }
}
function diferenciaFechas(varFecha1, varFecha2) { 
    //Obtiene los datos del formulario  
    CadenaFecha2 = varFecha1; 
    CadenaFecha1 = varFecha2;

    //Obtiene dia, mes y año  
    var fecha1 = new fecha( CadenaFecha1 )     
    var fecha2 = new fecha( CadenaFecha2 )  

    //Obtiene objetos Date  
    var miFecha1 = new Date( fecha1.anio, fecha1.mes, fecha1.dia )  
    var miFecha2 = new Date( fecha2.anio, fecha2.mes, fecha2.dia )  

    //Resta fechas y redondea  
    var diferencia = miFecha1.getTime() - miFecha2.getTime();  
    var dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
    var segundos = Math.floor(diferencia / 1000);
    if(dias == 0){
        dias = dias+1;
    }
    return dias; 
} 

function fecha( cadena ) {  
  
   //Separador para la introduccion de las fechas  
   var separador = "/"  
  
   //Separa por dia, mes y año  
   if ( cadena.indexOf( separador ) != -1 ) {  
        var posi1 = 0  
        var posi2 = cadena.indexOf( separador, posi1 + 1 )  
        var posi3 = cadena.indexOf( separador, posi2 + 1 )  
        this.dia = cadena.substring( posi1, posi2 )  
        this.mes = cadena.substring( posi2 + 1, posi3 )  
        this.anio = cadena.substring( posi3 + 1, cadena.length )  
   } else {  
        this.dia = 0  
        this.mes = 0  
        this.anio = 0     
   }  
}  