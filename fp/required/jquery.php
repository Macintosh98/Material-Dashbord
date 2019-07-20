<script>
        $(document).ready(function(){
        if($('#send').val() == 1 && $('#send').val() != null) {
        $('#modal-messgae').html('Your Enquiry has been sent successfully. We will get back to you in few minutes.');
        $('#enquiry-success').modal('show');
        }
        else if($('#send').val() == 0 && $('#send').val() != null){
        $('#modal-messgae').html('Oops! Technical Error Please try again later.');
        $('#enquiry-success').modal('show');
        }
        else { $('#enquiry-success').modal('hide');}
        var Maxageyear=(new Date).getFullYear() - 18;
        var Maxyear=(new Date).getFullYear();
        var Maxyearcarbike=(new Date).getFullYear();
        var Maxdate=(new Date).getDate();
        var Maxmonth=(new Date).getMonth();
        var Trip_value=$("#Trip").val();
        if($("#Trip").val() =='Single' || $("#Trip").val() ==null) { var year=6; } else { var year=12;}
        
    /******* for footer menu dropdown Start*****/
        $(".category-head").click(function () {
        $(this).next().slideToggle('fast');
        });
	 /******* for footer menu dropdown End*****/
	 $('#enquiry_about').change(function() {
	  $('#policy_plan').val($(this).find("option:selected").text());    
	 });
	 
        $(".datepicker").datetimepicker({
                 viewMode: 'years',
                 format: 'DD/MM/YYYY',
                 maxDate: new Date(Maxageyear, Maxmonth,Maxdate),
                 minDate: new Date(Maxageyear-55, Maxmonth,Maxdate),
                 icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
                 
        });
        
        $(".datepicker").on("dp.change", function (e) {
        var todayDate = new Date();
        var date=new Date(e.date);
        var todayYear = todayDate.getFullYear();
        var todayMonth = todayDate.getMonth();
        var todayDay = todayDate.getDate();
        var birthYear = date.getFullYear();
        var  birthMonth =date.getMonth();
        var birthDay = date.getDate();
        var age = todayYear - birthYear; 
        
        //var validation_entry_age= parseInt(age) + parseInt($("#policy_term_insurance").val());
            if(age ==18) { var term_value=65; } else { var term_value=parseInt(age) - parseInt(18); term_value=parseInt(65) - term_value; }
                var term='';
                for (var i = 10; i <= term_value; i++) {
                term +='<option value="'+i+'">'+i+'</option>'; 
                }
                $("#term_info_error").show();
                $("#policy_term_insurance").html('<option value="" disabled selected>Term Years</option>'+term+'');  
                 $(".selectpicker").selectpicker('refresh');
                //$("#term_info_error").html('Maximum Term restricted to '+term_value+' years');
                //if(validation_entry_age <=65) { $("#term_error").hide(); } else { $("#term_error").show(); }
    });
        
        
        $(".vehiclestartdatepicker").datetimepicker({
                 viewMode: 'years',
                 format: 'DD/MM/YYYY',
                 minDate: new Date(Maxyear,Maxmonth,Maxdate-10),
                 maxDate: new Date(Maxyear,Maxmonth,Maxdate),
                 icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
        });
        
        
        $(".vehiclestartdatepickerback").datetimepicker({
                 viewMode: 'years',
                 format: 'DD/MM/YYYY',
                 minDate: new Date(Maxyear-20,Maxmonth,Maxdate),
                 maxDate: new Date(Maxyear-1,Maxmonth+2,Maxdate),
                 icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
        });
        
        $('.vehicleenddatepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false,
            minDate: new Date(Maxyear,Maxmonth-4,Maxdate),
            maxDate: new Date(Maxyear, Maxmonth,Maxdate+20),
            icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            
        });
        
        $(".vehiclestartdatepicker").on("dp.change", function (e) {
            $('.vehicleenddatepicker').data("DateTimePicker").minDate(e.date);
           
        });
  });   

<!---- drop down menu hover open Start--->	
         $(".hover-dropdown").children('.dropdown').hover(
			function(){ 
				$(this).addClass('open');
				$( this ).children('.dropdown-menu').first().addClass('open');

			 },
			function(){ 
				$(this).removeClass('open');
				$(this).removeClass('show');
				$( this ).children('.dropdown-menu').first().removeClass('open');
				$( this ).children('.dropdown-menu').first().removeClass('show');
			 }
           );
