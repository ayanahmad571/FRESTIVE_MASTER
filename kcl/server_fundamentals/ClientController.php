<?php
require_once("SessionHandler.php");
require_once("Settings.php");
require_once("DatabaseConnection.php");
require_once("FunctionsController.php");



if(isset($_POST['buy_stock_id']) && isset($_POST['buy_stock_qty'])){

	if(!ctype_alnum($_POST['buy_stock_id']) || !is_numeric($_POST['buy_stock_qty'])){
		die("Invalid Input");
	}
	$stockSingle = mysqlSelect("select * from sm_stocks where stock_valid =1 and md5(stock_id) = '".$_POST['buy_stock_id']."'");
	
	if(!is_array($stockSingle)){
		die("Invalid Stock");
	}
	
	if((floor($equityBar[0]/$stockSingle[0]["stock_price_".$sessionUpdateNumber]) < $_POST['buy_stock_qty']) || $_POST['buy_stock_qty'] < 1){
		header('Location: stock_single.php?id='.md5($stockSingle[0]["stock_id"])."&err=1");
		die();
	}
	
	
	$insertData = mysqlInsertData("INSERT INTO `sm_transactions`(`tr_rel_sess_id`, `tr_rel_lum_id`, `tr_rel_stock_id`, `tr_sess_count`, `tr_qty`, `tr_buy_price`, `tr_dnt`, `tr_ip`) VALUES (
	'".$sessionGrabber[0]['sess_id']."',
	'".$USER_ARRAY['lum_id']."',
	'".$stockSingle[0]['stock_id']."',
	'".$sessionUpdateNumber."',
	'".$_POST['buy_stock_qty']."',
	'".$stockSingle[0]['stock_price_'.$sessionUpdateNumber]."',
	'".time()."',
	'".$_SERVER['REMOTE_ADDR']."'
	
	)",true);
	if(is_numeric($insertData)){
		header('Location: stock_single.php?id='.md5($stockSingle[0]["stock_id"]));
		die();
	}else{
		die($insertData);
	}
	
}
#
if(isset($_POST['trade_close'])){

	if(!ctype_alnum($_POST['trade_close'])){
		die("Invalid Input");
	}
	$stockSingle = mysqlSelect("SELECT * FROM `sm_transactions` t 
left join sm_stocks s on t.tr_rel_stock_id = s.stock_id 
WHERE 
s.stock_valid = 1 
and t.tr_valid =1
and t.tr_rel_sess_id = ".$sessionGrabber[0]['sess_id']." 
and t.tr_rel_lum_id = ".$USER_ARRAY['lum_id']."
and md5(t.tr_id) = '".$_POST['trade_close']."' 
order by  t.tr_sell_price");
	
	if(!is_array($stockSingle)){
		die("Invalid Trade");
	}
	$updateData = mysqlUpdateData("UPDATE `sm_transactions` SET `tr_sell_price`= '".$stockSingle[0]['stock_price_'.$sessionUpdateNumber]."' where tr_id = ".$stockSingle[0]['tr_id'],true);
	

	if(is_numeric($updateData)){
		header('Location: stock_single.php?id='.md5($stockSingle[0]["stock_id"]));
		die();
	}else{
		die($insertData);
	}
	
}
#
if(isset($_POST['getLeaderBoard'])){
		#Check if a session has been started, stored in an array.
	$getAllUsers = mysqlSelect("SELECT * FROM `sm_logins` l where lum_ad = 0 and lum_valid =1");
	if(is_array($getAllUsers)){
	
		if(is_array($sessionGrabber)){
			foreach($getAllUsers as $GetUser){
		#Check if user has funds in his wallet.
	$walletGrabberIndiv = mysqlSelect("SELECT *, sum(wf_val) as wf_tot FROM `sm_wallet_funds`
	where wf_valid= 1 and
	wf_rel_lum_id = ".$GetUser['lum_id']."
	group by wf_rel_lum_id");
	
		##equity bar calculation
		if(is_array($walletGrabberIndiv)){
			$equityBarArray = array();
			$openTradesIndiv = mysqlSelect("SELECT * FROM `sm_transactions` t
			left join sm_stocks s on t.tr_rel_stock_id = s.stock_id
			where tr_sell_price is null
			and s.stock_valid = 1 
			and t.tr_valid =1
			and t.tr_rel_sess_id = ".$sessionGrabber[0]['sess_id']." 
			and t.tr_rel_lum_id = ".$GetUser['lum_id']."");
			
			$closedTradesIndiv = mysqlSelect("SELECT * FROM `sm_transactions` t
			left join sm_stocks s on t.tr_rel_stock_id = s.stock_id
			where tr_sell_price is not null
			and s.stock_valid = 1 
			and t.tr_valid =1
			and t.tr_rel_sess_id = ".$sessionGrabber[0]['sess_id']." 
			and t.tr_rel_lum_id = ".$GetUser['lum_id']."");
			
			$closedTradeEquityIndiv= 0 ;
			if(is_array($closedTradesIndiv)){
				foreach($closedTradesIndiv as $closedTradeIndiv){
					$closedTradeEquityIndiv += ($closedTradeIndiv['tr_sell_price'] - $closedTradeIndiv['tr_buy_price']) * $closedTradeIndiv['tr_qty'];
				}
			}
			$allocatedMoney = 0;
			$profitOpenTrade = 0;
			if(is_array($openTradesIndiv)){
				foreach($openTradesIndiv as $openTrade){
					$allocatedMoney += $openTrade['tr_qty'] *$openTrade['tr_buy_price'];
					$profitOpenTrade += ($openTrade['tr_qty'] * $openTrade['stock_price_'.$sessionUpdateNumber]) - ($openTrade['tr_qty'] * $openTrade['tr_buy_price']);
					
				}
			}
			
		
			
			$equityBarArrayi[0] = $walletGrabberIndiv[0]["wf_tot"] - $allocatedMoney + $closedTradeEquityIndiv;
			$equityBarArrayi[1] = $allocatedMoney;
			$equityBarArrayi[2] = $profitOpenTrade;
			
		}else{
			$equityBarArrayi = array(0,0,0);
		}
		
		$storeVal[] = array($GetUser['lum_name'],$equityBarArrayi[0]+$equityBarArrayi[1]+$equityBarArrayi[2]	);
		
			}
			}#session grabber
			else{$storeVal[] = array("Session Ended","0"	);}
		}#get users

			# get a list of sort columns and their data to pass to array_multisort
			$sort = array();
			foreach($storeVal as $k=>$v) {
			$sort[0][$k] = $v[0];
			$sort[1][$k] = $v[1];
			}
			# sort by event_type desc and then title asc
			array_multisort($sort[1], SORT_DESC, $sort[0], SORT_ASC,$storeVal);
			foreach($storeVal as $storeVa){
				
					echo '<tr>
						<td>'.$storeVa[0].'</td>
						<td>'.number_format(round(($storeVa[1])),2).'</td>
					</tr>';
			}
			
}#post
#
if(isset($_POST['getNewsUpdate'])){
			if(is_array($sessionGrabber)){
		$limited = 1;
$sql = "SELECT * from sm_news where nw_valid =1 and nw_up_pos = ".$sessionUpdateNumber." order by nw_id DESC LIMIT  ".$limited;
$result = mysqlSelect($sql);

if (is_array($result)) {
    // output data of each row
	$co = 1;
    foreach($result as $row) {
		if($co == 1){
			$badger = '<span class="label label-success fli_go_a_5_S">NEW</span>';
		}else{
			$badger = '';
		}
        ?>
        <tr>
                        <td><?php echo $row['nw_text'] ; ?></td>
                        <td><?php echo date('h:i A',($sessionGrabber[0]["sess_from"]+ (120*(1-$sessionUpdateNumber)))) ?></td>
                        <td><?php echo $badger ?></td>
        </tr>
        <?php
		$co++;
    }
} else {
    ?>
    
  <tr><td colspan="3">No News Found</td></tr>  
    <?php
}



			}
}
#
if(isset($_POST['getTablePortfolioUpdate'])){
		if(is_array($sessionGrabber)){

$stocksData = mysqlSelect("SELECT * FROM `sm_transactions` t 
left join sm_stocks s on t.tr_rel_stock_id = s.stock_id 
WHERE 
s.stock_valid = 1 
and t.tr_valid =1
and t.tr_rel_sess_id = ".$sessionGrabber[0]['sess_id']." 
and t.tr_rel_lum_id = ".$USER_ARRAY['lum_id']."
order by  t.tr_sell_price");
											if(is_array($stocksData)){
												foreach($stocksData as $stock){
													$sk_name = $stock['stock_name'];
													$sk_img = $stock['stock_img_src'];
													$sk_open = $stock['tr_buy_price'];
													$sk_bid = $stock['tr_sell_price'];
													
													$row_bg = "background-color: rgba(148,148,148,1.00); color: white";
													$closedorno = "TRADE CLOSED";

													if($stock['tr_sell_price'] == null){
														$row_bg = "color: grey;";
														$sk_bid = $stock['stock_price_'.$sessionUpdateNumber];
														$closedorno = "-";

													}
																											
													if($sk_bid > $sk_open){
														$description = array("green","fa fa-caret-up");
													} else if($sk_bid < $sk_open){
														$description = array("red","fa fa-caret-down");
													}else{
														$description = array("grey","");
													}

													?>
	<tr onClick="window.location='stock_single.php?id=<?php echo md5($stock['stock_id']); ?>'" style=" cursor:alias; <?php echo $row_bg ?>">
		<td>
			<div class="row" >
				<div class="col-xs-3" >
					<img src="<?php echo $sk_img; ?>" class=" img-responsive" width="60px">
				</div>
				<div align="left" class="col-xs-9">
					<strong><?php echo $sk_name ;?></strong><br>
					<p style="color:rgba(255,232,28,1.00) "><?php echo $closedorno ?></p>
				</div>
			</div>
		</td>
		<td>
				<?php echo number_format(round($stock['tr_qty'],2),2); ?>
		</td>
		<td>
				<?php echo number_format(round($sk_open,2),2); ?>
		</td>
		<td>
				<?php echo number_format(round($sk_bid,2),2); ?>
		</td>
		<td>
				<?php echo number_format(round(($sk_open * $stock['tr_qty'] ),2),2); ?>
		</td>
		<td style="color:<?php echo $description[0] ?>">
				<?php echo number_format(round((($sk_bid) * $stock['tr_qty'] ),2),2); ?>
		</td>
		<td style="color:<?php echo $description[0] ?>">
				<?php echo number_format(round((($sk_bid-$sk_open) * $stock['tr_qty'] ),2),2); ?>
		</td>
   
	</tr>
											
													<?php
												}
											}
}
#
}
#
if(isset($_POST['getEquityUpdate'])){
		if(is_array($sessionGrabber)){
			
			
			
			?>
                            <div class="col-md-3"  style="border-left: solid #000 1px;">
                    <h3>Rs. <?php echo number_format(round($equityBar[0],2),2); ?></h3>
                    <p>AVAILABLE</p>
                </div>
                <div class="col-md-3"  style="border-left: solid #000 1px;">
                    <h3>Rs. <?php echo number_format(round($equityBar[1],2),2); ?></h3>
                    <p>TOTAL ALLOCATED</p>
                </div>
                <div class="col-md-3"  style="border-left: solid #000 1px;">
                    <h3>Rs. <?php echo number_format(round($equityBar[2],2),2); ?></h3>
                    <p>PROFIT</p>
                </div>
                <div class="col-md-3"  style="border-left: solid #000 1px;">
                    <h3>Rs. <?php echo number_format(round(($equityBar[0] + $equityBar[1] + $equityBar[2]),2),2); ?></h3>
                    <p>EQUITY</p>
                </div>


            <?php
			
			
			
			
		}
}
#
if(isset($_POST['getTableMarketUpdate'])){
		if(is_array($sessionGrabber)){

		$stocksData = mysqlSelect("select * from sm_stocks where stock_valid =1");
												if(is_array($stocksData)){
													foreach($stocksData as $stock){
														$sk_name = $stock['stock_name'];
														$sk_img = $stock['stock_img_src'];
														$sk_open = $stock['stock_price_1'];
														$sk_bid = $stock['stock_price_'.$sessionUpdateNumber];
														$sk_url = "stock_single.php?id=".md5($stock['stock_id']);

														if($sk_bid > $sk_open){
															$description = array("green","fa fa-caret-up");
														} else if($sk_bid < $sk_open){
															$description = array("red","fa fa-caret-down");
														}else{
															$description = array("grey","");
														}

														?>
        <tr style="cursor:alias" onClick="window.location='<?php echo $sk_url; ?>'">
            <td>
            	<div class="row" >
                	<div class="col-xs-3" >
                    	<img src="<?php echo $sk_img; ?>" class=" img-responsive" width="60px">
					</div>
                    <div align="left" class="col-xs-9">
                    	<strong><?php echo $sk_name ;?></strong><br>
                        <p>-</p>
                    </div>
                </div>
            </td>
            <td>
					<?php echo number_format(round($sk_open,2),2); ?>
			</td>
            <td>
					<?php echo number_format(round($sk_bid,2),2); ?>
                </a>
            </td>
            <td align="left">
                    <em style="color:<?php echo $description[0]; ?>;">
                        <i class="<?php echo $description[1]; ?>" style="color:<?php echo $description[0]; ?>;">
                             
                        </i>
                        <?php echo number_format(round($sk_bid-$sk_open,2),2) ; ?> <br>
                        (<?php echo number_format(round(((($sk_bid-$sk_open)*100)/($sk_open)),2),2) ; ?>%)
                    </em>
			</td>
       
        </tr>
                                                
                                                        <?php
													}
												}
											
                                                

}
#
}
#
if(isset($_POST['getStockTrades'])){
	if(!ctype_alnum($_POST['getStockTrades'])){
		die("Invalid Stock");
	}

if(is_array($sessionGrabber)){
	$stockSingle = mysqlSelect("select * from sm_stocks where stock_valid =1 and md5(stock_id) = '".$_POST['getStockTrades']."'");
	if(!is_array($stockSingle)){
		die("Stock not Found");
	}

		if(is_array($stockSingle)){
			foreach($stockSingle as $stock){

											$stocksData = mysqlSelect("SELECT * FROM `sm_transactions` t 
left join sm_stocks s on t.tr_rel_stock_id = s.stock_id 
WHERE 
s.stock_valid = 1 
and t.tr_valid =1
and t.tr_rel_sess_id = ".$sessionGrabber[0]['sess_id']." 
and t.tr_rel_lum_id = ".$USER_ARRAY['lum_id']."
and t.tr_rel_stock_id = '".$stockSingle[0]["stock_id"]."'
order by  t.tr_sell_price");
												if(is_array($stocksData)){
													foreach($stocksData as $stock){
														$sk_name = $stock['stock_name'];
														$sk_img = $stock['stock_img_src'];
														$sk_open = $stock['tr_buy_price'];
														$sk_bid = $stock['tr_sell_price'];
														
														$row_bg = "background-color: rgba(148,148,148,1.00); color: white";
														$closedorno = "TRADE CLOSED";

														if($stock['tr_sell_price'] == null){
															$row_bg = "color: grey;";
															$sk_bid = $stock['stock_price_'.$sessionUpdateNumber];
															$closedorno = "-";

														}
																												
														if($sk_bid > $sk_open){
															$description = array("green","fa fa-caret-up");
														} else if($sk_bid < $sk_open){
															$description = array("red","fa fa-caret-down");
														}else{
															$description = array("grey","");
														}

														?>
        <tr style=" <?php echo $row_bg ?>">
            <td>
            	<div class="row" >
                	<div class="col-xs-3" >
                    	<img src="<?php echo $sk_img; ?>" class=" img-responsive" width="60px">
					</div>
                    <div align="left" class="col-xs-9">
                    	<strong><?php echo $sk_name ;?></strong><br>
                        <p style="color:rgba(255,232,28,1.00) "><?php echo $closedorno ?></p>
                    </div>
                </div>
				<?php if(is_null($stock['tr_sell_price'])){ ?>
                <div class="row">
                	<form action="ClientController.php" method="post">
                    	<input type="hidden" value="<?php echo md5($stock['tr_id']) ?>" name="trade_close" />
                        <button type="submit" class="btn btn-danger"> Close Trade</button>
                    </form>
                </div>
                <?php } ?>
            </td>
            <td>
					<?php echo number_format(round($stock['tr_qty'],2),2); ?>
            </td>
            <td>
					<?php echo number_format(round($sk_open,2),2); ?>
            </td>
            <td>
					<?php echo number_format(round($sk_bid,2),2); ?>
            </td>
            <td>
					<?php echo number_format(round(($sk_open * $stock['tr_qty'] ),2),2); ?>
            </td>
            <td style="color:<?php echo $description[0] ?>">
					<?php echo number_format(round((($sk_bid) * $stock['tr_qty'] ),2),2); ?>
            </td>
            <td style="color:<?php echo $description[0] ?>">
					<?php echo number_format(round((($sk_bid-$sk_open) * $stock['tr_qty'] ),2),2); ?>
            </td>
       
        </tr>
                                                
                                                        <?php
													}
												}
			}
		}#
}
}
#
if(isset($_POST['getStockLive'])){
	if(!ctype_alnum($_POST['getStockLive'])){
		die("Invalid Stock");
	}
	
if(is_array($sessionGrabber)){
	$stockSingle = mysqlSelect("select * from sm_stocks where stock_valid =1 and md5(stock_id) = '".$_POST['getStockLive']."'");
	if(!is_array($stockSingle)){
		die("Stock not Found");
	}
	
	
	
	
												if(is_array($stockSingle)){
													foreach($stockSingle as $stock){
														$sk_name = $stock['stock_name'];
														$sk_img = $stock['stock_img_src'];
														$sk_open = $stock['stock_price_1'];
														$sk_bid = $stock['stock_price_'.$sessionUpdateNumber];
														$sk_url = "stock_single.php?id=".md5($stock['stock_id']);

														if($sk_bid > $sk_open){
															$description = array("green","fa fa-caret-up");
														} else if($sk_bid < $sk_open){
															$description = array("red","fa fa-caret-down");
														}else{
															$description = array("grey","");
														}

														?>
        <tr>
            <td>
        <a  href="<?php echo $sk_url; ?>">
            	<div class="row" >
                	<div class="col-xs-3" >
                    	<img src="<?php echo $sk_img; ?>" class=" img-responsive" width="60px">
					</div>
                    <div align="left" class="col-xs-9">
                    	<strong><?php echo $sk_name ;?></strong><br>
                        <p>-</p>
                    </div>
                </div>
         </a>
            </td>
            <td>
        <a  href="<?php echo $sk_url; ?>">
					<?php echo number_format(round($sk_open,2),2); ?>
                </a>
			</td>
            <td>
        <a  href="<?php echo $sk_url; ?>">
					<?php echo number_format(round($sk_bid,2),2); ?>
                </a>
            </td>
            <td align="left">
        <a  href="<?php echo $sk_url; ?>">
                    <em style="color:<?php echo $description[0]; ?>;">
                        <i class="<?php echo $description[1]; ?>" style="color:<?php echo $description[0]; ?>;">
                             
                        </i>
                        <?php echo number_format(round($sk_bid-$sk_open,2),2) ; ?> <br>
                        (<?php echo number_format(round(((($sk_bid-$sk_open)*100)/($sk_open)),2),2) ; ?>%)
                    </em>
			</a>
			</td>
       
        </tr>
                                                
                                                        <?php
													}
												}
	
	
}



#
}
#
?>

