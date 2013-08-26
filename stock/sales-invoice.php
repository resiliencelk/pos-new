<?php
	require_once("../includes/_handledatabase.inc");
	require_once("../includes/pathfiles.inc");
	/*if($_SESSION['permgrant']==false)
	{
		header("location:../index.php");
	}*/
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
<script language="javascript" type="text/javascript">
	function cal_quantity()
	{
		//alert("testing");
		var availablequantity=0;
		var newquantity=0;
		var totqty=0;
		availablequantity=document.stockmaintanance.availablequantity.value;
		newquantity=document.stockmaintanance.newquantity.value;
		if(newquantity!="")
		{
			totqty=parseInt(availablequantity)+parseInt(newquantity);
		}else{
			totqty=availablequantity;
		}
		document.stockmaintanance.totquantity.value=totqty;		
	}
</script>
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
            	<div class="row-container">
				<?php
					if(isset($_POST['save']))
					{
						echo "save";
						if(isset($_POST['stockid'])){$stockid=$_POST['stockid'];}
						if(isset($_POST['totalpurchasedprize'])){$totalpurchasedprize=$_POST['totalpurchasedprize'];}
						if(isset($_POST['totalsalesprize'])){$totalsalesprize=$_POST['totalsalesprize'];}
						if(isset($_POST['status'])){$status=$_POST['status'];}
						if(isset($_POST['date'])){$date=$_POST['date'];}
						
						$dabasehandle->_recordInsertion("INSERT INTO _stocks (stockid,totalpurchasedprice,totalsalesprice,stockdate,status) VALUES('$stockid','$totalpurchasedprize','$totalsalesprize','$date','$status')","SAVED SUCCESSFULLY","SOME ERROR IN SAVE");
					}
					
				?>
                </div>
                <form name="stockmaintanance" method="post" action="sales-invoice.php">
                <div class="row-container">
                    <div class="system-left-column">
                        <div class="row-container">
                        	<div class="system-text">
                            Stock Id
                            </div>
                            <div class="system-textbox">
                            <input type="text" name="stockid" class="s-textbox" value="<?php if(isset($_GET['stockid'])){ echo $_GET['stockid']; }else{ echo $dabasehandle->_newGeneration('SELECT COUNT(id) AS id FROM _stocks','STC','id');} ?>" />
                            </div>
                        </div>
                        <div class="row-container">
                        	<div class="system-text">
                            Total Prize
                            </div>
                            <div class="system-textbox">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                            <td width="25%">Purchased</td>
                            <td width="25%"><input type="text" name="totalpurchasedprize" class="s-textbox" value="<?php $purprice=$dabasehandle->_getInfo("SELECT SUM(unitprice) AS unitprice FROM _stockitems",'unitprice'); if(($purprice!=0) ||($purprice!="")){ echo $purprice;}else {echo "0";}?>" /></td>
                            <td width="25%">Sales</td>
                            <td width="25%"><input type="text" name="totalsalesprize" class="s-textbox" value="<?php $saleprice=$dabasehandle->_getInfo("SELECT SUM(salesprice) AS salesprice FROM _stockitems",'salesprice'); if(($saleprice!=0) ||($saleprice!="")){ echo $saleprice;}else {echo "0";}?>" /></td>
                            </tr>
                            </table>
                            </div>
                        </div>
                        <div class="row-container">
                        	<div class="system-text">
                            Status
                            </div>
                            <div class="system-textbox">
                            <select name="status" class="s-textbox">
                        	<option value="--Select--" selected="selected">--Select--</option>
                            <option value="A"<?php if(isset($_GET['stockid'])){if($dabasehandle->_getInfo("SELECT status FROM _stocks WHERE stockid='".$_GET['stockid']."'","status")=="A"){?> selected="selected"<?php }}?> >Active</option>
                        <option value="P"<?php if(isset($_GET['stockid'])){if($dabasehandle->_getInfo("SELECT status FROM _stocks WHERE stockid='".$_GET['stockid']."'","status")=="P"){?> selected="selected"<?php }}?> >Pending</option>
                        <option value="D"<?php if(isset($_GET['stockid'])){if($dabasehandle->_getInfo("SELECT status FROM _stocks WHERE stockid='".$_GET['stockid']."'","status")=="D"){?> selected="selected"<?php }}?> >Deactive</option>
                        
                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="system-right-column">
                    	<div class="row-container">
                            <div class="system-text">
                            Date
                            </div>
                            <div class="system-textbox">
                            <input type="date" name="date" class="" value="<?php  echo date('d'.'/'.'m'.'/'.'Y');?>" />
                            </div>
                        </div>
                        <div class="row-container">
                            <table width="100%" border="0">
                            <tr>
                                <td width="50%"><input type="reset" name="clear" class="system-btn-left" value="Clear" onclick="location.reload();" /></td>
                                <td width="50%"><input type="submit" name="save" class="system-btn-right" value="<?php if(isset($_GET['action'])){ if($_GET['action']=="Edit"){ echo "Update";}elseif($_GET['action']=="Delete"){ echo "Delete";}else{ echo "Save";}}else{ echo "Save";} ?>"<?php if(isset($_GET['action']) and ($_GET['action']=="search")){ ?> disabled="disabled" <?php }?> /></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- end of main text container!-->
            </div>
             <div class="row-container" style="margin-top:20px;">
    	<?php 
			if(isset($_POST['next']))
			{
				echo "next";
				
				if(isset($_POST['stockid'])){$stockid=$_POST['stockid'];}
				if(isset($_POST['itemtype'])){$itemtype=$_POST['itemtype'];}
				if(isset($_POST['itemid'])){$itemid=$_POST['itemid'];}
				if(isset($_POST['itemname'])){$itemname=$_POST['itemname'];}
				if(isset($_POST['unitprice'])){$unitprice=$_POST['unitprice'];}
				if(isset($_POST['salesprice'])){$salesprice=$_POST['salesprice'];}
				if(isset($_POST['warranty'])){$warranty=$_POST['warranty'];}
				if(isset($_POST['totquantity'])){$totquantity=$_POST['totquantity'];}
				
				if(isset($_POST['availablequantity'])){$availablequantity=$_POST['availablequantity'];}
				
				if(isset($_POST['itemstatus'])){$itemstatus=$_POST['itemstatus'];}
				if($availablequantity==0)
				{
					$itemsave="INSERT INTO _stockitems (stockid,itemcatagory,itemid,itemname,unitprice,salesprice,warranty,quantity,status) VALUES('$stockid','$itemtype','$itemid','$itemname','$unitprice','$salesprice','$warranty','$totquantity','$itemstatus')";
				}
				else
				{
					$itemsave="UPDATE _stockitems SET itemcatagory='$itemtype',itemname='$itemname',unitprice='$unitprice',salesprice='$salesprice',warranty='$warranty',quantity='$totquantity',status='$itemstatus' WHERE itemid='$itemid'";
				}
				$dabasehandle->_invisibleRecordInsertion($itemsave);
			}
		?>
      <table width="100%" cellpadding="1px" cellspacing="0" border="0" bgcolor="#FFFFFF" style="border-radius:5px 5px 0px 0px; color:#333;">
        <tr style="background-image: linear-gradient(bottom, rgb(116,136,146) 46%, rgb(141,156,164) 73%);
