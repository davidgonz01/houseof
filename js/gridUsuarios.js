var readUrl   = 'index.php/c_usuarios/read',
    updateUrl = 'index.php/c_usuarios/update',
    delUrl    = 'index.php/c_usuarios/delete',
    delHref,
    updateHref,
    updateId,
    recordId;


$( function() {
    
    $( '#tabs' ).tabs({
        fx: {height: 'toggle', opacity: 'toggle'}
    });
    cargarCalendarios();
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
    
    $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        //el nombre id que le estamos pasando al updateId es el que definimos
        //en nuestro html(home) en el scrip readTemplate
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        if(updateId == "")
            updateId = recordId;
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        $.ajax({
            url: 'index.php/c_usuarios/getById/' + updateId,
            dataType: 'json',
             
             //te devuelde una fila con el id del users que le pasaste
            success: function( response ) {
                // aqui despues de buscar en la base de datos buscamos el valor del 
                // atributo que queremos
                $( '#userId' ).val( updateId );
                document.getElementById('btEditarUsuario').removeAttribute('disabled');
                document.getElementById('btGuardarUsuario').setAttribute('disabled', 'false');
                $( '#textNombre' ).val( response.nombre_usuario );
                $( '#textApellido' ).val( response.apellido );
                cambiarLista('ddwTipoDoc', response.descripcion )
                $( '#textNroDocumento' ).val( response.nro_documento );
                cambiarLista('ddwCiudad', response.nombre_ciudad )
                $( '#textDireccion' ).val( response.direccion );
                $( '#textEmail' ).val( response.email );
                $( '#textTelefono' ).val( response.telefono );
                $( '#textFechaNac' ).val( response.fecha_nacimiento );
                cambiarLista('ddwRol', response.nombre_rol );
                $( '#textUsuario' ).val( response.usuario );
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                
                //--- assign id to hidden field ---
                $( '#userId' ).val( updateId );
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
            textNombre: {required: true},
            textApellido: {required: true},
            textNroDocumento: {required: true},
            textDireccion: {required: true},
            textEmail: {required: true, email: true},
            textTelefono: {required: true},
            textFechaNac: {required: true},
            textUsuario: {required: true},
            textPassword: {required: true},
            textPasswordConfirm: {required: true}
        },
        
        
        //uncomment this block of code if you want to display custom messages
        messages: {
            textNombre: {required: "Este campo es requerido"},
            textApellido: {required: "Este campo es requerido"},
            textNroDocumento: {required: "Este campo es requerido"},
            textDireccion: {required: "Este campo es requerido"},
            textEmail: {required: "Este campo es requerido", email: "Por favor ingrese un email válido."},
            textTelefono: {required: "Este campo es requerido"},
            textFechaNac: {required: "Este campo es requerido"},
            textUsuario: {required: "Este campo es requerido"},
            textPassword: {required: "Este campo es requerido"},
            textPasswordConfirm: {required: "Este campo es requerido"}
        },
        
        submitHandler: function( form ) {
            if(document.getElementById('textPassword').value != document.getElementById('textPasswordConfirm').value){
                alert('La Contrasena no esta confirmada');
                return 0;
            }
            
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            //siExisteEditar();
            if(document.getElementById('textUsuario').value == ""){
                alert("Complete el campo usuario");
                return 1;
            }
            $.ajax({
                url: 'index.php/c_usuarios/create',
                type: 'POST',
                data: $( form ).serialize(),
                success: function( response ) {
                    recordId = response;
                    $( '#msgDialog > p' ).html( 'Nuevo usuario creado!' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );

                    agregarDataTable();
                    //open Read tab
                    $( '#tabs' ).tabs( 'select', 0 );

                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                    limpiarCampos();
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
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id;
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
        }
    });
} // end readUsers

function cambiarLista(idObject, nuevoValor )
{
    var listObject = document.getElementById(idObject)
    for(var i=0; i<=listObject.length; i++)
    {
        if(listObject[i].innerHTML == nuevoValor)
        {
            listObject.selectedIndex = i;
            break;
        }
    }
}

function limpiarCampos()
{

    document.getElementById('textNombre').value = "";
    document.getElementById('textApellido').value = "";
    document.getElementById('textNroDocumento').value = "";
    document.getElementById('textDireccion').value = "";
    document.getElementById('textEmail').value = "";
    document.getElementById('textTelefono').value = "";
    document.getElementById('textFechaNac').value = "";
    document.getElementById('textUsuario').value = "";
    document.getElementById('textPassword').value = "";
    document.getElementById('textPasswordConfirm').value = "";
    
    tipo_doc = document.getElementById('ddwTipoDoc');
    ciudad = document.getElementById('ddwCiudad');
    rol = document.getElementById('ddwRol');
    tipo_doc.selectedIndex = 0;
    ciudad.selectedIndex = 0;
    rol.selectedIndex = 0;
}

function siExisteEditar()
{
    var usuario = document.getElementById('textUsuario').value;
    var nombreUsuario = "";
    $.ajax({
        url: 'index.php/c_usuarios/getById2/' + usuario,
        dataType: 'json',
             
        //te devuelde una fila con el id del users que le pasaste
        success: function( response ) {
           nombreUsuario = response.usuario;
           
           if(nombreUsuario==usuario){
                alert("El nombre Usuario = "+usuario+" ya existe");
                document.getElementById('textUsuario').value = "";
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
            }
        }
    });
    return 1;
}
function crearUsuario()
{
    
}
function editarUsuario()
{
    
    if(document.getElementById('textPassword').value != document.getElementById('textPasswordConfirm').value){
         alert('La Contrasena no esta confirmada');
         return 0;
    }
    $.ajax({
        url: updateHref,
        type: 'POST',
        data: $( '#create form' ).serialize(),
                    
        success: function( response ) {
            editarDataTable();
            limpiarCampos();
            document.getElementById('btEditarUsuario').setAttribute('disabled', 'false');
            document.getElementById('btGuardarUsuario').removeAttribute('disabled');
        }          
     }); //end ajax()
}

function agregarDataTable()
{
    $( 'input', this ).val( '' );
    tipoDoc = document.getElementById('ddwTipoDoc');
    ciudad = document.getElementById('ddwCiudad');
    rol = document.getElementById('ddwRol');
    //refresh list of users by reading it
    dataTable.fnAddData([
        $( '#textUsuario' ).val(),
        $( '#textNombre' ).val(),
        $( '#textApellido' ).val(),
        tipoDoc[tipoDoc.selectedIndex].innerHTML,
        $( '#textNroDocumento' ).val(),
        ciudad[ciudad.selectedIndex].innerHTML,
        rol[rol.selectedIndex].innerHTML,
        '<a class="updateBtn" href="' + updateUrl + '/' + recordId + '">Seleccionar</a> | <a class="deleteBtn" href="' + delUrl + '/' + recordId + '">Borrar</a>'
    ]);
}
function editarDataTable()
{
    //--- update row in table with new values ---
    var usuario = $( 'tr#' + updateId + ' td' )[ 0 ];
    var nombre = $( 'tr#' + updateId + ' td' )[ 1 ];
    var apellido = $( 'tr#' + updateId + ' td' )[ 2 ];
    var tipoDoc = $( 'tr#' + updateId + ' td' )[ 3 ];
    var nroDoc = $( 'tr#' + updateId + ' td' )[ 4 ];
    var ciudad = $( 'tr#' + updateId + ' td' )[ 5 ];
    var rol = $( 'tr#' + updateId + ' td' )[ 6 ];
    
    $( usuario ).html( $( '#textUsuario' ).val() );
    $( nombre ).html( $( '#textNombre' ).val() );
    $( apellido ).html( $( '#textApelldio' ).val() );
    ddwTipoDoc = document.getElementById('ddwTipoDoc');
    $( tipoDoc ).html (ddwTipoDoc[ddwTipoDoc.selectedIndex].innerHTML);
    $( nroDoc ).html( $( '#textNroDocumento' ).val() );
    ddwCiudad = document.getElementById('ddwCiudad');
    $( ciudad ).html( ddwCiudad[ddwCiudad.selectedIndex].innerHTML );
    ddwRol = document.getElementById('ddwRol');
    $( rol ).html( ddwRol[ddwRol.selectedIndex].innerHTML);
}

function cargarCalendarios()
{
    $("#textFechaNac").datepicker();
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
