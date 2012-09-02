/*
Compiler on http://refresh-sf.com/yui/
*/
(function($){
	$.fn.extend({
		insertAtCaret: function(myValue){ // Insert at Cursor position within HTML editor
		  return this.each(function(i) {
			if (document.selection) {
			  //For browsers like Internet Explorer
			  this.focus();
			  sel = document.selection.createRange();
			  sel.text = myValue;
			  this.focus();
			}
			else if (this.selectionStart || this.selectionStart == '0') {
			  //For browsers like Firefox and Webkit based
			  var startPos = this.selectionStart;
			  var endPos = this.selectionEnd;
			  var scrollTop = this.scrollTop;
			  this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
			  this.focus();
			  this.selectionStart = startPos + myValue.length;
			  this.selectionEnd = startPos + myValue.length;
			  this.scrollTop = scrollTop;
			} else {
			  this.value += myValue;
			  this.focus();
			}
		  })
		}
	});
	$(document).ready(function() {
		var pwgp_Gallery_Display = true;
	   
		$("a#PWGP_button").unbind('click').click(function () {
			if ( pwgp_Gallery_Display ) {
				if ( $("#PWGP_Gallery_shortcoder").size() == 0 ) { // First time use: Create thumbnails areas
					var finder = $("#PWGP_Gallery_finder").html();
					$("#poststuff").before('<div id="PWGP_Gallery_shortcoder" />');
					$("#PWGP_Gallery_shortcoder").html(finder);
					$("#PWGP_Gallery_finder").remove();
				} else { // Already available, just show it
					$("#PWGP_Gallery_shortcoder").show();
				}
				$('#PWGP_finder').focusin(function() { // Changing Gallery URL hides buttons
					$("#PWGP_more").hide();
					$("#PWGP_hide").hide();
					$("#PWGP_show").hide();
					$("#PWGP_show_stats").hide();
				});
				$("#PWGP_show_button").unbind('click').click(function () {
					var url = $("#PWGP_finder").val(), // New URL to load
						loaded = 5,
						$gallery = $( "#PWGP_dragger" ),
						$trash = $( "#PWGP_dropping" );
					$('.PWGP_system').show(2000);

					$('#PWGP_Load_Active').show(); // Busy icon is on

					// Ready to Load and generate
					$gallery.load('../wp-content/plugins/piwigopress/thumbnails_reloader.php?&url='+url, function() {
						$("#PWGP_more").fadeIn('slow','swing').addClass('button').unbind('click').click(function () {
							Get_more();
						});
						$("#PWGP_hide").fadeIn('slow','swing').addClass('button').unbind('click').click(function () {
							var hide = Math.max(1, Math.floor( $('li:visible', $gallery).size() / 2 ));
							for(i=0;i<hide;i++) {
								$gallery.find('li:visible').first().hide();
							}
							if ($('li:visible', $gallery).size() == 0) $("#PWGP_hide").hide();
							else {
								$("#PWGP_show").fadeIn('slow','swing').addClass('button').unbind('click').click(function () {
									$('li:hidden', $gallery).fadeIn(500);
									$("#PWGP_show").fadeOut(2000);
								});
							}
						});
						Drag_n_Drop();
						$('#PWGP_Load_Active').hide(); // Busy icon is off
						
						function Get_more() {
							$('#PWGP_Load_Active').show();
							$.ajax({
							  url: '../wp-content/plugins/piwigopress/thumbnails_reloader.php?&loaded='+loaded+'&url='+url,
							  cache: false,
							  success: function(html){
								$($gallery).append(html);
								Drag_n_Drop();
								$('#PWGP_Load_Active').hide();
							  }
							});
							var added = 5;
							if (loaded > 9) added = 10; 
							if (loaded > 49) added = 50; 
							if (loaded > 99) added = 100; // More we loaded larger next step might be
							loaded += added;
						};
						function Drag_n_Drop() {
							var hgal = ($('#PWGP_dragger img').height())+20;  
							$gallery.height(hgal); // Ajust loading area height to thumbnail height
							$trash.height(hgal+25).css('min-height', hgal+25); // Adjust dropping zone as well
							$('#PWGP_dropping ul').height(hgal).css('min-height', hgal);
							$( "li", $gallery ).draggable({
								revert: "invalid", helper: "clone", cursor: "move"
							});
							var obtained = $('li', $trash).size() + $('li', $gallery).size();
							$("#PWGP_show_stats").show().find("#PWGP_stats").text(' '+obtained+' / '+loaded);
							$trash.droppable({
								activeClass: "ui-state-highlight",
								drop: function( event, ui ) { 
									insertImage( ui.draggable ); // This DOM is now droppable
									$("a#PWGP_Gen").fadeIn('slow','swing').addClass('button');
									$("a#PWGP_rst").fadeIn('slow','swing').addClass('button');
								}
							});
							if ($('li:visible', $gallery).size() > 0) $("#PWGP_hide").show();
						};
						function insertImage( $item ) {
							$item.fadeOut(function() {
								var $list = $( "ul", $trash );
								$item.appendTo( $list ).fadeIn(2000,'swing'); // Available to be shortcoded
								$("a#PWGP_Gen").unbind('click').click(function () {
									$("img", $trash).each(function () {
										var $Shortcode = $(this).attr('title').split(']');
										var $scode = $Shortcode[0];
										var $hsize = $('#thumbnail_size input[type=radio][name=thumbnail_size]:checked').attr('value');
										if ( $hsize !== 'la') $scode += " size='"+$hsize+"'";
										$('input#desc_check[name=desc_check]').attr('value',0);
										$hdesc = 0 + $('input#desc_check[name=desc_check]:checked').attr('value',1).attr('value');
										if ( $hdesc == 1 ) $scode += " desc=1";
										var $hclass = $('#photo_class').val();
										if ( $hclass != '' ) $scode += " class='"+$hclass+"'";
										var $scode = "\t"+$scode+"] <br>\n\r";
										// HTML Editor only insert statement
										$('#content').insertAtCaret( $scode );
										// Visual Editor Only insert statement
										tinyMCE.execInstanceCommand('content', "mceInsertContent", false, $scode ); 
										// If you are using another WordPress Post Editor 
										// and if you already found its right insert statement, 
										// please, for all PiwigoPress users, share it through a dedicate topic there: 
										// http://wordpress.org/support/plugin/piwigopress
									});  
								});
								$("a#PWGP_rst").unbind('click').click(function () {
									$('li', $trash).appendTo( $gallery );
									$("a#PWGP_Gen").hide().removeClass('button');
									$("a#PWGP_rst").hide().removeClass('button');
									$("#PWGP_show_stats").show().find("#PWGP_stats").text(' '+$('li', $gallery).size()+' / '+loaded);
								});
							}); 
						};
					}); // End of Loaded
				});	
				pwgp_Gallery_Display = false;
			} else {
				$("div#PWGP_Gallery_shortcoder").hide();
				pwgp_Gallery_Display = true;
			}
		});
	});
}(jQuery));