$("#Adult_Travel").change(function(){
      if($(this).val()==1) {
        $("#age-details").show();
        $("#Member1_Age").show();
        $("#Member2_Age").hide();
        $("#Member2_Age1").val(0);
       
      }
      else if($(this).val()==2) {
        $("#age-details").show();
        $("#Member1_Age").show();
        $("#Member2_Age").show();
      }
      else if($(this).val()==0 && $("#Children_Travel").val() !=null) {
        $("#Member1_Age").hide();
        $("#Member1_Age1").val(0);
        $("#Member2_Age").hide();
        $("#Member2_Age1").val(0);
      }
      
      else if($(this).val()==0 && $("#Children_Travel").val() ==null) {
        $("#Member1_Age").hide();
        $("#Member1_Age1").val(0);
        $("#Member2_Age").hide();
        $("#Member2_Age1").val(0);
        $("#age-details").hide();
      }
      $(".selectpicker").selectpicker('refresh');
    });
    
    $("#Children_Travel").change(function(){
        $("#age-details").show();
      var Children=$(this).val();
      if(Children==1) {
        $("#Member3_Age").show();
        $("#Member4_Age").hide();
        $("#Member4_Age1").val(0);
        $("#Member5_Age").hide();
        $("#Member5_Age1").val(0);
        $("#Member6_Age").hide();
        $("#Member6_Age1").val(0);
       
      }
      else if(Children==2) {
        $("#Member3_Age").show();
        $("#Member4_Age").show();
        $("#Member5_Age").hide();
        $("#Member5_Age1").val(0);
        $("#Member6_Age").hide();
        $("#Member6_Age1").val(0);
     }
      else if(Children==3) {
        $("#Member3_Age").show();
        $("#Member4_Age").show();
        $("#Member5_Age").show();
        $("#Member6_Age").hide();
        $("#Member6_Age1").val(0);
       
      }
      else if(Children==4) {
        $("#Member3_Age").show();
        $("#Member4_Age").show();
        $("#Member5_Age").show();
        $("#Member6_Age").show();
      }
      else if(Children==0 && $("#Adult_Travel").val() !=null) {
        $("#Member3_Age").hide();
        $("#Member3_Age1").val(0);
        $("#Member4_Age").hide();
        $("#Member4_Age1").val(0);
        $("#Member5_Age").hide();
        $("#Member5_Age1").val(0);
        $("#Member6_Age").hide();
        $("#Member6_Age1").val(0);
       
      }
      
      else if(Children==0 && $("#Adult_Travel").val() ==null) {
        $("#Member3_Age").hide();
        $("#Member3_Age1").val(0);
        $("#Member4_Age").hide();
        $("#Member4_Age1").val(0);
        $("#Member5_Age").hide();
        $("#Member5_Age1").val(0);
        $("#Member6_Age").hide();
        $("#Member6_Age1").val(0);
        $("#age-details").hide();
       
      }
      
     $(".selectpicker").selectpicker('refresh');
     
    });
    
    
    $("#Trip").change(function(){
              
     /* var age='<option value="0" disabled  selected>Choose Child Age</option>';
      for (var i = 18; i <= 71; i++) {
        age +='<option value="'+i+'">'+i+'</option>';
      }
      $("#Member3_Age1").html(age);
      $("#Member4_Age1").html(age);
      $("#Member5_Age1").html(age);
      $("#Member6_Age1").html(age);*/
      var Trip=$(this).val();
      if(Trip=='Multi') {
        $("#Days").show();
        $("#Destination1").show();
        $("#Destination").hide();
        $("#Destination").val('');
        var year=12;
      }
      else {
        /*var age='<option value="0" disabled  selected>Choose Child Age</option><option value="0.6">6 Months</option>';
        for (var i = 1; i <= 22; i++) {
          age +='<option value="'+i+'">'+i+'</option>';
        }
        $("#Member3_Age1").html(age);
        $("#Member4_Age1").html(age);
        $("#Member5_Age1").html(age);
        $("#Member6_Age1").html(age);*/
        $("#Days1").val('');
        $("#Destination1").hide();
        $("#Destination1").val('');
        $("#Destination").show();
        $("#Days").hide();
        var year=7;
        
        
      }
      $(".selectpicker").selectpicker('refresh');
        var Maxyear=(new Date).getFullYear();
        var Maxdate=(new Date).getDate();
        var Maxmonth=(new Date).getMonth();
      $('#travel_end_date').data("DateTimePicker").maxDate(new Date(Maxyear, Maxmonth+year,Maxdate));
});      
     /* Personal loan    */
	
  $("#Current_employee").change(function(){
              
 
      var Current_employee=$(this).val();
	  
      if(Current_employee=='SelfEmployedBusiness') {
        $("#annual_turnover").show();
        $("#Business_Year").show();
        $("#cust_monthly_income").hide();
		$("#cust_email").hide();
		$("#Profession_Type").hide();
        
      }
	  
	   if(Current_employee=='Salaried') {
        $("#annual_turnover").hide();
        $("#Business_Year").hide();  
		$("#cust_email").hide();
		$("#Profession_Type").hide();
        $("#cust_monthly_income").show();
        
      }
	  
	   if(Current_employee=='SelfEmployedProfessional') {
        $("#annual_turnover").show();
        $("#Business_Year").hide();
        $("#cust_monthly_income").hide();
		$("#cust_email").show();
		$("#Profession_Type").show();
        
      }
      else {
        /*var age='<option value="0" disabled  selected>Choose Child Age</option><option value="0.6">6 Months</option>';
        for (var i = 1; i <= 22; i++) {
          age +='<option value="'+i+'">'+i+'</option>';
        }
        $("#Member3_Age1").html(age);
        $("#Member4_Age1").html(age);
        $("#Member5_Age1").html(age);
        $("#Member6_Age1").html(age);*/
        $("#Days1").val('');
        $("#Destination1").hide();
        $("#Destination1").val('');
        $("#Destination").show();
        $("#Days").hide();
        var year=7;
        
        
      }
	 
	  
	  
      $(".selectpicker").selectpicker('refresh');
        var Maxyear=(new Date).getFullYear();
        var Maxdate=(new Date).getDate();
        var Maxmonth=(new Date).getMonth();
      $('#travel_end_date').data("DateTimePicker").maxDate(new Date(Maxyear, Maxmonth+year,Maxdate));
});      
        
    