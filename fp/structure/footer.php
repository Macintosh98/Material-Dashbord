<?php       
$plans = dbFetchAll(dbQuery("SELECT ID,Plan_Name from plan where ID < 11 OR ID=16"));

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$android = stripos($_SERVER['HTTP_USER_AGENT'], "android");
$iphone = stripos($_SERVER['HTTP_USER_AGENT'], "iphone");
$ipad = stripos($_SERVER['HTTP_USER_AGENT'], "ipad");

$whatsappNumber = '+919766488450';
$whatsappLink = '';
if($android !== false || $ipad !== false || $iphone !== false) {//For mobile
    $whatsappLink = 'https://api.whatsapp.com/send?phone='.$whatsappNumber.'&text=Hi, I am enquiring about page: '.$actual_link.'"';
} else {//For desktop
    $whatsappLink = 'https://web.whatsapp.com/send?phone='.$whatsappNumber.'&text=Hi, I am enquiring about page: '.$actual_link.'"';
}
?>


<footer class="footer  footer-black footer-big pb-1">
                    <div class="container">  
                        <div class="content mb-4">
						
						<div class="row pb-3">
                            <div class="col-md-6 col-lg-6">
                                <div class="row">
                                   <div class="col-md-4 col-lg-4">
                                     <div class="category-head">Loans & Mutual Funds</h5></div>
                                      <div class="category-content">
                                         <ul class="footer-links">
                                         <li><a href="home-loan.php">Home Loan</a></li><br>
                                         <li><a href="car-loan.php">Car Loan</a></a></li><br>
                                         <li><a href="personal-loan.php">Personal Loan</a></li><br>
                                         <li><a href="#">Business Loan</a></li><br>
                                         <li><a href="bike-loan.php">Two Wheeler Loan</a></li><br>
                                         <li><a href="education-loan.php">Education Loan</a></li><br>
                                         <li><a href="gold-loan.php">Gold Loan</a></li><br>
                                          <li><a href="#">Mutual Funds</a></li>
                                        </ul>
                                      </div>
                                    </div> 
                                    
                                     <div class="col-md-4 col-lg-4">
                                     <div class="category-head">TERM INSURANCE</div>
                                      <div class="category-content">
                                         <ul class="footer-links">
                                             <li><a href="https://www.policyplanner.com/health-insurance/family-health-insurance.php">Family Health Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/health-insurance/parents-health-insurance.php">Parents Health Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/health-insurance/individual-health-insurance.php">Individual Health Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/health-insurance/maternity-health-insurance.php">Maternity Health Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/health-insurance/senior-citizen-health-insurance.php">Senior Citizen Insurance</a></li><br>
                                             <li><a href="https://policyplanner.com/insurance-companies-in-india/life-insurance/lic-term-insurance.php">LIC Term Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/life-insurance/term-insurance.php">Term Insurance vs ULIP</a></li><br>
                                             <li><a href="https://www.policyplanner.com/life-insurance/term-insurance.php">Increasing Term Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/life-insurance/term-insurance.php">Types of Death Covered</a></li><br>
                                             <li><a href="https://www.policyplanner.com/life-insurance/term-insurance.php">Policy Period </a></li><br>
                                        </ul>
                                      </div>
                                    </div> 
                                    
                                    <div class="col-md-4 col-lg-4">
                                     <div class="category-head">Motor insurance</div>
                                      <div class="category-content">
                                         <ul class="footer-links">
                                             <li><a href="https://www.policyplanner.in/motor-insurance/third-party-two-wheeler-insurance.php">Third Party Bike Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/motor-insurance/car-insurance.php">Expired Car Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/motor-insurance/car-insurance.php">Zero Dep Car Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/motor-insurance/car-insurance.php">Car Insurance Calculator</a></li><br>
                                             <li><a href="https://www.policyplanner.in/motor-insurance/third-party-car-insurance.php">Third Party Car Insurance</a></li><br>
                                        </ul>
                                      </div>
                                    </div> 
                                </div> 
                            </div> 
                            
                           <div class="col-md-6 col-lg-6">
                                <div class="row">
                                     <div class="col-md-4 col-lg-4">
                                     <div class="category-head">Travel insurance</div>
                                      <div class="category-content">
                                         <ul class="footer-links">
                                             <li><a href="https://www.policyplanner.com/travel-insurance.php">Get Travel Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/travel-insurance.php">Claim Travel Insurance</a></li><br>
                                             <li><a href="https://www.policyplanner.com/travel-insurance.php">Travel Insurance for Asia</a></li><br>
                                             <li><a href="https://www.policyplanner.com/travel-insurance.php">Travel Insurance Calculator</a></li><br>
                                             <li><a href="https://www.policyplanner.com/travel-insurance.php">Multiple Travel Insurance</a></li><br>
                                        </ul>
                                      </div>
                                    </div> 
                                    
                                    <div class="col-md-4 col-lg-4">
                                     <div class="category-head"> Investment Plans</div>
                                      <div class="category-content">
                                         <ul class="footer-links">
                                             <li><a href="https://www.policyplanner.in/investment-plan/mutual-fund-investment-plans.php">Mutual Fund</a></li><br>
                                             <li><a href="https://www.policyplanner.com/life-insurance/term-insurance.php">Life Insurance Companies</a></li><br>
                                             <li><a href="https://www.policyplanner.com/invesment-plans.php">ULIP vs Mutual Funds</a></li><br>
                                             <li><a href="https://www.policyplanner.com/invesment-plans.php">Types of Investment Policies</a></li><br>
                                             <li><a href="https://www.policyplanner.com/life-insurance/term-insurance.php">Types of Life Insurance</a></li><br>
                                        </ul>
                                      </div>
                                    </div> 
                                    
                                     <div class="col-md-4 col-lg-4">
                                     <div class="category-head">Child insurance</div>
                                      <div class="category-content">
                                         <ul class="footer-links">
                                             <li><a href="https://www.policyplanner.com/child-plans.php">Secure your child's future</a></li><br>
                                             <li><a href="https://www.policyplanner.com/child-plans.php">Buy a Child Plan</a></li><br>
                                             <li><a href="https://www.policyplanner.com/child-plans.php">Take care of your child</a></li><br>
                                             <li><a href="https://www.policyplanner.com/child-plans.php">Compare Child Plans</a></li><br>
                                             <li><a href="https://www.policyplanner.com/child-plans.php">Child Education Calculator</a></li><br>
                                        </ul>
                                      </div>
                                    </div> 
                                    </div> 
                                </div> 
                        </div>
						
                        </div>

                        <hr>
						
						
						<div id="foot-pages" class="row ">
       
          
                <div class="col-sm-4 pb-3 pt-3">
                    <nav class="float-left footer-links-main">
                      <ul>
                       
                        <li>
                          <a href="aboutUs.php">
                              About Us
                          </a>
                        </li>
                         <li>
                          <a href="contactUs.php">
                              Contact Us
                          </a>
                        </li>
                        <li>
                        <a href="/video-gallery.php"> Videos</a>
					    </li>
                        <li>
                          <a href="termsConditions.php">
                              Terms
                          </a>
                        </li>
                         <li>
                          <a href="https://www.articles.fundzplanner.com/">
                              Blog
                          </a>
                        </li>
                      </ul>
                    </nav>
                </div> 
                
               <!-- <div class="addthis_inline_share_toolbox"></div>-->
               <!-- <div class="sharethis-inline-share-buttons"></div>-->
                 <div class="col-sm-4 pb-3 pt-3">
               <ul class="social-buttons">
                   
                            <li>
                                <a href="https://www.facebook.com/policyplanner.in/" class="btn btn-just-icon btn-link btn-facebook">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                            
                            
                           <!-- <li>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>-->
                            <li>
                                <a href="https://plus.google.com/u/0/109117322283423837726" class="btn btn-just-icon btn-link btn-google">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCTZQ_Q1E1wIdtG8RKIpjYJQ/" class="btn btn-just-icon btn-link btn-youtube">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </li>
                            
                            <li>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $whatsappLink;?>" class="float" target="_blank">
                                    <i class="fa fa-whatsapp my-float"></i>
                                    </a>
                            </li>
                           
                           
                        </ul>
                </div> 
               
               <div class="col-sm-4 pb-3 pt-3 copyright float-right">
               
        &copy;
        <script>
            document.write(new Date().getFullYear())
        </script>&nbsp;FundzPlanner.com 
   
            </div> 
               
       
    </div>
	
    <hr>
		<div>
			<h3 align="center"style="color:white">FUNDZ PLANNER</h3>
			<p>
			Insurance is the subject matter of solicitation. Visitors are hereby informed that their information submitted on the website may be shared with insurers. The product information for comparison displayed on this website is of the insurers with whom our company has an agreement.Product information is authentic and solely based on the information received from the Insurer.
			</p>
		</div>
						
        <div class="aggregator mt-4" style="">
			<p><b>Reg. Office Address:</b>Fundz Planner Office No. B-03, KPCT Mall, Near Vishal Mega Mart, Fatima Nagar, Wanawadi, Pune 411013</p>
        </div>              
</footer>