jQuery(window).load(function() {
	function show_popup(){
		jQuery( ".ltteleg-overlay" ).delay(100).fadeIn('slow');
		jQuery( ".ltteleg-overlay-inner" ).delay(500).fadeIn('slow');
	};
	window.setTimeout( show_popup, 500 );
})

jQuery(document).click(function(e) {
	if(e.target.id != "ltteleg-join-btn") {
		jQuery('.ltteleg-overlay').fadeOut();
	}
});

jQuery(document).keyup(function(e) {
	if(e.which == 27) {
		jQuery('.ltteleg-overlay').fadeOut();
	}
});