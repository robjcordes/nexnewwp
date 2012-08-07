jQuery.fn.simplehints = function() {
	return this.each(function() {
		var $this = $(this);
		
		if ($this.attr('value').length == 0) 
			$this.attr('value', $this.attr('title'));
		
		if ($this.attr('value') != $this.attr('title'))
			$this.addClass("bold");
				
		if ($this.attr('value').length != 0 && $this.attr('value') != $this.attr('title')) 
			$this.addClass("bold");
				
		$(this).focus(function () {
			if ($this.attr('value') == $this.attr('title'))	
				$(this).get(0).setSelectionRange(0,0);
		}).keypress(function() {
			if ($this.attr('value') == $this.attr('title') && $this.attr('type') != 'select-one')
				$this.attr('value', '').addClass("bold");
		}).change(function() {
			if ($this.attr('value') != $this.attr('title'))
				$this.addClass("bold");
			if ($this.attr('value') == $this.attr('title'))
				$this.removeClass("bold");
		}).blur(function() {
			if ($this.attr('value') == '')
				$this.attr('value', $this.attr('title')).removeClass("bold");
		}).parents('form').submit(function(e) {
			if ($this.attr('value') == $this.attr('title'))
				$this.attr('value', '');
		});
	});
};

jQuery.fn.sendmail = function() {
	return this.each(function() {
		$(this).ajaxForm({
			target: '#alert',
			success: function(str) {
				var result = str.split("|");
				var response = result[0];
				var url = result[1];
				
		        if (response == 'google_conversion') {
					$('.message').hide();
					$(".lightbox").colorbox.close;
		            window.location.href = '/thankyou/' + url;
		        }
				else {
					
					if(str.substring(0,5) == 'Thank') {
						$(this).parents('form').each(function(){
							$('input[type=submit]', this).attr('disabled', 'disabled');
							$('input[type=image]', this).attr('disabled', 'disabled');
						});
					}
					$(this).parents('form div.message').hide().show();
					$(this).parents().find('form .hint').simplehints();
					$('.tooltip').bt();
					$('.lightbox').open_colorbox();
					$.fn.colorbox.resize();
		        }
		    }
		});
	});
};

// jQuery.fn.open_colorbox = function() {
// 	return this.each(function() {
// 		$(".lightbox").colorbox({
// 			innerHeight		: 400, 
// 			scrolling		: false,
// 			preloading		: true, 
// 			onComplete		: function() {
// 				$(this).parents().find('form .hint').simplehints();
// 				$('#contactForm').sendmail();
// 				$('.lightbox').open_colorbox();
// 				$.fn.colorbox.resize();
// 			}
// 		});	
// 	});
// };

jQuery.preloadImages = function() {
	var a = (typeof arguments[0] == 'object')? arguments[0] : arguments;
	for(var i = a.length -1; i > 0; i--) {
		jQuery("<img>").attr("src", a[i]);
	}
}

var Home = {
	
	init: function() {
		
		jQuery(function($) {

			$("#aLink").fancybox().delay(5000).queue(function(){ 
				$(this).trigger("click"); 
				$(this).dequeue();  
			});
			
			// if ($.cookie("freekit") == null) {
			// 	$("#aLink").fancybox().delay(5000).queue(function(){ 
			// 		$(this).trigger("click"); 
			// 		$(this).dequeue(); 
			// 		$.cookie("freekit", true); 
			// 	});				
			// };
		});
	}
};

