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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Resilience Information Solutions, Software Development, Hardware &amp; Network, Web Designing Company, Sri Lanka</title>

<meta name="description" content="Web Designing, software development, and computer & accessories selling Company, Sri Lanka, Resilience Information Solutions (pvt) Limited is a software development, Web Designing, and computer selling Company company which is operating offices in Sri Lanka, France and Australia . It was founded in 2012 with the aim of supplying high quality software products and services, hardware and network services and accessories sales to its clients. Today, Resilience Information Solutions is an Application and Service provider for Financial, Logistics Management and Enterprise markets.">

<meta name="keywords" content="Web Designing , software development, and computer & accessories selling Company, Sri Lanka, Rapid Solutions (pvt) Limited, rapdsol.com, Resilience Information Solutions pvt ltd, Info, Software, Software Development, Hardware, Network, Hardware &amp; Network, Hardware &amp; network accessories sales, Web, Web Designing.">
<link rel="icon" href="images/logo-gmail.jpg" title="RESILIENCE INFORMATION SOLUTIONS" />
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link href='http://fonts.googleapis.com/css?family=Marmelad' rel='stylesheet' type='text/css'>
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
</head>
<body>
<div id="main-container">
    <div class="row-container" style="-moz-box-shadow: 0px 1px 6px 0px rgba(0,0,0,0.3); -webkit-box-shadow: 0px 1px 6px 0px rgba(0,0,0,0.3);box-shadow: 0px 1px 6px 0px rgba(0,0,0,0.3);">
        <div class="system-menu-bar">
            <div class="row-container">
                <div class="logout-area">
                	Hai&nbsp;&nbsp;<?php //echo $_SESSION['loggedinuser']; ?>&nbsp;&nbsp;||&nbsp;<a href="../logout.php">Log Out</a>
                </div>
            </div>
            <div class="row-container">
                <div class="system-heading">
                	Resilience Information Solutions
                </div>
                <a href="../main.php"><input type="button" class="" style="margin-top:-20px;" value="Go Back"/></a>
            </div>
        </div>
    </div>
    <div class="row-container">
    <?php
		echo "test";
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
    <form name="stockmaintanance" method="post" action="stockmaintance.php">
    
    <div class="row-container">
            <div class="system-left-colum">
            	<div class="row-container">
                    <div class="sytem-text">Stock Id</div>
                    <div class="system-text-box">
                    	<input type="text" name="stockid" class="" value="<?php if(isset($_GET['stockid'])){ echo $_GET['stockid']; }else{ echo $dabasehandle->_newGeneration('SELECT COUNT(id) AS id FROM _stocks','STC','id');} ?>" />
                    </div>
                 </div>
                 
                <div class="row-container">
                    <div class="sytem-text">Total Prize</div>
                    <div class="system-text-box">
                    	Purchased<input type="text" name="totalpurchasedprize" class="" value="<?php $purprice=$dabasehandle->_getInfo("SELECT SUM(unitprice) AS unitprice FROM _stockitems",'unitprice'); if(($purprice!=0) ||($purprice!="")){ echo $purprice;}else {echo "0";}?>" />
                        
                        Sales<input type="text" name="totalsalesprize" class="" value="<?php $saleprice=$dabasehandle->_getInfo("SELECT SUM(salesprice) AS salesprice FROM _stockitems",'salesprice'); if(($saleprice!=0) ||($saleprice!="")){ echo $saleprice;}else {echo "0";}?>" />
                    </div>
                 </div>
                 <div class="row-container">
                    <div class="sytem-text">Status</div>
                    <div class="system-text-box">
                    	<select name="status" class="">
                        	<option value="--Select--" selected="selected">--Select--</option>
                            <option value="A"<?php if(isset($_GET['stockid'])){if($dabasehandle->_getInfo("SELECT status FROM _stocks WHERE stockid='".$_GET['stockid']."'","status")=="A"){?> selected="selected"<?php }}?> >Active</option>
                        <option value="P"<?php if(isset($_GET['stockid'])){if($dabasehandle->_getInfo("SELECT status FROM _stocks WHERE stockid='".$_GET['stockid']."'","status")=="P"){?> selected="selected"<?php }}?> >Pending</option>
                        <option value="D"<?php if(isset($_GET['stockid'])){if($dabasehandle->_getInfo("SELECT status FROM _stocks WHERE stockid='".$_GET['stockid']."'","status")=="D"){?> selected="selected"<?php }}?> >Deactive</option>
                        
                        </select>
                    </div>
                 </div>
                 <div class="row-container" style="height:72px;">
                 </div>
            </div>
            <div class="system-right-colum">
            	<div class="row-container">
                    <div class="sytem-text">Date</div>
                    <div class="system-text-box">
                    	<input type="date" name="date" class="" value="<?php  echo date('d'.'/'.'m'.'/'.'Y');?>" />
                    </div>
                 </div>
                 <div class="row-container">
                        <div class="system-btn-container">
                        <input type="reset" name="clear" class="btnn" value="Clear" />
                        </div>
                        
                        <div class="system-btn-container">
                        <input type="submit" name="save" class="btnn" value="Finish" />
                        </div>
                 </div>
            </div>
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
      <table width="100%" border="1">
        <tr>
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
      
    </div>
    
   </form>
  <!-- end of main-container!-->
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>