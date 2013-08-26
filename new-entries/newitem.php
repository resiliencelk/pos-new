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
<title>Resilience - Item : <?php if(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT itemname FROM _items WHERE itemid='".$_GET['itemid']."'","itemname"); }?></title>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<?php
if(isset($_GET['action'])){
	$_SESSION['action']=$_GET['action'];}
?>
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
                	<div class="system-heading">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td width="60" align="right"><img src="../images/itm.png" /></td>
                    <td align="left">&nbsp;&nbsp;&nbsp;Add a Item </td>
                    </tr>
                    </table>
                    </div>
                </div>
                <form name="items" action="newitem.php" method="post" enctype="multipart/form-data">
    <div class="row-container">
    <?php
			if(isset($_POST['save']))
			{
				$uploadstatus=0;
				$productimage="";
				$thumbimage="";
				$dbthumb="";
				$dbimage="";
				if(isset($_POST['itemid'])){ $itemid=$_POST['itemid'];}
				echo $itemid;
				if(isset($_POST['modelnumber'])){ $modelnumber=$_POST['modelnumber'];}
				if(isset($_POST['itemname'])){ $itemname=$_POST['itemname'];}
				
				if(isset($_POST['itemtype'])){ $itemtype=$_POST['itemtype'];}
				if(isset($_POST['brand'])){ $brand=$_POST['brand'];}
				if(isset($_POST['unitprice'])){ $unitprice=$_POST['unitprice'];}
				
				if(isset($_POST['salesprice'])){ $salesprice=$_POST['salesprice'];}
				if(isset($_POST['discount'])){ $discount=$_POST['discount'];}
				if(isset($_POST['warranty'])){ $warranty=$_POST['warranty'];}
				
				if(isset($_POST['newarrival'])){ $newarrival=$_POST['newarrival'];}
				if(isset($_POST['specialoffer'])){ $specialoffer=$_POST['specialoffer'];}
				if(isset($_POST['offerprice'])){ $offerprice=$_POST['offerprice'];}
				
				if(isset($_POST['status'])){ $status=$_POST['status'];}
				if(isset($_POST['supplierid'])){ $supplierid=$_POST['supplierid'];}
				if(isset($_POST['supplier'])){ $supplier=$_POST['supplier'];}
				
				if(isset($_POST['oldthumbimage'])){ $oldthumbimage=$_POST['oldthumbimage'];}
				if(isset($_POST['oldproductimage'])){ $oldproductimage=$_POST['oldproductimage'];}
				
				if(isset($_POST['specification'])){ $specification=$_POST['specification'];}
				if(isset($_POST['review'])){ $review=$_POST['review'];}
				
				if(isset($_FILES['productimage'])){
					$productimage=$dabasehandle->_uploadImage('productimage',$itemid,"products");
				}
				
				if($productimage!=""){
					$thumbimage=$dabasehandle->_uploadImage('thumbimage',$itemid,"thumbs");
				}
				
				if(!isset($_FILES['thumbimage']))
				{
					$dbthumb=$oldthumbimage;
				}
				else
				{
					$dbthumb=$thumbimage;
				}
				
				if(!isset($_FILES['productimage']))
				{
					$dbimage=$oldproductimage;
				}
				else
				{
					$dbimage=$productimage;
				}
				
				echo $dbimage;
				if($_POST['save']=="Save")
				{
					echo $dabasehandle->_recordInsertion("INSERT INTO _items(itemid,itemcatagory,modelnumber,itemname,itembrand,unitprice,salesprice,warranty,discounts,newarrival,specialoffer,review,status,supplierid,suppliername,specifications,offerprice,thumbimage,productimage)VALUES('$itemid','$itemtype','$modelnumber','$itemname','$brand','$unitprice','$salesprice','$warranty','$discount','$newarrival','$specialoffer','$review','$status','$supplierid','$supplier','$specification','$offerprice','$dbthumb','$dbimage')","SAVED SUCCESSFULLY","UNABLE TO SAVE");
				}
				elseif($_POST['save']=="Update")
				{
					echo "UPDATE _items SET itemcatagory='$itemtype',modelnumber='$modelnumber',itemname='$itemname',itembrand='$brand',unitprice='$unitprice',salesprice='$salesprice',warranty='$warranty',discounts='$discount',newarrival='$newarrival',specialoffer='$specialoffer',review='$review',status='$status',supplierid='$supplierid',suppliername='$supplier',specifications='$specification',offerprice='$offerprice',thumbimage='$dbthumb',productimage='$dbimage' WHERE itemid='$itemid'";
					//echo $dabasehandle->_recordInsertion("UPDATE _items SET itemcatagory='$itemtype',modelnumber='$modelnumber',itemname='$itemname',itembrand='$brand',unitprice='$unitprice',salesprice='$salesprice',warranty='$warranty',discounts='$discount',newarrival='$newarrival',specialoffer='$specialoffer',review='$review',status='$status',supplierid='$supplierid',suppliername='$supplier',specifications='$specification',offerprice='$offerprice',thumbimage='$dbthumb',productimage='$dbimage' WHERE itemid='$itemid'","UPDATED SUCCESSFULLY","UNABLE TO UPDATE");
				}
				elseif($_POST['save']=="Delete")
				{
					echo $dabasehandle->_recordInsertion("DELETE FROM _items WHERE itemid='$itemid'","DELETED SUCCESSFULLY","UNABLE TO DELETE");
				}
				unset($_SESSION['action']);
			}
		?>
    </div>
    <div class="row-container">
    <!-- 2nd row !-->
        <div class="system-left-column">
        <!-- stsrt of system-left-column !-->
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Item ID
                </div>
                <div class="system-textbox"><span id="sprytextfield1">
                  <input type="text" name="itemid" class="s-textbox" value="<?php if(isset($_GET['itemid'])){ echo $_GET['itemid'];}elseif(isset($_POST['save'])||isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){echo $_POST['itemid'];}else{ echo $dabasehandle->_newGeneration("SELECT COUNT(id) as id FROM _items","ITM","id");}?>" />
                <span class="textfieldRequiredMsg">Enter the Item ID</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Model No
                </div>
                <div class="system-textbox"><span id="sprytextfield2">
                  <input type="text" name="modelnumber" class="s-textbox" value="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['modelnumber'])){echo $_POST['modelnumber'];}}elseif(isset($_GET['itemid'])){ echo $dabasehandle->_getInfo("SELECT modelnumber FROM _items WHERE itemid='".$_GET['itemid']."'","modelnumber");}?>" />
                <span class="textfieldRequiredMsg">Enter the Model Number</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Item Name
                </div>
                <div class="system-textbox"><span id="sprytextfield3">
                  <input type="text" name="itemname" class="s-textbox" value="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['itemname'])){echo $_POST['itemname'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT itemname FROM _items WHERE itemid='".$_GET['itemid']."'","itemname");}?>" />
                <span class="textfieldRequiredMsg">Enter the Item Name</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Item type
                </div>
                <div class="system-textbox"><span id="sprytextfield4">
                  <select name="itemtype" class="s-combotbox" onchange="document.items.submit();">
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
                <span class="textfieldRequiredMsg">Enter the Item Type</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Brand
                </div>
                <div class="system-textbox"><span id="spryselect4">
                  <select name="brand" class="s-combotbox" onchange="document.items.submit();">
                    <option value="--Select--" selected="selected">--Select--</option>
                    <?php
						if(isset($_POST['itemtype']))
						{
							$itmTy=$_POST['itemtype'];
							$brandSql="SELECT brand FROM _itembrand WHERE itemtype='$itmTy' AND status='A'";
						}
						else
						{
							$brandSql="SELECT brand FROM  _itembrand WHERE status='A'";
						}
						if(isset($_POST['brand']))
						{
							$selectedBrand=$_POST['brand'];
						}
						
						$brandRecord=mysql_query($brandSql);
						while($brandDatas=mysql_fetch_array($brandRecord))
						{
					?>
                    <option value="<?php echo $brandDatas['brand']; ?>" <?php if(isset($selectedBrand)){if($brandDatas['brand']==$selectedBrand){ ?> selected="selected"<?php }} ?>><?php echo $brandDatas['brand']; ?></option>
                    <?php
						}
					?>
                  </select>
                <span class="selectRequiredMsg">Enter the Brand</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Unit Prize(Rs.)
                </div>
                <div class="system-textbox"><span id="sprytextfield6">
                <input type="text" name="unitprice" class="s-textbox" value="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['unitprice'])){echo $_POST['unitprice'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT unitprice FROM _items WHERE itemid='".$_GET['itemid']."'","unitprice");}?>" />
                <span class="textfieldRequiredMsg">Enter the Prize</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Sales Prize(Rs.)
                </div>
                <div class="system-textbox"><span id="sprytextfield7">
                <input type="text" name="salesprice" class="s-textbox" value="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['salesprice'])){echo $_POST['salesprice'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT salesprice FROM _items WHERE itemid='".$_GET['itemid']."'","salesprice");}?>" />
                <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Enter the Prize</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Discount
                </div>
                <div class="system-textbox"><span id="sprytextfield8">
                  <input type="text" name="discount" class="s-textbox" value="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['discount'])){echo $_POST['discount'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT discounts FROM _items WHERE itemid='".$_GET['itemid']."'","discounts");}?>" />
                <span class="textfieldRequiredMsg">A value is required.</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Warrenty(Months)
                </div>
                <div class="system-textbox"><span id="sprytextfield9">
                  <input type="text" name="warranty" class="s-textbox" value="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['warranty'])){echo $_POST['warranty'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT warranty FROM _items WHERE itemid='".$_GET['itemid']."'","warranty");}?>" />
                <span class="textfieldRequiredMsg">Enter the Warrenty Period</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	New Arrival?
                </div>
                <div class="system-textbox"><span id="spryselect1">
                  <select class="s-combotbox" name="newarrival">
                	<option value="--Select--" selected="selected">--Select--</option>
                    <option value="Y"<?php if(isset($_GET['itemid'])){if($dabasehandle->_getInfo("SELECT newarrival FROM _items WHERE itemid='".$_GET['itemid']."'","newarrival")=="Y"){?>selected="selected"<?php }}elseif(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){							if(isset($_POST['newarrival']) and($_POST['newarrival']=="Y")){?>selected="selected"<?php }}?>>Yes</option>
                	<option value="N"<?php if(isset($_GET['itemid'])){if($dabasehandle->_getInfo("SELECT newarrival FROM _items WHERE itemid='".$_GET['itemid']."'","newarrival")=="N"){?>selected="selected"<?php }}elseif(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){							if(isset($_POST['newarrival']) and($_POST['newarrival']=="N")){?>selected="selected"<?php }}?>>No</option>
                </select>
                <span class="selectRequiredMsg">Please select an item.</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Special Offer?
              </div>
                <div class="system-textbox"><span id="spryselect2">
                  <select class="s-combotbox" name="specialoffer">
                	<option value="--Select--" selected="selected">--Select--</option>
                	<option value="Y"<?php if(isset($_GET['itemid'])){if($dabasehandle->_getInfo("SELECT specialoffer FROM _items WHERE itemid='".$_GET['itemid']."'","specialoffer")=="Y"){?>selected="selected"<?php }}elseif(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){							if(isset($_POST['specialoffer']) and($_POST['specialoffer']=="Y")){?>selected="selected"<?php }}?>>Yes</option>
                	<option value="N"<?php if(isset($_GET['itemid'])){if($dabasehandle->_getInfo("SELECT specialoffer FROM _items WHERE itemid='".$_GET['itemid']."'","specialoffer")=="N"){?>selected="selected"<?php }}elseif(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){							if(isset($_POST['specialoffer']) and($_POST['specialoffer']=="N")){?>selected="selected"<?php }}?>>No</option>
                </select>
                <span class="selectRequiredMsg">Please select an item.</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Offer Prize
                </div>
                <div class="system-textbox"><span id="sprytextfield10">
                <input type="text" name="offerprice" class="s-textbox" value="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['offerprice'])){echo $_POST['offerprice'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT offerprice FROM _items WHERE itemid='".$_GET['itemid']."'","offerprice");}?>" />
                <span class="textfieldRequiredMsg">Enter the Offer prize</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Status
                </div>
                <div class="system-textbox"><span id="spryselect3">
                  <select name="status" id="status" class="s-combotbox">
                        <option value="--Select--" selected="selected">--Select--</option>
                        <option value="A"<?php if(isset($_GET['itemid'])){if($dabasehandle->_getInfo("SELECT status FROM _items WHERE itemid='".$_GET['itemid']."'","status")=="A"){?>selected="selected"<?php }}elseif(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){							if(isset($_POST['status']) and($_POST['status']=="A")){?> selected="selected"<?php }}?>>Active</option>
                        <option value="P"<?php if(isset($_GET['itemid'])){if($dabasehandle->_getInfo("SELECT status FROM _items WHERE itemid='".$_GET['itemid']."'","status")=="P"){?>selected="selected"<?php }}elseif(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){							if(isset($_POST['status']) and($_POST['status']=="P")){?>selected="selected"<?php }}?> >Pending</option>                        
                        <option value="D"<?php if(isset($_GET['itemid'])){if($dabasehandle->_getInfo("SELECT status FROM _items WHERE itemid='".$_GET['itemid']."'","status")=="D"){?>selected="selected"<?php }}elseif(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){							if(isset($_POST['status']) and($_POST['status']=="D")){?>selected="selected"<?php }}?> >Deactive</option>
                    </select>
