$( function() {


    // PREVIEW

    $( "#main-column .table tr[data-preview]" ).on( "click", function() {

        var $tr = $( this );
        var $preview = $( "#preview-column .preview-content" );

        $tr.siblings().removeClass( 'active' );

        $tr.addClass( "active" );

        $preview.addClass( "loading" );

        $.get( $tr.data( 'preview' ), {}, function( result ) {

            $preview.removeClass( 'no-content loading' ).html( result );
        } )
    } );

    // LOG

    var $body = $( "body.admin-logger-index" );

    $body.find( ".table tr" ).on( "click", function() {
        var $tr = $( this ).closest( "tr" );
        if ( $tr.hasClass( "open" ) )
            $tr.removeClass( "open" );
        else
            $tr.addClass( "open" );
    } );

} );
