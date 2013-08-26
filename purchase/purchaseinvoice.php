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
                <form name="purchasecheques" method="post" action="purchaseinvoice.php">
                        	
                    <div class="system-left-column">
                    	<div class="rows">
                        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                            	<tr>
                                	<th>
                                    	Invoice ID
										<?php
											$da=date('d');
											$mo=date('m');
											$yr=date('y');
											$ivid='PIV'.$mo.$da.$yr;
										?>
                                    </th>
                                    <td>
                                    	<input type="text" name="invoiceid" value="<?php $orddate=date('d'.'/'.'m'.'/'.'Y'); echo $dabasehandle->_newGeneration("SELECT COUNT(id) AS id from _purchaseinvoice WHERE invoicedate='$orddate'","$ivid","id"); ?>" class="s-textbox" />
                                    </td>
                                </tr>
                                <tr>
                                	<th>
                                    	Description
                                    </th>
                                    <td>
                                    	<input type="text" name="description" value="" class="s-textbox" />
                                    </td>
                                </tr>
                                <tr>
                                	<th>
                                    	Total Amount
                                    </th>
                                    <td>
                                    	<input type="text" name="totalamount" value="" class="s-textbox" />
                                    </td>
                                </tr>
                                <tr>
                                	<th>
                                    	Payment Type
                                    </th>
                                    <td>
                                    	<select name="paymenttype" class="s-textbox">
                                        	<option value="0">-Select-</option>
                                            <option value="1">Cheque</option>
                                            <option value="2">Cash</option>
                                            <option value="3">Credit</option>
                                        </select>
                                    	
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
                                    	Invoice Date
                                    </th>
                                    <td>
                                    	<input type="date" name="invoicedate" value="<?php echo date('d'.'/'.'m'.'/'.'Y'); ?>" class="s-textbox" />
                                    </td>
                                </tr>
                                <tr>
                                	<th>
                                    	Receipt Number (s)
                                    </th>
                                    <td>
                                    	<input type="text" name="receiptnumber" value="" class="s-textbox" />
                                    </td>
                                </tr>
                                <tr>
                                	<th>
                                    	Over Due starts on
                                    </th>
                                    <td>
                                    	<input type="date" name="Overduedate" value="<?php echo date('d'.'/'.'m'.'/'.'Y'); ?>" class="s-textbox" />
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
                    	<?php
							
						?>
                 </div>
            	<div class="row-container" style="width:100%; margin:0% auto; background:#e7ecf0;">
                	<form name="newcheque" method="post" action="purchaseinvoice.php">
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">
                      <tr style="color:#333; font-weight:normal;">
                        <th align="center">No</th>
                        <th align="center">Cheque No</th>
                        <th align="center">Cheque Date</th>
                        <th align="center">Amount</th>
                        <th align="center">Type</th>
                        <th align="center">Action</th>
                        
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class="s-textbox" type="text" name="chequeno" value="" />
                        <input class="s-textbox" type="hidden" name="action" value="" /></td>
                        <td><input class="s-textbox" type="date" name="chequedate" value="" /></td>
                        <td><input class="s-textbox"type="text" name="amount" value="" /></td>
                        <td>
                            <select class="s-textbox" name="chequetype">
                               <option value="1">Cross</option>
                               <option value="2">Cash</option>
                            </select>
                        </td>
                        <td><input type="submit" name="btnadd" class="save-btn" value=""/></td>
                        <td></td>
                      </tr>
                    </table>
                    </form>
                </div>
                <div class="row-container" style="width:100%; margin:1% auto; background:#e7ecf0;">
                    nex table 
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