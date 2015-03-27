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
                if(comprobarNumHabUp(document.getElementById('textNumHabUp').value)){
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
                        var numero = $( 'tr#' + updateId + ' td' )[ 1 ];
                        var piso = $( 'tr#' + updateId + ' td' )[ 2 ];
                        var tipoHabitacion = $( 'tr#' + updateId + ' td' )[ 3 ];
                        var estado = $( 'tr#' + updateId + ' td' )[ 4 ];
                        
                        $( numero ).html( $( '#textNumHabUp' ).val() );
                        $( piso ).html( $( '#textPisoUp' ).val() );
                        var habUp = document.getElementById('ddwTipoHabUp');
                        $( tipoHabitacion ).html( habUp[habUp.selectedIndex].innerHTML );
                        
                        var estadoUp = document.getElementById('ddwEstadoUp');
                        $( estado ).html( estadoUp[estadoUp.selectedIndex].innerHTML );
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
    
    $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        //var texto = $('#records tr:nth-child(2) td:nth-child(1)').text()
        //alert(texto);
        //alert(document.getElementById('records').rows.length);
        //dataTable.fnPageChange( 'next' );
        //var query = '#records tr:nth-child(' + 2 + ') td:nth-child('+ 1 + ')';
        //var texto2 = $(query).text()
         //alert(texto2);
         //alert(document.getElementById('records').rows.length);
         //dataTable.fnPageChange( 'first' );
        updateHref = $( this ).attr( 'href' );
        //el nombre id que le estamos pasando al updateId es el que definimos
        //en nuestro html(home) en el scrip readTemplate
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'index.php/c_habitaciones/getById/' + updateId,
            dataType: 'json',
            
             //te devuelde una fila con el id del users que le pasaste
            success: function( response ) {
                // aqui despues de buscar en la base de datos buscamos el valor del 
                // atributo que queremos
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                $( '#textNumHabUp' ).val( response.nro_habitacion );
                $( '#textPisoUp' ).val( response.piso );
                $( '#ddwTipoHabUp' ).val( response.descripcion );
                var ddwCamaUp = document.getElementById("ddwTipoHabUp");
                for(var j=0; j<=ddwCamaUp.length; j++)
                {
                    if(ddwCamaUp[j].innerHTML == response.descripcion)
                    {
                        ddwCamaUp.selectedIndex = j;
                        break;
                    }
                }
                $( '#ddwEstadoUp' ).val( response.descripcion_estado );
                var ddwCantUp= document.getElementById("ddwEstadoUp");
                for(var i=0; i<=ddwCantUp.length; i++)
                {
                    if(ddwCantUp[i].innerHTML == response.descripcion_estado)
                    {
                        ddwCantUp.selectedIndex = i;
                        break;
                    }
                }
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
            textNumHab: {required: true},
            textPiso: {required: true}
        },
        
        messages: {
           textNumHab: {required: "Este campo es requerido"},
            textPiso: {required: "Este campo es requerido"}
        },
        
        submitHandler: function( form ) {
            if(comprobarNumHab(document.getElementById('textNumHab').value)){
                return 1;
            }
            var filas = document.getElementById('records').rows.length;            
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/c_habitaciones/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( 'Nueva Habitacion Creada Correctamente!' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                  
                    //refresh list of users by reading it
                    //readUsers();
                    var hab = document.getElementById('ddwTipoHab');
                    var estado = document.getElementById('ddwEstado');
                    dataTable.fnAddData([
                        response,
                        $( '#textNumHab' ).val(),
                        $( '#textPiso' ).val(),
                        hab[hab.selectedIndex].innerHTML,
                        estado[estado.selectedIndex].innerHTML,
                        '<a class="updateBtn" href="' + updateUrl + '/' + response + '">Editar</a> | <a class="deleteBtn" href="' + delUrl + '/' + response + '">Borrar</a>'
                    ]);
                    
                    document.getElementById('textNumHab').value = "";
                    document.getElementById('textPiso').value = "";
                    //readUsers();
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
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_habitacion;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_habitacion;
            }
            
            //clear old rows
            $( '#records > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable            
            if( typeof dataTable == 'undefined' )
                dataTable = $( '#records' ).dataTable({"bJQueryUI": true,"bLengthChange": false});
            
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
            
            //if( typeof dataTable != 'undefined' )
              //  dataTable.fnSort( [ [0,'asc'] ] );
        }
    });
} // end readUsers
function comprobarUpdate()
{
    document.getElementById('lbNumError').innerText = "";
    document.getElementById('lbPisoError').innerText = "";
    
    val = 1;
    if(document.getElementById('textNumHabUp').value == ""){
        document.getElementById('lbNumError').innerText = "Campo requerido";
        val = 0;
    }
    if(document.getElementById('textPisoUp').value == ""){
        document.getElementById('lbPisoError').innerText = "Campo requerido";
        val = 0;
    }
    return val;
}

function comprobarNumHab(num)
{
    var val = 0;
    $.ajax({
        url: 'index.php/c_habitaciones/getNumHab/'+num,
        dataType: 'json',
        async: false,
        success: function( response ) {
            if(response.length > 0){
                alert("El numero de habitacion ya existe");
                val = 1;
            }else{
                val = 0;
            }
        }
    });
    return val;
}

function comprobarNumHabUp(num)
{
    var val = 0;
    $.ajax({
        url: 'index.php/c_habitaciones/getNumHab/'+num,
        dataType: 'json',
        async: false,
        success: function( response ) {
            var numero = $( 'tr#' + updateId + ' td' )[ 1 ];
            if(numero.innerHTML == document.getElementById('textNumHabUp').value){
                val = 0;
            }else if(response.length > 0){
                alert("El numero de habitacion ya existe");
                val = 1;
            }else{
                val = 0;
            }
        }
    });
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