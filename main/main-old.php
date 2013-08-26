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
<style>
/* DEMO 5 */

.wrapper-dropdown {
    /* Size & position */
	float:left;
    position: relative;
    width: 93%;
    padding: 12px 15px;
	color:#008592;
	font-size:18px;
    /* Styles */
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 1px 0 rgba(0,0,0,0.2);
    cursor: pointer;
    outline: none;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
}

.wrapper-dropdown:after { /* Little arrow */
    content: "";
    width: 0;
    height: 0;
    position: absolute;
    top: 50%;
    right: 15px;
    margin-top: -3px;
    border-width: 6px 6px 0 6px;
    border-style: solid;
    border-color: #4cbeff transparent;
}

.wrapper-dropdown .dropdown {
    /* Size & position */
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;

    /* Styles */
    border-radius: 0 0 5px 5px;
    border-top: none;
    border-bottom: none;
    list-style: none;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;

    /* Hiding */
    max-height: 0;
    overflow: hidden;
}

.wrapper-dropdown .dropdown li {
    padding: 0;
}

.wrapper-dropdown .dropdown li a {
    display: block;
    text-decoration: none;
    padding: 0;
    transition: all 0.3s ease-out;
}

.wrapper-dropdown .dropdown li:last-of-type a {
    border: none;
}

.wrapper-dropdown .dropdown li i {
    color: inherit;
    vertical-align: middle;
}

/* Hover state */

.wrapper-dropdown .dropdown li:hover a {
    color: #57a9d9;
}

/* Active state */

.wrapper-dropdown.active {
    border-radius: 5px 5px 0 0;
    background: #4cbeff;
    box-shadow: none;
    border-bottom: none;
    color: white;
}

.wrapper-dropdown.active:after {
    border-color: #82d1ff transparent;
}

.wrapper-dropdown.active .dropdown {
    max-height: 500px;
}

/* No CSS3 support: none */

</style>
<!-- jQuery if needed -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">

			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown').removeClass('active');
				});

			});

		</script>
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
    <td width="13%"><img src="../images/act.png" /></td>
    <td width="87%">Activities</td>
  </tr>
</table>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="row-container">
                        <div class="wrapper-dropdown" id="dd" tabindex="1">Price Activity
                            <ul class="dropdown" >
                                <li>
                                    <a href="#">
                                        <div class="drop-menu">
                                            <a href="../dashboard/pricelist.php">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15%"><img src="../images/price.png" /></td>
                                                        <td width="85%"><div class="system-heading">Price List</div></td>
                                                    </tr>
                                                </table>
                                            </a>	
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="drop-menu">
                                            <a href="../dashboard/chageprice.php">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15%"><img src="../images/chg-pr.png" /></td>
                                                        <td width="85%"><div class="system-heading">Chage Price</div></td>
                                                    </tr>
                                                </table>
                                            </a>	
                                    	</div>
                                    </a>
                                </li>
                            </ul>
                            <!-- end of wrapper-dropdown!-->
						</div>
                        <!-- end of row-container!-->
                    </div>
                    <div class="row-container">
                        <div class="reminder" >
                        	<div class="system-heading" style="text-align:center; border-bottom:1px dashed #CCC; margin-bottom:3px;">Reminders</div>
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
                        </div>
                    </div>
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