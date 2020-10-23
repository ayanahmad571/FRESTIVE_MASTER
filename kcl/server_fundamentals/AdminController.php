<?php
require_once("SessionHandler.php");
require_once("Settings.php");
require_once("DatabaseConnection.php");
require_once("FunctionsController.php");


if($USER_ARRAY['lum_ad'] == 0){
	die('Invalid Page.');
}

if(isset($_POST['fund_add'])){
	$cN = array('add_wlt_fund_usrid','add_funds_fund');
checkPost($cN);

	if(is_numeric($_POST[$cN[1]]) && ctype_alnum($_POST[$cN[0]])){
		if(!inRange($_POST[$cN[1]],0,10000000,true)){
			die("One Time wallet size must be between Rs. 0 and 1 Crore");
		}
		
		$userDetails = mysqlSelect("select * from sm_logins where md5(md5(sha1(md5(concat('erjfgviuerdhghvex',lum_id))))) = '".$_POST[$cN[0]]."'");
		
		if(!is_array($userDetails)){
			die('User Not Found');
		}
		
		$insertFunds=  mysqlInsertData("INSERT INTO `sm_wallet_funds`(`wf_rel_lum_id`, `wf_gen_rel_lum_id`, `wf_val`) VALUES (
'".$userDetails[0]['lum_id']."',
'".$USER_ARRAY['lum_id']."',
'".$_POST[$cN[1]]."'
)", true);

		if(is_numeric($insertFunds)){
			header('Location: admin_funds.php');
			die();
		}else{
			die($insertFunds);
		}
		
	}else{
		die('Invalid Input');
	}
		
}
#
if(isset($_POST['sess_add'])){
	$sessChecker = mysqlSelect("SELECT * FROM `sm_sessions` a
where a.sess_from <= '".(time())."' and a.sess_till >= '".time()."' and a.sess_valid =1");
if(is_array($sessChecker)){
	die("Session in progress");
}
	
	$sessFrom = time();
	$sessTill = $sessFrom + UPDATE_NUMBER * INTERVAL_I;
	$insertData = mysqlInsertData("INSERT INTO `sm_sessions`(`sess_gen_rel_lum_id`, `sess_gen_dnt`, `sess_from`, `sess_till`) VALUES (
	'".$USER_ARRAY['lum_id']."',
	'".time()."',
	'".$sessFrom."',
	'".$sessTill."')", true);
	
	if(is_numeric($insertData)){
		header('Location: admin_session.php');
	}else{
		die($insertData);
	}
}
#
if(isset($_POST['hash_ffipa'])){
	if(!ctype_alnum(trim($_POST['hash_ffipa']))){
		die('Invalid Entries');
		
	}
	if(ctype_alnum(trim($_POST['hash_ffipa']))){
		
		$checkit = mysqlSelect("select * from sm_sessions 
		where md5(sha1(md5(concat('woi4jhfoiehrguijvnes',sess_id))))= 
		'".$_POST['hash_ffipa']."' and sess_valid = 1");
		
		if(is_array($checkit)){
			$insertData = mysqlInsertData("update sm_sessions set sess_valid =0 where sess_id= ".$checkit[0]['sess_id'], true);
			if(is_numeric($insertData)){				
								header('Location: admin_session.php');
			}else{
				die('Couldt Insert Data');
			}
		}else{
			die("Invalid Session");
		}
		
		
	}


}
#companies
if(isset($_POST['a_comp_add'])){
$checkerNames = array("a_comp_nm","stck_pr_b","stck_pr_up_1" ,"stck_pr_up_2" ,"stck_pr_up_3" ,"stck_pr_up_4" ,"stck_pr_up_5" ,"stck_pr_up_6" ,"stck_pr_up_7" ,"stck_pr_up_8" ,"stck_pr_up_9" ,"stck_pr_up_10" ,"stck_pr_up_11" ,"stck_pr_up_12" ,"stck_pr_up_13" ,"stck_pr_up_14" ,"stck_pr_up_15" ,"stck_pr_up_16" ,"stck_pr_up_17" ,"stck_pr_up_18" ,"stck_pr_up_19" ,"stck_pr_up_20" ,"stck_pr_up_21" ,"stck_pr_up_22" ,"stck_pr_up_23" ,"stck_pr_up_24" ,"stck_pr_up_25" ,"stck_pr_up_26" ,"stck_pr_up_27" ,"stck_pr_up_28" ,"stck_pr_up_29" ,"stck_pr_up_30" ,"stck_pr_up_31" ,"stck_pr_up_32" ,"stck_pr_up_33" ,"stck_pr_up_34" ,"stck_pr_up_35" ,"stck_pr_up_36" ,"stck_pr_up_37" ,"stck_pr_up_38" ,"stck_pr_up_39" ,"stck_pr_up_40" ,"stck_pr_up_41" ,"stck_pr_up_42" ,"stck_pr_up_43" ,"stck_pr_up_44" ,"stck_pr_up_45");

checkPost($checkerNames);

foreach($checkerNames as $name){
	if(!strpos($name,"comp")){
		if(!is_numeric($_POST[$name])){
			die("Stock Val must be numeric");
		}
	}
}

$insertData = mysqlInsertData("INSERT INTO `sm_stocks`(`stock_name`, `stock_price_1`, `stock_price_2`, `stock_price_3`, `stock_price_4`, `stock_price_5`, `stock_price_6`, `stock_price_7`, `stock_price_8`, `stock_price_9`, `stock_price_10`, `stock_price_11`, `stock_price_12`, `stock_price_13`, `stock_price_14`, `stock_price_15`, `stock_price_16`, `stock_price_17`, `stock_price_18`, `stock_price_19`, `stock_price_20`, `stock_price_21`, `stock_price_22`, `stock_price_23`, `stock_price_24`, `stock_price_25`, `stock_price_26`, `stock_price_27`, `stock_price_28`, `stock_price_29`, `stock_price_30`, `stock_price_31`, `stock_price_32`, `stock_price_33`, `stock_price_34`, `stock_price_35`, `stock_price_36`, `stock_price_37`, `stock_price_38`, `stock_price_39`, `stock_price_40`, `stock_price_41`, `stock_price_42`, `stock_price_43`, `stock_price_44`, `stock_price_45`, `stock_price_46`) VALUES (
'".$_POST[$checkerNames[0]]."',
'".$_POST[$checkerNames[1]]."', '".$_POST[$checkerNames[2]]."', '".$_POST[$checkerNames[3]]."', '".$_POST[$checkerNames[4]]."', '".$_POST[$checkerNames[5]]."', '".$_POST[$checkerNames[6]]."', '".$_POST[$checkerNames[7]]."', '".$_POST[$checkerNames[8]]."', '".$_POST[$checkerNames[9]]."', '".$_POST[$checkerNames[10]]."', '".$_POST[$checkerNames[11]]."', '".$_POST[$checkerNames[12]]."', '".$_POST[$checkerNames[13]]."', '".$_POST[$checkerNames[14]]."', '".$_POST[$checkerNames[15]]."', '".$_POST[$checkerNames[16]]."', '".$_POST[$checkerNames[17]]."', '".$_POST[$checkerNames[18]]."', '".$_POST[$checkerNames[19]]."', '".$_POST[$checkerNames[20]]."', '".$_POST[$checkerNames[21]]."', '".$_POST[$checkerNames[22]]."', '".$_POST[$checkerNames[23]]."', '".$_POST[$checkerNames[24]]."', '".$_POST[$checkerNames[25]]."', '".$_POST[$checkerNames[26]]."', '".$_POST[$checkerNames[27]]."', '".$_POST[$checkerNames[28]]."', '".$_POST[$checkerNames[29]]."', '".$_POST[$checkerNames[30]]."', '".$_POST[$checkerNames[31]]."', '".$_POST[$checkerNames[32]]."', '".$_POST[$checkerNames[33]]."', '".$_POST[$checkerNames[34]]."', '".$_POST[$checkerNames[35]]."', '".$_POST[$checkerNames[36]]."', '".$_POST[$checkerNames[37]]."', '".$_POST[$checkerNames[38]]."', '".$_POST[$checkerNames[39]]."', '".$_POST[$checkerNames[40]]."', '".$_POST[$checkerNames[41]]."', '".$_POST[$checkerNames[42]]."', '".$_POST[$checkerNames[43]]."', '".$_POST[$checkerNames[44]]."', '".$_POST[$checkerNames[45]]."', '".$_POST[$checkerNames[46]]."'
)
",true);

if(!is_numeric($insertData)){
	die($insertData);
}
	header('Location: admin_comp.php');
	
	####file upload ends

}
#news


if(isset($_POST['buy_stock']) and isset($_POST['buy_stock_stp'])){
	if(isset($_SESSION['STCK_USR_DB_ID'])){
	}else{
		die('You Must be logged <br>
<a href="login.php"><button>Click to Login</button></a>');
	}
	
	
	
	if(is_numeric($_POST['buy_stock'])){
		$qty = $_POST['buy_stock'];
	}else{
		die('Stock qty has to be numeric');
	}
	
	
	if(ctype_alnum($_POST['buy_stock_stp'])){
		$hash = $_POST['buy_stock_stp'];
		
		$getdata = getdatafromsql($conn,"select * from sm_stocks_price_rel where md5(sha1(md5(md5(concat(stp_id,'hbrhugu8hi3re9ui3hefug3irefgir29oiwh4g38ohu5egr3i5ehgru'))))) = '".trim($hash)."' and stp_valid =1");
		if(!is_array($getdata)){
			die("Could not find the price");
		}

	}else{
		die('Stock qty has to be numeric');
	}
	
$getwallet = "select * from p_balance where wf_rel_lum_id = ".$_SESSION['STCK_USR_DB_ID']."
";


			$getwallet = getdatafromsql($conn,$getwallet);
			
			if(!is_array($getwallet)){
				die("Could not load your wallet amount");
			}
			
			
			if(($getwallet['wf_balance']) < ($qty*$getdata['stp_val'])){
				die('Not enough funds');
			}
			
			if(!isset($_SESSION['STCK_USR_DB_ID'])){
				die('Login to continue');
			}
			
			
			if($conn->query("INSERT INTO `sm_transactions`(
			`tr_rel_stck_id`, `tr_rel_lum_id`,
			 `tr_rel_stp_id`, `tr_qty`, 
			 `tr_time`, `tr_ip`) VALUES (
			 '".$getdata['stp_rel_stck_id']."',
			 '".$_SESSION['STCK_USR_DB_ID']."',
			 '".$getdata['stp_id']."',
			 '".$qty."',
			 '".time()."',
			 '".$_SERVER['REMOTE_ADDR']."'
			 
			 )")){
##### Insert Logs ##################################################################VV3###
		if(preplogs($getdata,$_SESSION['STCK_USR_DB_ID'],'sm_transactions','insert', "INSERT INTO `sm_transactions`(
			`tr_rel_stck_id`, `tr_rel_lum_id`,
			 `tr_rel_stp_id`, `tr_qty`, 
			 `tr_time`, `tr_ip`) VALUES (
			 '".$getdata['stp_rel_stck_id']."',
			 '".$_SESSION['STCK_USR_DB_ID']."',
			 '".$getdata['stp_id']."',
			 '".$qty."',
			 '".time()."',
			 '".$_SERVER['REMOTE_ADDR']."'
			 
			 )" ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGsezfdTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###

				 
				 header('Location: markets.php');
			}else{
				die('ERRMAOI4WJGF38EIRGHNO');
			}
	
}
if(isset($_POST['sell_stock']) and isset($_POST['sell_stock_stp'])){
	if(isset($_SESSION['STCK_USR_DB_ID'])){
	}else{
		die('You Must be logged <br>
<a href="login.php"><button>Click to Login</button></a>');
	}
	
	
	
	if(is_numeric($_POST['sell_stock'])){
		$qty = $_POST['sell_stock'];
	}else{
		die('Stock qty has to be numeric');
	}
	
	
	if(ctype_alnum($_POST['sell_stock_stp'])){
		$hash = $_POST['sell_stock_stp'];
		
		$getdata = getdatafromsql($conn,"select * from sm_stocks_price_rel where md5(sha1(md5(md5(concat(stp_id,'hbrhugu8hi3re9ui3hefug3irefgir29oiwh4g38ohu5eg3i5ehgru'))))) = '".trim($hash)."' and stp_valid =1");
		if(!is_array($getdata)){
			die("Could not find the price");
		}

	}else{
		die('Stock qty has to be numeric');
	}
	
			
			if(!isset($_SESSION['STCK_USR_DB_ID'])){
				die('Login to continue');
			}
			
			
			
			
			$getsellab = "select sum(tr_qty) as sellab from sm_transactions 
			where tr_valid =1 and 
			tr_rel_stck_id = ".$getdata['stp_rel_stck_id']."
			and
			tr_rel_lum_id = ".$_SESSION['STCK_USR_DB_ID']."
			group by tr_rel_stck_id
";


			$getsellab = getdatafromsql($conn,$getsellab);
			
			if(!is_array($getsellab)){
				echo '0';
			}
			
			
			
				$getsold = "select sum(ts_qty) as sellab from sm_transactions_sell 
			where ts_valid =1 and
			ts_rel_stck_id = ".$getdata['stp_rel_stck_id']."
			and 
			ts_rel_lum_id = ".$_SESSION['STCK_USR_DB_ID']."
			group by ts_rel_stck_id
";


			$getsold = getdatafromsql($conn,$getsold);
			
			if(!is_array($getsold)){
				$getisold = 0;
			}else{
				$getisold = $getsold['sellab'];
			}
			
			
			if($getsold > $getsellab){
				die('You don\'t have enough to sell ');
			}
			
			
			if($conn->query("INSERT INTO `sm_transactions_sell`(
			`ts_rel_stck_id`, `ts_rel_lum_id`,
			 `ts_rel_stp_id`, `ts_qty`, 
			 `ts_time`, `ts_ip`) VALUES (
			 '".$getdata['stp_rel_stck_id']."',
			 '".$_SESSION['STCK_USR_DB_ID']."',
			 '".$getdata['stp_id']."',
			 '".$qty."',
			 '".time()."',
			 '".$_SERVER['REMOTE_ADDR']."'
			 
			 )")){
##### Insert Logs ##################################################################VV3###
		if(preplogs($getdata,$_SESSION['STCK_USR_DB_ID'],'sm_transactions_sell','insert', "INSERT INTO `sm_transactions_sell`(
			`ts_rel_stck_id`, `ts_rel_lum_id`,
			 `ts_rel_stp_id`, `ts_qty`, 
			 `ts_time`, `ts_ip`) VALUES (
			 '".$getdata['stp_rel_stck_id']."',
			 '".$_SESSION['STCK_USR_DB_ID']."',
			 '".$getdata['stp_id']."',
			 '".$qty."',
			 '".time()."',
			 '".$_SERVER['REMOTE_ADDR']."'
			 
			 )" ,$conn,$_SESSION['SESS_USR_LOG_MS_VIEW_MD5_ID'])){
		}else{
			die('ERRINCMA%TGsezfdTBTR$WESDF');
		}
##### Insert Logs ##################################################################VV3###

				 
				 header('Location: markets.php');
			}else{
				die('ERRMAOI4WJGF38EIRGHNO');
			}
	
}
##
if(isset($_POST['switch_user_status'])){

	if($USER_ARRAY["lum_ad"] != 1){
		die("Only Administrators may be allowed.");
	}
	if(!ctype_alnum($_POST['switch_user_status'])){
		die("Invalid");
	}
	$getAccount = mysqlSelect("select * from sm_logins where md5(md5(sha1(sha1(md5(md5(concat(lum_id,'AlphaRomeo197RY9'))))))) = '".$_POST['switch_user_status']."'");
	
	if(!is_array($getAccount)){
		die("Cant Find User");
	}
	$setnew = 0;
	
	if($getAccount[0]['lum_valid'] == 0){
		$setnew = 1;
	}
	$updateSql = mysqlUpdateData("update `sm_logins` set lum_valid = ".$setnew." where lum_id = ".$getAccount[0]['lum_id'], true);
		if(is_numeric($updateSql)){
			header("Location: admin_user.php");
			die();
		}else{
				die($insertData);
		}
}




?>
