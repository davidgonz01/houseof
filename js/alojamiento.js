var readUrl   = 'index.php/c_alojamiento/getAllHabitacionesDetalles',
    updateUrl = 'index.php/home/update',
     updateUrlestado = 'index.php/c_alojamiento/cambiarEstadoHabitaciones',
    delUrl    = 'index.php/home/delete',
    delHref,
    updateHref,
    asInitVals = new Array(),
   updateIdCuenta,
    updateId;


$( function() {
    
    $( '#tabs' ).tabs({
        fx: {height: 'toggle', opacity: 'toggle'}
    });
    clearFields();
   // readHabitacionesDetalles();
     $( '#msgDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'Ok': function() {
                $( this ).dialog( 'close' );
            }
        }
    });
    
    $( '#updateDialog' ).dialog({
        autoOpen: false,
        buttons: {
            'Update': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: updateHref,
                    type: 'POST',
                    data: $( '#updateDialog form' ).serialize(),
                    
                    success: function( response ) {
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                     //   var name = document.getElementById("idtxtfecha_entrada");
      //  var contenido = name.value;
      //var name2 =$("input[id*=idtxtfecha_entrada]").attr("name").toString();
     // var contenido = name.value;
      //   $( '#fecha_entradatxt' ).val(contenido);
                        
                        //--- update row in table with new values ---
                      //  var clientetxt = $( 'tr#' + updateId + ' td' )[ 1 ];
                        //var email = $( 'tr#' + updateId + ' td' )[ 2 ];
                        
                     // $( name ).html( $( '#clientetxt' ).val() );
                      //  $( email ).html( $( '#email' ).val() );
                        
                        //--- clear form ---
                        $( '#updateDialog form input' ).val( '' );
                        
                    } //end success
                    
                }); //end ajax()
            },
            
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
    }); //end update dialog
        $( '#delConfDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'No': function() {
                $( this ).dialog( 'close' );
            },
            
            'Yes': function() {
                //display ajax loader animation here...
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: delHref,
                    
                    success: function( response ) {
                        //hide ajax loader animation here...
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                        $( 'a[href=' + delHref + ']' ).parents( 'tr' )
                        .fadeOut( 'slow', function() {
                            $( this ).remove();
                        });
                        
                    } //end success
                });
                
            } //end Yes
            
        } //end buttons
        
    }); //end dialog

}); //end document ready

