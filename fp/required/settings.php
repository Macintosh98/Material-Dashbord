<?php
	/* Copyright 2014 - 2015 knowextra.com. 
	
	 */


	// Recent PHP builds require this being set.
	//error_reporting(0);
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	date_default_timezone_set('Asia/Kolkata');

	// Is this an IIS server? Uncomment this line to enable some much needed fixes.
	// require_once('iis-fixes.php');

	// Site maintenance
	$maintenance = false; // Set to true to redirect all pages to a maintenance page (index.html). Visit /hack-maintenance to view the site.

	//$theme = ''; // (for future use-not decided yet)Name of a folder within /themes
     
    $themeLocation = ''; 
	//$themeLocation = 'themes/sanskruti/'; // Name of a folder within /themes
  
    $style = '';
	 //$style = '-classic'; // Name of a style-xyz.css file within /css folder
    $left_sidebar='';
    $header = '';
    //$header = 'structure/header/header1.php/'; // Name of a folder within /structure
	//$step_header = 'step-header.php';
    
    $footer = '';
    //$footer = 'structure/footer/footer-3column.php'; // Name of a folder within /structure
   //$step_footer = 'step-footer.php';
	// Database settings
 /* $dbHostname = 'localhost';
	$dbDatabase = 'piadeste_om';
	$dbUsername = 'piadeste_admin';
	$dbPassword = 'india020'; */
	
	$dbHostname = 'localhost:3306';
	$dbDatabase = 'ij_services';
	$dbUsername = 'root';
	$dbPassword = '';

	// Globals
    $cloud = true;
	$siteTitle = 'Fundz';
	//$websiteUrl ='sanskrutivivah.com';
	$urlPrefix ='http://policyplanner.co.in/FundzPlanner';
	
     // $siteLogo = $urlPrefix.'/images/logo.png';
	//$themeDericteory = $urlPrefix.'/themes/'.$theme;
	//$emailAccountActivationFrom = 'noreply@omjewellers.com';
	//$emailInvoiceFrom = 'support@omjewellers.com';
	//$emailOrdersTo = 'luckyamit.n73@gmail.com';
	//$contactFormSendsTo = 'amit.gupta@pipaldesign.com';

	// This would normally be the year of launch.
	$copyrightYear = 2018;
    $hasSSL = true; 
	 // Leave empty if installing to the htdocs root. Otherwise, this should be the root directory of the shop, prefixed with a / (but no trailing slash)
	 // Don't forget to also amend both htaccess files to match
     //	$urlPrefix = '/demo/omjewellers'; // for server
	 //$urlPrefix = '/om-new'; // for local

	// Defaults
   // Globals
	$siteTitle = 'Fundz Planner';
	
	//$emailIAdmin = 'noreply@sansuiscales.com';
	
	// Defaults
	$metaDescription = '';
	$metaKeywords = '';

	/*Email variable */

    $emailCC ="info@policyplanner.in,patilhanumanitsa@gmail.com,swami.shantling@gmail.com";

    $emailAdmin="vivekpawarmps@gmail.com";
	    //$emailAccountActivationFrom ='noreply@sansuiscales.com';
    $emailAccountActivationFrom ='support@policyplanner.in';


    $support_contact='+91 9823888888 / (020)-2420-6000';


	$emailSupport='info@sansuiscales.com';
//	$emailCC='sunil@weighbridge.us,shitalrkakade@gmail.com,joshinehad@gmail.com,dm@weighbridge.us';

	//$careerEmailCC='hrd@sansui.co.in,info@sansuiscales.com';
	$emailBCC='amit.gupta@pipaldesign.com';
   /*Email variable */

function send_enquiry_sms($cust_name,$cust_mobile,$cust_email,$type)
{
		//$mob_no='8956864952';	
		if($cust_name != 'test')
		{	
			$mob_no='7798612243,7757826263';
			$message= $cust_name." has done enquiry for ".$type." ,mobile= ".$cust_mobile." and email= ".$cust_email;
	 		sendsmsfunction($mob_no,$message);
		}	
}

function send_user_sms($cust_mobile)
{
		//$mob_no='8956864952';	
		if($cust_name != 'test')
		{	
			$mob_no=$cust_mobile;
			$message= 'Thank you for choosing Fundz Planner! You are few steps away from securing your loved ones.For more details visit https://policyplanner.in/ or call on 1800 1200 771';
	 		sendsmsfunction($mob_no,$message);
		}	
}
	

?>