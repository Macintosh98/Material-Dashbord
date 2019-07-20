if(localStorage.policytypecar =='new_registration') {
    $("#next-level").hide();
    $("#New").attr('checked', 'checked');
    $("#car_registration_date").show(); 
	$("#car_registration_date_back").hide();
    
  
    } else if(localStorage.policytypecar =='existing_policy') {
    $("#car_registration_date").hide(); 
	$("#car_registration_date_back").show();    
    $("#Old").attr('checked', 'checked');
    $("#next-level").show(); }
    
    
    if(localStorage.policytype =='new_registration') {
    $("#bike_next-level").hide();
    $("#Bike_New").attr('checked', 'checked');
    $("#bike_registration_date").show(); 
	$("#bike_registration_date_back").hide();
    
    } else if(localStorage.policytype =='existing_policy') {
    $("#bike_registration_date").hide(); 
	$("#bike_registration_date_back").show();        
    $("#Bike_Old").attr('checked', 'checked');
    $("#bike_next-level").show(); }
    
    var Bike_Varient=localStorage.Model;
    var Bike_Model=localStorage.Make;
    $('#Bike_Make option[value="'+Bike_Model+'"]').attr("selected",true);
    if(Bike_Model !=undefined) {
        var insure=$("#insure").val();
        $.ajax({
                url: '../../../ajax-json/motor-ajax.php?Option=Bike-Model', // point to server-side PHP script 
                cache: false,
                //contentType: false,
                //processData: false,
                //dataType:"json",
                data: {Model:Bike_Model,insure:insure}, 
                type: 'post',
                success: function(data)
                {
                  $("#Bike_Model").html(data);
                  //$("#Model").trigger("chosen:updated");
                  $('#Bike_Model option[value="'+Bike_Varient+'"]').attr("selected",true);
                  $(".selectpicker").selectpicker('refresh');
                  return false;
                }
        });
        
        $.ajax({

                url: '../../../ajax-json/motor-ajax.php?Option=Bike-Varient', // point to server-side PHP script 
				cache: false,
				//contentType: false,
				//processData: false,
				//dataType:"json",
				data: {Model:Bike_Model,Varient:Bike_Varient}, 
				type: 'post',
				success: function(data)
				{
				$("#Bike_Varient").html(data);
				//$("#Varient").trigger("chosen:updated");
			    $('#Bike_Varient option[value="'+localStorage.Varient+'"]').attr("selected",true);
			    $(".selectpicker").selectpicker('refresh');
				return false;
				}
		    });
		    
    } else  { $('#Bike_Make').val(''); }
    
    
    if(localStorage.policytype=='existing_policy' || localStorage.policytype =='expired_policy')
    {
    $("#bike_registration_date").hide(); 
	$("#bike_registration_date_back").show();        
    $('#policy_insure option[value="'+localStorage.policytype+'"]').attr("selected",true);
    $("#bike_next-level").show();
    }
    else { 
    $("#bike_registration_date").show(); 
	$("#bike_registration_date_back").hide();    
    $("#bike_next-level").hide(); }
    
    if(localStorage.Manufacturer){
    $('#Bike_Manufacturer option[value="'+localStorage.Manufacturer+'"]').attr("selected",true); 
    }   
    
    $("#Bike_Make").change(function(){
    var Model=$(this).val();
    var insure=$("#insure").val();
    $('#Bike_Varient').val('1');
        $.ajax({
                url: '../../../ajax-json/motor-ajax.php?Option=Bike-Model', // point to server-side PHP script 
                cache: false,
                //contentType: false,
                //processData: false,
                //dataType:"json",
                data: {Model:Model,insure:insure}, 
                type: 'post',
                success: function(data)
                {
                  $("#Bike_Model").html(data);
                  //$("#Model").trigger("chosen:updated");
                  localStorage.Make = Model;
                  $(".selectpicker").selectpicker('refresh');
                  return false;
                }
        });
      });
	
	$("#Bike_Model").change(function(){
	var Model=$("#Bike_Make").val();
	var Varient=$(this).val();

        $.ajax({

                url: '../../../ajax-json/motor-ajax.php?Option=Bike-Varient', // point to server-side PHP script 
				cache: false,
				//contentType: false,
				//processData: false,
				//dataType:"json",
				data: {Model:Model,Varient:Varient}, 
				type: 'post',
				success: function(data)
				{
				$("#Bike_Varient").html(data);
				//$("#Varient").trigger("chosen:updated");
				localStorage.Make = Model;
				localStorage.Model = Varient;
				$(".selectpicker").selectpicker('refresh');
				return false;
				}
		    });
	  });
	  
	  
	$("#Bike_Varient").change(function(){  
	localStorage.Varient =$(this).val();;    

	});	  
	$("#Bike_Manufacturer").change(function(){  
	localStorage.Manufacturer =$(this).val();;    

	});	
	
	$("#Bike_Old").change(function(){
	var insure=$(this).val();
	localStorage.policytype=insure;
	$("#bike_next-level").show();
	$("#bike_registration_date").hide(); 
	$("#bike_registration_date_back").show(); 
    
	}); 
	
	$("#Bike_New").change(function(){
	var insure=$(this).val();
    localStorage.policytype=insure;
    $("#bike_next-level").hide();
    $("#bike_registration_date").show(); 
	$("#bike_registration_date_back").hide();
	});
   
    
    
    
    var Varient=localStorage.Modelcar;
    var Model=localStorage.Makecar;
    $('#Make option[value="'+Model+'"]').attr("selected",true);
    var insure=$("#insure").val();
    if(Model !=undefined) {
        $.ajax({
                url: '../../../ajax-json/motor-ajax.php?Option=Model', // point to server-side PHP script 
                cache: false,
                //contentType: false,
                //processData: false,
                //dataType:"json",
                data: {Model:Model,insure:insure}, 
                type: 'post',
                success: function(data)
                {
                  $("#Model").html(data);
                  //$("#Model").trigger("chosen:updated");
                  $('#Model option[value="'+Varient+'"]').attr("selected",true);
                  $(".selectpicker").selectpicker('refresh');
                  return false;
                }
        });
        
        $.ajax({

                url: '../../../ajax-json/motor-ajax.php?Option=Varient', // point to server-side PHP script 
				cache: false,
				//contentType: false,
				//processData: false,
				//dataType:"json",
				data: {Model:Model,Varient:Varient}, 
				type: 'post',
				success: function(data)
				{
				$("#Varient").html(data);
				//$("#Varient").trigger("chosen:updated");
			    $('#Varient option[value="'+localStorage.Varientcar+'"]').attr("selected",true);
			    $(".selectpicker").selectpicker('refresh');
				return false;
				}
		    });
    } else  { $('#Make').val(''); }		    
		    
	if(localStorage.policytypecar=='existing_policy' || localStorage.policytypecar =='expired_policy')
    {
    $('#policy_insure option[value="'+localStorage.policytypecar+'"]').attr("selected",true);
    $("#next-level").show();
    $("#car_registration_date").hide(); 
	$("#car_registration_date_back").show();
	}
    else {  
        $("#car_registration_date").show(); 
	    $("#car_registration_date_back").hide();
        $("#next-level").hide();
    }
	 
	 if(localStorage.Manufacturercar){
    $('#Manufacturer option[value="'+localStorage.Manufacturercar+'"]').attr("selected",true); 
    }       
	
	$("#Make").change(function(){
    var Model=$(this).val();
    var insure=$("#insure").val();
        $.ajax({
                url: '../../../ajax-json/motor-ajax.php?Option=Model', // point to server-side PHP script 
                cache: false,
                //contentType: false,
                //processData: false,
                //dataType:"json",
                data: {Model:Model,insure:insure}, 
                type: 'post',
                success: function(data)
                {
                  $("#Model").html(data);
                  //$("#Model").trigger("chosen:updated");
                  localStorage.Makecar = Model;
                  $(".selectpicker").selectpicker('refresh');
                  return false;
                }
        });
      });
	
	$("#Model").change(function(){
	var Model=$("#Make").val();
	var Varient=$(this).val();

        $.ajax({

                url: '../../../ajax-json/motor-ajax.php?Option=Varient', // point to server-side PHP script 
				cache: false,
				//contentType: false,
				//processData: false,
				//dataType:"json",
				data: {Model:Model,Varient:Varient}, 
				type: 'post',
				success: function(data)
				{
				$("#Varient").html(data);
				//$("#Varient").trigger("chosen:updated");
				localStorage.Makecar = Model;
				localStorage.Modelcar = Varient;
				$(".selectpicker").selectpicker('refresh');
				return false;
				}
		    });
	  });
	  
	  
	$("#Varient").change(function(){  
	localStorage.Varientcar =$(this).val();;    

	});	  
	$("#Manufacturer").change(function(){  
	localStorage.Manufacturercar =$(this).val();;    

	});	
	
	$('#Number').keyup(function(e)
	{
	
		this.value = this.value.toUpperCase();

		$('#error').hide();
		var date = parseInt($('#Number').val());
        var date1 = $('#Number').val();
        var date2 = $('#Number').text();
        var date_len = date1.length;

       if(date_len < 3)
       {
       		if($.isNumeric(date1))
       		{
       				 $('#Number').val('');
       		}
       		else
       		{
       			
       		}	

       	 if(date_len == 2)
       	 {
       	 	$('#Number').val(date1+'-');

       	 }
       	

       }
       else if(date_len < 6)
       {
       		date2 = $('#Number').val();
      		var x = date2.split('-');
      		var first = x[0];
      		var secound = parseInt(x[1]);
      		var mmtxt = secound;
      		var sndlen = mmtxt.length;


      
      		      	
       		if($.isNumeric(secound))
       		{
       		//	alert('number');		
       		}
       		else
       		{
       				 $('#Number').val(first+'-');
       		}	


       	 if(date_len == 5)
       	 {
       	 	$('#Number').val(date2+'-');

       	 }		


       }
         else if(date_len <= 9 && date_len > 6)
         {
         	date3 = $('#Number').val();
      		var x = date3.split('-');
      		var first = x[0];
      		var secound = x[1];
      		var third = x[2];
      		var thirdtxt = third;
      		var thirdlen = third.length;

      		//alert(thirdlen)	;


       		if($.isNumeric(third))
       		{
       			 $('#Number').val(first+'-'+secound+'-');	
       		}
       		else
       		{
       				
       		}	

       		if(thirdlen <= 3)
       		{

       		}	
       		else
       		{
       			$('#Number').val(first+'-'+secound+'-');	
       		}

       		if(date_len == 8)
       	 	{
       	 			$('#Number').val(date3+'-');

       	 	}		

         }
         else if (date_len < 15  && date_len > 8)
         {
         	date4 = $('#Number').val();
      		var x = date4.split('-');
      		var first 		= x[0];
      		var secound 	= x[1];
      		var third 		= x[2];
      		var fourth 		= x[3];
      		var fourthtxt 	= fourth;
      		var fourthlen 	= fourthtxt.length;

      	//	alert(fourthlen);

      		 if(fourthlen <= 4)
       		{
	       		if($.isNumeric(fourth))
	       		{
	       				
	       		}
	       		else
	       		{
	       				$('#Number').val(first+'-'+secound+'-'+third+'-');	
	       		}	
       		}
       		else
       		{
       				 $('#Number').val(first+'-'+secound+'-'+third+'-');	
       		}	
       	

         }

         var str=$('#Number').val();
      var pattern = /[A-Z]{2}\-[0-9]{2}\-[A-Z]{2}\-\d{4}$/i;
      if(str.match(pattern)) {
        console.log('yes');
        $('#Number').attr("style","border-color:none");
        $("#car_number_error").hide();
        
      }
      else {
        $('#Number').attr("style","border-color:#ff000073");
        $("#car_number_error").show();
        
      }
   


	});
	
	$('#BikeNumber').keyup(function(e)
	{
	
		this.value = this.value.toUpperCase();

		$('#error').hide();
		var date = parseInt($('#BikeNumber').val());
        var date1 = $('#BikeNumber').val();
        var date2 = $('#BikeNumber').text();
        var date_len = date1.length;

       if(date_len < 3)
       {
       		if($.isNumeric(date1))
       		{
       				 $('#BikeNumber').val('');
       		}
       		else
       		{
       			
       		}	

       	 if(date_len == 2)
       	 {
       	 	$('#BikeNumber').val(date1+'-');

       	 }
       	

       }
       else if(date_len < 6)
       {
       		date2 = $('#BikeNumber').val();
      		var x = date2.split('-');
      		var first = x[0];
      		var secound = parseInt(x[1]);
      		var mmtxt = secound;
      		var sndlen = mmtxt.length;


      
      		      	
       		if($.isNumeric(secound))
       		{
       		//	alert('number');		
       		}
       		else
       		{
       				 $('#BikeNumber').val(first+'-');
       		}	


       	 if(date_len == 5)
       	 {
       	 	$('#BikeNumber').val(date2+'-');

       	 }		


       }
         else if(date_len <= 9 && date_len > 6)
         {
         	date3 = $('#BikeNumber').val();
      		var x = date3.split('-');
      		var first = x[0];
      		var secound = x[1];
      		var third = x[2];
      		var thirdtxt = third;
      		var thirdlen = third.length;

      		//alert(thirdlen)	;


       		if($.isNumeric(third))
       		{
       			 $('#BikeNumber').val(first+'-'+secound+'-');	
       		}
       		else
       		{
       				
       		}	

       		if(thirdlen <= 3)
       		{

       		}	
       		else
       		{
       			$('#BikeNumber').val(first+'-'+secound+'-');	
       		}

       		if(date_len == 8)
       	 	{
       	 			$('#BikeNumber').val(date3+'-');

       	 	}		

         }
         else if (date_len < 15  && date_len > 8)
         {
         	date4 = $('#BikeNumber').val();
      		var x = date4.split('-');
      		var first 		= x[0];
      		var secound 	= x[1];
      		var third 		= x[2];
      		var fourth 		= x[3];
      		var fourthtxt 	= fourth;
      		var fourthlen 	= fourthtxt.length;

      	//	alert(fourthlen);

      		 if(fourthlen <= 4)
       		{
	       		if($.isNumeric(fourth))
	       		{
	       				
	       		}
	       		else
	       		{
	       				$('#BikeNumber').val(first+'-'+secound+'-'+third+'-');	
	       		}	
       		}
       		else
       		{
       				 $('#BikeNumber').val(first+'-'+secound+'-'+third+'-');	
       		}	
       	

         }

         var str=$('#BikeNumber').val();
      var pattern = /[A-Z]{2}\-[0-9]{2}\-[A-Z]{2}\-\d{4}$/i;
      if(str.match(pattern)) {
        console.log('yes');
        $('#BikeNumber').attr("style","border-color:none");
        $("#bike_number_error").hide();
        
      }
      else {
        $('#BikeNumber').attr("style","border-color:#ff000073");
        $("#bike_number_error").show();
        
      }
   


	});

    

        var Maxyear=(new Date).getFullYear();
        var Maxdate=(new Date).getDate();
        var Maxmonth=(new Date).getMonth();
	$("#Old").change(function(){
	var insure=$(this).val();
	localStorage.policytypecar=insure;
	$("#car_registration_date").hide(); 
	$("#car_registration_date_back").show(); 
    $("#next-level").show();
    
	}); 
	
	$("#New").change(function(){
	var insure=$(this).val();
    localStorage.policytypecar=insure;
    $("#car_registration_date").show(); 
	$("#car_registration_date_back").hide(); 
    $("#next-level").hide();
	}); 
    
