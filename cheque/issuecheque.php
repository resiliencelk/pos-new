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
<script language="javascript" type="text/javascript">
function delete_records()
{
	answer = confirm("Are you sure want to delete this transaction permenantly...?")

	if (answer=="0")
	{
		return false;
	}
	return true;
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
        	<div class="main-text-container">
            	<div class="row-container">
                    	<?php
							if(isset($_POST['btnadd']))
							{
								if(isset($_POST['chequeno'])){$chequeno=$_POST['chequeno'];}
								if(isset($_POST['issuedate'])){$issuedate=$_POST['issuedate'];}
								if(isset($_POST['chequedate'])){$chequedate=$_POST['chequedate'];}
								if(isset($_POST['payto'])){$payto=$_POST['payto'];}
								if(isset($_POST['amount'])){$amount=$_POST['amount'];}
								if(isset($_POST['chequetype'])){$chequetype=$_POST['chequetype'];}
								if(isset($_POST['review'])){$review=$_POST['review'];}
								if(isset($_POST['status'])){$status=$_POST['status'];}
								
								if(isset($_POST['action'])and($_POST['action']==""))
								{
								echo $dabasehandle->_recordInsertion("INSERT INTO _issuecheque(chequeno,issuedate,chequedate,payto,amount,issuetype,review,status) VALUES('$chequeno','$issuedate','$chequedate','$payto','$amount','$chequetype','$review','1')","ADDED SUCCESSFULLY","ERROR IN SAVE");
								}
								elseif(isset($_POST['action'])and($_POST['action']=="Edit"))
								{
									if(isset($_POST['status'])){$status=$_POST['status'];}
									echo $dabasehandle->_recordInsertion("UPDATE _issuecheque SET issuedate='$issuedate',chequedate='$chequedate',payto='$payto',amount='$amount',issuetype='$chequetype',review='$review',status='$status' WHERE chequeno='$chequeno'","UPDATED SUCCESSFULLY","ERROR IN UPDATE");
								}
							}
							
							if(isset($_POST['updateissue']))
							{
								if(isset($_POST['chequeid'])){$chequeid=$_POST['chequeid'];}
								if(isset($_POST['status'])){$status=$_POST['status'];}
								echo $dabasehandle->_recordInsertion("UPDATE _issuecheque SET status='$status' WHERE chequeno='$chequeid'","UPDATED SUCCESSFULLY","ERROR IN UPDATE");
							}
						?>
                 </div>
            	<div class="row-container" style="width:100%; margin:0% auto; background:#e7ecf0;">
                	<form name="cheque" method="post" action="issuecheque.php">
                    <table width="100%" border="0" cellspacing="5" cellpadding="5">
                      <tr style="color:#333; font-weight:normal;">
                        <th width="4%" align="center">No</th>
                        <th width="12%" align="center">Cheque No</th>
                        <th width="12%" align="center">Issue Date</th>
                        <th width="12%" align="center">Cheque Date</th>
                        <th width="14%" align="center">Pay To</th>
                        <th width="10%" align="center">Amount</th>
                        <th width="12%" align="center">Type</th>
                        <th width="12%" align="center">Review</th>
                        <th width="8%" align="center">Action</th>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class="s-textbox" type="text" name="chequeno" value="<?php if(isset($_GET['chequeno'])){ echo $_GET['chequeno'];} ?>" />
                        <input class="s-textbox" type="hidden" name="action" value="<?php if(isset($_GET['action'])){ echo $_GET['action'];} ?>" /></td>
                        <td><input class="s-textbox" type="date" name="issuedate" value="<?php if(isset($_GET['chequeno'])){ echo $dabasehandle->_getInfo("SELECT issuedate FROM _issuecheque WHERE chequeno='".$_GET['chequeno']."'","issuedate");} ?>" /></td>
                        <td><input class="s-textbox" type="date" name="chequedate" value="<?php if(isset($_GET['chequeno'])){ echo $dabasehandle->_getInfo("SELECT chequedate FROM _issuecheque WHERE chequeno='".$_GET['chequeno']."'","chequedate");} ?>" /></td>
                        <td><input class="s-textbox"type="text" name="payto" value="<?php if(isset($_GET['chequeno'])){ echo $dabasehandle->_getInfo("SELECT payto FROM _issuecheque WHERE chequeno='".$_GET['chequeno']."'","payto");} ?>" /></td>
                        
                        <td><input class="s-textbox" type="text" name="amount" value="<?php if(isset($_GET['chequeno'])){ echo $dabasehandle->_getInfo("SELECT amount FROM _issuecheque WHERE chequeno='".$_GET['chequeno']."'","amount");} ?>" /></td>
                        <td>
                            <select class="s-textbox" name="chequetype">
                               <option value="1" <?php $type=""; if(isset($_GET['chequeno'])){ $type=$dabasehandle->_getInfo("SELECT issuetype FROM _issuecheque WHERE chequeno='".$_GET['chequeno']."'","issuetype");} if($type==1){?>selected="selected" <?php } ?>>Cross</option>
                               <option value="2" <?php $type=""; if(isset($_GET['chequeno'])){ $type=$dabasehandle->_getInfo("SELECT issuetype FROM _issuecheque WHERE chequeno='".$_GET['chequeno']."'","issuetype");} if($type==2){?>selected="selected" <?php } ?>>Cash</option>
                                
                            </select>
                        </td>
                        <td><input class="s-textbox"type="text" name="review" value="<?php if(isset($_GET['chequeno'])){ echo $dabasehandle->_getInfo("SELECT review FROM _issuecheque WHERE chequeno='".$_GET['chequeno']."'","review");} ?>" /></td>
                        <td><input type="submit" name="btnadd" class="save-btn" value="" <?php if(isset($_GET['action'])and($_GET['action']=="Edit")){ ?>class="editbutton"<?php }else{ ?>class="addbutton"<?php } ?> /></td>
                        <td></td>
                      </tr>
                    </table>
                    </form>
                </div>
                <div class="row-container" style="width:100%; margin:1% auto; background:#e7ecf0;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    	<?php
							$x=1;
							$retireveallissues="SELECT * FROM _issuecheque ORDER BY id DESC";
							$allissuedchequerecord=mysql_query($retireveallissues);
							$countissuedcheque=mysql_num_rows($allissuedchequerecord);
							if($countissuedcheque>0)
							{
								while($issuedchequedata=mysql_fetch_array($allissuedchequerecord))
								{
									$status=$issuedchequedata['status'];
							?>
						<form name="chequestatus" method="post" action="issuecheque.php">
                    
                        <tr style="color:#<?php if($status==1){ echo '09F';}elseif($status==2){ echo '060';}elseif($status==3){ echo 'F90';}elseif($status==4){ echo '900';} ?>">
                        	<td width="4%" align="center"><?php echo $x; ?></td>
                            <td width="11%" align="center"><?php echo $issuedchequedata['chequeno'];?></td>
                            <td width="11%" align="center"><?php echo $issuedchequedata['issuedate'];?></td>
                            <td width="11%" align="center"><?php echo $issuedchequedata['chequedate'];?></td>
                            <td width="11%" align="center"><?php echo $issuedchequedata['payto'];?></td>
                            <td width="11%" align="right"><?php echo $issuedchequedata['amount'];?></td>
                            <td width="11%" align="center"><?php echo $issuedchequedata['issuetype'];?></td>
                            <td width="10%" align="center"><?php echo $issuedchequedata['review'];?></td>
                        	<td width="6%" align="right">
                                <input type="hidden" name="chequeid" value="<?php echo $issuedchequedata['chequeno'];?>" />
                                <select class="s-textbox" name="status">
                                    <option value="1" <?php if($issuedchequedata['status']==1){?>selected="selected" <?php } ?>>Pnd</option>
                                    <option value="2" <?php if($issuedchequedata['status']==2){?>selected="selected" <?php } ?>>Ps</option>
                                    <option value="3" <?php if($issuedchequedata['status']==3){?>selected="selected" <?php } ?>>St</option>
                                    <option value="4" <?php if($issuedchequedata['status']==4){?>selected="selected" <?php } ?>>Rt</option>
                                </select>
                            </td>
                            <td width="6%" align="right"><input type="submit" name="updateissue" value="" class="reset-btn" /></td>
                            <td width="18%" align="center"><a href="issuecheque.php?chequeno=<?php echo $issuedchequedata['chequeno']; ?>&action=Edit"><img src="../images/edit.png" /></a>&nbsp;&nbsp;<a href="deleteissuecheque.php?chequeno=<?php echo $issuedchequedata['chequeno']; ?>" onclick="return delete_records();"><img src="../images/delete.png" /></a>
                            </td>
                        </tr>
                        </form>
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