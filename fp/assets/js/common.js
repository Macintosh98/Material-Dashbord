 
  	function show_hide_wizard_butons(wizard,total_rem)
          {
           wizard.find('.pager .previous').show(); 
        		if(total_rem == 1)
        		{
        			wizard.find('.pager .next').hide();    
        			wizard.find('.pager .finish' ).removeClass('hidden');
        			wizard.find('.pager.next' ).hide();
        		}
        		else
        		{
        			wizard.find('.pager .finish').addClass('hidden');
        			wizard.find('.pager .next' ).show();
        		}
          }   
    
$(document).ready(function(){
  
	    if($('#send').val() == 1 && $('#send').val() !== null) {
        $('#modal-messgae').html('Your Enquiry has been sent successfully. We will get back to you in few minutes.');
        $('#enquiry-success').modal('show');
        }
        else if($('#send').val() ===0 && $('#send').val() !== null){
        $('#modal-messgae').html('Oops! Technical Error Please try again later.');
        $('#enquiry-success').modal('show');
        }
        else { $('#enquiry-success').modal('hide');}
        
        /****custome validation rules for jquery ****/ 
        $.validator.addMethod("nowhitespace", function(value, element) {
        return this.optional(element) || /^\S+$/i.test(value);
        }, "No white space please");
        
        $.validator.addMethod("email", 
        function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
        }, 
        "Sorry, I've enabled very strict email validation"
        );
        /****custome validation rules for jquery ****/ 
    
       
    
    
    var $validator =$('#enquiryForm').validate({
        rules: {
              cust_fname: 
              {
                required:true
              },
      
              cust_mobile:
              {
                required:true,
                number:true,
                maxlength: 10,
                minlength: 10,
                nowhitespace:true
              },
              enquiry_about:
              {
                required:true
              },
              
              cust_email:
              {
                required:true,
                email:true,
                nowhitespace:true
              }
        },
        messages:
        {
              cust_fname: 
              {
                required:"Full Name Required"
              },
              cust_mobile:
              {
                required:"Enter Mobile Number",
                number:"Enter Number Only",
                maxlength: "Enter 10 Digit Mobile Number",
                minlength: "Enter 10 Digit Mobile Number",
                nowhitespace:"White Space Present in Mobile No"
              },
              
              enquiry_about:
              {
                required:"Select option From Enquiry For"
              },
              
              cust_email: 
              {
                required:"Enter Email ID",
                email:"Enter valid Email ID",
                nowhitespace:"White Space Present in Email ID"
              }
        },
    });

});