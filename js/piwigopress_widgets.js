  jQuery(document).ready(function() { // Select a larger sized picture (additional radio inputs within the Widget menu
	jQuery("a.PWGP_widget").click(function () {
		jQuery(this).parent("label").siblings("span.hidden").removeClass("hidden");
		jQuery(this).parent("label").hide();
	});
  });