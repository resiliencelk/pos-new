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
            <?php require("../menu.php"); ?>
        </div>
        <div id="right-column">
        <!-- start right-column!-->
            <div class="main-text-container">
                <div class="dash-left-column">
                	<div class="row-container">
                        <div class="system-heading" style="border-bottom:1px dashed #CCCCCC; margin-bottom:10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="43%" align="right"><img src="../images/act.png" /></td>
                            <td width="57%">&nbsp;&nbsp;Activities</td>
                          </tr>
                        </table>
                        </div>
                    </div>
                    <div class="row-container" style="background:#e7ecf0; padding:2%; width:96%; box-shadow: 
0 10px 10px -10px #555;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="48%" align="left">
                            <div class="drop-menu">
                                <a href="../dashboard/pricelist.php">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="15%"><img src="../images/price.png" /></td>
                                            <td width="85%">Price List</td>
                                        </tr>
                                    </table>
                                </a>	
                            </div>
                        </td>
                        <td width="48%" align="right">
                            <div class="drop-menu">
                                <a href="../dashboard/changeprice.php">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="15%"><img src="../images/chg-pr.png" /></td>
                                            <td width="85%">Change Price</td>
                                        </tr>
                                    </table>
                                </a>	
                            </div>
                        </td>
                      </tr>
                    </table>
                    </div>
                        <!-- end of row-container!-->
                    <div class="row-container">
                        <div class="reminder">
                        	<div class="system-heading" style="text-align:center; border-bottom:1px dashed #CCC; margin-bottom:3px;">
                            Cheque Reminders
                            </div>
                            <div class="reminder-text" id="style-3" style="overflow-y:scroll;">
                                <div class="click">
                                	Display here
                                </div>
                                <div class="click">
                                	Display here
                                </div>
                                <div class="click">
                                	Display here
                                </div>
                                <div class="click">
                                	Display here
                                </div>
                            </div>
                            <!-- end of reminder!-->
                        </div>
                        <!-- end of row container!-->
                    </div>
                    <div class="row-container" style="margin-top:10px;box-shadow:0 10px 10px -10px #555;">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><div class="over-due-ex">over due (Expense)</div></td>
                            <td><div class="over-due-in">over due (Income)</div></td>
                          </tr>
                          <tr>
                            <td>
                            <div class="over-due-text" id="style-3" style="overflow-y:scroll;">
                                <div class="text">
                                	Display here
                                </div>
                                <div class="text">
                                	Display here
                                </div>
                                <div class="text">
                                	Display here
                                </div>
                                <div class="text">
                                	Display here
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="over-due-text" id="style-3" style="overflow-y:scroll;">
                                <div class="text">
                                	Display here
                                </div>
                                <div class="text">
                                	Display here
                                </div>
                                <div class="text">
                                	Display here
                                </div>
                                <div class="text">
                                	Display here
                                </div>
                            </div>
                            </td>
                          </tr>
                        </table>
                    </div>
                    <!-- end of dash-left-colum!-->
                </div>
                <div class="dash-right-column">
                </div>
            </div>
        <!-- end of right-column!-->    
        </div>
    </div>
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>