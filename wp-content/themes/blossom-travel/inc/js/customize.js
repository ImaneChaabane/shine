jQuery(document).ready(function($){
    /* Move Fornt page widgets to frontpage panel */
	wp.customize.section( 'sidebar-widgets-logo' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-logo' ).priority( '15' );
    wp.customize.section( 'sidebar-widgets-about' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-about' ).priority( '20' );
    wp.customize.section( 'sidebar-widgets-featured' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-featured' ).priority( '25' );
    wp.customize.section( 'sidebar-widgets-map' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-map' ).priority( '50' );
    wp.customize.section( 'sidebar-widgets-cta' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-cta' ).priority( '60' );
    wp.customize.section( 'sidebar-widgets-newsletter' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-newsletter' ).priority( '75' );

    /* Move Blog Featured Widget to general panel */
    wp.customize.section( 'sidebar-widgets-blog-trending' ).panel( 'blogpage_settings' );
    wp.customize.section( 'sidebar-widgets-blog-trending' ).priority( '20' );
    wp.customize.section( 'sidebar-widgets-blog-featured' ).panel( 'blogpage_settings' );
    wp.customize.section( 'sidebar-widgets-blog-featured' ).priority( '25' );  
    
    /* Home page preview url */
    wp.customize.panel( 'frontpage_settings', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( blossom_travel_cdata.home );
            }
        });
    });
});

( function( api ) {

    // Extends our custom "example-1" section.
    api.sectionConstructor['blossom-travel-pro-section'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );