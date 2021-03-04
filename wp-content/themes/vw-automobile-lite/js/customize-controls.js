( function( api ) {

	// Extends our custom "vw-automobile-lite" section.
	api.sectionConstructor['vw-automobile-lite'] = api.Section.extend( {

		attachEvents: function () {},

		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );