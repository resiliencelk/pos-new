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
tr.hover
{
	background:#CCC;
}
</style>
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
            <?php require("../menu.php"); ?>
        </div>
        <div id="right-column">
        	<div class="main-text-container">
            <form name="pricelist" method="post" action="pricelist.php">
                <div class="row-container">
                    <div class="system-heading">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="5%" align="left"><img src="../images/itmt.png" /></td>
                            <td width="20%" align="left">&nbsp;&nbsp;&nbsp;Item Type </td>
                            <td width="35%" align="left">
                                <select name="itemtype" class="s-textbox" onchange="document.pricelist.submit();">
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
                             <td width="40%"></td>
                        </tr>
                        </table>
                    </div>
                </div>
                <!-- end of  row container!-->
            </div>
          <!-- end of main text container!-->
             <div class="row-container " style="height:450px; overflow-y:scroll; margin-top:20px;" id="style-3" >
      <table width="100%" cellpadding="4px" cellspacing="0" border="0" bgcolor="#FFFFFF" style="border-radius:5px 5px 0px 0px; color:#333;">
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
		  <th align="center"><div class="table-heading">NO</div></th>
          <th width="20%" align="center"><div class="table-heading">Catagory</div></th>
          <th width="15%" align="center"><div class="table-heading">Brand</div></th>
          <th width="15%" align="center"><div class="table-heading">Model</div></th>
          <th width="15%" align="center"><div class="table-heading">Item Name</div></th>
          <?php
				/*if(isset($_SESSION['uertype']) and $_SESSION['uertype']=="A")
				{*/
			?>
          <th width="15%" align="center"><div class="table-heading">Unit PriceRs.)</div></th>
          <?php
				/*}*/
		  ?>
          <th align="center"><div class="table-heading">Available Quantity</div></th>
          <th width="16%" align="center"><div class="table-heading">Sales Price (Rs.)</div></th>
          <th width="13%" align="center"><div class="table-heading">Warrenty (Months)</div></th>
          
          
        </tr>
        
        <?php
			$totalunitprice=0;
			$totalsalesprice=0;
			$x=1;
			if(isset($_POST['itemtype']))
			{
				$selectedItemtype=$_POST['itemtype'];
				
				$retriveitems="SELECT _items.itemcatagory,_items.itembrand,_items.modelnumber,_items.itemname,_items.unitprice,_items.salesprice,_items.warranty,_stockitems.quantity FROM  _items,_stockitems WHERE _items.itemid=_stockitems.itemid and _stockitems.itemcatagory='$selectedItemtype' AND _items.itemcatagory='$selectedItemtype'";

			}
			else{
			$retriveitems="SELECT _items.itemcatagory,_items.itembrand,_items.modelnumber,_items.itemname,_items.warranty,_stockitems.unitprice,_stockitems.salesprice,_stockitems.quantity FROM  _items,_stockitems WHERE _items.itemid=_stockitems.itemid";
			}
			$itemsrecords=mysql_query($retriveitems);
			$countitems=mysql_num_rows($itemsrecords);
			if($countitems>0)
			{
				while($itemsdatas=mysql_fetch_array($itemsrecords))
				{
					$totprice=($itemsdatas['unitprice']*$itemsdatas['quantity']);
					$totsale=$itemsdatas['salesprice']*$itemsdatas['quantity'];
					$totalunitprice=($totalunitprice+$totprice);
					$totalsalesprice=($totalsalesprice+$totsale);
					
		?>
        <tr>
        	<td align="center">
            	<?php echo $x; ?>
            </td>
        	<td align="center">
            	<?php echo $itemsdatas['itemcatagory']; ?>
            </td>
            <td align="center">
            	<?php echo $itemsdatas['itembrand']; ?>
            </td>
            <td align="center">
            	<?php echo $itemsdatas['modelnumber']; ?>
            </td>
            <td align="center">
            	<?php echo $itemsdatas['itemname']; ?>
            </td>
            <?php
				/*if(isset($_SESSION['uertype']) and $_SESSION['uertype']=="A")
				{*/
			?>
            <td align="center">
            	Rs. <?php echo number_format($itemsdatas['unitprice'],2,'.',','); ?>
            </td>
            <?php
				/*}*/
			?>
            <td align="center">
            	<?php echo $itemsdatas['quantity']; ?>
            </td>
            <td align="center">
            	Rs. <?php echo number_format($itemsdatas['salesprice'],2,'.',','); ?>
            </td>
            <td align="center">
            	<?php echo $itemsdatas['warranty']; ?>
            </td>
            
         </tr>
        <?php
				$x++;
				}
			}
		?>
        <tr>
        	<th colspan="5">
            	TOTAL AMOUNT (Rs. )
            </th>
             <?php
				/*if(isset($_SESSION['uertype']) and $_SESSION['uertype']=="A")
				{*/
			?>
            <th align="right">
            	Rs. <?php echo number_format($totalunitprice,2,'.',','); ?>
            </th>
            <?php
				/*}*/
			?>
            <td colspan="1">
            
            </td>
            <th align="right">
            	Rs. <?php echo number_format($totalsalesprice,2,'.',','); ?>
            </th>
        </tr>
          <tr>
        	<th colspan="5">
            	NET PROFIT (Rs. )
            </th>
             <?php
				/*if(isset($_SESSION['uertype']) and $_SESSION['uertype']=="A")
				{*/
			?>
            <th align="right">
            	
            </th>
            <th align="right">
            	
            </th>
            <?php
				/*}*/
			?>
            
            <th align="right">
            	Rs. <?php echo number_format(($totalsalesprice-$totalunitprice),2,'.',','); ?>
            </th>
        </tr>
      </table>
      </form>
    </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>