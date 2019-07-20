<?php
date_default_timezone_set('Asia/Calcutta'); 
$today_date_time = date("Y-m-d H:i:s", time());
$today_date = date("Y-m-d", time());
$current_time = date("H:i:s", time());
class Common{
    var $con;
    function __construct($db=array()) {
        $default = array(
        'host' => 'localhost',
            'user' => 'plugcbue_admin',
            'pass' => 'india020',
            'db' => 'plugcbue_tms'
        );

        $db = array_merge($default,$db);
        $this->con=mysql_connect($db['host'],$db['user'],$db['pass'],true) or die ('Error connecting to MySQL');
        mysql_select_db($db['db'],$this->con) or die('Database '.$db['db'].' does not exist!');
    }
   
    function __destruct() {
        mysql_close($this->con);
    }


    function query($s='',$rows=false,$organize=true) {

        if (!$q=mysql_query($s,$this->con)) return false;
        if ($rows!==false) $rows = intval($rows);
        $rez=array(); $count=0;
        $type = $organize ? MYSQL_NUM : MYSQL_ASSOC;
        while (($rows===false || $count<$rows) && $line=mysql_fetch_array($q,$type)) {
            if ($organize) {
                foreach ($line as $field_id => $value) {
                    $table = mysql_field_table($q, $field_id);
                    if ($table==='') $table=0;
                    $field = mysql_field_name($q,$field_id);
                    $rez[$count][$table][$field]=$value;
                }
            } else {

                $rez[$count] = $line;
            }

            ++$count;
        }
        if (!mysql_free_result($q)) return false;

        return $rez;

    }

    function execute($s='') {
        if (mysql_query($s,$this->con)) return true;
        return false;
    }

    function select($options) {
        $default = array (
            'table' => '',
            'fields' => '*',
            'condition' => '1',
            'order' => '1',
            'sort' => 'DESC',
            'limit' => 999999,

        );

        $options = array_merge($default,$options);
         $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";
        //echo $sql ;
        return $this->query($sql);
    }

 function row($options) {
        $default = array (
            'table' => '',
            'fields' => '*',
            'condition' => '1',
            'order' => '1'
        );

        $options = array_merge($default,$options);
        $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']}";
        $result = $this->query($sql,1,false);
        if (empty($result[0])) return false;
        return $result[0];
    }

    function get($table=null,$field=null,$conditions='1') {
        if ($table===null || $field===null) return false;
        $result=$this->row(array(
            'table' => $table,
            'condition' => $conditions,
            'fields' => $field
        ));

        if (empty($result[$field])) return false;
        return $result[$field];
    }

 function update($table=null,$array_of_values=array(),$conditions='FALSE') {
        if ($table===null || empty($array_of_values)) return false;
        $what_to_set = array();
        foreach ($array_of_values as $field => $value) {
            if (is_array($value) && !empty($value[0])) $what_to_set[]="`$field`='{$value[0]}'";
            else $what_to_set []= "`$field`='".mysql_real_escape_string($value,$this->con)."'";
        }
        $what_to_set_string = implode(',',$what_to_set);
   //echo ("UPDATE $table SET $what_to_set_string WHERE $conditions");
        return $this->execute("UPDATE $table SET $what_to_set_string WHERE $conditions");
    }

 function insert($table=null,$array_of_values=array()) {

        if ($table===null || empty($array_of_values) || !is_array($array_of_values)) return false;
        $fields=array(); $values=array();
        foreach ($array_of_values as $id => $value) {

            $fields[]=$id;
            if (is_array($value) && !empty($value[0])) $values[]=$value[0];
            else $values[]="'".mysql_real_escape_string($value,$this->con)."'";
        }
        $s = "INSERT INTO $table (".implode(',',$fields).') VALUES ('.implode(',',$values).')';
        //echo $s;
        //exit;
        if (mysql_query($s,$this->con)) return mysql_insert_id($this->con);
        return false;
    }

  

    function delete($table,$conditions) {
        if ($table===null) return false;
//echo ("DELETE FROM $table WHERE $conditions");
     $result=$this->execute("DELETE FROM $table WHERE $conditions");
       return $result;
    }
    
    
    
function select_prod_category($options,$jointable) {
        $default = array (
            'table' => '',
            'fields' => '*',
            'condition' => '1',
            'order' => '1',
            'sort' => 'DESC',
            'limit' => 50
        );
        $options = array_merge($default,$options);
      $sql = "SELECT {$options['fields']} FROM {$options['table']} as tbl1 inner join $jointable as tbl2 where tbl1.category_id = tbl2.category_id  AND {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";
        return $this->query($sql);
    }

