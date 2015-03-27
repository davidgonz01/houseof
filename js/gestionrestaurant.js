   var readUrl  = 'index.php/GestionRestaurantController/read',
   updateUrl = 'index.php/GestionRestaurantController/update',
    delUrl    = 'index.php/GestionRestaurantController/delete',
    delHref,
    updateHref,
    updateId;


$( function() {
    
    $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
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
        updateHref = $( this ).attr( 'href' );
        //el nombre id que le estamos pasando al updateId es el que definimos
        //en nuestro html(home) en el scrip readTemplate
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'index.php/GestionRestaurantController/getById/' + updateId,
            dataType: 'json',
             
             //te devuelde una fila con el id del users que le pasaste
            success: function( response ) {
                // aqui despues de buscar en la base de datos buscamos el valor del 
                // atributo que queremos
                $( '#costotxt' ).val( response.costo );
                $( '#nombreplatotxt' ).val( response.nombre_plato );
                 
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
            cCostotxt: { required: true },
            cNombreplatotxt: { required: true}
        },
        
        
        //uncomment this block of code if you want to display custom messages
        messages: {
            cCostotxt: { required: "El Costo es Requerido." },
            cNombreplatotxt: {required:"ingrese el nombre del plato."
            }
        },
        
        
        submitHandler: function( form ) {
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/GestionRestaurantController/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( 'New user created successfully!' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of users by reading it
                    //readUsers();
                   /** dataTable.fnAddData([
                        response,
                        $( '#cName' ).val(),
                        $( '#cEmail' ).val(),
                        '<a class="updateBtn" href="' + updateUrl + '/' + response + '">Update</a> | <a class="deleteBtn" href="' + delUrl + '/' + response + '">Delete</a>'
                    ]);**/
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
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id;
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