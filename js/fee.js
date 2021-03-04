

jQuery(document).ready(function(){
     
     jQuery('#billing_dni_afip').focusout(function () {
          jQuery( ".wait" ).remove();
          jQuery("#billing_dni_afip").after(' <span class="wait" style="color:red;">- Validando, aguarde un segundo por favor..</span>');
          jQuery( "#billing_dni_afip" ).prop( "disabled", true );
				    	jQuery.ajax({
				    		type: 'POST',
                dataType: "json",
				    		cache: false,
				    		url: wc_checkout_params.ajax_url,
				    		data: {
 									action: 'wanderlust_get_customer_data',
									cuit: jQuery('#billing_dni_afip').val(),							
				    		},
				    		success: function(data, textStatus, XMLHttpRequest){
                console.log(data);
                if(data =="0"){
                  jQuery( ".wait" ).remove();
                  jQuery("#billing_dni_afip").after(' <span class="wait" style="color:green;">- No se pudo validar el CUIT / DNI</span>');  
                  jQuery( "#billing_dni_afip" ).prop( "disabled", false );
                } else {
                  
                  jQuery( "#billing_dni_afip" ).prop( "disabled", false );
                  jQuery( ".wait" ).remove();
                  jQuery("#billing_dni_afip").after(' <span class="wait" style="color:green;">- Datos validados!</span>');
                  jQuery('#billing_first_name').val(data["nombre"]);
                  jQuery('#billing_last_name').val(data["apellido"]);
                  jQuery('#billing_company').val(data["empresa"]);
                  jQuery('#billing_address_1').val(data["billing_address_1"]);
                  jQuery('#billing_city').val(data["billing_city"]);
                  jQuery('#billing_state').val(data["billing_state"]);
                  jQuery('#select2-billing_state-container').html(data["billing_state_text"]);
                  jQuery('#billing_postcode').val(data["billing_postcode"]);
                }
 				    		 
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                  jQuery( ".wait" ).remove();
                  jQuery("#billing_dni_afip").after(' <span class="wait" style="color:green;">- No se pudo validar el CUIT / DNI</span>');
                }
				    	});
				    	 
							 
				    });
         
});
 
/*This file was exported by "Export WP Page to Static HTML" plugin which created by ReCorp (https://myrecorp.com) */