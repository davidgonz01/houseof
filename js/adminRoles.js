var readUrl   = 'index.php/c_roles/read',
    updateUrl = 'index.php/c_roles/update',
    delUrl    = 'index.php/c_roles/delete',
    delHref,
    updateHref,
    updateId,
    recordId;


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
                        
                        //--- update row in table with new values ---
                      //  var name = $( 'tr#' + updateId + ' td' )[ 1 ];
                       // var email = $( 'tr#' + updateId + ' td' )[ 2 ];
                       // var nacionalidad = $( 'tr#' + updateId + ' td' )[ 3 ];
                        
                    //    $( name ).html( $( '#name' ).val() );
                      //  $( email ).html( $( '#email' ).val() );
                      //    $( nacionalidad ).html( $( '#nacionalidad' ).val() );
                        //--- clear form ---
                        $( '#updateDialog form input' ).val( '' );
                        //readUsers();
                    } //end success
                    
                }); //end ajax()
            },
            
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
        
    }); //end update dialog
    
    
    $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        
        document.getElementById('btEditarRol').removeAttribute('disabled');
        document.getElementById('btGuardarRol').setAttribute('disabled', 'false');
         
        updateHref = $( this ).attr( 'href' );
        //el nombre id que le estamos pasando al updateId es el que definimos
        //en nuestro html(home) en el scrip readTemplate
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        if(updateId == "")
            updateId = recordId;
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        $.ajax({
            url: 'index.php/c_roles/getById/' + updateId,
            dataType: 'json',
             
             //te devuelde una fila con el id del users que le pasaste
            success: function( response ) {
                // aqui despues de buscar en la base de datos buscamos el valor del 
                // atributo que queremos
                document.getElementById('btEditarRol').removeAttribute('disabled');
                document.getElementById('btGuardarRol').setAttribute('disabled', 'false');
                
                $( '#textNombreRol' ).val( response.nombre );
                $( '#textDescripcionRol' ).val( response.descripcion );
                completarDetalles(updateId);
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                //--- assign id to hidden field ---
                $( '#rolId' ).val( updateId );
                
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
            textNombreRol: {required: true},
            textDescripcionRol: {required: true}
        },
        
        
        //uncomment this block of code if you want to display custom messages
        messages: {
            textNombreRol: { required: "Campo Requerido." },
            textDescripcionRol: { required: "Campo Requerido." }
        },
        
        
        submitHandler: function( form ) {
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/c_roles/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    recordId = response;
                    $( '#msgDialog > p' ).html( 'Nuevo Rol Creado Correctamente!' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of users by reading it
                    //readUsers();
                    dataTable.fnAddData([
                        response,
                        $( '#textNombreRol' ).val(),
                        $( '#textDescripcionRol' ).val(),
                        '<a class="updateBtn" href="' + recordId + '/' + response + '">Seleccionar</a> | <a class="deleteBtn" href="' + delUrl + '/' + recordId + '">Borrar</a>'
                    ]);
                    guardarDetalles(response);
                    limpiarCamposRol();
                    //open Read tab
                    $( '#tabs' ).tabs( 'select', 0 );
                    
                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
            });
              //readUsers();
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
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_rol;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_rol;
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

function limpiarCamposRol()
{
    document.getElementById("textNombreRol").value = "";
    document.getElementById('textDescripcionRol').value = "";
    limpiarDetalles();
}

function limpiarDetalles()
{
    var tabla = document.getElementById('tableComponentes');
    var rowCount = tabla.rows.length;
    for(var i=0; i<rowCount; i++)
    {
    	var row = tabla.rows[i];
    	var check1 = row.cells[0].childNodes[1];
        check1.checked = 0;
    	var check2 = row.cells[1].childNodes[1];
        check2.checked = 0;
        if(i == (rowCount-1)){
            return false;
        }
    }
}

function guardarDetalles(id_rol)
{
    var tabla = document.getElementById('tableComponentes');
    var rowCount = tabla.rows.length;
    for(var i=0; i<=rowCount; i++)
    {
    	var row = tabla.rows[i];
    	var box1 = row.cells[0].childNodes[1];
        if(box1.checked == 1){
            $.ajax({
                type: "POST",
                url: "index.php/c_roles/createDetail",
                data: 'id_rol='+id_rol+'&componente='+box1.value
            });
        }
        var box2 = row.cells[1].childNodes[1];
        if(box2.checked == 1){
            $.ajax({
                type: "POST",
                url: "index.php/c_roles/createDetail",
                data: 'id_rol='+id_rol+'&componente='+box2.value
            });
        }
        if(i == (rowCount-1)){
            //limpiarCamposRol();
            return false;
        }
    }
}

function completarDetalles(id_rol)
{
    limpiarDetalles();
    
    var tabla = document.getElementById('tableComponentes');
    var rowCount = tabla.rows.length;
    $.ajax({
        url: 'index.php/c_roles/getDetail/' + id_rol,
        dataType: 'json',
        success: function( response ) {
            for( var i in response ) {
                for(var j=0; j<=rowCount; j++)
                {
                    var row = tabla.rows[j];
                    var box1 = row.cells[0].childNodes[1];
                    //alert(box1.value+" "+response[i].componente);
                    if(box1.value == response[i].componente){
                        box1.checked = 1;
                    }
                    var box2 = row.cells[1].childNodes[1];
                    if(box2.value == response[i].componente){
                        box2.checked = 1;
                    }
                    if(j == (rowCount-1)){
                        break;
                    }
                }
            }
        }
    });
}
function editarRol()
{
    $.ajax({
        url: 'index.php/c_roles/deleteDetail/' + updateId,
        dataType: 'json',
        success: function( response ) {
            guardarDetalles(updateId);
            editarCabecera();
            limpiarCamposRol();
        }
            
    });//end ajax()
    document.getElementById('btEditarRol').setAttribute('disabled', 'false');
    document.getElementById('btGuardarRol').removeAttribute('disabled');
}

function editarCabecera()
{
    idRol = document.getElementById('rolId').value;
    nombreRol = document.getElementById('textNombreRol').value;
    descripcionRol = document.getElementById('textDescripcionRol').value;
    $.ajax({
        type: "POST",
        url: "index.php/c_roles/editarCabecera",
        data: 'idRol='+idRol+'&nombreRol='+nombreRol+'&descripcionRol='+descripcionRol
    });
    var rol = $( 'tr#' + updateId + ' td' )[ 1 ];
    var descr = $( 'tr#' + updateId + ' td' )[ 2 ];
                        
    $( rol ).html( nombreRol );
    $( descr ).html( descripcionRol );
}