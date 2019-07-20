<?php
	/* Copyright 2014 - 2015 knowextra.com (Amit Gupta)
	 
	 */

	if(isset($_SESSION['user']['loggedIn'])) {
		header('Location: '.$urlPrefix.'/account');
		exit;
	}
?>