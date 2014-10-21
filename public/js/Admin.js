$( function() {


    // LOG

    var $body = $( "body.admin-log-index" );

    $body.find( ".table tr" ).on( "click", function() {
        var $tr = $( this ).closest( "tr" );
        if ( $tr.hasClass( "open" ) )
            $tr.removeClass( "open" );
        else
            $tr.addClass( "open" );
    } );

} );
