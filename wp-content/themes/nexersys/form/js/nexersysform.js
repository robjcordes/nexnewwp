var $ = jQuery.noConflict();
$(document).ready(function() {
    $(".campaign_title").hide();
    $(".content-box").css({"overflow":"visible"});
    $(".nexersys_landing_form").load('/wp-content/themes/nexersys/form/nexersysform.html', function(){
        nexReqForm.checkUrlType();
        nexReqForm.formatForm();
        nexReqForm.submitButtonBehavior();
        nexReqForm.attachValidation();
    });
    var thisURL = $(location).attr('href');
    var campaignName = $('.campaign_title').html();
    nexReqForm = {
    hiddenCommInput : "<input type='hidden' name='xnQsjsdp' value='dhOYVrEbdmJthYo*kRl79w$$'><input type='hidden' name='xmIwtLD' value='xxtEl*Hx2ByNU*uyPq3OMHBogz4VdScW'><input type='hidden' name='actionType' value='TGVhZHM='><input type='hidden' name='returnURL' value='http://nexersys.com/thank-you'><input type='hidden' name='LEADCF13' maxlength='40' value='" + campaignName + "'/><input type='hidden' name='LEADCF14' maxlength='100' value='" + thisURL + "'/>",
    hiddenHomeInput : "<input type='hidden' name='xnQsjsdp' value='f1LzxolSe-0$'/><input type='hidden' name='xmIwtLD' value='82AfV3HJwjp71g4ILMIYL*GCpUdN*P5O'/><input type='hidden' name='actionType' value='TGVhZHM='/><input type='hidden' name='returnURL' value='http://nexersys.com/thank-you'/><input type='hidden' name='LEADCF1' maxlength='40' value='" + campaignName + "'/><input type='hidden' name='LEADCF5' maxlength='100' value='" + thisURL + "'/>",
    formNameHome : "WebToLeads452985000001485047",
    formNameComm : "WebToLeads582065000000070015",
    companyNameInput : "<tr class='company_name'><td class='label'><label for='CompanyName'>Company Name*</label></td><td><input class='nexersys validate[required]' id='CompanyName' type='text' maxlength='255' name='LEADCF24' /></td></tr>",
    showTestAlerts : function(){
        var formValues = 'form name: ' + $('#nex_request_form').attr('name')
            //+ '\n URL Type: ' + nexReqForm.urlType
            //+ '\n Model Type: ' + nexReqForm.modelType
            //+ '\n Country: ' + $('#nex_request form #nex_request_country').val()
            //+ '\n Questions: ' + $('#nex_request form #questions').val()
            //+ '\n model input name: ' + $('#nex_request form #model_type').attr('name')
            //+ '\n country input name: ' + $('#nex_request form #nex_request_country').attr('name')
            //+ '\n questions input name: ' + $('#nex_request form #questions').attr('name')
            //+ '\n hours: ' + $('#nex_request form .hours').val()
        ;
        $('#nex_request form input').each(function(){
            formValues += '\n ' + $(this).val();
        });
        alert(formValues);
    },
    checkUrlType : function(){
                       var url = $(location).attr('href');
                       if($('.nexersys_landing_form').hasClass('home')){
                           this.urlType = 'home';
                       }else if($('.nexersys_landing_form').hasClass('commercial')){
                           this.urlType = 'commercial';
                       }else if($('.nexersys_landing_form').hasClass('pro')){
                           this.urlType = 'pro';
                       }else{
                           this.urlType = 'general';
                       }
                       console.log(this.urlType)
                   },
    prepareForm : function(crmType){
        //change form names, change insert hidden input fields etc. here before submitting form
        if(crmType == 'zohoHome'){
            $('#nex_request form').attr('name', this.formNameHome);
            $('#nex_request table').prepend(this.hiddenHomeInput);
            $('#nex_request #model_type').attr('name', 'LEADCF15');
            $('#nex_request #CompanyName').attr('name', 'LEADCF29');
            $('#nex_request #nex_request_country').attr('name', 'LEADCF23');
            $('#nex_request #questions').attr('name', 'LEADCF28');
        }else{
            //if not home, format input fields for commercial crm
            $('#nex_request form').attr('name', this.formNameComm);
            $('#nex_request table').prepend(this.hiddenCommInput);
            $('#nex_request #model_type').attr('name', 'LEADCF3');
            $('#nex_request #nex_request_country').attr('name', 'LEADCF11');
            $('#nex_request #questions').attr('name', 'LEADCF10');
        }

    },
    submitButtonBehavior : function(){
          $('#nex_request_form .submit').hover(function(){
        $(this).toggleClass('down');
    });
        $('#nex_request_form .submit').click(function(event){
            var country = $('#nex_request form #nex_request_country').val();
            nexReqForm.updateAction(country, nexReqForm.urlType);
            nexReqForm.formTimestamp();
            //nexReqForm.showTestAlerts();
            //return false;
        });  
    },
    formTimestamp: function(){
        var currentTime = new Date();
                            var month = currentTime.getMonth() + 1;
                            var day = currentTime.getDate();
                            var year = currentTime.getFullYear();
                            var hours = currentTime.getHours();
                            
                            var minutes = currentTime.getMinutes();
                            if (minutes < 10){
                                minutes = '0' + minutes;
                            }
                            if(month < 10){
                                month = '0' + month;
                            }
                            if(hours < 10){
                                hours = '0' + hours;
                            }
                            if(hours > 12){
                                hours = hours - 12;
                                var ampm = 'PM';
                            }else{
                                ampm = 'AM';
                            }
                            var dateString = month + '/' + day + '/' + year;
                            $('.datestr').val(dateString);
                            $('.hours').val(hours);
                            $('.minutes').val(minutes);
                            $('.ampm').val(ampm);
                            
                            
    },
    updateAction : function(country, urlType){
                       this.modelType = $('#nex_request #model_type').val();
                       if(this.urlType == 'general'){
                           if((this.modelType == 'home' || this.modelType == 'pro') && country == 'United States'){
                               //zohoHome
                               this.prepareForm('zohoHome');
                           }else{
                               //zohoCommercial
                               this.prepareForm('zohoComm');
                           }
                       }else if(this.urlType == 'home' || this.urlType == 'pro'){
                           if(country == 'United States'){
                               //zohoHome
                               this.prepareForm('zohoHome');
                           }else{
                               //zohoCommercial
                               this.prepareForm('zohoComm');
                           }
                       }else if(this.urlType == 'commercial'){
                           //zohoCommercial
                               this.prepareForm('zohoComm');
                       }
                            
                   },
    formatForm : function(){
		//console.log(this.urlType);
		$('#nex_request_form br').remove();
		var formHTML = $('#nex_request_form').html();
                if(formHTML != null){
                    		formHTML.replace('<p></p>', '');
		formHTML.replace('<p>', '');
		formHTML.replace('</p>', '');
		formHTML.replace('<p/>', '');
		formHTML.replace('<P>', '');
		formHTML.replace('<P/>', '');
		formHTML.replace('<P></P>', '');
		formHTML.replace('<P/>', '');
                }

                     if(this.urlType == 'home'){
                         $('.model_type').addClass('hidden');
                         $('[name=LEADCF3]').addClass('hidden').val('home');
                         $('#nex_request .left-top img').attr('src', '/wp-content/themes/nexersys/form/img/nex-bro-home.png');
                     }else if(this.urlType == 'commercial'){
						$('#nex_request_form textarea').css({'height':'45px'});
						
						$(this.companyNameInput).insertAfter('#nex_request table tr:eq(2)');
						//if($(location).attr('href') == 'http://nexersys.com/commercial-test/'){
								if($.browser.msie && $.browser.version == 7.0){
									//console.log('ie 7');
									$('#nex_request_form .submit').css({'margin-top':'-45px'});
								}else if($.browser.msie && $.browser.version == 8.0){
									//console.log('ie 8');
								}else{
									//console.log('not ie');
								}
						//}
                         $('.model_type').addClass('hidden');
                         $('[name=LEADCF3]').addClass('hidden').val('commercial');
                         $('#nex_request .left-top img').attr('src', '/wp-content/themes/nexersys/form/img/nex-bro-comm.png');
                     }else if(this.urlType == 'pro'){
                         $('.model_type').addClass('hidden');
                         $('[name=LEADCF3]').addClass('hidden').val('pro');
                         $('#nex_request .left-top img').attr('src', '/wp-content/themes/nexersys/form/img/nex-bro-pro.png');
                     }else{
                         $('#nex_request .left-top img').attr('src', '/wp-content/themes/nexersys/form/img/nex-bro-home.png');
						 $('.company_name').addClass('hidden');
					     $('.company_name input').removeClass('validate[required]');
                     }
                 },
                 attachValidation: function(){
                     $("#nex_request_form").validationEngine('attach');
                 }
    }
});