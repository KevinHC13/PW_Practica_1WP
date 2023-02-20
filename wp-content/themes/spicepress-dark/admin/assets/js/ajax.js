jQuery(document).ready(function() {

	/* Tabs in welcome page */
		function spicepress_dark_welcome_page_tabs(event) {
			jQuery(event).parent().addClass("active");
		   jQuery(event).parent().siblings().removeClass("active");
		   var tab = jQuery(event).attr("href");
		   jQuery(".spicepress-dark-tab-pane").not(tab).css("display", "none");
		   jQuery(tab).fadeIn();
		}
    
        jQuery(".spicepress-dark-nav-tabs li").slice(0,1).addClass("active");

	    jQuery(".spicepress-dark-nav-tabs a").click(function(event) {
		   event.preventDefault();
			spicepress_dark_welcome_page_tabs(this);
	    });
	   
		/* Tab SpicePress Dark height matches admin menu height for scrolling purpouses */
		$tab = jQuery('.spicepress-dark-tab-content > div');
		$admin_menu_height = jQuery('#adminmenu').height();
		if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
		{
		    $newheight = $admin_menu_height - 180;
		    $tab.css('min-height',$newheight);
		}
	
		jQuery(".spicepress-dark-custom-class").click(function(event){
		   event.preventDefault();
		   jQuery('.spicepress-dark-nav-tabs li a[href="#changelog"]').click();
		});

});