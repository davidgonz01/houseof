var readUrl   = 'index.php/c_alumnos/read',
    updateUrl = 'index.php/c_alumnos/update',
    delUrl    = 'index.php/c_alumnos/delete',
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
                        
                        //--- updfdgdfgdfgdfgdfgdfgdfgdfgdfgdfgdsfate row in table with new values ---
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
               alert( 'PRUEBA' );
                $( this ).dialog( 'close' );
            },
            
            'Si': function() {
                alert( 'PRUEBA2' );
                //display ajax loader animation here...
                $( '#ajaxLoadAni' ).fadeIn('slow');
                
                $( this ).dialog('close');
                
                
                $.ajax({
                   
                 url:'index.php/c_alumnos/delete',
                 dataType: 'json',
                  
                    success: function( response ) {
                        alert( 'PRUEBA3' );
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
                 alert( 'PRUEBA2' );
            } //end Yes
            
        } //end buttons
        
    }); //end dialog
    
    $( '#sample-table-1' ).delegate( 'a.updateBtn', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        //el nombre id que le estamos pasando al updateId es el que definimos
        //en nuestro html(home) en el scrip readTemplate
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'index.php/c_alumnos/getById/' + updateId,
            dataType: 'json',
             
             //te devuelde una fila con el id del users que le pasaste
            success: function( response ) {
                // aqui despues de buscar en la base de datos buscamos el valor del 
                // atributo que queremos
                
               
                //$( '#textPrecioUp' ).val( response.precio );
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                
                //--- assign id to hidden field ---
                $( '#userId' ).val( updateId );
                
                $( '#updateDialog' ).dialog( 'open' );
            }
        });
        
        return false;
    }); //end update delegate
    
    $( '#sample-table-1' ).delegate( 'a.deleteBtn', 'click', function() {
        delHref = $( this ).attr( 'href' );
        
        $( '#delConfDialog' ).dialog( 'open' );
        
        
        return false;
    
    }); //end delete delegate
    
    
    // --- Create Record with Validation ---
    $( '#create1 form' ).validate({
        
        
        submitHandler: function( form ) {
           // if(comprobarDescripcion(document.getElementById('textDescTipo').value)){
            //    return 1;
            //}
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/c_alumnos/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( 'Nuevo Alumno creado correctamente!' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    document.getElementById('nombre_alumnotxt').value="";
                    document.getElementById('apellido_alumnotxt').value="";
                    document.getElementById('apellido_alumnotxt').value="";
                  //  document.getElementById('nombre_alumnotxt').value="";
                   // document.getElementById('apellido_alumnotxt').value="";
                   // document.getElementById('nombre_alumnotxt').value="";
                    //document.getElementById('apellido_alumnotxt').value="";
                   // document.getElementById('nombre_alumnotxt').value="";
                    //document.getElementById('apellido_alumnotxt').value="";
                    //document.getElementById('nombre_alumnotxt').value="";
                    //document.getElementById('apellido_alumnotxt').value="";
                    //refresh list of users by reading it
                    //readUsers();
                    dataTable.fnAddData([
                        response,
                       $( '#nombre_alumnotxt' ).val(),
                        $( '#apellido_alumnotxt' ).val(),
                        
                       
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
        url:'index.php/c_alumnos/read',
        dataType: 'json',
        success: function( response ) {
            
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_alumno;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_alumno;
            }
            
            //clear old rows
            $( '#sample-table-1 > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#sample-table-1 > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTable == 'undefined' )
                dataTable = $( '#sample-table-1' ).dataTable({"bJQueryUI": true});
            
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers





