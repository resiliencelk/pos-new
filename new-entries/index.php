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
        	<div class="main-text-container">
                <div class="row-container" style="padding:0% 12% 0% 12%; width:76%;">
                <a href="newsuppilier.php" class="system-item-box"><img src="../images/new-entry/supplier.png" width="100%" style="border-radius:5px;"/></a>
                <a href="newitem.php" class="system-item-box"><img src="../images/new-entry/item.png" width="100%" style="border-radius:5px;"/></a>
                <a href="newcustomer.php" class="system-item-box"><img src="../images/new-entry/customer.png" width="100%" style="border-radius:5px;"/></a>
                <a href="brands.php" class="system-item-box"><img src="../images/new-entry/itemtype.png" width="100%" style="border-radius:5px;"/></a>
                <a href="brands.php" class="system-item-box"><img src="../images/new-entry/brands.png" width="100%" style="border-radius:5px;"/></a>
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