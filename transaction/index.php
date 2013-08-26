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
<script language="javascript" type="text/javascript">
function delete_records()
{
	answer = confirm("Are you sure want to delete this transaction permenantly...?")

	if (answer=="0")
	{
		return false;
	}
	return true;
}
</script>
</head>

<body>
<div id="main-container">
    <div class="row-container">
        <?php require("../header.php"); ?>
    </div>
    <div class="row-container">
    	<div id="left-column">
            <?php require("../menu.php"); ?>
        </div>
        <div id="right-column">
        	<div class="main-text-container">
            	<?php
					if(isset($_POST['addincome']) || isset($_POST['addexpence']))
					{
						
						if(isset($_POST['id'])){$id=$_POST['id'];}
						if(isset($_POST['date'])){$date=$_POST['date'];}
						if(isset($_POST['description'])){$description=$_POST['description'];}
						if(isset($_POST['amount'])){$amount=$_POST['amount'];}
						if(isset($_POST['category'])){$category=$_POST['category'];}
						if(isset($_POST['account'])){$account=$_POST['account'];}
						if(($id=="")||($id==0))
						{
						echo $dabasehandle->_recordInsertion("INSERT INTO _transactions(transactiondate,description,amount,catagory,account)VALUES('$date','$description','$amount','$category','$account')","ADDED","ERROR");
						}
						else
						{
							echo $dabasehandle->_recordInsertion("UPDATE _transactions SET transactiondate='$date',description='$description',amount='$amount',catagory='$category',account='$account' WHERE id='$id'","UPDATED","ERROR");
						}
					}
				?>
            	<form name="transaction" method="post" action="index.php">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:20px;">
                <tr>
                    <td width="50%">
                    <div class="row-container">
                	<div class="system-heading">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td width="60" align="right"><img src="../images/trns.png" /></td>
                    <td align="left">&nbsp;&nbsp;&nbsp;Transaction </td>
                    </tr>
                    </table>
                    </div>
                </div>
                    </td>
                    <td width="25%"><input type="submit" name="addincome" class="income" style="background:#090;" value="<?php if(isset($_GET['transactionid'])&&(isset($_GET['catagory']))&& ($_GET['catagory']==1)){ echo "UPDATE INCOME";}else{?>ADD INCOME<?php } ?>" <?php if(isset($_GET['catagory'])&&($_GET['catagory']==2)){?>disabled="disabled"<?php } ?>/></td>
                    <td width="25%"><input type="submit" name="addexpence" class="income" value="<?php if(isset($_GET['transactionid'])&&(isset($_GET['catagory']))&&($_GET['catagory']==2)){ echo "UPDATE EXPENCE";}else{?>ADD EXPENCE<?php } ?>" <?php if(isset($_GET['catagory'])&& ($_GET['catagory']==1)){?>disabled="disabled"<?php } ?> /></td>
                </tr>
                </table>
                <div class="row-container" style="width:96%; margin:0% auto; background:#e7ecf0;">
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <tr style="color:#333; font-weight:normal;">
                    <th width="15%" align="center">Date</th>
                    <th width="20%" align="center">Description</th>
                    <th width="20%" align="center">Amount (Rs.)</th>
                    <th width="15%" align="center">Category</th>
                    <th width="20%" align="center">Account</th>
                    <th width="10%" align="center">Action</th>
                  </tr>
                  <tr>
                    <td><input class="s-textbox" type="hidden" name="id" value="<?php if(isset($_GET['transactionid'])){ echo $_GET['transactionid'];} ?>" /><input class="s-textbox" type="date" name="date" value="<?php if(isset($_GET['transactionid'])){ echo $dabasehandle->_getInfo("SELECT transactiondate FROM _transactions WHERE id='".$_GET['transactionid']."'","transactiondate");} ?>" /></td>
                    <td><input class="s-textbox"type="text" name="description" value="<?php if(isset($_GET['transactionid'])){ echo $dabasehandle->_getInfo("SELECT description FROM _transactions WHERE id='".$_GET['transactionid']."'","description");} ?>" /></td>
                    <td><input class="s-textbox"type="text" name="amount" value="<?php if(isset($_GET['transactionid'])){ echo $dabasehandle->_getInfo("SELECT amount FROM _transactions WHERE id='".$_GET['transactionid']."'","amount");} ?>" /></td>
                    <td><select class="s-textbox" name="category"><option value="0" selected="selected">-Select-</option>
                    <option value="1" <?php if(isset($_GET['transactionid'])){ $cata=$dabasehandle->_getInfo("SELECT catagory FROM _transactions WHERE id='".$_GET['transactionid']."'","catagory"); if($cata==1){?> selected="selected"<?php }} ?>>Income</option>
                    <option value="2" <?php if(isset($_GET['transactionid'])){ $cata=$dabasehandle->_getInfo("SELECT catagory FROM _transactions WHERE id='".$_GET['transactionid']."'","catagory"); if($cata==2){?> selected="selected"<?php }} ?>>Expence</option></select></td>
                    <td><select class="s-textbox" name="account"><option value="0" selected="selected">-Select-</option><option value="1" <?php if(isset($_GET['transactionid'])){ $cata=$dabasehandle->_getInfo("SELECT account FROM _transactions WHERE id='".$_GET['transactionid']."'","account"); if($cata==1){?> selected="selected"<?php }} ?>>Cash</option><option value="2" <?php if(isset($_GET['transactionid'])){ $cata=$dabasehandle->_getInfo("SELECT account FROM _transactions WHERE id='".$_GET['transactionid']."'","account"); if($cata==2){?> selected="selected"<?php }} ?>>Cheque</option><option value="3" <?php if(isset($_GET['transactionid'])){ $cata=$dabasehandle->_getInfo("SELECT account FROM _transactions WHERE id='".$_GET['transactionid']."'","account"); if($cata==3){?> selected="selected"<?php }} ?>>Credit</option></select></td>
                    <td></td>
                  </tr>
                </table>
                </div>
                </form>
                <!-- row for the entry retrieve !-->
                 <div class="row-container" style="width:96%; margin:0.5% auto; background:#e7ecf0;">
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <?php
				  	$totalincome=0;
					$totalexpence=0;
				  	$retrieveAllTransaction="SELECT * FROM _transactions ORDER BY id DESC";
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
                            <td width="15%" align="center"><?php echo $allTransactionData['transactiondate']; ?></td>
                            <td width="20%" align="center"><?php echo $allTransactionData['description']; ?></td>
                            <td width="20%" align="right"><?php echo number_format($allTransactionData['amount'],2,".",","); ?></td>
                            <td width="15%" align="center"><?php if($allTransactionData['catagory']==1){ echo"Income";}elseif($allTransactionData['catagory']==2){ echo"Expence";} ?></td>
                            <td width="20%" align="center"><?php if($allTransactionData['account']==1){ echo"Cash";}elseif($allTransactionData['account']==2){ echo"Cheque";}elseif($allTransactionData['account']==3){ echo"Credit";} ?></td>
                            <td width="10%" align="center"><a href="index.php?transactionid=<?php echo $allTransactionData['id']; ?>&catagory=<?php echo $allTransactionData['catagory']; ?>"><img src="../images/edit.png" /></a>&nbsp;&nbsp;<a href="deletetransaction.php?transactionid=<?php echo $allTransactionData['id']; ?>" onclick="return delete_records();"><img src="../images/delete.png" /></a></td>
                      </tr>
                <?php
						}
					}
				  ?>
                  <tr>
                  	<th colspan="2" style="color:#060; border-top:solid 1px #000;border-bottom:solid 1px #000;">
                    	TOTAL INCOMES(Rs.)
                    </th>
                    <th align="right" style="color:#060; border-top:solid 1px #000;border-bottom:solid 1px #000;">
                    	<?php echo number_format($totalincome,2,".",","); ?>
                    </th>
                  </tr>
                  <tr>
                  	<th colspan="2" style="color:#900;border-bottom:double 1px #000;">
                    	TOTAL EXPENCES(Rs.)
                    </th>
                    <th align="right" style="color:#900;border-bottom:double 1px #000;">
                    	<?php echo number_format($totalexpence,2,".",","); ?>
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