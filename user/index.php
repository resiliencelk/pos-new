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
            	<div class="row-container">
                	<div class="system-left-column">
                    	<div class="row-container">
                        	<div class="system-text">
                            Full Name
                            </div>
                            <div class="system-textbox">
                            <input type="text" name="fullname" class="s-textbox" />
                            </div>
                        </div>
                        <div class="row-container">
                        	<div class="system-text">
                            User Name
                            </div>
                            <div class="system-textbox">
                            <input type="text" name="username" class="s-textbox" />
                            </div>
                        </div>
                        <div class="row-container" style="padding-bottom:25px;">
                        	<div class="system-text">
                            Password
                            </div>
                            <div class="system-textbox">
                            <input type="password" name="password" class="s-textbox" />
                            </div>
                        </div>
                    </div>
                	<div class="system-right-column">
                    	<div class="row-container">
                        	<div class="system-text">
                            User Type
                            </div>
                            <div class="system-textbox">
                            <select name="usertype" class="s-textbox">
                            <option>--select--</option>
                            <option>Admin</option>
                            <option>User</option>
                            </select>
                            </div>
                        </div>
                        <div class="row-container">
                        	<div class="system-text">
                            Status
                            </div>
                            <div class="system-textbox">
                            <select name="status" class="s-textbox">
                            <option>--select--</option>
                            <option></option>
                            <option></option>
                            </select>
                            </div>
                        </div>
                        <div class="row-container">
                        <table width="100%" border="0">
                            <tr>
                                <td width="50%">
                                <input type="reset" name="clear" class="system-btn-left" value="Clear" onclick="location.reload();" /></td>
                                <td width="50%">
                                <input type="submit" name="save" class="system-btn-right" value="Save"/>
                                </td>
                            </tr>
                        </table>
                        </div>
                        <!-- end of system-right-column !--> 
                    </div>
                    <!-- end of row-container!-->
                </div>
                <!-- end of main-text-container!-->
            </div>
            <div class="main-text-container" style="margin-top:10px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="15%" align="center">User ID</td>
                <td width="20%" align="center">Full Name</td>
                <td width="20%" align="center">User Name</td>
                <td width="15%" align="center">Type</td>
                <td width="15%" align="center">Status</td>
                <td width="15%" align="center">Action</td>
              </tr>
               <tr>
                <td width="15%" align="center">&nbsp;</td>
                <td width="20%" align="center">&nbsp;</td>
                <td width="20%" align="center">&nbsp;</td>
                <td width="15%" align="center">&nbsp;</td>
                <td width="15%" align="center">&nbsp;</td>
                <td width="15%" align="center">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="50%" align="right"><img src="../images/edit.png" /></td>
                            <td width="50%" align="center"><img src="../images/delete.png" /></td>
                        </tr>
                    </table>
                </td>
              </tr>
            </table>
            </div>
            <!-- end of right column!-->
        </div>
        <!-- end fo row-container!-->
    </div>
    <!-- end of main container!-->
</div>
</body>
</html>