var montoTotalAlojamiento = 0;
function readHabitacionesDetalles() {
    //display ajax loader animation
    var fecha2 = document.getElementById("id_cuentaajaxtxt");
   
       updateIdCuenta=  parseInt(fecha2.value);
     //  alert(updateIdCuenta);
    $.ajax({
          
        url: 'index.php/c_alojamiento/getAllHabitacionesDetalles/' + updateIdCuenta,
        dataType: 'json',
        async: false,
        success: function( response ) {
            //clear old rows
            /*$( '#records > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable*/
            if( typeof dataTable == 'undefined' )
                dataTable = $( '#records' ).dataTable({"bJQueryUI": true});
            $('#records').dataTable().fnClearTable();
            for( var i in response ) {
                var dias = diferenciaFechas2(response[i].fecha_entrada, response[i].fecha_salida);
                montoTotalAlojamiento += (response[ i ].precio * dias);
                $('#records').dataTable().fnAddData( [
                        response[i].id_habitacion_detalles,
                        response[i].nro_habitacion,
                        response[i].descripcion,
                        response[i].fecha_entrada,
                        response[i].fecha_salida,
                        response[i].precio]
                    );
            }
            
           $("a[id*=nuevoaljamiento]").css("display", "block"); 
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
     $( '#records> tbody' ).html( '' );
            
            
              $("input[id*=id_cuentaajaxtxt]").val("");
    $("input[id*=id_habitxt]").val("");
    $("input[id*=cliente_txt]").val("");
    $("input[id*=fecha_entradatxt]").val("");
    $("input[id*=fecha_salidatxt]").val("");
    $("input[id*=tipo_habitacion_txt]").val("");
    $("input[id*=precio_txt]").val("");
     $("a[id*=nuevoaljamiento]").css("display", "none");
    return false;
}

function cambiarEstadosHabitaciones(){
    if(VericarsiHayCliente()){
        return false;
    }
    actualizarCuenta();
     var cuenta = document.getElementById("id_cuentaajaxtxt");
   
       updateIdCuenta=  parseInt(cuenta.value);
    
    
      $.ajax({
          
        url: 'index.php/c_alojamiento/cambiarEstadoHabitaciones/' + updateIdCuenta,
        dataType: 'json',
        success: function( response ) {
           
           $( '#msgDialog > p' ).html( 'New user created successfully555!' );
           $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
           readHabitacionesDetalles()
          //clearFieldstxt();
         
        }
        
    });
    
     clearFields();
    
    
    
}

function actualizarCuenta()
{
    var cuenta = document.getElementById("id_cuentaajaxtxt");
    $.ajax({
       type: "POST",
       url: 'index.php/c_alojamiento/guardarEnCuenta',
       data: 'idCuenta='+cuenta.value+'&monto='+montoTotalAlojamiento,
       dataType: 'json',
       success: function( response ) {
                        
       } 
    }); 
    montoTotalAlojamiento = 0;
}

function VericarsiHayCliente()
{
    var nro = document.getElementById("idtxtnro_documento").value;
   
  
    if(nro == "")
    {
        alert("No ha ingresado Cliente");
        return true;
    }
}

function clearFields() {
   
    $("input[id*=idtxtnombre]").val("");
    $("input[id*=idtxtapellido]").val("");
    $("input[id*=idtxtnro_documento]").val("");
    $("input[id*=idtxttelefono]").val("");
    $("input[id*=id_clientetxt]").val("");
    $("input[id*=id_cuentatxt]").val("");
    $("input[id*=idtxtfecha_entrada]").val("");
    $("input[id*=idtxtfecha_salida]").val("");
    $("input[id*=txtFecha]").val("");
  //clear old rows
            $( '#records> tbody' ).html( '' );
             $( '#records2> tbody' ).html( '' );
            
              $("input[id*=id_cuentaajaxtxt]").val("");
    $("input[id*=id_habitxt]").val("");
    $("input[id*=cliente_txt]").val("");
    $("input[id*=fecha_entradatxt]").val("");
    $("input[id*=fecha_salidatxt]").val("");
    $("input[id*=tipo_habitacion_txt]").val("");
    $("a[id*=nuevoaljamiento]").css("display", "none");
   
   
}
function clearFieldstxt() {
   
    $("input[id*=idtxtnombre]").val("");
    $("input[id*=idtxtapellido]").val("");
    $("input[id*=idtxtnro_documento]").val("");
    $("input[id*=idtxttelefono]").val("");
    $("input[id*=id_clientetxt]").val("");
    $("input[id*=id_cuentatxt]").val("");
    $("input[id*=idtxtfecha_entrada]").val("");
    $("input[id*=idtxtfecha_salida]").val("");
    $("input[id*=txtFecha]").val("");
  
            
            
              $("input[id*=id_cuentaajaxtxt]").val("");
    $("input[id*=id_habitxt]").val("");
    $("input[id*=cliente_txt]").val("");
    $("input[id*=fecha_entradatxt]").val("");
    $("input[id*=fecha_salidatxt]").val("");
    $("input[id*=tipo_habitacion_txt]").val("");
     $("a[id*=nuevoaljamiento]").css("display", "none");
   
   
}
function diferenciaFechas2(varFecha1, varFecha2) { 
    //Obtiene los datos del formulario 
    CadenaFecha2 = varFecha1; 
    CadenaFecha1 = varFecha2;

    //Obtiene dia, mes y año  
    var fecha1 = new fechaDos( CadenaFecha1 )     
    var fecha2 = new fechaDos( CadenaFecha2 )  

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

function fechaDos( cadena ) {  
  
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

