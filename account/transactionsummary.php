<?php

	require_once("../includes/_handledatabase.inc");
	require_once("../includes/pathfiles.inc");
	if($_SESSION['permgrant']==false)
	{
		header("location:../index.php");
	}
	
	$dabasehandle=new _handledatabase();
	$dabasehandle->_connectHost();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="Web Designing, software development, and computer & accessories selling Company, Sri Lanka, Resilience Information Solutions (pvt) Limited is a software development, Web Designing, and computer selling Company company which is operating offices in Sri Lanka, France and Australia . It was founded in 2012 with the aim of supplying high quality software products and services, hardware and network services and accessories sales to its clients. Today, Resilience Information Solutions is an Application and Service provider for Financial, Logistics Management and Enterprise markets.">

<meta name="keywords" content="Web Designing , software development, and computer & accessories selling Company, Sri Lanka, Rapid Solutions (pvt) Limited, rapdsol.com, Resilience Information Solutions pvt ltd, Info, Software, Software Development, Hardware, Network, Hardware &amp; Network, Hardware &amp; network accessories sales, Web, Web Designing.">
<link rel="icon" href="images/logo-gmail.jpg" title="RESILIENCE INFORMATION SOLUTIONS" />
<title>Resilience POS System</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>

</head>

<body>
<div id="main-container">
    <div class="row-container">
        <?php require("../header.php"); ?>
    </div>
    <div class="row-container">
    	<div id="left-column">
            <a href="../main.php"><div class="side-menu"><img src="../images/side-menu/dash.png" width="100%" height="100%"/>
            <div class="side-text">
            Dashboard
            </div></div></a>
            <a href="../transaction/index.php"><div class="side-menu"><img src="../images/side-menu/trans.png" width="100%" height="100%"/>
            <div class="side-text">
            Transactions
            </div></div></a>
            <a href="../new-entries/index.php"><div class="side-menu"><img src="../images/side-menu/ent.png" width="100%" height="100%"/>
        	<div class="side-text">
            New Entries
            </div></div></a>
            <a href="../stock/index.php"><div class="side-menu"><img src="../images/side-menu/stk.png" width="100%" height="100%"/>
            <div class="side-text">
            Stock
            </div></div></a>
            <a href="../invoice/index.php"><div class="side-menu"><img src="../images/side-menu/in.png" width="100%" height="100%"/>
          	<div class="side-text">
            Invoice
            </div></div></a>
            <a href="../quatation/index.php"><div class="side-menu"><img src="../images/side-menu/qus.png" width="100%" height="100%"/>
          	<div class="side-text">
            Quatation
            </div></div></a>
            <a href="../purchase/index.php"><div class="side-menu"><img src="../images/side-menu/qus.png" width="100%" height="100%"/>
          	<div class="side-text">
            Purchase
            </div></div></a>
            <a href="../account/index.php"><div class="side-menu"><img src="../images/side-menu/acc.png" width="100%" height="100%"/>
          	<div class="side-text">
            Account
            </div></div></a>
            <a href="../report/index.php"><div class="side-menu"><img src="../images/side-menu/grn.png" width="100%" height="100%"/>
          	<div class="side-text">
            Report
            </div></div></a>
        </div>
        <div id="right-column">
        	<div class="main-text-container">
                <div class="row-container" style="width:96%; margin:0% auto; background:#e7ecf0;">
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <tr>
                    <th width="15%" align="center">Date</th>
                    <th width="20%" align="center">Description</th>
                    <th width="20%" align="right">DEBBIT (Rs.)</th>
                    <th width="15%" align="right">CREDIT (Rs.)</th>
                    <!--<th width="15%" align="right">BALANCE (Rs.)</th>!-->
                  </tr>
                </table>
                </div>
                
                <!-- row for the entry retrieve !-->
                 <div class="row-container" style="width:96%; margin:0.5% auto; background:#e7ecf0;">
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <?php
				  	$totalincome=0;
					$totalexpence=0;
					$currentexpence=0;
					$currentincome=0;
				  	$retrieveAllTransaction="SELECT * FROM _transactions ORDER BY id ASC";
					$allTransactionRecord=mysql_query($retrieveAllTransaction);
					$countAllTranction=mysql_num_rows($allTransactionRecord);
					if($countAllTranction>0)
					{
						while($allTransactionData=mysql_fetch_array($allTransactionRecord))
						{
							if($allTransactionData['catagory']==1)
							{
								$totalincome+=$allTransactionData['amount'];
							}
							elseif($allTransactionData['catagory']==2)
							{
								$totalexpence+=$allTransactionData['amount'];
							}
				?>
                		<tr style="color:#<?php if($allTransactionData['catagory']==1){?>060<?php }elseif($allTransactionData['catagory']==2){ ?>900<? } ?>">
                            <td><?php echo $allTransactionData['transactiondate']; ?></td>
                            <td><?php echo $allTransactionData['description']; ?></td>
                            <td align="right"><?php if($allTransactionData['catagory']==2){echo number_format($allTransactionData['amount'],2,".",","); $currentexpence=$allTransactionData['amount'];} ?></td>
                            
                            <td align="right"><?php if($allTransactionData['catagory']==1){echo number_format($allTransactionData['amount'],2,".",","); $currentincome=$allTransactionData['amount'];} ?></td>
                           <!-- <td style="color:#000; text-align:right">
                            	<?php
									
									//$totalbalance=$currentincome-$currentexpence;	
									//echo number_format($totalbalance,2,".",",");
								?>
                            </td>!-->
                            
                      </tr>
                <?php
						}
					}
				  ?>
                  <tr>
                  	<th colspan="2" style="color:#060;text-align:right;">
                    	CARRIED FORWARD(Rs.)
                    </th>
                    <th align="left" style="color:#060; text-align:right;">
                    	<?php echo number_format(($totalincome-$totalexpence),2,".",","); ?>
                    </th>
                  </tr>
                  <tr>
                  	<th colspan="2" style="color:#060; border-top:solid 1px #000;border-bottom:solid 1px #000; text-align:right;">
                    	TOTAL(Rs.)
                    </th>
                    <th align="left" style="color:#060; border-top:solid 1px #000;border-bottom:solid 1px #000; text-align:right;">
                    	<?php echo number_format($totalincome,2,".",","); ?>
                    </th>
                    <th align="left" style="color:#060; border-top:solid 1px #000;border-bottom:solid 1px #000; text-align:right;">
                    	<?php echo number_format($totalincome,2,".",","); ?>
                    </th>
                  </tr>
                  <tr>
                  	<th colspan="2" style="color:#060;text-align:right; text-align:right;">
                    	BROUGHT FORWARD(Rs.)
                    </th>
                    <th></th>
                    <th align="left" style="color:#060; text-align:right;">
                    	<?php echo number_format(($totalincome-$totalexpence),2,".",","); ?>
                    </th>
                  </tr>
                  
                </table>
                </div>
                <!-- end row of the entry retrieve !-->
                </div>
			</div>
        </div>
    </div>  
<!-- end of main container!-->    
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>