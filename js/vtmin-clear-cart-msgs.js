     jQuery(document).ready(function($) {
     //******************
     //v1.09.8 NEW
     //******************
     /*
     wc_clear_notices
     doesn't clear old notices in all cases
     this takes care of it.
     Switched on via filter.
     */
        /*  THESE TWO ONLY WORK 1ST TIME
        $(".remove").click(function(e) {  //'remove' is the class on the 'x' to delete products from the cart
          $(".woocommerce-error").remove();
          e.preventDefault();
         });
         
       $(".button").click(function(e) { //'button' is the class for the 'apply coupon' and 'update cart' buttons
        $(".woocommerce-error").remove();
        e.preventDefault();
       });
       */

      $(document).delegate('.remove', 'click', function(){
        $(".woocommerce-error").remove();
      });

      $(document).delegate('.button', 'click', function(){
        $(".woocommerce-error").remove();
      });
                                                                      
    });  

/*This file was exported by "Export WP Page to Static HTML" plugin which created by ReCorp (https://myrecorp.com) */