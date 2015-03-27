var readUrl   = 'index.php/fecha_detalle_controlador/getAllHabitacionesDetalles',
    readUsuario   = 'index.php/c_login/indexlogin',
    updateUrl = 'index.php/home/update',
    delUrl    = 'index.php/home/delete',
    delHref,
    updateHref,
    asInitVals = new Array(),
    updateId;


$( function() {
    cargarCalendarios();
    $( '#tabs' ).tabs({
        fx: {height: 'toggle', opacity: 'toggle'}
    });
    readControlLogin();
    readHabitacionesDetalles();

}); //end document ready


function readHabitacionesDetalles() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    
    $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {
            
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id;
            }
            
            //clear old rows
            $( '#records > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTable == 'undefined' )
                dataTable = $( '#records' ).dataTable({"bJQueryUI": true}
            
        
    );
      
            
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
            
            
            $("tfoot input").keyup( function () {
					//Filter on the column (the index) of this element */
					dataTable.fnFilter( this.value, $("tfoot input").index(this) );
				} );
				
				
				
				
				 // Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
				 // the footer
				 
				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
					}
				} );
            
            
           
            
            
        }
    });
} // end readUsers


function readControlLogin() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    
    $.ajax({
        url: readUsuario,
        dataType: 'json',
        success: function( response ) {
            
            $("input[id*=fecha_entradatxt]").val("logeado");

        }
        
    });
      
} // end readUsers





/* Modificar el pedido actual */
function editar() {
    // traerDataset();
    // Deshabilitar los campos
   /** $("input[id*=txtNumFactura]").removeAttr('disabled');
    $("input[id*=txtFecha]").removeAttr('disabled');
    $("input[id*=chbxContado]").removeAttr('disabled');
    $("input[id*=chbxCredito]").removeAttr('disabled');
    $("input[id*=txtCliente]").removeAttr('disabled');
    $("select[id*=drpDownFechaCotiz]").removeAttr('disabled');
    $("input[id*=txtTotal]").removeAttr('disabled');
    $("input[id*=txtProducto]").removeAttr('disabled');
    $("input[id*=txtCliente]").removeAttr('disabled');
    $("input[id*=txtTipoAsiento]").removeAttr('disabled');
    $("input[id*=btnNuevoCliente]").removeAttr('disabled');
    $("input[id*=btnNuevoProducto]").removeAttr('disabled');
    $("input[id*=btnBuscarCliente]").removeAttr('disabled');
    $("input[id*=btnBuscarProducto]").removeAttr('disabled');
    $("input[id*=btnNuevaCotizacion]").removeAttr('disabled');
    $("input[id*=btnBuscarCotizacion]").removeAttr('disabled');
    $("input[id*=btnNuevoTipoAsiento]").removeAttr('disabled');
    $("input[id*=btnBuscarTipoAsiento]").removeAttr('disabled');

    $("input[id*=txtCantCuotas]").removeAttr('disabled');
    $("input[id*=txtEntregaInicial]").removeAttr('disabled');

 **/
    // Oculto todos los botones
   // hideAllButtons();

    // mostrar solo los botones necesarios
   // $("input[id*=btnAceptar]").css("display", "inline");
   // $("input[id*=btnCancelar]").css("display", "inline");
  


  //  $("input[id*=txtNumFactura]").focus();
   // window.scroll(0,0);
    return false;
}

/* Función que se encarga de ocultar todos los botones*/
function hideAllButtons() {
    $("input[id*=btnFacturaNueva]").css("display", "none");
    $("input[id*=btnEditar]").css("display", "none");
    $("input[id*=btnAnular]").css("display", "none");
    $("input[id*=btnGuardar]").css("display", "none");
    $("input[id*=btnAceptar]").css("display", "none");
    $("input[id*=btnCancelar]").css("display", "none");
    $("input[id*=btnListar]").css("display", "none");
    $("input[id*=btnSalir]").css("display", "none");
    $("input[id*=btnProcesar]").css("display", "none");
    $("input[id*=btnImprimir]").css("display", "none");
    return false;
}

/* Limpiar campos */
function clearFields() {
   /**
    $("input[id*=txtNumFactura]").val("");
    $("input[id*=txtCliente]").val("");
    $("input[id*=txtRuc]").val("");
    $("input[id*=txtLimiteCredito]").val("0");
    $("input[id*=txtDireccion]").val("");
    $("input[id*=txtTelefono]").val("");
    $("input[id*=txtTipoAsiento]").val("");
    $("input[id*=txtCotizaFecha]").val("");
    $("input[id*=txtFecha]").val("");
   **/
    return false;
}

function comprobarFecha()
{
    if(compararFechas('idtxtfecha_entrada','idtxtfecha_salida')){
        return false;
    }
    var fecha1 = document.getElementById('idtxtfecha_entrada').value;
    var fecha2 = document.getElementById('idtxtfecha_salida').value;
    $.ajax({
            type: "POST",
            url: 'index.php/fecha_detalle_controlador/getHabitacionesDetalles',
            data: 'fecha1='+fecha1+'&fecha2='+fecha2,
            dataType: 'json',
            success: function( response )
            {
                    //clear old rows
                $( '#records > tbody' ).html( '' );

                //append new rows
                $( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
            }
    });
    return false;
}

function cargarCalendarios()
{
    $("#idtxtfecha_entrada").datepicker();
    $.datepicker.regional['es'] = getDatepicker();
    $.datepicker.setDefaults($.datepicker.regional['es']);
    
    $("#idtxtfecha_salida").datepicker();
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
        alert("La fecha del campo 'Fecha de Entrada:' debe ser mayor a la fecha del campo 'Fecha de Salida:'");
        return true;
    }
}


