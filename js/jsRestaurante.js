var montoRestaurant = 0;

function vaciarCamposPlatos()
{
    document.getElementById("textPlato").value = "";
    document.getElementById("textCodPlato").value = "";
    document.getElementById("textPrecio").value = "";
    document.getElementById("textCantidad").value = "";
}

function vaciarCamposCliente()
{
    document.getElementById("textCliente").value = "";
    document.getElementById("textIdCliente").value = "";
    document.getElementById("textNumDoc").value = "";
}

function getCliente(fila) 
{
    var tabla = document.getElementById('tablaClientes');
    var rowCount = tabla.rows.length;
    for(var i=1; i<=rowCount; i++)
    {
    	var row = tabla.rows[i];
    	var filaActual = row.cells[0].innerHTML;
    	if(filaActual == fila)
	{
            document.getElementById("textCliente").value = row.cells[1].innerHTML + " " + row.cells[2].innerHTML;
            document.getElementById("textIdCliente").value = row.cells[0].innerHTML;
            document.getElementById("textNumDoc").value = row.cells[3].innerHTML;
            disablePopup();
            break;
	}
    }
}

function getPlatos(fila) 
{
    var tabla = document.getElementById('tablaPlatos');
    var rowCount = tabla.rows.length;
    for(var i=1; i<=rowCount; i++)
    {
    	var row = tabla.rows[i];
    	var filaActual = row.cells[0].innerHTML;
    	if(filaActual == fila)
	{
            document.getElementById("textPlato").value = row.cells[1].innerHTML;
            document.getElementById("textCodPlato").value = row.cells[0].innerHTML;
            document.getElementById("textPrecio").value = row.cells[2].innerHTML;
            document.getElementById("textCantidad").value = 1;
            disablePopup2();
            break;
	}
    }
}

function seleccionarCliente(buttonObj) 
{
    var tabla = document.getElementById('tablaClientes');
    var rowCount = tabla.rows.length;
    for(var i=0; i<rowCount; i++)
    {
    	var row = tabla.rows[i];
    	var button = row.cells[5].childNodes[0];
    	if(button == buttonObj)
	{
            alert('Hola');
        	//document.getElementById("textCliente").value = row.cells[1].innerHTML + row.cells[2].innerHTML;
        	//disablePopup();
                //break;
	}else{
            alert("no funciona");
        }
    }
}
function borrarFila(buttonObj)
{
	var tabla = document.getElementById('tablaDetalleRest');
	var rowCount = tabla.rows.length;
	for(var i=0; i<rowCount; i++)
	{
		var row = tabla.rows[i];
		var button = row.cells[4].childNodes[0];
		if(button == buttonObj)
		{
			tabla.deleteRow(i);
			break;
		}
	}
}

function restarMonto(precio,cantidad)
{
    montoRestaurant -= (precio*cantidad);
    document.getElementById('textMontoRest').value = montoRestaurant;
}

