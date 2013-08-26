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
                    <div class="system-left-column">
                      <div class="row-container">
                       	  <div class="system-text">
                            <div class="system-heading">Item Type</div>
                            </div>
                            <div class="system-textbox">
                             <select name="itemtype" class="s-textbox" onchange="document.pricelist.submit();">
                	<option value="--Select--" selected="selected">All</option>
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
                            </div>
                      </div>
                  </div>
                </div>
                <!-- end of main text container!-->
             <div class="row-container" style="height:450px; overflow-y:scroll;" id="style-3">
                <table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF">
			<tr style="background:#768993;">
          <th width="20%" align="center"><div class="table-heading">Item Catagory</div></th>
          <th width="15%" align="center"><div class="table-heading">BRAND</div></th>
          <th width="15%" align="center"><div class="table-heading">ITEM MODEL</div></th>
          <th width="15%" align="center"><div class="table-heading">ITEM NAME</div></th>
          <th width="15%" align="center"><div class="table-heading">UNIT PRICE (Rs.</div></th>
          <th align="center"><div class="table-heading">AVAILABLE QUANTITY</div></th>
          <th width="16%" align="center"><div class="table-heading">SALES PRICE (Rs.)</div></th>
          <th width="13%" align="center"><div class="table-heading">WARRANTY (Months)</div></th>
        </tr>
        
        <?php
			if(isset($_POST['itemtype']))
			{
				$selectedItemtype=$_POST['itemtype'];
				
				$retriveitems="SELECT _items.itemcatagory,_items.itembrand,_items.modelnumber,_items.itemname,_items.unitprice,_items.salesprice,_items.warranty,_stockitems.quantity FROM  _items,_stockitems WHERE _items.itemid=_stockitems.itemid and _stockitems.itemcatagory='$selectedItemtype' AND _items.itemcatagory='$selectedItemtype'";

			}
			else{
			$retriveitems="SELECT _items.itemcatagory,_items.itembrand,_items.modelnumber,_items.itemname,_items.unitprice,_items.salesprice,_items.warranty,_stockitems.quantity FROM  _items,_stockitems WHERE _items.itemid=_stockitems.itemid";
			}
			$itemsrecords=mysql_query($retriveitems);
			$countitems=mysql_num_rows($itemsrecords);
			if($countitems>0)
			{
				while($itemsdatas=mysql_fetch_array($itemsrecords))
				{
		?>
        <tr style="color:#333;">
        	<td>
            	<?php echo $itemsdatas['itemcatagory']; ?>
            </td>
            <td>
            	<?php echo $itemsdatas['itembrand']; ?>
            </td>
            <td>
            	<?php echo $itemsdatas['modelnumber']; ?>
            </td>
            <td>
            	<?php echo $itemsdatas['itemname']; ?>
            </td>
            <td>
            	Rs. <?php echo number_format($itemsdatas['unitprice'],2,'.',','); ?>
            </td>
            <td>
            	<?php echo $itemsdatas['quantity']; ?>
            </td>
            <td>
            	Rs. <?php echo number_format($itemsdatas['salesprice'],2,'.',','); ?>
            </td>
            <td>
            	<?php echo $itemsdatas['warranty']; ?>
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
<?php
$dabasehandle->_closeHost();
?>