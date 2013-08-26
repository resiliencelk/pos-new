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
            	<!-- STARTING THE ROW FOR CUSTOMER DETAILS !-->
                <div class="row-container">
                <form name="receivecheque" method="post" action="receivecheque.php">
                        	
                    <div class="system-left-column">
                    	<div class="rows">
                        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                            	<tr>
                                	<th>
                                    	Customer ID
                                    </th>
                                    <td>
                                    	<select name="customerid" class="s-textbox">
                                        	<option value="0">-Select-</option>
                                            <?php
												$retrievecustomer="SELECT customerid FROM _customers WHERE status='A'";
												$customerrecord=mysql_query($retrievecustomer);
												$countcustomer=mysql_num_rows($customerrecord);
												if($countcustomer>0)
												{
													while($customerrecord=mysql_fetch_array($customerrecord))
													{
											?>
                                            	<option value="<?php echo $customerrecord['customerid']; ?>"><?php echo $customerrecord['customerid']; ?></option>
                                            <?php
													}
												}
											?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                	<th>
                                    	Customer Name
                                    </th>
                                    <td>
                                    	<input type="text" name="customername" value="" class="s-textbox" />
                                    </td>
                                </tr>
                                <tr>
                                	<th>
                                    	Address
                                    </th>
                                    <td>
                                    	<textarea name="address" class="s-textbox"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                	<th>
                                    	Contact Number
                                    </th>
                                    <td>
                                    	<input type="text" name="contactnumber" value="" class="s-textbox" />
                                    </td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <div class="system-right-column">
                    	<div class="rows">
                        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                            	<tr>
                                	<th>
                                    	Payment Date
                                    </th>
                                    <td>
                                    	<input type="date" name="paymentdate" value="" class="s-textbox" />
                                    </td>
                                </tr>
                                
                                <tr>
                                	<th>
                                    	Receipt Number
                                    </th>
                                    <td>
                                    	<input type="text" name="receiptnumber" value="" class="s-textbox" />
                                    </td>
                                </tr>
                                <tr>
                                	<th>
                                    	Status
                                    </th>
                                    <td>
                                    	<select name="status" class="s-textbox">
                                        	<option value="S">-Select-</option>
                                            <option value="A">Active</option>
                                            <option value="P">Pending</option>
                                            <option value="D">Deleted</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- END OF THE CUSTOMER ROW !-->
            	
            	<div class="row-container">
                    	write php here
                 </div>
            	<div class="row-container" style="width:100%; margin:0% auto; background:#e7ecf0;">
                	<form name="cheque" method="post" action="issuecheque.php">
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">
                      <tr style="color:#333; font-weight:normal;">
                        <th width="4%" align="center">No</th>
                        <th width="12%" align="center">Cheque No</th>
                        <th width="12%" align="center">Cheque Date</th>
                        <th width="14%" align="center">Original Amount</th>
                        <th width="10%" align="center">Amount</th>
                        <th width="12%" align="center">Type</th>
                        <th width="12%" align="center">Bank of Cheque</th>
                        
                        <th width="12%" align="center">Review</th>
                        <th width="8%" align="center">Action</th>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class="s-textbox" type="text" name="chequeno" value="" />
                        <input class="s-textbox" type="hidden" name="action" value="" /></td>
                        <td><input class="s-textbox" type="date" name="issuedate" value="" /></td>
                        <td><input class="s-textbox" type="date" name="chequedate" value="" /></td>
                        <td><input class="s-textbox"type="text" name="payto" value="" /></td>
                        <td>
                            <select class="s-textbox" name="chequetype">
                               <option value="1">Cross</option>
                               <option value="2">Cash</option>
                            </select>
                        </td>
                        <td><input class="s-textbox" type="text" name="amount" value="" /></td>
                        <td><input class="s-textbox"type="text" name="review" value="" /></td>
                        <td><input type="submit" name="btnadd" class="save-btn" value="" <?php if(isset($_GET['action'])and($_GET['action']=="Edit")){ ?>class="editbutton"<?php }else{ ?>class="addbutton"<?php } ?> /></td>
                        <td></td>
                      </tr>
                    </table>
                    </form>
                </div>
                <div class="row-container" style="width:100%; margin:1% auto; background:#e7ecf0;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    	<?php
							$x=1;
							$receiptnumber="";
							$retireveallreceives="SELECT * FROM _receivecheques WHERE receiptnumber='$receiptnumber' ORDER BY id DESC";
							$allrecievedchequerecord=mysql_query($retireveallreceives);
							$countreceivedcheque=mysql_num_rows($allrecievedchequerecord);
							if($countreceivedcheque>0)
							{
								while($receivedchequedata=mysql_fetch_array($allrecievedchequerecord))
								{
									$status=$receivedchequedata['status'];
							?>
						<form name="chequestatus" method="post" action="issuecheque.php">
                    
                        <tr style="color:#<?php if($status==1){ echo '09F';}elseif($status==2){ echo '060';}elseif($status==3){ echo 'F90';}elseif($status==4){ echo '900';} ?>">
                        	<td width="4%" align="center"><?php echo $x; ?></td>
                            <td width="12%" align="center"><?php echo $receivedchequedata['chequeno'];?></td>
                            <td width="12%" align="center"><?php echo $receivedchequedata['chequedate'];?></td>
                            <td width="12%" align="center"><?php echo $receivedchequedata['originalamount'];?></td>
                            <td width="12%" align="center"><?php echo $receivedchequedata['amount'];?></td>
                            <td width="14%" align="right"><?php echo $receivedchequedata['chequetype'];?></td>
                            <td width="12%" align="center"><?php echo $receivedchequedata['bankofcheque'];?></td>
                            <td width="12%" align="center"><?php echo $receivedchequedata['review'];?></td>
                        	<td width="14%" align="right">
                            		<input type="hidden" name="chequeid" value="<?php echo $receivedchequedata['chequeno'];?>" />
                                    <select class="s-textbox" name="status">
                                        <option value="1" <?php if($receivedchequedata['status']==1){?>selected="selected" <?php } ?>>Pending</option>
                                        <option value="2" <?php if($receivedchequedata['status']==2){?>selected="selected" <?php } ?>>Passed</option>
                                        <option value="3" <?php if($receivedchequedata['status']==3){?>selected="selected" <?php } ?>>Stop</option>
                                        <option value="4" <?php if($receivedchequedata['status']==4){?>selected="selected" <?php } ?>>Return</option>
                                    </select>
                        		</td>
                                <td width="20%" align="right"><input type="submit" name="updatereceives" value="" style="background:url(../images/setting.png);" /></td>
                                
                            <td width="10%" align="center"><a href="receivecheque.php?chequeno=<?php echo $receivedchequedata['chequeno']; ?>&action=Edit"><img src="../images/edit.png" /></a>&nbsp;&nbsp;<a href="deletereceives.php?chequeno=<?php echo $receivedchequedata['chequeno']; ?>" onclick="return delete_records();"><img src="../images/delete.png" /></a></td>
                      
                        </tr>
                        </form>
                        <?php
								$x++;
								}
							}
						?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>