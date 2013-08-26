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
<title>Resilience - Supplier :<?php if(isset($_GET['supplierid'])){echo $dabasehandle->_getInfo("SELECT companyname FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","companyname"); }?></title>
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
		var salesprice=0;
		var totalprice=0;
		
		quantity=parseInt(document.invoice.quantity.value);
		salesprice=parseFloat(document.invoice.salesprice.value);
		if(salesprice!="")
		{
			totalprice=parseFloat(salesprice)*parseInt(quantity);
		}else{
			totalprice=salesprice;
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
                        if(isset($_POST['invoicenumber'])){$invoicenumber=$_POST['invoicenumber'];}
                        
                        if(isset($_POST['invoicenumber'])){$_SESSION['invoicenumber']=$_POST['invoicenumber'];}
                        
                        
                        if(isset($_POST['description'])){$description=$_POST['description'];}
                        if(isset($_POST['quantity'])){$quantity=$_POST['quantity'];}
                        if(isset($_POST['salesprice'])){$salesprice=$_POST['salesprice'];}
                        if(isset($_POST['totalprice'])){$totalprice=$_POST['totalprice'];}
                        
                        $dabasehandle->_invisibleRecordInsertion("INSERT INTO _invoiceitems (invoiceid,description,quantity,unitprice,total) VALUES('$invoicenumber','$description','$quantity','$salesprice','$totalprice')");
						
						
		
                        unset($_SESSION['catagory']);
                        unset($_SESSION['itemid']);
                        unset($_SESSION['modelnumber']);
                        unset($_SESSION['itemname']);
                        unset($_SESSION['warranty']);
                        unset($_SESSION['salesprice']);
                    }
                    
                    if(isset($_POST['saveandprint']))
                    {
                        if(isset($_POST['invoicenumber'])){$invoicenumber=$_POST['invoicenumber'];}
                        if(isset($_POST['invoicedate'])){$invoicedate=$_POST['invoicedate'];}
                        if(isset($_POST['pymode'])){$pymode=$_POST['pymode'];}
                        if(isset($_POST['status'])){$status=$_POST['status'];}
                        
                        if(isset($_POST['customerid'])){$customerid=$_POST['customerid'];}
                        if(isset($_POST['name'])){$name=$_POST['name'];}
                        if(isset($_POST['address'])){$address=$_POST['address'];}
                        if(isset($_POST['contactnumber'])){$contactnumber=$_POST['contactnumber'];}
                        
                        if(isset($_POST['nettotal'])){$nettotal=$_POST['nettotal'];}
                        if(isset($_POST['discouts'])){$discouts=$_POST['discouts'];}
                        if(isset($_POST['grandtotal'])){$grandtotal=$_POST['grandtotal'];}
                        if(isset($_POST['status'])){$status=$_POST['status'];}
                        
                        
                        $dabasehandle->_invisibleRecordInsertion("INSERT INTO _invoice (invoiceid,invoicedate,paymentmode,customerid,customername,customeraddress,customertelnumber,nettotal,discounts,vat,grandtotal,status,type) VALUES('$invoicenumber','$invoicedate','$pymode','$customerid','$name','$address','$contactnumber','$nettotal','$discouts','0','$grandtotal','$status','2')");
						
						echo $pymode;
						
						if($pymode=="1"||$pymode==1)
                        {
						$dabasehandle->_invisibleRecordInsertion("INSERT INTO _transactions (transactiondate,description,amount,catagory,account) VALUES('$invoicedate','$invoicenumber','$grandtotal','1','$pymode')");
						}
						
						
                       header("location:printserviceinvoice.php?invoiceid=$invoicenumber","_blank");
                    }
                    ?>
        		</div>
    			<!-- end of message row !-->
                    <form name="invoice" action="service-invoice.php" method="post">
                    <div class="row-container">
                    <!-- 2nd row !-->
                        <div class="system-left-column">
                        <!-- stsrt of system-left-column !-->
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Customer ID
                                    <?php
                                        if(isset($_GET['customerid']))
                                        {
                                            $_SESSION['customerid']=$_GET['customerid'];
                                            //$_SESSION['customername']=$_GET['customername'];
                                            
                                            $cusid=$_GET['customerid'];
                                            $customerdetails="SELECT * FROM  _customers WHERE customerid='".$cusid."'";
                                            $cusdetailsrecord=mysql_query($customerdetails);
                                            $cusdetaildata=@mysql_fetch_array($cusdetailsrecord);
                                            $_SESSION['cusaddress']=$cusdetaildata['companyaddress'];
                                            $_SESSION['cuscontact']=$cusdetaildata['companytelnumber'];
											
											$_SESSION['contactperson']=$cusdetaildata['title'].$cusdetaildata['customername'];
											$_SESSION['contactpersonaddress']=$cusdetaildata['companyaddress'];
											$_SESSION['contactpersontel']=$cusdetaildata['customertelnumber'];
                                        }
                                    ?>
                                </div>
                                <div class="system-textbox">
                                <table width="100%" border="0">
                                <tr>
                                    <td width="80%">
                                        <input type="text" name="customerid" class="s-textbox" value="<?php if(isset($_SESSION['customerid'])){ echo $_SESSION['customerid'];} ?>"  />
                                    </td>
                                    <td width="20%">
                                    <a href="#openModal"><input type="button" name="search" value="Search"/></a>
                                    <!-- model window !-->
                                    <div id="openModal" class="modalDialog">
                                    <div>
                                    <a href="#close" title="Close" class="close">X</a>
                                    <table width="100%" cellpadding="5px" cellspacing="0" border="1" bordercolor="#999999">
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                        </tr>
                                        <?php
                                        $customerlistsql="SELECT * FROM _customers WHERE status='A'";
                                        $customerlistrecord=mysql_query($customerlistsql);
                                        $countcustomers=mysql_num_rows($customerlistrecord);
                                        if($countcustomers>0)
                                        {
                                            while($customerdata=mysql_fetch_array($customerlistrecord))
                                            {
                                                
                                        ?>
                                        <tr>
                                            <td><a href="service-invoice.php?customerid=<?php echo $customerdata['customerid']; ?>&customername=<?php 
											if(($customerdata['companyname']!="nill")||($customerdata['companyname']!="Nill")){echo $customerdata['companyname'];}else{echo $customerdata['customername'];} ?>"><?php echo $customerdata['customerid']; ?></a></td>
                                            <td><?php if(($customerdata['companyname']!="nill")||($customerdata['companyname']!="Nill")){echo $customerdata['companyname'];}else{ echo $customerdata['customername']."test";} ?></td>
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
                                    Customer Name
                                </div>
                                <div class="system-textbox">
                                  <input type="text" name="name" class="s-textbox" value="<?php if(isset($_SESSION['customername'])){ echo $_SESSION['customername'];}elseif(isset($_SESSION['contactperson'])){ echo $_SESSION['contactperson'];} ?>"  />
                                </div>
                            </div>
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Adddress
                                </div>
                                <div class="system-textbox">
                                  <input type="text" name="address" class="s-textbox" value="<?php if(isset($_SESSION['cusaddress'])){ echo $_SESSION['cusaddress'];}elseif(isset($_SESSION['contactpersonaddress'])){ echo $_SESSION['contactpersonaddress'];} ?>"  />
                                </div>
                            </div>
                            <div class="row-container">
                                <div class="system-text">
                                    Contact Number
                                </div>
                                <div class="system-textbox">
                                  <input type="text" name="contactnumber" class="s-textbox" value="<?php if(isset($_SESSION['cuscontact'])and($_SESSION['cuscontact']!=0)){ echo $_SESSION['cuscontact'];}elseif(isset($_SESSION['contactpersontel'])){ echo $_SESSION['contactpersontel'];} ?>"  />
                                </div>
                            </div>
                       </div> 
                       <!-- end of system-left-column!-->       
                        
                        <div class="system-right-column">
                        <!-- start of system-right-column!-->
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Invoice Date
                                </div>
                                <div class="system-textbox">
                                <?php
                                    $da=date('d');
                                    $mo=date('m');
                                    $yr=date('y');
                                    $ivid='RES'.$mo.$da.$yr;
                                ?>
                                    <input type="date" name="invoicedate" value="<?php echo date('d'.'/'.'m'.'/'.'Y'); ?>" class="s-textbox"/>
                                </div>
                            </div>
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Invoice number
                                </div>
                                <div class="system-textbox">
                                    <input type="text" name="invoicenumber" class="s-textbox" value="<?php $invdate=date('d'.'/'.'m'.'/'.'Y'); echo $dabasehandle->_newGeneration("SELECT COUNT(id) AS id from _invoice where invoicedate='$invdate'","$ivid","id"); ?>" />
                                </div>
                            </div>
                            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                                <div class="system-text">
                                    Mod of Payment
                                </div>
                                <div class="system-textbox">
                                    <select name="pymode" class="s-combotbox">
                                    <option value="1">Cash</option>
                                    <option value="2">Cheque</option>
                                    <option value="3">Credit</option>
                                    </select>
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
                    
                    <div class="row-container" style="margin-top:20px;">
                        <table width="100%" cellpadding="1px" cellspacing="0" border="1" bordercolor="#CCCCCC" style="border-radius:5px 5px 0px 0px; color:#333; ">
                        <tr style="background:url(../images/table-bg.jpg); background-repeat:repeat-x; height:30px;">
                          <th width="35%"><div class="table-heading">Description</div> </th>
                          <th width="15%"><div class="table-heading">Qty / HRS</div></th>
                          <th width="10%"><div class="table-heading">Unit Prize</div></th>
                          <th width="20%"><div class="table-heading">Total</div></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="description" value=""/></td>
                          <td><input type="text" name="quantity" value="" onblur="cal_total();"/></td>
                          <td><input type="text" name="salesprice" value="" style="text-align:right;"/></td>
                          <td>
                          <input type="text" name="totalprice" value="" width="60%" style="text-align:right;"/>&nbsp;<input type="submit" name="saveitems" value=""width="35%" class="addbutton" title="Add Record"/></td>
                        </tr>
                        <?php
                            $invoicenumber="";
                            $_SESSIN['nettotal']=0;
                            if(isset($_SESSION['invoicenumber']))
                            {
                                $invoicenumber=$_SESSION['invoicenumber'];
                            }
                            $invoiceditems="SELECT * FROM  _invoiceitems WHERE invoiceid='$invoicenumber'";
                            $invoiceditemsrecords=mysql_query($invoiceditems);
                            $countinvoiceditems=mysql_num_rows($invoiceditemsrecords);
                            if($countinvoiceditems)
                            {
                                while($invoiceditemdatas=mysql_fetch_array($invoiceditemsrecords))
                                {
                                    $_SESSIN['nettotal']=$_SESSIN['nettotal']+$invoiceditemdatas['total'];
                        ?>
                        <tr>
                            
                            <td>
                                <?php echo $invoiceditemdatas['description']; ?>
                            </td>
                            <td align="center">
                                <?php echo $invoiceditemdatas['quantity']; ?>
                            </td>
                            <td align="right">
                                <?php echo number_format($invoiceditemdatas['unitprice'],2,',',','); ?>
                            </td>
                            <td align="right">
                                <?php echo number_format($invoiceditemdatas['total'],2,',',','); ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        <tr>
                          <td colspan="3" align="right">Net Total</td>
                          <td align="right"><input type="text" name="nettotal" value="<?php if(isset($_SESSIN['nettotal'])){ echo $_SESSIN['nettotal'];} ?>" style="text-align:right; font-weight:bold;"/></td>
                        </tr>
                        <tr>
                          <td colspan="3" align="right">Discount</td>
                          <td align="right"><input type="text" name="discouts" value="0" style="text-align:right; font-weight:bold;" onblur="cal_grandtotal();"/></td>
                        </tr>
                        <tr>
                          <td colspan="3" align="right">Grand Total</td>
                          <td align="right"><input type="text" name="grandtotal" value="<?php if(isset($_SESSIN['nettotal'])){ echo $_SESSIN['nettotal'];} ?>" style="text-align:right; font-weight:bold;"/></td>
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