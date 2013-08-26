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
<title>Resilience - Purchase Order (PO) :<?php echo date('d'.'/'.'m'.'/'.'Y');?></title>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
	function cal_total()
	{
		//alert("testing");
		var quantity=0;
		var unitprice=0;
		var totalprice=0;
		
		quantity=parseInt(document.invoice.quantity.value);
		unitprice=parseFloat(document.invoice.unitprice.value);
		if(unitprice!="")
		{
			totalprice=parseFloat(unitprice)*parseInt(quantity);
		}else{
			totalprice=unitprice;
		}
		document.invoice.totalprice.value=totalprice+".00";
		alert("Total price :"+totalprice+".00");		
	}
	function cal_grandtotal()
	{
		
		var discounts=0;
		var nettotal=0;
		var grandtotal=0;
		nettotal=parseInt(document.invoice.nettotal.value);
		discounts=parseInt(document.invoice.discouts.value);
		grandtotal=parseInt(nettotal)-parseInt(discounts);
		alert("Grand Total price :"+grandtotal+".00");
		document.invoice.grandtotal.value=grandtotal+".00";
				
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
        	<!-- right-colummn row start here !-->
        	<div class="main-text-container">
            	<!-- main-text-container row start here !-->
                <div class="row-container">
                    <?php
                    if(isset($_POST['saveitems']))
                    {
                        echo "can save items";
                        if(isset($_POST['orderid'])){$orderid=$_POST['orderid'];}
                        
                        if(isset($_POST['orderid'])){$_SESSION['orderid']=$_POST['orderid'];}
                        
                        
                        if(isset($_POST['itemid'])){$itemid=$_POST['itemid'];}
                        if(isset($_POST['modelno'])){$modelno=$_POST['modelno'];}
                        if(isset($_POST['serialno'])){$serialno=$_POST['serialno'];}
                        if(isset($_POST['description'])){$description=$_POST['description'];}
                        if(isset($_POST['quantity'])){$quantity=$_POST['quantity'];}
                        if(isset($_POST['unitprice'])){$unitprice=$_POST['unitprice'];}
                        if(isset($_POST['totalprice'])){$totalprice=$_POST['totalprice'];}
                        
                        $dabasehandle->_invisibleRecordInsertion("INSERT INTO _purchaseordereditems (orderid,itemid,modelnumber,description,quantity,unitprice,total) VALUES('$orderid','$itemid','$modelno','$description','$quantity','$unitprice','$totalprice')");
						
						unset($_SESSION['catagory']);
                        unset($_SESSION['itemid']);
                        unset($_SESSION['modelnumber']);
                        unset($_SESSION['itemname']);
                        unset($_SESSION['warranty']);
                        unset($_SESSION['unitprice']);
                    }
                    
                    if(isset($_POST['saveandprint']))
                    {
                        if(isset($_POST['orderid'])){$orderid=$_POST['orderid'];}
                        if(isset($_POST['orderdate'])){$orderdate=$_POST['orderdate'];}
                        if(isset($_POST['pymode'])){$pymode=$_POST['pymode'];}
                        if(isset($_POST['status'])){$status=$_POST['status'];}
                        
                        if(isset($_POST['supplierid'])){$supplierid=$_POST['supplierid'];}
                        if(isset($_POST['name'])){$name=$_POST['name'];}
                        if(isset($_POST['address'])){$address=$_POST['address'];}
                        if(isset($_POST['contactnumber'])){$contactnumber=$_POST['contactnumber'];}
                        
                        if(isset($_POST['nettotal'])){$nettotal=$_POST['nettotal'];}
                        if(isset($_POST['status'])){$status=$_POST['status'];}
                        
                        
                        
                        $dabasehandle->_invisibleRecordInsertion("INSERT INTO _purchaseorder (orderid,orderdate,supplierid,suppliername,nettotal,vat,status) VALUES('$orderid','$orderdate','$supplierid','$name','$nettotal','0','$status')");
                        header("location:printorder.php?orderid=$orderid","_blank");
                    }
                    ?>
        		</div>
    			<!-- end of message row !-->
                    <form name="invoice" action="order.php" method="post">
                    <div class="row-container">
                    <!-- 2nd row !-->
                        <div class="system-left-column">
                        <!-- stsrt of system-left-column !-->
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Supplier ID
                                    <?php
                                        if(isset($_GET['supplierid']))
                                        {
                                            $_SESSION['supplierid']=$_GET['supplierid'];
                                            //$_SESSION['suppliername']=$_GET['suppliername'];
                                            
                                            $supid=$_GET['supplierid'];
                                            $supplierdetails="SELECT * FROM _suppliers WHERE supplierid='".$supid."'";
                                            $supdetailsrecord=mysql_query($supplierdetails);
                                            $supdetaildata=@mysql_fetch_array($supdetailsrecord);
                                            $_SESSION['supaddress']=$supdetaildata['companyaddress'];
                                            $_SESSION['supcontact']=$supdetaildata['companytelnumber'];
											
											$_SESSION['contactperson']=$supdetaildata['title'].$supdetaildata['suppliername'];
											$_SESSION['contactpersonaddress']=$supdetaildata['companyaddress'];
											$_SESSION['contactpersontel']=$supdetaildata['suppliertelnumber'];
                                        }
                                    ?>
                                </div>
                                <div class="system-textbox">
                                <table width="100%" border="0">
                                <tr>
                                    <td width="80%">
                                        <input type="text" name="supplierid" class="s-textbox" value="<?php if(isset($_SESSION['supplierid'])){ echo $_SESSION['supplierid'];} ?>"  />
                                    </td>
                                    <td width="20%">
                                    <a href="#openModal"><input type="button" name="search" value="Search"/></a>
                                    <!-- model window !-->
                                    <div id="openModal" class="modalDialog">
                                    <div>
                                    <a href="#close" title="Close" class="close">X</a>
                                    <table width="100%" cellpadding="5px" cellspacing="0" border="1" bordercolor="#999999">
                                        <tr>
                                            <th>Supplier ID</th>
                                            <th>Supplier Name</th>
                                        </tr>
                                        <?php
                                        $supplierlistsql="SELECT * FROM _suppliers WHERE status='A'";
                                        $supplierlistrecord=mysql_query($supplierlistsql);
                                        $countsupplier=mysql_num_rows($supplierlistrecord);
                                        if($countsupplier>0)
                                        {
                                            while($supplierdata=mysql_fetch_array($supplierlistrecord))
                                            {
                                                
                                        ?>
                                        <tr>
                                            <td><a href="order.php?supplierid=<?php echo $supplierdata['supplierid']; ?>&suppliername=<?php 
											if(($supplierdata['companyname']!="nill")||($supplierdata['companyname']!="Nill")){echo $supplierdata['companyname'];}else{echo $supplierdata['suppliername'];} ?>"><?php echo $supplierdata['supplierid']; ?></a></td>
                                            <td><?php if(($supplierdata['companyname']!="nill")||($supplierdata['companyname']!="Nill")){echo $supplierdata['companyname'];}else{ echo $supplierdata['suppliername'];} ?></td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                        
                                    </table>
                                    <!-- end of model window!-->
                                    </div>
                                    </div>
                                    </td>
                                </tr>
                                </table>
                                </div>
                            </div> 
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Supplier Name
                                </div>
                                <div class="system-textbox">
                                  <input type="text" name="name" class="s-textbox" value="<?php if(isset($_SESSION['suppliername'])){ echo $_SESSION['suppliername'];}elseif(isset($_SESSION['contactperson'])){ echo $_SESSION['contactperson'];} ?>"  />
                                </div>
                            </div>
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Adddress
                                </div>
                                <div class="system-textbox">
                                  <input type="text" name="address" class="s-textbox" value="<?php if(isset($_SESSION['supaddress'])){ echo $_SESSION['supaddress'];}elseif(isset($_SESSION['contactpersonaddress'])){ echo $_SESSION['contactpersonaddress'];} ?>"  />
                                </div>
                            </div>
                            <div class="row-container">
                                <div class="system-text">
                                    Contact Number
                                </div>
                                <div class="system-textbox">
                                  <input type="text" name="contactnumber" class="s-textbox" value="<?php if(isset($_SESSION['supcontact'])and($_SESSION['supcontact']!=0)){ echo $_SESSION['supcontact'];}elseif(isset($_SESSION['contactpersontel'])){ echo $_SESSION['contactpersontel'];} ?>"  />
                                </div>
                            </div>
                       </div> 
                       <!-- end of system-left-column!-->       
                        
                        <div class="system-right-column">
                        <!-- start of system-right-column!-->
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Order Date
                                </div>
                                <div class="system-textbox">
                                <?php
                                    $da=date('d');
                                    $mo=date('m');
                                    $yr=date('y');
                                    $ivid='ORD'.$mo.$da.$yr;
                                ?>
                                    <input type="date" name="orderdate" value="<?php echo date('d'.'/'.'m'.'/'.'Y'); ?>" class="s-textbox"/>
                                </div>
                            </div>
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Order ID
                                </div>
                                <div class="system-textbox">
                                    <input type="text" name="orderid" class="s-textbox" value="<?php $orddate=date('d'.'/'.'m'.'/'.'Y'); echo $dabasehandle->_newGeneration("SELECT COUNT(id) AS id from _purchaseorder WHERE orderdate='$orddate'","$ivid","id"); ?>" />
                                </div>
                            </div>
                            
                            <div class="row-container" style="margin-bottom:2px;">
                                <div class="system-text">
                                    Status
                                </div>
                                <div class="system-textbox">
                                    <select name="status" class="s-combotbox">
                                    <option value="A">Active</option>
                                    <option value="P">Pending</option>
                                    <option value="D">Deactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-container" style="width:90%; padding:0% 5% 0% 5%;">
                                <table width="100%" border="0">
                                    <tr>
                                        <td width="50%"><input type="reset" name="clear" class="system-btn-left" value="Clear" onclick="location.reload();" /></td>
                                        <td width="50%"><input type="submit" name="saveandprint" class="system-btn-right" value="FINISH AND PRINT" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>  
                        <!-- end 0f sytem-right-column!-->
                    </div>
                    <!-- end fo 2nd row!-->
                    
                    <!-- 3rd row!-->
                    <div class="row-container" style="margin-top:10px;">
                        <div class="system-left-column" style="border:none;">
                            <table width="100%" cellpadding="0px" cellspacing="0" border="1" bordercolor="#CCCCCC">
                                <tr>
                                    <td colspan="2">Category</td>
                                    
                                    <td>Item ID</td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php
                                            if(isset($_GET['catagory']))
                                            {
                                                $_SESSION['catagory']=$_GET['catagory'];
                                            }
                                        ?>
                                    <input type="text" name="catagory" class="" value="<?php if(isset($_SESSION['catagory'])){ echo $_SESSION['catagory'];} ?>" />
                                    </td>
                                    <td width="20%">
                                        <a href="#opencatagory"><input type="button" name="searchcat" value="Search"/></a>
                                        <!-- model window !-->
                                        <div id="opencatagory" class="modalDialog">
                                        <div>
                                        <a href="#close" title="Close" class="close">X</a>
                                        <table width="100%" cellpadding="5px" cellspacing="0" border="1" bordercolor="#999999">
                                            <tr>
                                                <td>ITEM CATAGORY</td>
                                            </tr>
                                            <?php
                                            $typelistsql="SELECT type FROM  _itemtype WHERE status='A'";
                                            $typelistrecord=mysql_query($typelistsql);
                                            $counttype=mysql_num_rows($typelistrecord);
                                            if($counttype>0)
                                            {
                                                while($typedata=mysql_fetch_array($typelistrecord))
                                                {
                                                    
                                            ?>
                                            <tr>
                                                <td><a href="order.php?catagory=<?php echo $typedata['type']; ?>"><?php echo $typedata['type']; ?></a></td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                            
                                        </table>
                                        <!-- end of model window!-->
                                        </div>
                                        </div>
                                        </td>
                                    <td>
                                    <?php
                                        if(isset($_GET['itemid']))
                                        {
                                            $_SESSION['itemid']=$_GET['itemid'];
                                            
                                            $itemdetails="SELECT * FROM _items WHERE itemid='".$_SESSION['itemid']."'";
                                            $itemdetailsrecord=mysql_query($itemdetails);
                                            $itemdetailsdata=@mysql_fetch_array($itemdetailsrecord);
                                            $_SESSION['modelnumber']=$itemdetailsdata['modelnumber'];
                                            $_SESSION['itemname']=$itemdetailsdata['itemname'];
                                            $_SESSION['warranty']=$itemdetailsdata['warranty'];
                                            $_SESSION['unitprice']=$itemdetailsdata['unitprice'];
                                        }
                                    ?>
                                    <input type="text" name="itemid" class="" value="<?php if(isset($_SESSION['itemid'])){ echo $_SESSION['itemid'];} ?>" />
                                    </td>
                                    <td  width="20%">
                                        <a href="#openitems"><input type="button" name="searchcat" value="Search"/></a>
                                        <!-- model window !-->
                                        <div id="openitems" class="modalDialog">
                                            <div>
                                            <a href="#close" title="Close" class="close">X</a>
                                            <table width="100%" cellpadding="5px" cellspacing="0" border="1" bordercolor="#999999">
                                                <tr>
                                                    <td>ITEM ID</td>
                                                    <td>ITEM NAME</td>
                                                    <td>UNIT PRICE</td>
                                                    
                                                </tr>
                                                <?php
                                                if(isset($_SESSION['catagory'])){
                                                    $itemlistsql="SELECT itemid,itemname,unitprice FROM _items WHERE itemcatagory='".$_SESSION['catagory']."' AND status='A'";
                                                    $itemlistrecord=mysql_query($itemlistsql);
                                                    $countitem=mysql_num_rows($itemlistrecord);
                                                    if($countitem>0)
                                                    {
                                                        while($itemdata=mysql_fetch_array($itemlistrecord))
                                                        {
                                                        
                                                ?>
                                                <tr>
                                                    <td><a href="order.php?itemid=<?php echo $itemdata['itemid']; ?>"><?php echo $itemdata['itemid']; ?></a></td>
                                                    <td><?php echo $itemdata['itemname']; ?></td>
                                                    <td><?php echo $itemdata['unitprice']; ?></td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                                
                                            </table>
                                            <!-- end of model window!-->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        <!-- end of system-left-column !-->
                        </div>
                        <!-- end of 3rd row container!-->
                    </div>

                    <div class="row-container" style="margin-top:20px;">
                        <table width="100%" cellpadding="1px" cellspacing="0" border="1" bordercolor="#CCCCCC" style="border-radius:5px 5px 0px 0px; color:#333; ">
                        <tr style="background:url(../images/table-bg.jpg); background-repeat:repeat-x; height:30px;">
                          <th width="10%"><div class="table-heading">Model No</div></th>
                          <th width="35%"><div class="table-heading">Description</div> </th>
                          <th width="15%"><div class="table-heading">Qty</div></th>
                          <th width="10%"><div class="table-heading">Unit Prize</div></th>
                          <th width="20%"><div class="table-heading">Total</div></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="modelno" value="<?php if( isset($_SESSION['modelnumber'])){ echo $_SESSION['modelnumber']; } ?>"/></td>
                          <td><input type="text" name="description" value="<?php if( isset($_SESSION['itemname'])){ echo $_SESSION['itemname']; } if(isset($_SESSION['warranty']) and($_SESSION['warranty']>0)){ echo" (".$_SESSION['warranty']." Months)";} ?>"/></td>
                          <td><input type="text" name="quantity" value="" onblur="cal_total();"/></td>
                          <td><input type="text" name="unitprice" value="<?php if( isset($_SESSION['unitprice'])){ echo number_format($_SESSION['unitprice'], 2, '.', ''); } ?>" style="text-align:right;"/></td>
                          <td>
                          	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><input type="text" name="totalprice" value="" width="60%" style="text-align:right;"/></td>
                                <td><input type="submit" name="saveitems" value=""width="35%" class="addbutton" alt="Add Record"/></td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <?php
                            $orderid="";
                            $_SESSIN['nettotal']=0;
                            if(isset($_SESSION['orderid']))
                            {
                                $orderid=$_SESSION['orderid'];
                            }
                            $ordereditems="SELECT * FROM _purchaseordereditems WHERE orderid='$orderid'";
                            $ordereditemsrecords=mysql_query($ordereditems);
                            $countordereditems=mysql_num_rows($ordereditemsrecords);
                            if($countordereditems)
                            {
                                while($ordereditemdatas=mysql_fetch_array($ordereditemsrecords))
                                {
                                    $_SESSIN['nettotal']=$_SESSIN['nettotal']+$ordereditemdatas['total'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $ordereditemdatas['modelnumber']; ?>
                            </td>
                            
                            <td>
                                <?php echo $ordereditemdatas['description']; ?>
                            </td>
                            <td align="center">
                                <?php echo $ordereditemdatas['quantity']; ?>
                            </td>
                            <td align="right">
                                <?php echo number_format($ordereditemdatas['unitprice'],2,'.',','); ?>
                            </td>
                            <td align="right">
                                <?php echo number_format($ordereditemdatas['total'],2,'.',','); ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        <tr>
                          <td colspan="4" align="right">Net Total</td>
                          <td align="right"><input type="text" name="nettotal" value="<?php if(isset($_SESSIN['nettotal'])){ echo $_SESSIN['nettotal'];} ?>" style="text-align:right; font-weight:bold;"/></td>
                        </tr>
                        
                      </table>
                      <!-- end of row container!-->
                    </div>
                </form>
                <!-- end of main-text-container!-->
            </div>
            <!-- end of right-column !-->
        </div>
        <!-- end of row container !-->
	</div>
<!-- end of main container!-->    
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>