<?php

/*if($admin!=true)

{	

 if($_SERVER['REQUEST_URI'] != $urlPrefix.'/') 

  {  

		if(!isset($_SESSION['agent']['loggedIn'])) {

			$_SESSION['posts'] = $_POST;

			$_SESSION['url'] = $_SERVER['REQUEST_URI'];

			header('Location: '.$urlPrefix.'/');

			exit;

		} 

		elseif(isset($_SESSION['url'])) {

			$reroute = $_SESSION['url'];

			unset($_SESSION['url']);

             if(empty($reroute))

			 $reroute =$urlPrefix.'/home';

			 header('Location: '.$reroute);

			exit;

		} 

		elseif(isset($_SESSION['posts'])) {

			$_POST = $_SESSION['posts'];

			unset($_SESSION['posts']);

		}

	} 

}
*/
/*

function create_notification($reciver_id,$notification_type,$notification_msg,$current_date_time)

{

   

    $sqlSaveUser = dbQuery('

                INSERT INTO tbl_user_notifications (

                    sender_id,

                    reciver_id,

                    notification_type,

                    notification_msg,

                    send_date,

                    last_modified

                ) VALUES (

                    \''.dbEscape($_SESSION['user']['loggedIn']).'\',

                    \''.dbEscape($reciver_id).'\',

                    \''.$notification_type.'\',

                    \''.$notification_msg.'\',

                    \''.dbEscape($current_date_time).'\',

                    \''.dbEscape($current_date_time).'\'

                )

            ');

}



function get_shortlist_users_array()

{

$old_shortlist  = dbFetch(dbQuery('

        SELECT meta_value

        FROM tbl_users_meta  

        WHERE  user_id = \''.dbEscape($_SESSION['user']['loggedIn']).'\' AND meta_key = \'shortlist\'

        LIMIT 1

       ')); 

   

    if(!empty($old_shortlist['meta_value']))

    {

     return explode(",",$old_shortlist['meta_value']);     

    }   

}





*/

/*if(!function_exists('parseCMS')) {

		function parseCMS($content) {

			global $err;

			global $urlPrefix;



			$parsedContent = $content;



			$errorText = array(

				'fldName' => '',

				'fldEmail' => '',

				'fldPhone' => '',

				'fldEnquiry' => ''

			);



			$errorText = '';

			if(is_array($err)) {

				foreach($err AS $key => $val) {

					$errorText[$key] = '<p class="error">'.$val.'</p>';

				}

			}



			// Add pseudo tags and their replacements here

			$replacements = array(

				'/<p>\[CONTACT_FORM\]<\/p>/m' => '

					<form action="http'.($hasSSL ? 's' : '').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'" method="post">

						<fieldset>

							<input id="frmContact" name="frmContact" type="hidden" value="1" />

							<label for="fldName">Your Name</label>

							<input id="fldName" class="text" name="fldName" type="text" value="'.htmlentities(trim($_POST['fldName']), ENT_QUOTES, 'UTF-8').'" />

							'.$errorText['fldName'].'

							<label for="fldEmail">Your Email</label>

							<input id="fldEmail" class="text" name="fldEmail" type="text" value="'.htmlentities(trim($_POST['fldEmail']), ENT_QUOTES, 'UTF-8').'" />

							'.$errorText['fldEmail'].'

							<label for="fldEnquiry">Your Enquiry</label>

							<textarea id="fldEnquiry" cols="20" rows="5" class="text" name="fldEnquiry">'.htmlentities(trim($_POST['fldEnquiry']), ENT_QUOTES, 'UTF-8').'</textarea>

							'.$errorText['fldEnquiry'].'

							<div class="buttons">

								<input class="button" type="submit" value="Submit" />

							</div>

						</fieldset>

					</form>

				',

				'/\[THUMBNAIL\]([^\[\]]+)\[\/THUMBNAIL\]/m' => '

					<a class="lightbox" href="'.$urlPrefix.'/thumbnail-image/$1/500/500/file"><img src="'.$urlPrefix.'/thumbnail-image/$1/100/100/file" alt="" /></a>

				'

			);



			foreach($replacements AS $key => $val) {

				$parsedContent = preg_replace($key, $val, $parsedContent);

			}



			return $parsedContent;

		}

	}*/

?>