$("#car_city").autocomplete({
    source: '../../../ajax-json/city-ajax.php?Option=City',
    autoFocus: true,
    change: function(e, ui) {
        e.preventDefault();
        // <--- Prevent the value from being inserted.
        if (ui.item == null) {
        $("#car_city_error").show(); 
        $(this).val(''); 
        } else {  $("#car_city").val(ui.item.ID);
        $(this).val(ui.item.label);
        $("#Pincode").val(ui.item.NUM_PINCODE);
        $("#country_code").val(ui.item.NUM_COUNTRY_CODE);
        $("#district_code").val(ui.item.NUM_CITY_DISTRICT_CODE);
        $("#city_code").val(ui.item.NUM_CITY_CD);
        $("#State_code").val(ui.item.NUM_STATE_CODE);
        $("#car_city_error").hide(); 
       }
      } 
}); 
$("#bike_city").autocomplete({
    source: '../../../ajax-json/city-ajax.php?Option=City',
    autoFocus: true,
    change: function(e, ui) {
        e.preventDefault();
        // <--- Prevent the value from being inserted.
        if (ui.item == null) {
        $("#bike_city_error").show(); 
        $(this).val(''); 
        } else {  $("#bike_city").val(ui.item.ID);
        $(this).val(ui.item.label);
        $("#Pincode").val(ui.item.NUM_PINCODE);
        $("#country_code").val(ui.item.NUM_COUNTRY_CODE);
        $("#district_code").val(ui.item.NUM_CITY_DISTRICT_CODE);
        $("#city_code").val(ui.item.NUM_CITY_CD);
        $("#State_code").val(ui.item.NUM_STATE_CODE);
        $("#bike_city_error").hide(); 
       }
      } 
}); 