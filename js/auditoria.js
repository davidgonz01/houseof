var readUrl   = 'index.php/c_auditoria/readAuditoria',
    delHref,
    updateHref,
    asInitVals = new Array(),
    updateId;


$( function() {
    
    $( '#tabs' ).tabs({
        fx: {height: 'toggle', opacity: 'toggle'}
    });
    
    readAuditoria();

}); //end document ready

function readAuditoria() {
    //display ajax loader animation
  //  $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    
    $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {

            //clear old rows
            $( '#records > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTable == 'undefined' )
                dataTable = $( '#records' ).dataTable({"bJQueryUI": true}
            
        
    );
      
            
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
            
            
            $("tfoot input").keyup( function () {
					//Filter on the column (the index) of this element */
					dataTable.fnFilter( this.value, $("tfoot input").index(this) );
				} );
			 // Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
				 // the footer
				 
				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
					}
				} );
 
        }
                
    });
} // end readUsers