<span class="selectRequiredMsg">Please select an item.</span></span></div>
            </div> 
            <!-- end of system-left-column!-->       
        </div>
        
        <div class="system-right-column">
        <!-- start of system-right-column!-->
            <div class="row-container" style="padding:5px; margin:5px; font-size:16px; color:#900; font-weight:bold; border-bottom:1px dashed #CCCCCC;">
                Major Suppiler
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
            <div class="system-text">
                	Suppiler ID
                </div>
                <div class="system-textbox">
                <select class="s-combotbox" name="supplierid" onchange="document.items.submit();">
                	<option value="--Select--" selected="selected">--Select--</option>
                    <?php
						if(isset($_POST['supplierid']))
						{
							$selectedSupplier=$_POST['supplierid'];
						}
						$supplierSql="SELECT supplierid FROM _suppliers WHERE status='A'";
						$supplierRecord=mysql_query($supplierSql);
						while($supplierDatas=mysql_fetch_array($supplierRecord))
						{
					?>
                    		<option value="<?php echo $supplierDatas['supplierid']; ?>" <?php if(isset($selectedSupplier)){if($supplierDatas['supplierid']==$selectedSupplier){ ?> selected="selected"<?php }} ?>><?php echo $supplierDatas['supplierid']; ?></option>
                    <?php
						}
					?>
                </select>
                </div>
            </div>    
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Supplier (company)
                </div>
                <div class="system-textbox"><span id="sprytextfield12">
                  <input type="text" name="supplier" class="s-textbox" value="<?php //if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['supplier'])){echo $_POST['supplier'];}else{
					if(isset($_POST['supplierid'])){echo $dabasehandle->_getInfo("SELECT companyname FROM _suppliers WHERE supplierid='".$_POST['supplierid']."'","companyname");}//}?>
				" />
                <span class="textfieldRequiredMsg">Enter the Supplier(company) Name</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Thumb Image
                </div>
                <div class="system-textbox">
                <input type="file" name="thumbimage"  value="" />
                <input style="width:87%; padding:2px 0px 2px 0px;" type="text" name="oldthumbimage"placeholder="60px * 40px"  value="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['oldthumbimage'])){echo $_POST['oldthumbimage'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT thumbimage FROM _items WHERE itemid='".$_GET['itemid']."'","thumbimage");}?>" />
                <img name="thumbimg" src="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['oldthumbimage'])){echo $_POST['oldthumbimage'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT thumbimage FROM _items WHERE itemid='".$_GET['itemid']."'","thumbimage");}?>" width="42" height="42" alt="" />
                </div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Image
                </div>
                <div class="system-textbox">
                <input type="file" name="productimage"  value="" />
                <input style="width:87%; padding:2px 0px 2px 0px;" type="text" name="oldproductimage" placeholder="200px * 180px"  value="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['oldproductimage'])){echo $_POST['oldproductimage'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT productimage FROM _items WHERE itemid='".$_GET['itemid']."'","productimage");}?>" />
                <img name="thumbimg" src="<?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['oldproductimage'])){echo $_POST['oldproductimage'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT productimage FROM _items WHERE itemid='".$_GET['itemid']."'","productimage");}?>" width="42" height="42" alt="" />
                </div>
            </div>
          <div class="row-container" style="padding:5px; margin:5px; font-size:16px; color:#900; font-weight:bold; border-bottom:1px dashed #CCCCCC;">
                 Add Specification?&nbsp;&nbsp;<input type="radio" name="specf" id='check2' onClick='check()' />Yes<input type="radio" name="specf"id='check1' onClick='check()' />No
                  
            </div>
            <script>
					function check()
					{
						if (document.getElementById("check1").checked)
						{
							
							document.getElementById("txt1").value ="Null";
							
							document.getElementById("txt1").disabled="true";
						}
						else (document.getElementById("check2").checked)
						{
							document.getElementById("txt1").placeholder ="Type here";
						}
					}
					</script>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Specification
                </div>
                <div class="system-textbox">
                <textarea name="specification" class="s-textbox" id="txt1"><?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['specification'])){echo $_POST['specification'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT specifications FROM _items WHERE itemid='".$_GET['itemid']."'","specifications");}?></textarea>
                </div>
            </div>  
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Review
                </div>
                <div class="system-textbox">
                <textarea name="review" class="s-textbox" ><?php if(isset($_POST['itemtype'])||isset($_POST['brand'])||isset($_POST['supplierid'])){if(isset($_POST['review'])){echo $_POST['review'];}}elseif(isset($_GET['itemid'])){echo $dabasehandle->_getInfo("SELECT review FROM _items WHERE itemid='".$_GET['itemid']."'","review");}?></textarea>
                </div>
            </div>  
            <div class="row-container" style="width:90%; padding:0% 5% 0% 5%; margin-bottom:40px;">
                <table width="100%" border="0">
                    <tr>
                        <td width="50%">
                        <input type="reset" name="clear" class="system-btn-left" value="Clear" onclick="location.reload();" /></td>
                        <td width="50%">
                        <input type="submit" name="save" class="system-btn-right" value="<?php if(isset($_SESSION['action'])){if($_SESSION['action']=="Edit"){ echo "Update";}elseif($_SESSION['action']=="Delete"){ echo "Delete";}else{ echo "Save";}}else {echo "Save";}?>" <?php if(isset($_SESSION['action'])){ if(isset($_SESSION['action'])){if($_SESSION['action']=="search"){?><?php }}}  ?> />
                        </td>
                    </tr>
                </table>
            </div>
        </div>  
        <!-- end 0f sytem-right-column!-->
    </div>
    <!-- end fo 2nd row!-->
 </form>
    <!-- 3rd row!-->
    <div class="row-container" style="margin-top:20px;">
        <table width="100%" cellpadding="1px" cellspacing="0" border="0" bgcolor="#FFFFFF" style="border-radius:5px 5px 0px 0px; color:#333;">
            <tr style="background:url(../images/table-bg.jpg); background-repeat:repeat-x; height:30px;">
                <th width="5%" align="center"><div class="table-heading">Item ID</div></th>
                <th width="14%" align="center"><div class="table-heading">Name</div></th>
                <th width="10%" align="center"><div class="table-heading">Type</div></th>
                <th width="10%" align="center"><div class="table-heading">Brand</div></th>
                <th width="9%" align="center"><div class="table-heading">Unit Prize</div></th>
                <th width="10%" align="center"><div class="table-heading">Sales Prize</div></th>
                <th width="7%" align="center"><div class="table-heading">Discount</div></th>
                <th width="7%" align="center"><div class="table-heading">Warrenty</div></th>
                <th width="5%" align="center"><div class="table-heading">Sup-ID</div></th>
                <th width="10%" align="center"><div class="table-heading">Supplier</div></th>
                <th width="5%" align="center"><div class="table-heading">Status</div></th>
                <th width="8%" align="center"><div class="table-heading">Action</div></th>
            </tr>
               <?php
		$x=1;
		$totalItems="SELECT * FROM _items";
		$totalRecord=mysql_query($totalItems);
		$counttotItem=mysql_num_rows($totalRecord);
		if($counttotItem>0)
		{
			while($totaldata=mysql_fetch_array($totalRecord))
			{
		?>
        <tr>
          <td align="center" style="color:#030; font-weight:bold;"><a href="newitem.php?itemid=<?php echo $totaldata['itemid']; ?>&action=search"><?php echo $totaldata['itemid']; ?></a></td>
          <td align="center"><?php echo $totaldata['itemname']; ?></td>
          <td align="center"><?php echo $totaldata['itemcatagory']; ?></td>
          <td align="center"><?php echo $totaldata['itembrand']; ?></td>
          <td align="center"><?php echo number_format($totaldata['unitprice'],2,'.',','); ?></td>
          <td align="center"><?php echo number_format($totaldata['salesprice'],2,'.',','); ?></td>
          <td align="center"><?php echo number_format($totaldata['discounts'],2,'.',',') ?></td>
          <td align="center"><?php echo $totaldata['warranty']; ?></td>
          <td align="center"><?php echo $totaldata['supplierid']; ?></td>
          <td align="center"><?php echo $totaldata['suppliername']; ?></td>
          
          <td align="center"><?php if($totaldata['status']=="A"){ echo "Active";} else if($totaldata['status']=="P"){ echo "Pending"; } else if($totaldata['status']=="D"){ echo "Deactivated"; } ?></td>
          <td align="center">
          	<a href="newitem.php?itemid=<?php echo $totaldata['itemid']; ?>&action=Edit"><img src="../images/edit.png" /></a> |
            <a href="newitem.php?itemid=<?php echo $totaldata['itemid']; ?>&action=Delete"><img src="../images/delete.png" /></a>
          </td>
        </tr>
        <?php
			$x++;
			}
		}
		?>
        </table>
        </div>

<!-- end of main container !-->

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur", "change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "currency", {validateOn:["blur", "change"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "currency", {validateOn:["blur", "change"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {validateOn:["blur", "change"]});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {validateOn:["blur", "change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur", "change"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur", "change"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "currency", {validateOn:["blur", "change"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur", "change"]});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none", {validateOn:["blur", "change"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["blur", "change"]});
</script>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>