var oTable;
function borrarDet(objButton)
{
    var precio;
    var cant;
    $(document).ready(function() {
    /* Add a click handler to the rows - this could be used as a callback */
    $("#tablaDetalleRest tbody tr").click( function( e ) {
        oTable.$('tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
        
        //guardamos las variables antes de borrarlas
        var iPos = oTable.fnGetPosition( this );
        var aData = oTable.fnGetData( iPos );
        precio = aData[2];
        cant = aData[3];
    });
     
    /* Add a click handler for the delete row */
	$(objButton).click( function() {
        var anSelected = fnGetSelected( oTable );
        if ( anSelected.length !== 0 ) {
            restarMonto(precio,cant);
            oTable.fnDeleteRow( anSelected[0] );
        }
    } );
    /* Init the table */
    oTable = $('#tablaDetalleRest').dataTable( );
	} );
}
/* Get the rows which are currently selected */
function fnGetSelected( oTableLocal )
{
    return oTableLocal.$('tr.row_selected');
}

/*function borrarDet(buttonObj)
{
    var precio;
    var cant;
    var tabla = document.getElementById('tablaDetalleRest');
	var rowCount = tabla.rows.length;
	for(var i=0; i<rowCount; i++)
	{
		var row = tabla.rows[i];
		var button = row.cells[4].childNodes[0];
		if(button == buttonObj)
		{
                    precio = row.cells[2].innerHTML;
                    cant = row.cells[3].innerHTML;
                    restarMonto(precio,cant);
                    $('#tablaDetalleRest').dataTable().fnDeleteRow( i-1 );
                    break;
		}
	}
}*/

function masDeCinco(cant1,cant2)
{
    if((cant1+cant2)>5){
        return 1;
    }else
    {
        return 0;
    }
}

function siYaExiste()
{
    if(document.getElementById('textMontoRest').value == "") return 0;
    var tabla = document.getElementById("tablaDetalleRest");
    var rowCount = tabla.rows.length;
    for(var i=1; i<rowCount; i++)
    {
       var row = tabla.rows[i];
       var codDet = row.cells[0].innerHTML;
       if(codDet == document.getElementById('textCodPlato').value)
        {
            var cant1 = parseInt(row.cells[3].innerHTML);
            var cant2 = parseInt(document.getElementById('textCantidad').value);
            if(masDeCinco(cant1,cant2) == 1)
            {
                alert("No mas de 5 platos del mismo tipo");
                return -1;
            }
            
            //row.cells[3].innerText = (cant1 + cant2);
            var cantNueva = (cant1 + cant2);
            
            $('#tablaDetalleRest').dataTable().fnUpdate(cantNueva, i-1, 3 );
            
            montoRestaurant += document.getElementById('textPrecio').value * document.getElementById('textCantidad').value;
            document.getElementById('textMontoRest').value = montoRestaurant;
            vaciarCamposPlatos();
            return 1;
	}
    }
    return 0;
}

function agregarDet() {
    var tabla = document.getElementById('tablaDetalleRest');    
    var rowCount = tabla.rows.length;
    if(rowCount > 11)
    {
        alert("Maximo de 10 pedidos por vez");
        return 1;
    }
    
    if(document.getElementById('textPlato').value.length == 0)
    {
        alert("Elegir un plato");
        return 1;
    }
    if(document.getElementById('textCantidad').value.length == 0)
    {
        alert("Completar el campo cantidad");
        return 1;
    }
    
    
    var ind = siYaExiste();
    if(ind == 0){
    if(document.getElementById('textPlato').value != ""){
        $('#tablaDetalleRest').dataTable().fnAddData( [
            document.getElementById("textCodPlato").value,
            document.getElementById("textPlato").value,
            document.getElementById("textPrecio").value,
            document.getElementById("textCantidad").value,
            //"<div align='center'><input type='submit' value='X' onclick='borrarDet(this)'/></div>" ]);
            "<input type='submit' value='X' onclick='borrarDet(this)'/>" ]);
        montoRestaurant += document.getElementById('textPrecio').value * document.getElementById('textCantidad').value;
        document.getElementById('textMontoRest').value = montoRestaurant;
        vaciarCamposPlatos();
    }
    }
}

/* agregar los estilos a la tabla detalles*/

$(document).ready(function() {
    $('#tablaDetalleRest').dataTable({"bFilter": false,"bInfo": false,"bLengthChange": false});
} );

$(document).ready(function() {
    $('#tablaClientes').dataTable({});
} );

$(document).ready(function() {
    $('#tablaPlatos').dataTable({});
} );


function registrarPedido()
{
    if(document.getElementById('textCliente').value.length == 0)
    {
        alert("Debe seleccionar un cliente antes de guardar y un platillo");
        return 1;
    }
    if(document.getElementById('textMontoRest').value.length == 0)
    {
        alert("Debe seleccionar un platillo antes de guardar");
        return 1;
    }
    registrarCabecera();
    registrarDetalles();
    vaciarCamposCliente();
    vaciarCamposPlatos();
    
    document.getElementById('textMontoRest').value="";
    montoRestaurant = 0;
    arrayDetalle = new Array();
    borrarTabla();
    alert("Pedido Guardado");
}

function borrarTabla()
{
    $(document).ready(function() {
        var oTable = $('#tablaDetalleRest').dataTable();
        // Immediately 'nuke' the current rows (perhaps waiting for an Ajax callback...)
        oTable.fnClearTable();
    });
}
var arrayDetalle = new Array();

function guardarDetalleArray()
{
    var tabla = document.getElementById('tablaDetalleRest');
    var rowCount = tabla.rows.length;
    for(var i=1; i<rowCount; i++)
    {
        var row = tabla.rows[i];
        var cod = row.cells[0].innerHTML;
        var precio = row.cells[2].innerHTML;
        var cant = row.cells[3].innerHTML;
	arrayDetalle.push(cod);
        arrayDetalle.push(precio);
        arrayDetalle.push(cant);
    }
}
function cancelarPedido()
{
   if(document.getElementById('textMontoRest').value != ""){
        var r=confirm("Esta seguro de cancelar el pedido?");    
        if (r==true)
        {
            vaciarCamposCliente();
            vaciarCamposPlatos();
            $('#tablaDetalleRest').dataTable().fnClearTable();
            document.getElementById('textMontoRest').value="";
        }
   }
}
var nroOrden = 0;
function registrarCabecera()
{  
        var idCliente = document.getElementById('textIdCliente').value;
        var fecha = document.getElementById('textFecha').value;
        var costoTotal = document.getElementById('textMontoRest').value;
            
        $.ajax({
            type: "POST",
            url: "index.php/c_restaurant/guardarPedidoCabecera",
            data: 'idCliente='+idCliente+'&fecha='+fecha+'&costoTotal='+costoTotal,
            dataType: 'json',
            async: false,
            success: function( response ) {
                nroOrden = response;
            }
        });
        return false;
}


function sleep(millisegundos) {
    var inicio = new Date().getTime();
    while ((new Date().getTime() - inicio) < millisegundos){}
}

function registrarDetalles()
{
   guardarDetalleArray();
   var idCliente = document.getElementById('textIdCliente').value
   $(document).ready(function (){   
        
        $.ajax({
            type: "POST",
            url: "index.php/c_restaurant/guardarPedidoDetalle",
            data: 'arreglo='+arrayDetalle+'&idCliente='+idCliente
        });
        return false;
    });
    sleep(100);
}

/*function registrarDetalles1()
{
    var tabla = document.getElementById('tablaDetalleRest');
    var rowCount = tabla.rows.length;
    for(var i=1; i<rowCount; i++)
    {
        var row = tabla.rows[i];
	var codPlato = row.cells[0].innerHTML;
        var cantidad = row.cells[3].innerHTML;
        var subMonto = parseInt(row.cells[2].innerHTML)*cantidad;
        guardarDetalle(codPlato,cantidad,subMonto);
    }
}*/

function enterNumber(){

    var e = document.getElementById('textCantidad');
    if (!/^[0-5]+$/.test(e.value)) 
    { 
        alert("Por favor ingrese solo numeros del 1 al 5");
        e.value = e.value.substring(0,e.value.length-1);
        e.value="";
    }
}function numbersonly(myfield, e, dec)
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

function irAFactura()
{
    registrarPedido();
    //alert(nroOrden);
    idCuenta = document.getElementById("textIdCliente").value
    //registrarPedido();
    window.open("index.php/c_factura/factura?idCuenta=" + idCuenta + "&idPedido=" + nroOrden);
}
