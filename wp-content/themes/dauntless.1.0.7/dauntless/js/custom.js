jQuery( document ).ready(function() {
    
    //Adding a class to each article tag for the blog grid of index.php
    jQuery( "article" ).addClass( "column" );
    
    
    //Applying the cssmenu styles to the main menu when no menu is selected.
    jQuery('#primary-menu').attr('id', 'cssmenu');
    
    //Styling the button in the sidebar search form
    jQuery('input[type=submit]').addClass( "button" );
    
    //Equalizing the columns
    jQuery('.columns').matchHeight();

    
});


