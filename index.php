<?php

	require_once("includes/_handledatabase.inc");
	require_once("includes/pathfiles.inc");
	$dabasehandle=new _handledatabase();
	$dabasehandle->_connectHost();
	
	/*if($_SESSION['permgrant']==false)
	{
		header("location:index.php");
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="Web Designing, software development, and computer & accessories selling Company, Sri Lanka, Resilience Information Solutions (pvt) Limited is a software development, Web Designing, and computer selling Company company which is operating offices in Sri Lanka, France and Australia . It was founded in 2012 with the aim of supplying high quality software products and services, hardware and network services and accessories sales to its clients. Today, Resilience Information Solutions is an Application and Service provider for Financial, Logistics Management and Enterprise markets.">

<meta name="keywords" content="Web Designing , software development, and computer & accessories selling Company, Sri Lanka, Rapid Solutions (pvt) Limited, rapdsol.com, Resilience Information Solutions pvt ltd, Info, Software, Software Development, Hardware, Network, Hardware &amp; Network, Hardware &amp; network accessories sales, Web, Web Designing.">
<link rel="icon" href="images/logo-gmail.jpg" title="RESILIENCE INFORMATION SOLUTIONS" />
<title>Resilience POS System</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
<?php
if(isset($_POST['btnlogin']))
{
	if(isset($_POST['username'])){$username=$_POST['username'];}
	if(isset($_POST['password'])){$password=md5($_POST['password']);}
	
	$loginsql="SELECT * FROM users WHERE username='$username' AND password='$password'";
	$loginrecord=mysql_query($loginsql);
	$countlogin=mysql_num_rows($loginrecord);
	if($countlogin>0)
	{
		$logindata=@mysql_fetch_array($loginrecord);
		$_SESSION['permgrant']=true;
		$_SESSION['user']=$logindata['fullname'];
		header("location:main/main.php");
	}
	else
	{
		?>
        <script>
		alert("SORRY! YOU ARE NOT AN AUTHORISED USER");
		</script>
        <?php
		$_SESSION['permgrant']=false;
	}
}
?>
<div id="main-container">
    <div class="row-container">
        <div id="banner">
        	<div id="banner-logo">
            </div>
        </div>
    </div>
    <div class="row-container">
    	<div class="admin">
        <?php if(isset($error)){echo $error;} ?>
            <form name="frmlogin" action="index.php" method="post">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="98"><input class="textbox" type="text" name="username" placeholder="User Name" /></td>
              </tr>
              <tr>
                <td height="85"><input class="textbox" type="password" name="password" placeholder="Password" /></td>
              </tr>
              <tr>
                <td><input type="submit" name="btnlogin" value="LOGIN" class="admin-btn" /></td>
              </tr>
            </table>
            </form>
		</div>
    </div>
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>