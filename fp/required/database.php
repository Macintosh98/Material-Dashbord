<?php

	/* Copyright 2014 - 2015 knowextra.com. 

	

	 */



	// Initiation

	



	if(function_exists('mysqli_connect')) {



		$db = mysqli_connect($dbHostname, $dbUsername, $dbPassword, $dbDatabase);

		mysqli_set_charset($db, 'utf8');

		

	} else {

		$db = mysql_connect($dbHostname, $dbUsername, $dbPassword);

		mysql_set_charset('utf8', $db);

		mysql_select_db($dbDatabase);

	}



	if(!function_exists('dbQuery')) {

		function dbQuery($sql) {

			global $db;



			if(function_exists('mysqli_query'))

				return mysqli_query($db, $sql);

			else

				return mysql_query($sql, $db);

		}

	}



	if(!function_exists('dbUnbufferedQuery')) {

		function dbUnbufferedQuery($sql) {

			global $db;



			if(function_exists('mysqli_query'))

				return mysqli_query($db, $sql, MYSQLI_USE_RESULT);

			else

				return mysql_unbuffered_query($sql, $db);

		}

	}



	if(!function_exists('dbEscape')) {

		function dbEscape($str) {

			global $db;



			if(function_exists('mysqli_real_escape_string'))

				return mysqli_real_escape_string($db, $str);

			else

				return mysql_real_escape_string($str, $db);

		}

	}



	if(!function_exists('dbFetch')) {

		function dbFetch($recordSet) {

			global $db;



			if(function_exists('mysqli_fetch_assoc'))

				return mysqli_fetch_assoc($recordSet);

			else

				return mysql_fetch_assoc($recordSet);

		}

	}



	if(!function_exists('dbNumRows')) {

		function dbNumRows($recordSet) {

			global $db;

                   

			if(function_exists('mysqli_num_rows'))

				return mysqli_num_rows($recordSet);

			else

				return mysql_num_rows($recordSet);

			

		}

	}



	if(!function_exists('dbFetchAll')) {

		function dbFetchAll($recordSet) {

			global $db;

			$results = array();



			if(function_exists('mysqli_fetch_assoc')) {

				while($row = mysqli_fetch_assoc($recordSet)) {

					$results[] = $row;

				}

			} else {

				while($row = mysql_fetch_assoc($recordSet)) {

					$results[] = $row;

				}

			}



			return $results;

		}

	}



	if(!function_exists('dbGetLastInsertId')) {

		function dbGetLastInsertId() {

			global $db;



			if(function_exists('mysqli_insert_id'))

				return mysqli_insert_id($db);

			else

				return mysql_insert_id($db);

		}

	}
	
	
	 function sendsmsfunction($mob_no,$message)
{

  $url="http://winsms.in/vendorsms/pushsms.aspx";

$message = urlencode($message);
		 $ch = curl_init(); 
		 if (!$ch){die("Couldn't initialize a cURL handle");}
		 $ret = curl_setopt($ch, CURLOPT_URL,$url);
		 curl_setopt ($ch, CURLOPT_POST, 1);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);          
		 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		 curl_setopt ($ch, CURLOPT_POSTFIELDS, 
		//"user=essindia&key=2235997520XX&mobile=$mob_no&messag=$message&senderid=KrKING&accusage=1&unicode=yes");
		"user=amshofttechno&password=clinchsoft@910&msisdn=$mob_no&sid=POYPLN&msg=$message&fl=0&gwid=2 ");
		 $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


		 $curlresponse = curl_exec($ch); // execute
		if(curl_errno($ch))
			echo 'curl error : '. curl_error($ch);
		 if (empty($ret)) {
		    die(curl_error($ch));
		    curl_close($ch); 
		 } else {
		    $info = curl_getinfo($ch);
		    curl_close($ch); 
			$curlresponse;    //echo "Message Sent Succesfully" ;
		 }
		 
}



	if(!function_exists('dbGetError')) {

		function dbGetError() {

			global $db;



			if(function_exists('mysqli_error'))

				return mysqli_error($db);

			else

				return mysql_error($db);

		}

	}

 



?>