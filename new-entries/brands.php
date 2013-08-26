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
<title>Resilience - Brands</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
                <form action="brands.php" name="itemtype" method="post">
    <!-- 2nd row !-->
        <div class="system-left-column">
        <!-- stsrt of system-left-column !-->
        	<div class="row-container" style="margin-bottom:20px;">
                	<div class="system-heading">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td width="60" align="right"><img src="../images/itm.png" /></td>
                    <td align="left">&nbsp;&nbsp;&nbsp;Add Item Type </td>
                    </tr>
                    </table>
                    </div>
                </div>
             <div class="row-container">
					<?php
                if(isset($_POST['typesave'])){
                    echo "save";
                    if(isset($_POST['typeid'])){$typeid=$_POST['typeid'];}
                    if(isset($_POST['type'])){$type=$_POST['type'];}
                    if(isset($_POST['typestatus'])){$typestatus=$_POST['typestatus'];}
                    
                    if($_POST['typesave']=="Save")
                    {
                        echo $dabasehandle->_recordInsertion("INSERT INTO _itemtype(type,status) VALUES('$type','$typestatus')","SAVED SUCCESSFULLY","SOME ERROR IN SAVE PLEASE CHECK");
                    }
                    elseif($_POST['typesave']=="Update")
                    {
                        echo $dabasehandle->_recordInsertion("UPDATE _itemtype SET type='$type',status='$typestatus' WHERE typeid='$typeid'","UPDATED SUCCESSFULLY","SOME ERROR IN UPDATE PLEASE CHECK");
                    }
                    elseif($_POST['typesave']=="Delete")
                    {
                        echo $dabasehandle->_recordInsertion("DELETE FROM _itemtype WHERE typeid='$typeid'","DELETED SUCCESSFULLY","SOME ERROR IN DELETE PLEASE CHECK");
                    }
    
    
                }
                
            ?>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Item Type
                </div>
                <div class="system-textbox">
                    <input class="s-textbox" type="text" name="type" value="<?php if(isset($_GET['typeid'])){echo $dabasehandle->_getInfo("SELECT type FROM  _itemtype WHERE typeid='".$_GET['typeid']."'","type"); }?>" />
                    <input class="s-textbox" type="hidden" name="typeid" value="<?php if(isset($_GET['typeid'])){echo $_GET['typeid']; }?>" />
                </div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Status
                </div>
                <div class="system-textbox">
                <select class="s-combotbox" name="typestatus">
                        <option value="--Select--" selected="selected">--Select--</option>
                        <option value="A"<?php if(isset($_GET['typeid'])){if($dabasehandle->_getInfo("SELECT status FROM  _itemtype WHERE typeid='".$_GET['typeid']."'","status")=="A"){?> selected="selected"<?php }}?>>Active</option>
                    <option value="P"<?php if(isset($_GET['typeid'])){if($dabasehandle->_getInfo("SELECT status FROM  _itemtype WHERE typeid='".$_GET['typeid']."'","status")=="P"){?> selected="selected"<?php }}?>>Pending</option>
                    <option value="D"<?php if(isset($_GET['typeid'])){if($dabasehandle->_getInfo("SELECT status FROM  _itemtype WHERE typeid='".$_GET['typeid']."'","status")=="D"){?> selected="selected"<?php }}?>>Deactive</option>
                        </select>
                </div>
            </div>
            <div class="row-container" style="margin-top:53px;">
                <table width="100%" border="0">
                    <tr>
                        <td width="50%"><input type="reset" name="clear" class="system-btn-left" value="Clear" onclick="location.reload();" /></td>
                        <td width="50%"><input type="submit" name="typesave" class="system-btn-right" value="<?php if(isset($_GET['typeaction'])){ if($_GET['typeaction']=="Edit"){ echo "Update";}elseif($_GET['typeaction']=="Delete"){ echo "Delete";}else{ echo "Save";}}else{ echo "Save";} ?>"<?php if(isset($_GET['typeaction']) and ($_GET['typeaction']=="search")){ ?> disabled="disabled" <?php }?> /></td>
                    </tr>
                </table>
            </div>
            <!-- end of system-left-column!-->       
        </div>
        </form>
        <form name="itembrandds" action="brands.php" method="post">
        <div class="system-right-column">
        <!-- start of system-right-column!-->
        	<div class="row-container" style="margin-bottom:20px;">
                	<div class="system-heading">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td width="60" align="right"><img src="../images/itmtype.png" /></td>
                    <td align="left">&nbsp;&nbsp;&nbsp;Add Item Brands </td>
                    </tr>
                    </table>
                    </div>
                </div>
            <div class="row-container" style="text-align:center;">
                	<?php
						if(isset($_POST['brandsave'])){
							
							if(isset($_POST['brandid'])){$brandid=$_POST['brandid'];}
							if(isset($_POST['brand'])){$brand=$_POST['brand'];}
							if(isset($_POST['type'])){$selectedtype=$_POST['type'];
						}
							if(isset($_POST['brandstatus'])){$brandstatus=$_POST['brandstatus'];}
							
							if($_POST['brandsave']=="Save")
							{
								echo $dabasehandle->_recordInsertion("INSERT INTO _itembrand(brand,itemtype,status) VALUES('$brand','$selectedtype','$brandstatus')","SAVED SUCCESSFULLY","SOME ERROR IN SAVE PLEASE CHECK");
							}
							elseif($_POST['brandsave']=="Update")
							{
								echo $dabasehandle->_recordInsertion("UPDATE _itembrand SET brand='$brand',itemtype='$selectedtype',status='$brandstatus' WHERE brandid='$brandid'","UPDATED SUCCESSFULLY","SOME ERROR IN UPDATE PLEASE CHECK");
							}
							elseif($_POST['brandsave']=="Delete")
							{
								echo $dabasehandle->_recordInsertion("DELETE FROM _itembrand WHERE brandid='$brandid'","DELETED SUCCESSFULLY","SOME ERROR IN DELETE PLEASE CHECK");
							}
			
			
						}
						
					?>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Item Type
                </div>
                <div class="system-textbox">
                <select name="type" class="s-combotbox">
                	<option value="--Select--" selected="selected">--Select--</option>
                    <?php
						if(isset($_POST['type']))
						{
							$selectedtype=$_POST['type'];
						}
						$typeSql="SELECT type FROM  _itemtype WHERE status='A'";
						$typeRecord=mysql_query($typeSql);
						while($typeDatas=mysql_fetch_array($typeRecord))
						{
					?>
                    		<option value="<?php echo $typeDatas['type']; ?>" <?php if(isset($selectedtype)){if($typeDatas['type']==$selectedtype){ ?> selected="selected"<?php }} ?>><?php echo $typeDatas['type']; ?></option>
                    <?php
						}
					?>
                </select>
                </div>
            </div> 
             <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Brand
                </div>
                <div class="system-textbox">
                <input type="text" name="brand" class="s-textbox" value="<?php if(isset($_GET['brandid'])){echo $dabasehandle->_getInfo("SELECT brand FROM _itembrand WHERE brandid='".$_GET['brandid']."'","brand"); }?>" />
                        <input class="s-textbox" type="hidden" name="brandid" value="<?php if(isset($_GET['brandid'])){echo $_GET['brandid']; }?>" />
                </div>
            </div> 
             <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Status
                </div>
                <div class="system-textbox">
                <select name="brandstatus" class="s-combotbox">
                            <option value="--Select--" selected="selected">--Select--</option>
                            <option value="A"<?php if(isset($_GET['brandid'])){if($dabasehandle->_getInfo("SELECT status FROM _itembrand WHERE brandid='".$_GET['brandid']."'","status")=="A"){?> selected="selected"<?php }}?>>Active</option>
                    <option value="P"<?php if(isset($_GET['brandid'])){if($dabasehandle->_getInfo("SELECT status FROM _itembrand WHERE brandid='".$_GET['brandid']."'","status")=="P"){?> selected="selected"<?php }}?>>Pending</option>
                    <option value="D"<?php if(isset($_GET['brandid'])){if($dabasehandle->_getInfo("SELECT status FROM _itembrand WHERE brandid='".$_GET['brandid']."'","status")=="D"){?> selected="selected"<?php }}?>>Deactive</option>
                        </select>
                </div>
            </div> 
             <div class="row-container" style="margin:5px 0px;">
                <table width="100%" border="0">
                    <tr>
                        <td width="50%"><input type="reset" name="clear" class="system-btn-left" value="Clear" onclick="location.reload();" /></td>
                        <td width="50%"><input type="submit" name="brandsave" class="system-btn-right" value="<?php if(isset($_GET['brandaction'])){ if($_GET['brandaction']=="Edit"){ echo "Update";}elseif($_GET['brandaction']=="Delete"){ echo "Delete";}else{ echo "Save";}}else{ echo "Save";} ?>"<?php if(isset($_GET['brandaction']) and ($_GET['brandaction']=="search")){ ?> disabled="disabled" <?php }?> /></td>
                    </tr>
                </table>
            </div> 
        <!-- end 0f sytem-right-column!-->
    </div>
    </form>
    <!-- end fo 2nd row!-->
    <!-- 3rd row!-->
    <div class="row-container" style="margin-top:20px;">
        <div class="system-left-column" style="height:400px; overflow-y:scroll;" id="style-3">
        <table width="100%" cellpadding="1px" cellspacing="0" border="1" bordercolor="#CCCCCC" style="border-radius:5px 5px 0px 0px; color:#333; ">
          <tr style="background:url(../images/table-bg.jpg); background-repeat:repeat-x; height:30px;">
            <td width="25%" align="center"><div class="table-heading"> Type ID</div></td>
            <td width="25%" align="center"><div class="table-heading">Item Type</div></td>
            <td width="25%" align="center"><div class="table-heading">Status</div></td>
            <td width="25%" align="center"><div class="table-heading">Action</div></td>
          </tr>
        <?php
		$x=1;
		$totaltype="SELECT * FROM  _itemtype";
		$totaltypeRecord=mysql_query($totaltype);
		$counttottype=mysql_num_rows($totaltypeRecord);
		if($counttottype>0)
		{
			while($totaltypedata=mysql_fetch_array($totaltypeRecord))
			{
		?>
        <tr>
          <td align="center" style="color:#030; font-weight:bold;"><a href="brands.php?typeid=<?php echo $totaltypedata['typeid']; ?>&typeaction=search"><?php echo $totaltypedata['typeid']; ?></a></td>
          <td align="center"><?php echo $totaltypedata['type']; ?></td>
          <td align="center"><?php if($totaltypedata['status']=="A"){ echo "Active";} else if($totaltypedata['status']=="P"){ echo "Pending"; } else if($totaltypedata['status']=="D"){ echo "Deactivated"; } ?></td>
          <td align="center">
          	<a href="brands.php?typeid=<?php echo $totaltypedata['typeid']; ?>&typeaction=Edit"><img src="../images/edit.png" /></a> |
            <a href="brands.php?typeid=<?php echo $totaltypedata['typeid']; ?>&typeaction=Delete"><img src="../images/delete.png" /></a>
          </td>
        </tr>
        <?php
			$x++;
			}
		}
		?>
        </table>
        </div>
        <div class="system-right-column" style="height:400px; overflow-y:scroll;" id="style-3">
        <table width="100%" cellpadding="1px" cellspacing="0" border="1" bordercolor="#CCCCCC" style="border-radius:5px 5px 0px 0px; color:#333; ">
          <tr style="background:url(../images/table-bg.jpg); background-repeat:repeat-x; height:30px;">
            <td width="25%" align="center"><div class="table-heading">Brand ID</div></td>
            <td width="25%" align="center"><div class="table-heading">Brand</div></td>
            <td width="25%" align="center"><div class="table-heading">Status</div></td>
            <td width="25%" align="center"><div class="table-heading">Action</div></td>
          </tr>
        <?php
		$x=1;
		$totalbrand="SELECT * FROM  _itembrand";
		$totalbrandRecord=mysql_query($totalbrand);
		$counttotbrand=mysql_num_rows($totalbrandRecord);
		if($counttotbrand>0)
		{
			while($totalbranddata=mysql_fetch_array($totalbrandRecord))
			{
		?>
        <tr >
          <td align="center" style="color:#030; font-weight:bold;"><a href="brands.php?brandid=<?php echo $totalbranddata['brandid']; ?>&brandaction=search"><?php echo $totalbranddata['brandid']; ?></a></td>
          <td align="center"><?php echo $totalbranddata['brand']; ?></td>
          <td align="center"><?php if($totalbranddata['status']=="A"){ echo "Active";} else if($totalbranddata['status']=="P"){ echo "Pending"; } else if($totalbranddata['status']=="D"){ echo "Deactivated"; } ?></td>
          <td align="center">
          	<a href="brands.php?brandid=<?php echo $totalbranddata['brandid']; ?>&brandaction=Edit"><img src="../images/edit.png" /></a> |
            <a href="brands.php?brandid=<?php echo $totalbranddata['brandid']; ?>&brandaction=Delete"><img src="../images/delete.png" /></a>
          </td>
        </tr>
        <?php
			$x++;
			}
		}
		?>
      </table>
        </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>