var readUrl   = 'index.php/fecha_detalle_controlador/read',
    readUrl2 = 'index.php/fecha_detalle_controlador/getAll_parametrizado',
    updateUrl = 'index.php/fecha_detalle_controlador/update',
    delUrl    = 'index.php/fecha_detalle_controlador/delete',
    delHref,
    updateHref,
    id_habit,
    fecha12,
    fecha13,
     fechas,
 nombrevalor5,
    updateId;
var _redondeoCantidad = 0;


$( function() {
    
    $( '#tabs' ).tabs({
        fx: {height: 'toggle', opacity: 'toggle'}
    });
    
   // readUsers();
    clearFields();
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
                var fecha1 = document.getElementById('fecha_entradatxt').value;
                var fecha2 = document.getElementById('fecha_salidatxt').value;
                var idHabitacion = document.getElementById('id_habitxt').value;
                var idCuenta = document.getElementById('id_cuentaajaxtxt').value;
                var precio = document.getElementById('precio_txt').value;
                $.ajax({
                    type: "POST",
                    url: updateHref,
                    data: 'idHabitacion='+idHabitacion+'&fecha1='+fecha1+'&fecha2='+fecha2+'&idCuenta='+idCuenta+'&precio='+precio,
                    dataType: 'json',
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
                 readhabitaciones2();
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
    
    $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        // aqui llamamos al metodo .... verificamos si tiene ya hay un cliente
         if(VericarsiHayCliente()){
        return false;
    }
        updateHref = $( this ).attr( 'href' );
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        
         $( '#id_habitxt' ).val(updateId);
     
      
  
        
       //obtenemos el valor de las fechas en el html(interfaz) y lo pegamos en el dialog
       var fecha1 = document.getElementById("idtxtfecha_entrada");
       var fechaentrada = fecha1.value;
       $( '#fecha_entradatxt' ).val(fechaentrada);
       
       var fecha2 = document.getElementById("idtxtfecha_salida");
       var fechasalida = fecha2.value;
       $( '#fecha_salidatxt' ).val(fechasalida);
       
       
       var nombreCliente = document.getElementById("idtxtnombre");
       var nombrevalor = nombreCliente.value;
       $( '#cliente_txt' ).val(nombrevalor);
       
       
       
          $( '#tipo_habitacion_txt' ).val("");
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
     
        $.ajax({
            url: 'index.php/fecha_detalle_controlador/getById/' + updateId,
            dataType: 'json',
            // te devuelve una tabla relacionada con el id que le pasaste
            success: function( response ) {
                //para obtener el valor que quieres usas response. y el nombre del atributo que queres
              //  $( '#cliente_txt' ).val( response.nro_habitacion );
              
                cantidad_id=response.id_tipo_habitacion;

                $( '#tipo_habitacion_txt' ).val(response.descripcion);
                $( '#precio_txt' ).val(response.precio);
                $("input[id*=id_cuentaajaxtxt]").css("display", "none");
            $("input[id*=id_habitxt]").css("display", "none");
                
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                
                //--- assign id to hidden field ---
                $( '#userId' ).val( updateId );
                
                $( '#updateDialog' ).dialog( 'open' );
            }
        });
        
        return false;
    }); //end update delegate
    
    $( '#records' ).delegate( 'a.deleteBtn', 'click', function() {
        delHref = $( this ).attr( 'href' );
        
        $( '#delConfDialog' ).dialog( 'open' );
        
        return false;
    
    }); //end delete delegate
    
    
    // --- Create Record with Validation ---
    $( '#create form' ).validate({
        rules: {
            cName: {required: true},
            cEmail: {required: true, email: true}
        },
        
        /*
        //uncomment this block of code if you want to display custom messages
        messages: {
            cName: { required: "Name is required." },
            cEmail: {
                required: "Email is required.",
                email: "Please enter valid email address."
            }
        },
        */
        
       submitHandler: function( form ) {
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/home/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( 'New user created successfully!' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of users by reading it
                    //readUsers();
                    dataTable2.fnAddData([
                        response,
                        $( '#i' ).val(),
                        $( '#cEmail' ).val(),
                        '<a class="updateBtn" href="' + updateUrl + '/' + response + '">Update</a> | <a class="deleteBtn" href="' + delUrl + '/' + response + '">Delete</a>'
                    ]);
                    readUsers();
                    //open Read tab
                    $( '#tabs' ).tabs( 'select', 0 );
                    
                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
            });
              readUsers();
            return false;
        }
    });
    
}); //end document ready



function readhabitaciones2() {
    
    if(VericarsiHayFechas()){
        return false;
    }
    
 if(compararFechas('idtxtfecha_entrada','idtxtfecha_salida')){
        return false;
    }
    
 
  var nombreCliente = document.getElementById("id_clientetxt");
       nombrevalor5 = nombreCliente.value;
     //obtenemos el valor de las fechas en el html(interfaz) y lo pegamos en el dialog
     
            var fecha1 = document.getElementById("idtxtfecha_entrada");
          fecha12 = fecha1.value;
       $( '#fecha_entradatxt' ).val(fecha12);
       
       var id_clienteinterfaz = document.getElementById("id_cuentatxt");
          var id_cuentacliente = id_clienteinterfaz.value;
       $( '#id_cuentaajaxtxt' ).val(id_cuentacliente);
       
       var fecha2 = document.getElementById("idtxtfecha_salida");
         fecha13 = fecha2.value;
          $( '#fecha_salidatxt' ).val(fecha13);
       var fechaparametro = fecha12 + "K" + fecha13;
     //  alert(fechaparametro);
      
     //  $( '#fecha_salidatxt' ).val(fechasalida);
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    
    $.ajax({
            url: 'index.php/fecha_detalle_controlador/getAll_parametrizado2/'+ fechaparametro,
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
            if( typeof dataTable2 == 'undefined' )
                dataTable2 = $( '#records' ).dataTable({"bJQueryUI": true});
           
            $("a[id*=NuevaReserva]").css("display", "block");
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers


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
            
            
              $("input[id*=id_cuentaajaxtxt]").val("");
    $("input[id*=id_habitxt]").val("");
    $("input[id*=cliente_txt]").val("");
    $("input[id*=fecha_entradatxt]").val("");
    $("input[id*=fecha_salidatxt]").val("");
    $("input[id*=tipo_habitacion_txt]").val("");
    $("input[id*=precio_txt]").val("");
     $("a[id*=NuevaReserva]").css("display", "none");
     
   
}
//var n
//var numCuotas = ParseNumber($('input[id*=txtCantCuotas]').val());


//funcion que controla el ingreso de las fechas
//fecha1 < fecha2
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
//este es el metodo encargado para ver si ya registro el cliente
function VericarsiHayCliente()
{
    var nro = document.getElementById("idtxtnro_documento").value;
   
  
    if(nro == "")
    {
        alert("No ha ingresado Cliente");
        return true;
    }
}

function VericarsiHayFechas()
{
    var fecha1 = document.getElementById("idtxtfecha_entrada").value;
      
    if(fecha1 == "")
    {
        alert("no ha ingresado fecha de entrada");
        return true;
    }
    
    
    var fecha2 = document.getElementById("idtxtfecha_salida").value;
    if(fecha2 == "")
    {
        alert("no ha ingresado fecha de Salida");
        return true;
    }
   
}

 