background-image: -o-linear-gradient(bottom, rgb(116,136,146) 46%, rgb(141,156,164) 73%);
background-image: -moz-linear-gradient(bottom, rgb(116,136,146) 46%, rgb(141,156,164) 73%);
background-image: -webkit-linear-gradient(bottom, rgb(116,136,146) 46%, rgb(141,156,164) 73%);
background-image: -ms-linear-gradient(bottom, rgb(116,136,146) 46%, rgb(141,156,164) 73%);

background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.46, rgb(116,136,146)),
	color-stop(0.73, rgb(141,156,164))
); border-top:1px solid #d3d9dc; height:30px;">
          <td width="14%">Item Type</td>
          <td width="10%">Item Id</td>
          <td width="15%">Item Name</td>
          <td width="15%">Unit Price</td>
          <td width="16%">Sales Prize</td>
          <td width="13%">Warrenty</td>
          <td colspan="3">Quantity</td>
          <td width="9%">Status</td>
          <td width="11%"></td>
        </tr>
        <tr>
            <td>
            <select name="itemtype" class="system-textbox" onchange="document.stockmaintanance.submit();">
                	<option value="--Select--" selected="selected">--Select--</option>
                    <?php
						if(isset($_POST['itemtype']))
						{
							$selectedItemtype=$_POST['itemtype'];
						}
						$itemtypeSql="SELECT type FROM _itemtype WHERE status='A'";
						$itemtypeRecord=mysql_query($itemtypeSql);
						while($itemtypeDatas=mysql_fetch_array($itemtypeRecord))
						{
					?>
                    		<option value="<?php echo $itemtypeDatas['type']; ?>" <?php if(isset($selectedItemtype)){if($itemtypeDatas['type']==$selectedItemtype){ ?> selected="selected"<?php }} ?>><?php echo $itemtypeDatas['type']; ?></option>
                    <?php
						}
					?>
                </select>
            </td>
          <td>
          <select name="itemid" class="system-textbox" onchange="document.stockmaintanance.submit();">
                	<option value="--Select--" selected="selected">--Select--</option>
                    <?php
						if(isset($_POST['itemtype']))
						{
							$itmTy=$_POST['itemtype'];
							$idsql="SELECT itemid FROM _items WHERE itemcatagory='$itmTy' AND status='A'";
						}
						else
						{
							$idsql="SELECT itemid FROM  _items WHERE status='A'";
						}
						if(isset($_POST['itemid']))
						{
							$selectedBrand=$_POST['itemid'];
						}
						
						$idrecords=mysql_query($idsql);
						while($iddatas=mysql_fetch_array($idrecords))
						{
					?>
                    		<option value="<?php echo $iddatas['itemid']; ?>" <?php if(isset($selectedBrand)){if($iddatas['itemid']==$selectedBrand){ ?> selected="selected"<?php }} ?>><?php echo $iddatas['itemid']; ?></option>
                    <?php
						}
					?>
                </select>
          </td>
          <td><input type="text" name="itemname" value="<?php if(isset($_POST['itemid'])){ echo $dabasehandle->_getInfo("SELECT itemname FROM _items WHERE itemid='".$_POST['itemid']."'","itemname");} ?>" /></td>
          
          <td><input type="text" name="unitprice" value="<?php if(isset($_POST['itemid'])){ echo $dabasehandle->_getInfo("SELECT unitprice FROM _items WHERE itemid='".$_POST['itemid']."'","unitprice");} ?>" /></td>
          
          <td><input type="text" name="salesprice" value="<?php if(isset($_POST['itemid'])){ echo $dabasehandle->_getInfo("SELECT salesprice FROM _items WHERE itemid='".$_POST['itemid']."'","salesprice");} ?>" /></td>
          
          <td width="6%"><input type="text" name="warranty" value="<?php if(isset($_POST['itemid'])){ echo $dabasehandle->_getInfo("SELECT warranty FROM _items WHERE itemid='".$_POST['itemid']."'","warranty");} ?>" /></td>
          
          <td width="1%"><input name="availablequantity" type="text" value="<?php $qty=0; if(isset($_POST['itemid'])){ $qty=$dabasehandle->_getInfo("SELECT quantity FROM _stockitems WHERE itemid='".$_POST['itemid']."'","quantity");}if($qty!=""){echo $qty;}else{ echo "0";} ?>" size="4" maxlength="4" readonly="readonly" /></td>
          
          <td width="5%">+<input name="newquantity" type="text" value="0" size="4" maxlength="4" onblur="cal_quantity();" /></td>
          
          <td><input type="text" name="totquantity" value="0" size="4" maxlength="4" readonly="readonly"/></td>
          
          <td>
          	<select name="itemstatus" class="">
            	<option value="--Select--" selected="selected">--Select--</option>
                <option value="A">Active</option>
                <option value="P">Pending</option>
                <option value="D">Deleted</option>
            </select></td>
          <td><input type="submit" name="next" value="Next" /></td>
        </tr>
        <?php
			$stockid="";
			if(isset($_POST['stockid'])){
				$stockid=$_POST['stockid'];
			}
			$retriveitems="SELECT * FROM _stockitems WHERE stockid='$stockid'";
			$itemsrecords=mysql_query($retriveitems);
			$countitems=mysql_num_rows($itemsrecords);
			if($countitems>0)
			{
				while($itemsdatas=mysql_fetch_array($itemsrecords))
				{
		?>
        <tr>
        	<td>
            	<?php echo $itemsdatas['itemcatagory']; ?>
            </td>
            <td>
            	<?php echo $itemsdatas['itemid']; ?>
            </td>
            <td>
            	<?php echo $itemsdatas['itemname']; ?>
            </td>
            <td>
            	<?php echo $itemsdatas['unitprice']; ?>
            </td>
            <td>
            	<?php echo $itemsdatas['salesprice']; ?>
            </td>
            <td>
            	<?php echo $itemsdatas['warranty']; ?>
            </td>
            <td colspan="3">
            	<?php echo $itemsdatas['quantity']; ?>
            </td>
            <td>
            	<?php echo $itemsdatas['status']; ?>
            </td>
         </tr>
        <?php
				}
			}
		?>
      </table>
      </form>
    </div>
        </div>
    </div>
</div>
</body>
</html>