    function select_project_type($tenent_id,$status) {
    $options = array (
            'table' => 'project_type',
            'fields' => '*',
            'condition' =>"status='$status' AND tenant_id='$tenent_id'",
            'order' =>'project_type',
            'sort' => 'ASC',
            'limit' => 999
        );
       
       $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";
        return $this->query($sql);
    }


    function select_project_manager($tenent_id,$status) {
        $options = array (
            'table' => 'pms_users',
            'fields' => 'pms_user_id,pms_first_name,pms_last_name',
            'condition' =>"pms_role_id=10 AND status='$status' AND tenant_id='$tenent_id'",
            'order' =>'pms_first_name',
            'sort' => 'ASC',
            'limit' => 999
        );
        
       $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";

        return $this->query($sql);
    }    

function select_user_name($tenent_id,$role_id,$status) {
        $options = array (
            'table' => 'pms_users',
            'fields' => 'pms_user_id,pms_first_name,pms_last_name',
            'condition' =>"pms_role_id='$role_id' AND status='$status' AND tenant_id='$tenent_id'",
            'order' =>'pms_first_name',
            'sort' => 'ASC',
            'limit' => 999
        );

       $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";
        return $this->query($sql);

    }    

    

function get_role_name($role_id,$tenant_id,$branch_id,$status) {
       $options = array (
            'table' => 'roles',
            'fields' => 'role_name',
            'condition' =>"role_id='$role_id' AND status='$status' AND tenant_id='$tenant_id' AND branch_id='$branch_id'",
            'order' =>'role_id',
            'sort' => 'DESC',
            'limit' => 1
        );
       $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";

         $rolresult = $this->query($sql);       
        if(!empty($rolresult))
         {
             foreach($rolresult as $rolname)
             { 
                    return $rolname['roles']['role_name'];
         }   }
}



function NewGuid() { 

    $s = strtoupper(md5(uniqid(rand(),true))); 

    $guidText = 

        substr($s,0,8) . '-' . 

        substr($s,8,4) . '-' . 

        substr($s,12,4). '-' . 

        substr($s,16,4). '-' . 

        substr($s,20); 

    return $guidText;

}
/**

 * function preArray ($Array) {

 *     print '<pre>';

 *     print_r($Array);

 *     print '</pre>';

 * }

 */
/*function get_user_role_id($pms_user_id,$tenant_id,$branch_id,$status) {

        $options = array (
            'table' => 'pms_users',
            'fields' => 'pms_role_id',
            'condition' =>"pms_user_id='$pms_user_id' AND tenant_id='$tenant_id' AND branch_id='$branch_id' AND status='$status'",
            'order' =>'pms_user_id',
            'sort' => 'DESC',
            'limit' => 1
        );

      $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";

         $rolresult = $this->query($sql);
        
        if(!empty($rolresult))
         {
             foreach($rolresult as $rol)
             { 
                    return $rol['pms_users']['pms_role_id'];

         }   }
    
}*/



/*function get_user_id_by_role($role_id,$tenant_id,$branch_id) {



        $options = array (



            'table' => 'pms_users',

            'fields' => 'pms_user_id',

            'condition' =>"pms_role_id='$role_id' AND tenant_id='$tenant_id' AND branch_id='$branch_id' ",

            'order' =>'pms_user_id',

            'sort' => 'DESC',

            'limit' => 1



        );

      $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";



         $rolresult = $this->query($sql);

        

        if(!empty($rolresult))

         {

             foreach($rolresult as $rol)

             { 

                    return $rol['pms_users']['pms_user_id'];

         }   }

    

}*/




/*
function get_pms_user_name($pms_user_id,$tenant_id,$branch_id) {

        $options = array (
            'table' => 'pms_users',
            'fields' => 'pms_first_name,pms_last_name',
            'condition' =>"pms_user_id='$pms_user_id' AND tenant_id='$tenant_id' AND branch_id='$branch_id'",
            'order' =>'pms_first_name',
            'sort' => 'DESC',
            'limit' => 1
        );

       $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";
         $rolresult = $this->query($sql);
        if(!empty($rolresult))
         {
             foreach($rolresult as $rolname)
             { 
                    return $rolname['pms_users']['pms_first_name']." ".$rolname['pms_users']['pms_last_name'];
         }   }

}*/

/*
function get_user_pic($user_id) {

        $options = array (   
            'table' => 'pms_users',

            'fields' => 'profile_pic',

            'condition' =>"pms_user_id='$user_id'",

            'order' =>'pms_user_id',

            'sort' => 'DESC',

            'limit' => 1
        );
      $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";

         $rolresult = $this->query($sql);
        if(!empty($rolresult))
         {
             foreach($rolresult as $pic)
             { 
                    return $pic['pms_users']['profile_pic'];
         }   }

} */


/*
function get_user_name($user_id,$tenant_id,$branch_id) {
        $options = array (
            'table' => 'pms_users',
            'fields' => 'pms_first_name,pms_last_name',
            'condition' =>"pms_user_id='$user_id' AND tenant_id='$tenant_id' AND branch_id='$branch_id'",
            'order' =>'pms_first_name',
            'sort' => 'DESC',
            'limit' => 1
        );

       $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";
         $rolresult = $this->query($sql);

        if(!empty($rolresult))
         {
             foreach($rolresult as $rolname)
             { 
                    return $rolname['pms_users']['pms_first_name']." ".$rolname['pms_users']['pms_last_name'];
         }   }
}*/




/*

function get_admin_userid($tenant_id,$branch_id) {
        $options = array (
            'table' => 'pms_users',
            'fields' => 'pms_user_id',
            'condition' =>"pms_role_id=1 AND tenant_id='$tenant_id' AND branch_id='$branch_id'",
            'order' =>'pms_user_id',
            'sort' => 'ASC',
            'limit' => 1
        );
    $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";

         $teamresult = $this->query($sql);
        if(!empty($teamresult))
         {
             foreach($teamresult as $teamname)
             { 
                     return $teamname['pms_users']['pms_user_id'];
                    
         }   }

}
*/

/*
function get_emp_id($u_id,$tenant_id,$branch_id) {

        $options = array (
            'table' => 'users',
            'fields' => 'emp_id',
            'condition' =>"user_id='$u_id' AND tenant_id='$tenant_id' AND branch_id='$branch_id'",
            'order' =>'user_id',
            'sort' => 'DESC',
            'limit' => 1
        );
     $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";

         $teamresult = $this->query($sql);       
        if(!empty($teamresult))
         {
             foreach($teamresult as $teamname)
             { 
                     return $teamname['users']['emp_id'];                   

         }   }

}

/*

/*function get_technical_roles($tenent_id,$status)

{    

$options = array (

            'table' => 'roles',

            'fields' => 'role_id,role_name',

            'condition' =>"role_id not in (1,2,6,7,8) AND status='$status' AND tenant_id='$tenent_id'",

            'order' =>'role_name',

            'sort' => 'ASC',

            'limit' => 999

        );

 $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";



        return $this->query($sql);

}    */


/*

function get_phase_name($phase_id)

{        

$options = array (

            'table' => 'tms_phase',

            'fields' => 'name',

            'condition' =>"id= '$phase_id'",

            'order' => 'id',

            'sort' => 'ASC',

            'limit' => 1

        );

 $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";



        $result_task = $this->query($sql);

 if(!empty($result_task))

 foreach($result_task as $rolval)

 return $rolval['tms_phase']['name'];
                       
}
*/

/*
function get_task_status($task_id)

{    

$options = array (

            'table' => 'tms_tasks',

            'fields' => 'task_status',

            'condition' =>"id = '$task_id'",

            'order' =>'id',

            'sort' => 'ASC',

            'limit' => 1

        );

  $sql = "SELECT {$options['fields']} FROM {$options['table']} WHERE {$options['condition']} ORDER BY {$options['order']} {$options['sort']}  LIMIT {$options['limit']}";



        $result_task = $this->query($sql);

if(!empty($result_task))

foreach($result_task as $rolval)

return $rolval['tms_tasks']['task_status'];                    

}
*/

/*

   


 function get_all_deactive_users($branch_id,$tenant_id) {
 $sql = "SELECT pms_user_id,user_id,pms_first_name,pms_last_name,pms_email,pms_role_id,team_id,profile_pic,pms_users.status,d.designation_name,r.role_name FROM pms_users as pms_users inner join roles as r inner join pms_designation as d where pms_users.tenant_id=$tenant_id AND pms_users.branch_id=$branch_id AND r.role_id = pms_users.pms_role_id AND d.designation_id = pms_users.designation_id AND pms_users.status='0' order by pms_first_name" ;
return $this->query($sql);
 }

 function get_todays_checkin_users($today,$branch_id,$tenant_id) {
 $sql = "SELECT pms_first_name,pms_last_name,ul.in_time FROM pms_users as pms_users inner join user_log as ul  where ul.date='$today' AND pms_users.tenant_id=$tenant_id AND pms_users.branch_id=$branch_id  AND ul.user_id = pms_users.pms_user_id AND ul.in_time > '' order by ul.in_time DESC"; 
return $this->query($sql);
 } 

function get_emplyees($branch_id,$tenant_id) {
 $sql = "SELECT pms_first_name,pms_last_name,u.emp_id FROM users as u inner join pms_users as pms_users where pms_users.tenant_id=$tenant_id AND pms_users.branch_id=$branch_id AND u.user_id = pms_users.user_id group by u.user_id ASC" ;
 return $this->query($sql);
 }   
function get_un_checkout_users($prev_date,$out_time) {
 $sql = "SELECT pms_first_name,pms_last_name,pms_email,ul.user_id FROM pms_users as u inner join user_log as ul where ul.date='$prev_date' AND ul.out_time='$out_time' AND u.pms_user_id=ul.user_id" ;
 return $this->query($sql);
 } 
 function get_task_comments($task_id) {
  $sql = "SELECT task_comments.id,task_comments.pms_user_id,task_comments.comment,task_comments.view,task_comments.modified_date,task_comments.status,pu.pms_role_id,pu.pms_first_name,pu.pms_last_name,pu.profile_pic,r.role_name,r.role_id FROM task_comments as task_comments inner join roles as r inner join pms_users as pu where task_comments.task_id=$task_id AND task_comments.pms_user_id=pu.pms_user_id AND r.role_id = pu.pms_role_id ORDER BY task_comments.modified_date DESC" ;
return $this->query($sql);
 }

function get_breaks($branch_id,$tenant_id,$user_id,$today_date) {
$sql ="SELECT * FROM breaks WHERE id NOT IN (SELECT break_id FROM break_log WHERE user_id ='$user_id' AND Date = '$today_date') OR id=5";
return $this->query($sql);
 } 

function select_teamleader_projest_list($options,$tms_team,$tms_phase,$branch_id,$tenant_id,$user_id,$p_status) {

        $default = array (

            'table' => '',

            'fields' => '*',

        );

        $str1 = $user_id.",%";

        $str2 = "%,".$user_id.",%";

        $str3 = "%,".$user_id;

        $options = array_merge($default,$options);

        if($p_status!="all")

        $sp_cond=" AND project_details.tms_project_status = '$p_status'"; 

        else
        $sp_cond="";
      $sql = "SELECT distinct {$options['fields']} FROM {$options['table']} as project_details inner join $tms_team as tbl2 inner join $tms_phase as tbl3 where project_details.tenant_id=$tenant_id AND project_details.branch_id=$branch_id $sp_cond AND tbl3.team_id = tbl2.id  and tbl3.project_id = project_details.id AND tbl2.leader_id = $user_id GROUP BY project_details.id ORDER BY project_details.deadline_date ASC" ;

return $this->query($sql);
    }

function select_team_and_leader($options,$tms_team,$pms_users,$branch_id,$tenant_id) {    

      $sql = "SELECT {$options['fields']} FROM {$options['table']} as tms_teams inner join $pms_users as pms_users  where tms_teams.tenant_id=$tenant_id AND tms_teams.branch_id=$branch_id AND tms_teams.leader_id = pms_users.pms_user_id AND tms_teams.status=1 " ;



return $this->query($sql);



}

    




function select_event($options,$jointable_imag,$jointable1_cost,$Event_id) {


        $default = array (

            'table' => '',
            'fields' => '*',



            'condition' => '1',



            'order' => '1',



            'sort' => 'DESC',



            



        );



        $options = array_merge($default,$options);



      $sql = "SELECT {$options['fields']} FROM {$options['table']} as tbl1 inner join $jointable_imag as tbl2 inner join $jointable1_cost as tbl3 where tbl3.Event_id = tbl1.Event_id  and tbl2.Event_id = tbl1.Event_id AND tbl1.Event_id = $Event_id";



return $this->query($sql);



    }





}



function aotu_time($time)

{

list( $hour, $min, $sec) = explode( ':', $time);

if( $sec < 10) 

$sec = (int)$sec;

if( $min < 10) 

$min = (int)$min;

if( $hour < 10) 

$hour = (int)$hour;



if($hour!=0 && $min!=0 && $sec!=0)

  {

    $set_time=$hour.':'.$min.' hrs';

  }

elseif($hour!=0 && $min!=0 && $sec==0)

  {

    $set_time=$hour.':'.$min.' hrs';

  }

elseif($hour==0 && $min!=0)

  {

    $set_time=$min.' min';

  }

elseif($hour==0 && $min==0 && $sec!=0)

  {

    $set_time=$sec.' sec';

  }

return $set_time;

}

function time_dif($p_total_hour,$p_invest_hour)

{

list( $hour, $min, $sec) = explode( ':', $p_total_hour);

list( $hour_sub, $min_sub, $sec_sub) = explode( ':', $p_invest_hour);

$hour = $hour - $hour_sub;

$min  = $min  - $min_sub;

$sec  = $sec  - $sec_sub;

if( $sec < 0) {

    $sec = 60 + $sec; // Note $min is negative

    $min--; // Decrement hour

}

if( $min < 0) {

    $min = 60 + $min; // Note $min is negative

    $hour--; // Decrement hour

}

if( $sec < 10) 

$sec="0".$sec;

if( $min < 10) 

$min="0".$min;

if( $hour < 10) 

$hour="0".$hour;

return $hour . ':' . $min. ':' . $sec;

}



function date_time_diff( $date1, $date2 ){

    $diff = abs( strtotime( $date1 ) - strtotime( $date2 ) );

    $d= intval( $diff / 86400 );

     if($d>0)

     $dh=24*$d;

     else

     $dh=0;

    return sprintf

    (

        "%d:%d:%d",

       // intval( $diff / 86400 ),

        $dh+intval( ( $diff % 86400 ) / 3600),

        intval( ( $diff / 60 ) % 60 ),

        intval( $diff % 60 )

    );

}     
*/



/*function AddTime ($oldPlayTime, $PlayTimeToAdd) { 

  // echo "dffffffffffffffffffffffffff";

    $pieces = split(':', $oldPlayTime); 

    $hours=$pieces[0]; 

    $hours=str_replace("00","12",$hours); 

    $minutes=$pieces[1]; 

    $seconds=$pieces[2]; 

    $oldPlayTime=$hours.":".$minutes.":".$seconds; 



    $pieces = split(':', $PlayTimeToAdd); 

    $hours=$pieces[0]; 

    $hours=str_replace("00","12",$hours); 

    $minutes=$pieces[1]; 

    $seconds=$pieces[2]; 

    

    $str = $str.$minutes." minute ".$seconds." second" ; 

    $str = "01/01/2000 ".$oldPlayTime." am + ".$hours." hour ".$minutes." minute ".$seconds." second" ; 

    

    // Avant PHP 5.1.0, vous devez comparer avec  -1, au lieu de false 

    if (($timestamp = strtotime($str)) === false) { 

        return false; 

    } else { 

        $sum=date('h:i:s', $timestamp); 

        $pieces = split(':', $sum); 

        $hours=$pieces[0]; 

        $hours=str_replace("12","00",$hours); 

        $minutes=$pieces[1]; 

        $seconds=$pieces[2]; 

        $sum=$hours.":".$minutes.":".$seconds; 

       // echo $sum;

        return $sum; 

        

    } 

} */

/**
function timeToSeconds($time) {
    $parts = explode(':', $time);
    return $parts[0] * 3600 + $parts[1] * 60 + $parts[2];
}

function ADD_TIME_secondsToTime($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor($seconds / 60) % 60;
    $seconds %= 60;
    return str_pad($hours, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutes, 2, '0', STR_PAD_LEFT) . ':' . str_pad($seconds, 2, '0', STR_PAD_LEFT);
}

function addTime_HM ($durations) {
    $total = 0;
    foreach ($durations as $duration) {
        $duration = explode(':',$duration);
        $total += $duration[0] * 60;
        $total += $duration[1];
    }
    $mins = round($total / 60);
    $secs = $total % 60;
    return $mins.':'.$secs;
}
function percentage_bar($p_total_hour,$p_invest_hour)

{

 sscanf($p_total_hour, "%d:%d:%d", $hours, $minutes, $seconds);

 $total_time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;



//$end_time = "1:50";

sscanf($p_invest_hour, "%d:%d:%d", $hours, $minutes, $seconds);

 $invest_time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;

 return ($invest_time_seconds/$total_time_seconds)*100 ."%";

}
*/

// End Generate Guid

 ?>