var Site = {

	init: function() {
		
		jQuery(function($) {

			$(".validate").blur(function(){
				var el = $(this);
				$.ajax({
					type: 'POST',
					url: '/admin/index/validate/',
					data: { action: 'validate', rule: el.attr('rel'), value: el.attr('value'), title: el.attr('title') },
					async: false,
					success: function(str) {
						el.next('span').remove();
						el.next('.select_skin').next('span').remove();

						var result = str.split("|");
						var valid = result[0];
						var tip = result[1];

						if(valid) {
							if ($(el.next('.select_skin')).length == 0) {
								el.after('<span class="tooltip_x"><img src="/images/icons/accept.png"></span>') ;
							} else {
								el.next('.select_skin').after('<span class="tooltip_x"><img src="/images/icons/accept.png"></span>') ;
							}
						} else if(str.length > 0) {
							if ($(el.next('.select_skin')).length == 0) {
								el.after('<span class="tooltip bt-active" title="' + tip + '"><img src="/images/icons/exclamation.png"></span>'); 
							} else {
								el.next('.select_skin').after('<span class="tooltip bt-active" title="' + tip + '"><img src="/images/icons/exclamation.png"></span>'); 
							}
							$('.tooltip').bt();
						}
					}
				});
			});
			
			$('input[type=button]').click(function() {
				var el = $(this);
				location.href = el.attr('rel');
			});
			
			$("#jump_menu").change(function(e) {
	            window.location.href = $(this).val();
	        });
			
			var changeMailTo = function(){
				var mArr = ["@","smashup","luca",".it"];
				$("#email").attr("href","mailto:"+mArr[2]+mArr[0]+mArr[1]+mArr[3]);
			}
					
			setTimeout(changeMailTo,500);
			
			var preload = [
				'/images/foobar_01.jpg', 
				'/images/foobar_02.jpg'
			];
			
			// $.preloadImages(preload);
			
			function isValidEmailAddress(emailAddress) {
				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
				return pattern.test(emailAddress);
			};
			
			$("#leadForm").bind("submit", function() {
				var Phone = $('input[name=phone]').val().replace(/\D+/g,'');
				
				if (!isValidEmailAddress($('input[name=email]').val())) {
					alert('Please include a valid email address. Thank you.');
					return false;
				}
				if (Phone.length != 10) {
					alert('Please include a valid 10-digit phone number. Thank you.');
					return false;
				}
				if ($("input[name='First Name']").val() == 'First Name*' || $("input[name='Last Name']").val() == 'Last Name*') {
					alert('Please include your full name. Thank you.');
					return false;
				};
				if ($('input[name=zipcode]').val() == 'Zipcode*') {
					alert('Please include your zipcode. Thank you.');
					return false;
				};
			});
			
			$("#leadForm_1").bind("submit", function() {
				if (!isValidEmailAddress($('input[name=Email]').val())) {
					alert('Please include a valid email address. Thank you.');
					return false;
				}
				if ($("input[name='First Name']").val() == 'First Name*' || $("input[name='Last Name']").val() == 'Last Name*') {
					alert('Please include your full name. Thank you.');
					return false;
				};
			});
			
			$("#leadForm_2").bind("submit", function() {
				var Phone = $('input[name=Phone]').val().replace(/\D+/g,'');
				
				if (!isValidEmailAddress($('input[name=Email]').val())) {
					alert('Please include a valid email address. Thank you.');
					return false;
				}
				if (Phone.length != 10) {
					alert('Please include a valid 10-digit phone number. Thank you.');
					return false;
				}
				if ($("input[name='First Name']").val() == 'First Name*' || $("input[name='Last Name']").val() == 'Last Name*') {
					alert('Please include your full name. Thank you.');
					return false;
				};
			});
			
			$("#giveawayForm").bind("submit", function() {
				var Phone = $('input[name=Phone]').val().replace(/\D+/g,'');
				
				if (!isValidEmailAddress($('input[name=Email]').val())) {
					alert('Please include a valid email address. Thank you.');
					return false;
				}
				if (Phone.length != 10) {
					alert('Please include a valid 10-digit phone number. Thank you.');
					return false;
				}
				if ($("input[name='First Name']").val() == 'First Name*' || $("input[name='Last Name']").val() == 'Last Name*') {
					alert('Please include your full name. Thank you.');
					return false;
				};
			});
			
			$("#commercialForm").bind("submit", function() {
				var Phone = $('input[name=Phone]').val().replace(/\D+/g,'');
				
				if (!isValidEmailAddress($('input[name=Email]').val())) {
					alert('Please include a valid email address. Thank you.');
					return false;
				}
				if (Phone.length != 10) {
					alert('Please include a valid 10-digit phone number. Thank you.');
					return false;
				}
				if ($("input[name='First Name']").val() == 'First Name*' || $("input[name='Last Name']").val() == 'Last Name*') {
					alert('Please include your full name. Thank you.');
					return false;
				};
			});
			
			$("#scheduleForm").bind("submit", function() {
				var Phone = $('input[name=Phone]').val().replace(/\D+/g,'');
				
				if (!isValidEmailAddress($('input[name=Email]').val())) {
					alert('Please include a valid email address. Thank you.');
					return false;
				}
				if (Phone.length != 10) {
					alert('Please include a valid 10-digit phone number. Thank you.');
					return false;
				}
				if ($("input[name='First Name']").val() == 'First Name*' || $("input[name='Last Name']").val() == 'Last Name*') {
					alert('Please include your full name. Thank you.');
					return false;
				};
				if ($("input[name='LEADCF91']").val() == 'Request Date*' || $("select[name='LEADCF6']").val() == '-None-') {
					alert('Please choose a date and time that is convenient for your One-On-One. Thank you.');
					return false;
				};
				if (!$("input[name='LEADCF109']").is(':checked')) {
					alert('Please confirm that your agree with our Terms and Conditions. Thank you.');
					return false;
				};
			});
			
			$("#whitepaperForm").bind("submit", function() {
				var Phone = $('input[name=Phone]').val().replace(/\D+/g,'');
				
				if (!isValidEmailAddress($('input[name=Email]').val())) {
					alert('Please include a valid email address. Thank you.');
					return false;
				}
				if (Phone.length != 10) {
					alert('Please include a valid 10-digit phone number. Thank you.');
					return false;
				}
				if ($("input[name='First Name']").val() == 'First Name*' || $("input[name='Last Name']").val() == 'Last Name*') {
					alert('Please include your full name. Thank you.');
					return false;
				};
			});
			
			$('.choose_date').datepicker({ 
				dateFormat: 'mm/dd/yy' 
			});
						
			$(this).find('form .hint').simplehints();
			$('#contactForm').sendmail();
			$('.tooltip').bt();
			// $('.lightbox').open_colorbox();
			$('.select').after('<div class="select_skin"></div>');
			
			$("a.legend, a.benefits").hover(
				function () {
					var el = $(this).attr('rel');
					$('.callout-default').css('visibility', 'hidden');
					$(el).css('visibility', 'visible');
			  	}, 
				function () {
			    	var el = $(this).attr('rel');
					$(el).css('visibility', 'hidden');
					$('.callout-default').css('visibility', 'visible');
				}
			);
			
			$(".popup").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic'
			});
			
			function hideFormText() {
				var _inputs = document.getElementsByTagName('input');
				var _txt = document.getElementsByTagName('textarea');
				var _value = [];

				if (_inputs) {
					for(var i=0; i<_inputs.length; i++) {
						if (_inputs[i].type == 'text' || _inputs[i].type == 'password') {

							_inputs[i].index = i;
							_value[i] = _inputs[i].value;

							_inputs[i].onfocus = function(){
								if (this.value == _value[this.index])
									this.value = '';
							}
							_inputs[i].onblur = function(){
								if (this.value == '')
									this.value = _value[this.index];
							}
						}
					}
				}
				if (_txt) {
					for(var i=0; i<_txt.length; i++) {
						_txt[i].index = i;
						_value['txt'+i] = _txt[i].value;

						_txt[i].onfocus = function(){
							if (this.value == _value['txt'+this.index])
								this.value = '';
						}
						_txt[i].onblur = function(){
							if (this.value == '')
								this.value = _value['txt'+this.index];
						}
					}
				}
			}
			
			if (window.addEventListener)
				window.addEventListener("load", hideFormText, false);
			else if (window.attachEvent)
				window.attachEvent("onload", hideFormText);
			
			$(".lovely-input").keyup(function(e) {
				var $this = $(this);
				var val = $this.val();
				if (val > 100){
					e.preventDefault();
					$this.val(100);
				}
				else if (val < 1)
				{
					e.preventDefault();
					$this.val(1);
				}
			});

			function initNav() {
				initNavIndexes();
			}
			function initNavIndexes()
			{
				var nav = document.getElementById("add-nav");
				if(nav) {
					var lis = nav.getElementsByTagName("li");
					for (var i=0; i<lis.length; i++) {
						//lis[i].style.zIndex = i+1;
						lis[i].style.zIndex = lis.length-i;
					}
				}
			}
			if (window.addEventListener)
				window.addEventListener("load", initNav, false);
			else if (window.attachEvent && !window.opera)
				window.attachEvent("onload", initNav);
			
			$( "#tabs" ).tabs();
			$('.box_skitter_large-in').skitter({animation: "fade"});
		});
	}
};

Site.init();