<!---- drop down menu hover open End--->			   
<!---- Nav pills tab custome effiect Start--->
 
      $( 'ul.nav-pills li a' ).on( 'click', function() {
			var old_target = $('ul.nav-pills li a.active').attr( 'href' ).split("-").pop();
			$('#key-area-'+old_target).hide();
			var new_target = $(this).attr( 'href' ).split("-").pop();
			$('#key-area-'+new_target).show();	
			var old_bg = $('ul.nav-pills li a.active').css( 'background-color' );
			$('ul.nav-pills li a').css( 'background-color','#F4F4F5');
			$('ul.nav-pills li a.active').parent().find( 'i' ).css( 'color',old_bg);
			$( 'ul.nav-pills li span.arrow-right' ).addClass( 'hidden');
			var bg = $(this).attr('color');
	       //$('#offer-area').css('background',bg);
	       $( this ).css( 'background-color',bg );
           $( this ).parent().find( 'i' ).css( 'color','#ffffff' );
		   $( this ).parent().find( 'span i' ).css( 'color',bg );
		   $( this ).parent().find( 'span' ).toggleClass( 'hidden');   
      });
<!---- Nav pills tab custome effiect End--->	  


function validate() {
    alert('ppp'); 
    
}

$(document).ready(function(){
  
  

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
    
	 $('#healthWizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  		   var wizard = $('#healthWizard');
	  		   var total_rem = navigation.find('li').length-index;
			    if(index != 1) 
		        wizard.find('.pager .previous' ).show(); 
	  			var $valid = $("#healthForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
				else{
				  show_hide_wizard_butons(wizard,total_rem);
				}
	  		},
			'onPrevious': function(tab, navigation, index) {
				if(index == 0) 
				   $('#healthWizard').find('.pager .previous').hide(); 
			  }
	  	});
	  	
	  	$('#healthWizard .previous').click(function() {
		 $('#healthWizard').find('.pager .finish').addClass('hidden');
         $('#healthWizard').find('.pager .next' ).show();
    	});
    	
	 $('#termWizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  		   var wizard = $('#termWizard');
	  		   var total_rem = navigation.find('li').length-index;
			    if(index != 1) 
		        wizard.find('.pager .previous' ).show(); 
	  			var $valid = $("#termForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
				else{
				  show_hide_wizard_butons(wizard,total_rem);
				}
	  		},
			'onPrevious': function(tab, navigation, index) {
				if(index == 0) 
				   $('#termWizard').find('.pager .previous').hide(); 
			  }
	  	});
	  	
	  	$('#termWizard .previous').click(function() {
		 $('#termWizard').find('.pager .finish').addClass('hidden');
         $('#termWizard').find('.pager .next' ).show();
    	});
    	
    	

	    $('#carWizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  		   var wizard = $('#carWizard');
	  		   var total_rem = navigation.find('li').length-index;
			    if(index != 1) 
		        wizard.find('.pager .previous' ).show(); 
	  			var $valid = $("#carForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
				else{
				  show_hide_wizard_butons(wizard,total_rem);
				}
	  		},
			'onPrevious': function(tab, navigation, index) {
				if(index == 0) 
				   $('#carWizard').find('.pager .previous').hide(); 
			  }
	  	});
	  	
	  	$('#carWizard .previous').click(function() {
		 $('#carWizard').find('.pager .finish').addClass('hidden');
         $('#carWizard').find('.pager .next' ).show();
    	});
	
	
	  	$('#bikeWizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  		   var wizard = $('#bikeWizard');
	  		   var total_rem = navigation.find('li').length-index;
			    if(index != 1) 
		        wizard.find('.pager .previous' ).show(); 
	  			var $valid = $("#bikeForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
				else{
				  show_hide_wizard_butons(wizard,total_rem);
				}
	  		},
			'onPrevious': function(tab, navigation, index) {
				if(index == 0) 
				   $('#bikeWizard').find('.pager .previous').hide(); 
			  }
	  	});
	  	
	  	 $('#bikeWizard .previous').click(function() {
		 $('#bikeWizard').find('.pager .finish').addClass('hidden');
         $('#bikeWizard').find('.pager .next' ).show();
    	});
	  
	  
	  	$('#travelWizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  		   var wizard = $('#travelWizard');
	  		   var total_rem = navigation.find('li').length-index;
			    if(index != 1) 
		        wizard.find('.pager .previous' ).show(); 
	  			var $valid = $("#travelForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
				else{
				  show_hide_wizard_butons(wizard,total_rem);
				}
	  		},
			'onPrevious': function(tab, navigation, index) {
				if(index == 0) 
				   $('#travelWizard').find('.pager .previous').hide(); 
			  }
	  	});
	  	
	  	 $('#travelWizard .previous').click(function() {
		 $('#travelWizard').find('.pager .finish').addClass('hidden');
         $('#travelWizard').find('.pager .next' ).show();
    	});
	  	
	  	$('#invesmentWizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  		   var wizard = $('#invesmentWizard');
	  		   var total_rem = navigation.find('li').length-index;
			    if(index != 1) 
		        wizard.find('.pager .previous' ).show(); 
	  			var $valid = $("#invesmentForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
				else{
				  show_hide_wizard_butons(wizard,total_rem);
				}
	  		},
			'onPrevious': function(tab, navigation, index) {
				if(index == 0) 
				   $('#invesmentWizard').find('.pager .previous').hide(); 
			  }
	  	});
	  	
	  	 $('#invesmentWizard .previous').click(function() {
		 $('#invesmentWizard').find('.pager .finish').addClass('hidden');
         $('#invesmentWizard').find('.pager .next' ).show();
    	});
    

  
	$('#PanWizard').bootstrapWizard({
	  		'tabClass': 'nav nav-pills',
	  		'onNext': function(tab, navigation, index) {
	  		   var wizard = $('#PanWizard');
	  		   var total_rem = navigation.find('li').length-index;
			    if(index != 1) 
		        wizard.find('.pager .previous' ).show(); 
	  			var $valid = $("#PanForm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false;
	  			}
				else{
				  show_hide_wizard_butons(wizard,total_rem);
				}
	  		},
			'onPrevious': function(tab, navigation, index) {
				if(index == 0) 
				   $('#PanWizard').find('.pager .previous').hide(); 
			}
	});
	  	
	$('#PanWizard .previous').click(function() {
		$('#PanWizard').find('.pager .finish').addClass('hidden');
        $('#PanWizard').find('.pager .next' ).show();
    });

    $("#login").click(function(){
      var username=$("#username").val();
      var password=$("#password").val();
      if(username && password)
                        $.ajax({
                            url: "includes/login-script.php",
                            data : {username:username,password:password},
                            type : 'POST',
                            success: function(result){
                                if(result=="correct") 
                                  location.href = "/FundzPlanner/user-dashbord.php";
                                else
                                  alert("Invalid Username or Password");
                            }
    });
    });


    $("#register").click(function(){
      var reg_username=$("#reg_username").val();
      var reg_password=$("#reg_password").val();
      var fp_u_name=$("#fp_u_name").val();
      var fp_u_mobile=$("#fp_u_mobile").val();
      var fp_u_email=$("#fp_u_email").val();
      if(reg_username && reg_password && fp_u_name && fp_u_mobile && fp_u_email)
                        $.ajax({
                            url: "includes/register-script.php",
                            data : {reg_username:reg_username,reg_password:reg_password,fp_u_name:fp_u_name,fp_u_mobile:fp_u_mobile,fp_u_email:fp_u_email},
                            type : 'POST',
                            success: function(result){
                                if(result=="correct")
                                  alert("User Registered Sucssesfully");
                                else
                                  alert("Please Enter Correct Information");
                            }
    });
    });

