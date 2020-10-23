 <head>
</head> 
<?php
#<meta http-equiv="refresh" content="5">

require_once("../server_fundamentals/Settings.php");
require_once("../server_fundamentals/CookieController.php");
require_once("../server_fundamentals/DatabaseConnection.php");
require_once("../server_fundamentals/FunctionsController.php");

$deleteGarbage = true;
#Logic
/*
Get All Users who have made themselves live and are online right now
For online, Look for unique (users) in the last 10 seconds. 

requrests are sent every 2 secs from client side.

we have all online users.

Make an arrray with all of them and store it.
if its odd, then remove the last person.

run algorithm

when the 2 have been matched.

take their IDS and then store them in the chat table.

(Client front, the request will go to the page asking if the chat has been made or no.)
*/

$getLiveUsers = mysqlSelect("SELECT *  FROM `c_chat_groups_online` where (cgo_dnt) > ".(time()-3)."
group by cgo_lum_id 
");

if(!is_array($getLiveUsers)){
	die();
}

if($deleteGarbage){

	// sql to delete a record
	$sqlDelete = "DELETE FROM c_chat_groups_online where (cgo_dnt) < ".(time()-10);
	
	if ($conn->query($sqlDelete) === TRUE) {
	}else{
		die("DE");
	}

}
			$arraysize = (count($getLiveUsers));
			if(($arraysize % 2) != 0){
				$arraysize = $arraysize -1;
			}
			shuffle($getLiveUsers);
			
			for($ii=0; $ii<$arraysize;$ii = $ii +2){
	$checkForChat = mysqlSelect("select * from c_chat_groups where (cg_1_lum_id = ".$getLiveUsers[$ii]['cgo_lum_id']." or cg_2_lum_id = ".$getLiveUsers[$ii]['cgo_lum_id'].") 
	and  (".(time()-($chat_session_time -1 ))." < cg_dnt )");

				
				$insertData = mysqlInsertData("INSERT INTO `c_chat_groups`(`cg_1_lum_id`, `cg_2_lum_id`, `cg_dnt`) VALUES (
					".$getLiveUsers[$ii]['cgo_lum_id'].",
					".$getLiveUsers[$ii+1]['cgo_lum_id'].",
					".time()."
				)",true);
				
				if(!is_numeric($insertData)){
					die("IE");
				}
				
			}




?>