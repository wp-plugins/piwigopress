  jQuery(document).ready(function() {
	jQuery("a.PWGP_widget").click(function () {
		jQuery(this).parent("label").siblings("span.hidden").removeClass("hidden");
		jQuery(this).parent("label").css("display","none");
	});
  });