//tab containts    
$("#1").click(function(){
  $.ajax({
                            url: "dashboard/tab-1.php",
                            success: function(result){
                              $("#tab-con").html(result);
                            }
                          });
});
$("#2").click(function(){
  $.ajax({
                            url: "dashboard/tab-2.php",
                            success: function(result){
                              $("#tab-con").html(result);
                            }
                          });
});
$("#3").click(function(){
  $.ajax({
                            url: "dashboard/tab-3.php",
                            success: function(result){
                              $("#tab-con").html(result);
                            }
                          });
});
$("#4").click(function(){
  $.ajax({
                            url: "dashboard/tab-4.php",
                            success: function(result){
                              $("#tab-con").html(result);
                            }
                          });
});

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
    
        var $validator =$('#healthForm').validate({
        rules: {
              cust_fname: 
              {
                required:true,
                nowhitespace:true
              },
      
              cust_mobile:
              {
                required:true,
                number:true,
                maxlength: 10,
                minlength: 10,
                nowhitespace:true
              },
              
              cust_email:
              {
                required:true,
                email:true,
                nowhitespace:true
              },
              cust_Pincode:
              {
                required:true,
                number:true,
                maxlength: 6,
                minlength: 6,
                nowhitespace:true
              }
             
        },
        messages:
        {
              cust_fname: 
              {
                required:"First Name Required",
                nowhitespace:"White Space Present in First Name"
              },
              cust_mobile:
              {
                required:"Enter Mobile Number",
                number:"Enter Number Only",
                maxlength: "Enter 10 Digit Mobile Number",
                minlength: "Enter 10 Digit Mobile Number",
                nowhitespace:"White Space Present in Mobile No"
              },
              cust_email: 
              {
                required:"Enter Email ID",
                email:"Enter valid Email ID",
                nowhitespace:"White Space Present in Email ID"
              },
              cust_Pincode:
              {
                required:"Enter Pincode",
                number:"Enter Number Only",
                maxlength: "Enter 6 Digit Pincode",
                minlength: "Enter 6 Digit Pincode",
                nowhitespace:"White Space Present in Pincode"
              }
     
        },
    });
    
    
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
    
        var $validator =$('#termForm').validate({
        rules: {
              cust_name: 
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
              
              cust_email:
              {
                required:true,
                email:true,
                nowhitespace:true
              },
              cust_city_name:
              {
                required:true
              }
             
        },
        messages:
        {
              cust_name: 
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
              cust_email: 
              {
                required:"Enter Email ID",
                email:"Enter valid Email ID",
                nowhitespace:"White Space Present in Email ID"
              },
              cust_city_name:
              {
                required:"Select City From Dropdown Only"
              }
     
        },
    });
    
    var $validator =$('#bikeForm').validate({
    rules:{
              name: 
              {
                required:true,
                nowhitespace:true
              },
              
              lname: 
              {
                required:true,
                nowhitespace:true
              },
      
              phone:
              {
                required:true,
                number:true,
                maxlength: 10,
                minlength: 10,
                nowhitespace:true
              },
              
              email:
              {
                required:true,
                email:true,
                nowhitespace:true
              }
        },
        messages:
        {
              name: 
              {
                required:"First Name Required",
                nowhitespace:"White Space Present in First Name"
              },
              
              lname: 
              {
                required:"Last Name Required",
                nowhitespace:"White Space Present in Last Name"
              },
              
              
              phone:
              {
                required:"Enter Mobile Number",
                number:"Enter Number Only",
                maxlength: "Enter 10 Digit Mobile Number",
                minlength: "Enter 10 Digit Mobile Number",
                nowhitespace:"White Space Present in Mobile No"
              },
              email: 
              {
                required:"Enter Email ID",
                email:"Enter valid Email ID",
                nowhitespace:"White Space Present in Email ID"
              }
            },
        });
        
        var $validator =$('#carForm').validate({
        rules: {
              name: 
              {
                required:true,
                nowhitespace:true
              },
              
              lname: 
              {
                required:true,
                nowhitespace:true
              },
      
              phone:
              {
                required:true,
                number:true,
                maxlength: 10,
                minlength: 10,
                nowhitespace:true
              },
              
              email:
              {
                required:true,
                email:true,
                nowhitespace:true
              }
        },
        messages:
        {
              name: 
              {
                required:"First Name Required",
                nowhitespace:"White Space Present in First Name"
              },
              
              lname: 
              {
                required:"Last Name Required",
                nowhitespace:"White Space Present in Last Name"
              },
              
              
              phone:
              {
                required:"Enter Mobile Number",
                number:"Enter Number Only",
                maxlength: "Enter 10 Digit Mobile Number",
                minlength: "Enter 10 Digit Mobile Number",
                nowhitespace:"White Space Present in Mobile No"
              },
              email: 
              {
                required:"Enter Email ID",
                email:"Enter valid Email ID",
                nowhitespace:"White Space Present in Email ID"
              }
            },
        });
    
        var $validator =$('#travelForm').validate({
        rules: {
              cust_fname: 
              {
                required:true,
                nowhitespace:true
              },
      
              cust_mobile:
              {
                required:true,
                number:true,
                maxlength: 10,
                minlength: 10,
                nowhitespace:true
              },
              
              cust_email:
              {
                required:true,
                email:true,
                nowhitespace:true
              },
              cust_Pincode:
              {
                required:true,
                number:true,
                maxlength: 6,
                minlength: 6,
                nowhitespace:true
              }
             
        },
        messages:
        {
              cust_fname: 
              {
                required:"First Name Required",
                nowhitespace:"White Space Present in First Name"
              },
              cust_mobile:
              {
                required:"Enter Mobile Number",
                number:"Enter Number Only",
                maxlength: "Enter 10 Digit Mobile Number",
                minlength: "Enter 10 Digit Mobile Number",
                nowhitespace:"White Space Present in Mobile No"
              },
              cust_email: 
              {
                required:"Enter Email ID",
                email:"Enter valid Email ID",
                nowhitespace:"White Space Present in Email ID"
              },
              cust_Pincode:
              {
                required:"Enter Pincode",
                number:"Enter Number Only",
                maxlength: "Enter 6 Digit Pincode",
                minlength: "Enter 6 Digit Pincode",
                nowhitespace:"White Space Present in Pincode"
              }
     
            },
        });
        
        var $validator =$('#invesmentForm').validate({
        rules: {
              name: 
              {
                required:true
              },
              
              
              contact:
              {
                required:true,
                number:true,
                maxlength: 10,
                minlength: 10,
                nowhitespace:true
              },
              
              email:
              {
                required:true,
                email:true,
                nowhitespace:true
              }
        },
        messages:
        {
              name: 
              {
                required:"Full Name Required"
              },
              
             
              contact:
              {
                required:"Enter Mobile Number",
                number:"Enter Number Only",
                maxlength: "Enter 10 Digit Mobile Number",
                minlength: "Enter 10 Digit Mobile Number",
                nowhitespace:"White Space Present in Mobile No"
              },
              email: 
              {
                required:"Enter Email ID",
                email:"Enter valid Email ID",
                nowhitespace:"White Space Present in Email ID"
              }
        },
      });
  
    
    $("#car-on-load").click(function(){
    $.getScript("assets/js/index-motor-jquery-on-load.js");
    });
    
    $("#travel-on-load").click(function(){
    $.getScript("assets/js/index-travel-jquery-on-load.js");
    });
    
    $("#bike-on-load").click(function(){
    $.getScript("assets/js/index-motor-jquery-on-load.js");
    });
    
    $("#amount_invesment").change(function(){
      var amount_invesment=$(this).val();
      $("#amount_invesment1").val(amount_invesment);
    });
    



    $(".all_city").autocomplete({
      source: '../ajax-json/AllCities-ajax.php?Option=City',
      autoFocus: true,
      select: function(e, ui) {
        e.preventDefault();
       if (ui.item == null) {
            console.log(sdsds);
            $("#term_city_error").show(); 
            $(this).val(''); 
        } else { 
        // <--- Prevent the value from being inserted.
        $(".all_city").val(ui.item.city);
        $(".all_city").val(ui.item.label);
        $("#term_city_error").hide(); 
        }
      }
    });
  
});
</script>
  
<script type="application/ld+json">
{ 
    "@context" : "http://schema.org",
	  "@type" : "Organization",
	  "name": "PolicyPlanner",
	  "url" : "https://www.policyplanner.in",
    "logo": "http://www.policyplanner.in/images/logo.png",
	  "sameAs" :  [ "https://www.facebook.com/policyplanner.in/",		   
                  "https://plus.google.com/109117322283423837726/",
                  "https://www.linkedin.com/company/policyplanner-in/",
                  "https://www.youtube.com/channel/UCTZQ_Q1E1wIdtG8RKIpjYJQ/"
                ],
	  "contactPoint" : [
                        { "@type" : "ContactPoint",
                          "telephone" : "+1800-1200-771",
                          "contactType" : "Customer Service - 24x7 Toll Free"
                        }, 
                        {
                          "@type" : "ContactPoint",
                          "telephone" : "+91-7798612243",
                          "contactType" : "customer service Whatsapp"
                        } 
    ] 
} 
</script>