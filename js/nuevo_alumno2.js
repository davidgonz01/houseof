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
    
    
    
    $( '#delConfDialog' ).dialog({
        autoOpen: false,
        buttons: {
            'No': function() {
                $( this ).dialog( 'close' );
            },
            
            'Si': function() {
                //alert('alert2.5');
                //display ajax loader animation here...
                //$( '#ajaxLoadAni' ).fadeIn( 'slow' );
                
                //$( this ).dialog( 'close' );
                alert('alert3');
               
               // updateId = $( this ).parents( 'tr' ).attr( "id" );
                $.ajax({
                    url: 'index.php/c_alumnos/delete', 
                    
                    success: function(response) {
                        //hide ajax loader animation here...
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        $( '#msgDialog > p' ).html(response);
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success2' ).dialog( 'open' );
                        
                        $( 'a[href=' + delHref + ']' ).parents( 'tr' )
                        .fadeOut( 'slow', function() {
                            $( this ).remove();
                        });
                       alert('alert4');
                    } //end success
                });
                $( this ).dialog( 'close' );
                alert('alert5');
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
        //alert('alert1');
        $( '#delConfDialog' ).dialog( 'open' );
        
        return false;
    
    }); //end delete delegate
    
    
   
    
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







