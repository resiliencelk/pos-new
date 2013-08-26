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
                    <td width="60" align="right"><img src="../images/sup.png" /></td>
                    <td align="left">&nbsp;&nbsp;&nbsp;Add a Supplier </td>
                    </tr>
                    </table>
                    </div>
                </div>
                <div class="row-container">
    	<?php
			if(isset($_POST['save'])){
				echo "clicked";
				if(isset($_POST['supplierid'])){$supplierid=$_POST['supplierid'];}
				if(isset($_POST['action'])){$action=$_POST['action'];}
				if(isset($_POST['company'])){$company=$_POST['company'];}
				//if(isset($_POST['company'])){$company=$_POST['company'];}
				if(isset($_POST['address'])){$address=$_POST['address'];}
				if(isset($_POST['phonenumber'])){$phonenumber=$_POST['phonenumber'];}
				
				if(isset($_POST['email'])){$mail=$_POST['email'];}
				if(isset($_POST['title'])){$title=$_POST['title'];}
				if(isset($_POST['name'])){$name=$_POST['name'];}
				if(isset($_POST['contactnumber'])){$contactnumber=$_POST['contactnumber'];}
				if(isset($_POST['designation'])){$desgnation=$_POST['designation'];}
				if(isset($_POST['status'])){$status=$_POST['status'];}
				if(isset($_POST['review'])){$review=$_POST['review'];}
				
				if($_POST['save']=="Save")
				{
					echo $dabasehandle->_recordInsertion("INSERT INTO _suppliers(supplierid,companyname,companyaddress,companytelnumber,companyemail,title,suppliername,designation,suppliertelnumber,review,status) VALUES('$supplierid','$company','$address','$phonenumber','$mail','$title','$name','$desgnation','$contactnumber','$review','$status')","SAVED SUCCESSFULLY","SOME ERROR IN SAVE PLEASE CHECK");
				}
				elseif($_POST['save']=="Update")
				{
					echo $dabasehandle->_recordInsertion("UPDATE _suppliers SET companyname='$company',companyaddress='$address',companytelnumber='$phonenumber',companyemail='$mail',title='$title',suppliername='$name',designation='$desgnation',suppliertelnumber='$contactnumber',review='$review',status='$status' WHERE supplierid='$supplierid'","UPDATED SUCCESSFULLY","SOME ERROR IN UPDATE PLEASE CHECK");
				}
				elseif($_POST['save']=="Delete")
				{
					echo $dabasehandle->_recordInsertion("DELETE FROM _suppliers WHERE supplierid='$supplierid'","DELETED SUCCESSFULLY","SOME ERROR IN DELETE PLEASE CHECK");
				}


			}
			
		?>
    </div>
    <!-- end of message row !-->
  <form name="suppliers" action="newsuppilier.php" method="post">
    <div class="row-container">
    <!-- 2nd row !-->
        <div class="system-left-column">
        <!-- stsrt of system-left-column !-->
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Supplier ID
                </div>
                <div class="system-textbox"><span id="sprytextfield1">
                  <input type="text"name="supplierid" id="supplierid" class="s-textbox" value="<?php if(isset($_GET['supplierid'])){ echo $_GET['supplierid']; }else{ echo $dabasehandle->_newGeneration('SELECT COUNT(id) AS id FROM _suppliers','SUP','id');} ?>"  />
                <span class="textfieldRequiredMsg">Enter the Supplier ID</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Company
                </div>
                <div class="system-textbox"><span id="sprytextfield2">
                  <input type="text" name="company" id="company" class="s-textbox" value="<?php if(isset($_GET['supplierid'])){echo $dabasehandle->_getInfo("SELECT companyname FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","companyname"); }?>" />
                <span class="textfieldRequiredMsg">Enter the Company name</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Address
                </div>
                <div class="system-textbox"><span id="sprytextarea1">
                  <textarea name="address" id="address" class="s-textbox" ><?php if(isset($_GET['supplierid'])){echo $dabasehandle->_getInfo("SELECT companyaddress FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'",'companyaddress'); }?></textarea>
                <span class="textareaRequiredMsg">Enter the Address</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Phone Number
                </div>
                <div class="system-textbox"><span id="sprytextfield3">
                <input name="phonenumber" id="phonenumber" maxlength="10" type="text" class="s-textbox" value="<?php if(isset($_GET['supplierid'])){echo $dabasehandle->_getInfo("SELECT companytelnumber FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'",'companytelnumber'); }?>" />
                <span class="textfieldRequiredMsg">Enter the Phone Number</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC; margin-bottom:113px;">
                <div class="system-text">
                	E-mail
                </div>
                <div class="system-textbox"><span id="sprytextfield7">
                <input type="text" name="email" id="email" class="s-textbox" value="<?php if(isset($_GET['supplierid'])){echo $dabasehandle->_getInfo("SELECT companyemail FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'",'companyemail'); }?>" />
                <span class="textfieldRequiredMsg">Enter the Mail ID</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div>
            </div> 
            <!-- end of system-left-column!-->       
        </div>
        
        <div class="system-right-column">
        <!-- start of system-right-column!-->
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Title
                </div>
                <div class="system-textbox"><span id="spryselect2">
                  <?php
						//$ti=$dabasehandle->_getInfo("SELECT title FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","title");
						//echo $ti;
					?>
                    <select name="title" id="title" class="s-combotbox">
                      <option value="--Select--" selected="selected">--Select--</option>
                        <option value="Mr."<?php if(isset($_GET['supplierid'])){if($dabasehandle->_getInfo("SELECT title FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","title")=="Mr."){?> selected="selected"<? }} ?>>Mr.</option>
                        <option value="Ms."<?php if(isset($_GET['supplierid'])){if($dabasehandle->_getInfo("SELECT title FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","title")=="Ms."){?> selected="selected"<? }} ?>>Ms.</option>
                        <option value="Mrs."<?php if(isset($_GET['supplierid'])){if($dabasehandle->_getInfo("SELECT title FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","title")=="Mrs."){?> selected="selected"<? }} ?>>Mrs.</option>
                    </select>
                <span class="selectRequiredMsg">Please select a Title</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Name
                </div>
                <div class="system-textbox"><span id="sprytextfield4">
                  <input type="text" name="name" id="name" class="s-textbox" value="<?php if(isset($_GET['supplierid'])){echo $dabasehandle->_getInfo("SELECT suppliername FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'",'suppliername'); }?>" />
                <span class="textfieldRequiredMsg">Enter the Name</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Contact Number
                </div>
                <div class="system-textbox"><span id="sprytextfield5">
                <input type="text" name="contactnumber" id="contactnumber" class="s-textbox" value="<?php if(isset($_GET['supplierid'])){echo $dabasehandle->_getInfo("SELECT suppliertelnumber FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'",'suppliertelnumber'); }?>" />
                <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Designation
                </div>
                <div class="system-textbox"><span id="sprytextfield6">
                  <input type="text" name="designation" id="designation" class="s-textbox" value="<?php if(isset($_GET['supplierid'])){echo $dabasehandle->_getInfo("SELECT designation FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'",'designation'); }?>" />
                <span class="textfieldRequiredMsg">Enter the Designation</span></span></div>
            </div>
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Status
                </div>
                <div class="system-textbox"><span id="spryselect1">
                  <?php
						//$sta=$dabasehandle->_getInfo("SELECT status FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","status");
						//echo $sta;
					?>
                	<select name="status" id="status" class="s-combotbox">
                        <option value="--Select--" selected="selected">--Select--</option>
                        <option value="A"<?php if(isset($_GET['supplierid'])){if($dabasehandle->_getInfo("SELECT status FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","status")=="A"){?> selected="selected"<?php }}?> >Active</option>
                        <option value="P"<?php if(isset($_GET['supplierid'])){if($dabasehandle->_getInfo("SELECT status FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","status")=="P"){?> selected="selected"<?php }}?> >Pending</option>
                        <option value="D"<?php if(isset($_GET['supplierid'])){if($dabasehandle->_getInfo("SELECT status FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'","status")=="D"){?> selected="selected"<?php }}?> >Deactive</option>
                        
                    </select>
                <span class="selectRequiredMsg">Please select a Status</span></span></div>
            </div>  
            <div class="row-container" style="border-bottom:1px dashed #CCCCCC;">
                <div class="system-text">
                	Review
                </div>
                <div class="system-textbox">
                <textarea name="review" id="review" class="s-textbox" ><?php if(isset($_GET['supplierid'])){$rev=$dabasehandle->_getInfo("SELECT review FROM _suppliers WHERE supplierid='".$_GET['supplierid']."'",'review'); if($rev!==""){ echo $rev;}else{ echo "NILL"; }}?></textarea>
                </div>
            </div>  
            <div class="row-container" style="width:90%; padding:0% 5% 0% 5%;">
                <table width="100%" border="0">
                    <tr>
                        <td width="50%"><input type="reset" name="clear" class="system-btn-left" value="Clear" onclick="location.reload();" /></td>
                        <td width="50%"><input type="submit" name="save" class="system-btn-right" value="<?php if(isset($_GET['action'])){ if($_GET['action']=="Edit"){ echo "Update";}elseif($_GET['action']=="Delete"){ echo "Delete";}else{ echo "Save";}}else{ echo "Save";} ?>"<?php if(isset($_GET['action']) and ($_GET['action']=="search")){ ?> disabled="disabled" <?php }?> /></td>
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
          <th><div class="table-heading">SUPPLIER ID</div></th>
          <th><div class="table-heading">COMPANY</div> </th>
          <th><div class="table-heading">ADDRESS</div></th>
          <th><div class="table-heading">PHONE</div></th>
          <th><div class="table-heading">E-MAIL</div></td>
          <th><div class="table-heading">CONTACT PERSON</div></th>
          <th><div class="table-heading"> CONTACT</div></th>
          <th><div class="table-heading">STATUS</div></th>
          <th><div class="table-heading">ACTIONS</div></th>
        </tr>
        <?php
		$x=1;
		$totalSupplier="SELECT * FROM _suppliers";
		$totalRecord=mysql_query($totalSupplier);
		$counttotSupplier=mysql_num_rows($totalRecord);
		if($counttotSupplier>0)
		{
			while($totaldata=mysql_fetch_array($totalRecord))
			{
		?>
        <tr>
          <td style="color:#030; font-weight:bold;"><a href="newsuppilier.php?supplierid=<?php echo $totaldata['supplierid']; ?>&action=search"><?php echo $totaldata['supplierid']; ?></a></td>
          <td><?php echo $totaldata['companyname']; ?></td>
          <td><?php echo $totaldata['companyaddress']; ?></td>
          <td><?php echo $totaldata['companytelnumber']; ?></td>
          <td><?php echo $totaldata['companyemail']; ?></td>
          <td><?php echo $totaldata['title'].$totaldata['suppliername']; ?></td>
          <td><?php echo $totaldata['suppliertelnumber'] ?></td>
          <td><?php if($totaldata['status']=="A"){ echo "Active";} else if($totaldata['status']=="P"){ echo "Pending"; } else if($totaldata['status']=="D"){ echo "Deactivated"; } ?></td>
          <td>
          	<a href="newsuppilier.php?supplierid=<?php echo $totaldata['supplierid']; ?>&action=Edit"><img src="../images/edit.png" /></a> &nbsp;<a href="newsuppilier.php?supplierid=<?php echo $totaldata['supplierid']; ?>&action=Delete"><img src="../images/delete.png" /></a>
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
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur", "change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer", {validateOn:["blur", "change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["blur", "change"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "email", {validateOn:["blur", "change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur", "change"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur", "change"]});
</script>
</body>
</html>
<?php
$dabasehandle->_closeHost();
?>