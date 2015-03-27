var readUrl   = 'index.php/c_tipo_habitacion/read',
    updateUrl = 'index.php/c_tipo_habitacion/update',
    delUrl    = 'index.php/c_tipo_habitacion/delete',
    delHref,
    updateHref,
    updateId;


$( function() {
    
    $( '#tabs' ).tabs({
        fx: {height: 'toggle', opacity: 'toggle'}
    });
    
    readUsers();
    
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
            'Aceptar': function() {
                if(!comprobarUpdate()){
                    return 1;
                }
                if(comprobarDescripcionUp(document.getElementById('textDescUp').value)){
                    return 1;
                }
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
                        
                        //--- update row in table with new values ---
                      //  var name = $( 'tr#' + updateId + ' td' )[ 1 ];
                       // var email = $( 'tr#' + updateId + ' td' )[ 2 ];
                       // var nacionalidad = $( 'tr#' + updateId + ' td' )[ 3 ];
                        
                    //    $( name ).html( $( '#name' ).val() );
                      //  $( email ).html( $( '#email' ).val() );
                      //    $( nacionalidad ).html( $( '#nacionalidad' ).val() );
                        //--- clear form ---
                        $( '#updateDialog form input' ).val( '' );
                        readUsers();
                        
                    } //end success
                    
                }); //end ajax()
            },
            
            'Cancelar': function() {
                $( this ).dialog( 'close' );
            }
        },
        width: '500px'
        
    }); //end update dialog
    
    $( '#delConfDialog' ).dialog({
        autoOpen: false,
        buttons: {
            'No': function() {
                $( this ).dialog( 'close' );
            },
            
            'Si': function() {
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
        updateHref = $( this ).attr( 'href' );
        //el nombre id que le estamos pasando al updateId es el que definimos
        //en nuestro html(home) en el scrip readTemplate
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'index.php/c_tipo_habitacion/getById/' + updateId,
            dataType: 'json',
             
             //te devuelde una fila con el id del users que le pasaste
            success: function( response ) {
                // aqui despues de buscar en la base de datos buscamos el valor del 
                // atributo que queremos
                $( '#textDescUp' ).val( response.descripcion );
                $( '#ddwCamaUp' ).val( response.descripcion_cama );
                var ddwCamaUp = document.getElementById("ddwCamaUp");
                for(var i=0; i<=ddwCamaUp.length; i++)
                {
                    if(ddwCamaUp[i].innerHTML == response.descripcion_cama)
                    {
                        ddwCamaUp.selectedIndex = i;
                        break;
                    }
                }
                $( '#ddwCantUp' ).val( response.cantidad_de_camas );
                var ddwCantUp= document.getElementById("ddwCantUp");
                for(var i=0; i<=ddwCantUp.length; i++)
                {
                    if(ddwCantUp[i].innerHTML == response.cantidad_de_camas)
                    {
                        ddwCantUp.selectedIndex = i;
                        break;
                    }
                }
                $( '#ddwTvUp' ).val( response.detalles );
                var ddwTvUp= document.getElementById("ddwTvUp");
                for(var i=0; i<=ddwTvUp.length; i++)
                {
                    if(ddwTvUp[i].innerHTML == response.detalles)
                    {
                        ddwTvUp.selectedIndex = i;
                        break;
                    }
                }
                $( '#ddwAireUp' ).val( response.aire_acondicionado );
                var ddwAireUp = document.getElementById("ddwAireUp");
                for(var i=0; i<=ddwAireUp.length; i++)
                {
                    if(ddwAireUp[i].value == response.aire_acondicionado )
                    {
                        ddwAireUp.selectedIndex = i;
                        break;
                    }
                }
                $( '#textPrecioUp' ).val( response.precio );
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
            textDescTipo: {required: true},
            textPrecioHab: {required: true}
        },
        
        
        //uncomment this block of code if you want to display custom messages
        messages: {
           textDescTipo: {required: "Este campo es requerido"},
            textPrecioHab: {required: "Este campo es requerido"}
        },
        
        
        submitHandler: function( form ) {
            if(comprobarDescripcion(document.getElementById('textDescTipo').value)){
                return 1;
            }
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/c_tipo_habitacion/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( 'Nuevo Tipo de Habitacion creado correctamente!' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    document.getElementById('textDescTipo').value="";
                    document.getElementById('textPrecioHab').value="";
                    //refresh list of users by reading it
                    //readUsers();
                    dataTable.fnAddData([
                        response,
                        $( '#textDescTipo' ).val(),
                        $( '#textPrecioHab' ).val(),
                        $( '#ddwCant' ).valueOf(),
                        $( '#ddwAire' ).valueOf(),
                        $( '#ddwCama' ).valueOf(),
                        $( '#ddwTv' ).valueOf(),
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


function readUsers() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    
    $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {
            
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_tipo_habitacion;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_tipo_habitacion;
            }
            
            //clear old rows
            $( '#records > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTable == 'undefined' )
                dataTable = $( '#records' ).dataTable({"bJQueryUI": true});
            
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers

function comprobarUpdate()
{
    document.getElementById('lbDescUpError').innerText = "";
    document.getElementById('lbPrecioUpError').innerText = "";
    
    val = 1;
    if(document.getElementById('textDescUp').value == ""){
        document.getElementById('lbDescUpError').innerText = "Campo requerido";
        val = 0;
    }
    if(document.getElementById('textPrecioUp').value == ""){
        document.getElementById('lbPrecioUpError').innerText = "Campo requerido";
        val = 0;
    }
    return val;
}

function comprobarDescripcionUp(descripcion)
{
    var val = 0;
    $.ajax({
        url: 'index.php/c_tipo_habitacion/getDescripcion/'+descripcion,
        dataType: 'json',
        async: false,
        success: function( response ) {
            var descCell = $( 'tr#' + updateId + ' td' )[ 1 ];
            if(descCell.innerHTML == document.getElementById('textDescUp').value){
                val = 0;
            }else if(response.length > 0){
                alert("El Tipo de Habitacion ya existe");
                document.getElementById('textDescUp').value = '';
                val = 1;
            }else{
                val = 0;
            }
        }
    });
    return val;
}

function comprobarDescripcion(descripcion)
{
    var val = 0;
    $.ajax({
        url: 'index.php/c_tipo_habitacion/getDescripcion/'+descripcion,
        dataType: 'json',
        async: false,
        success: function( response ) {
            if(response.length > 0){
                alert("El Tipo de Habitacion ya existe");
                document.getElementById('textDescUp').value = '';
                val = 1;
            }else{
                val = 0;
            }
        }
    });
    return val;
}