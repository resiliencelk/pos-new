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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
body
{
	margin:65px 0px 0px 1px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
}
#parentbody
{
	float:left;
	width:179mm;
	height:178mm;
	/*border:1px solid;*/
}
.printrow
{
	float:left;
	width:100%;
	/*border:solid 1px;*/
}
.headerrow
{
	float:left;
	width:100%;
	/*padding-top:50px;*/
}
.leftcolumn
{
	float:left;
	width:50%;
}
.rightcolumn
{
	float:right;
	margin:50px;
}
.date
{
	float:right;
	height:4.5mm;
	width:47mm;
	margin-bottom:1mm;
	text-align:left;
}
.customerrow
{
	float:left;
	width:78%;
	margin:49px 0px 0px 145px;
}
.cusdetails
{
	float:left;
	height:4.5mm;
	width:90%;
	margin-bottom:1mm;
	text-align:left;
}

.itemrow
{
	float:left;
	width:100%;
	height:394px;
	margin:85px 0px 0px 0px;
}
.modelnumber
{
	float:left;
	width:90px;
	text-align:left;
	/*font-size:11px;*/
}
.serialnumber
{
	float:left;
	width:135px;
	text-align:left;
	/*font-size:11px;*/
}
.description
{
	float:left;
	width:218px;
	text-align:center;
	/*font-size:11px;*/
}
.quantity
{
	float:left;
	width:50px;
	text-align:center;
	/*font-size:11px;*/
}
.unitprice
{
	float:left;
	width:75px;
	text-align:center;
	/*border:solid 1px;*/
	text-align:right;
}
.totalamount
{
	float:left;
	width:100px;
	text-align:center;
	/*font-size:11px;*/
	text-align:right;
}
.footerrow
{
	float:left;
	width:14%;
	margin:0px 0px 0px 570px;
	text-align:right;
	/*font-size:11px;*/
	font-weight:bold;
}
.button
{
	display:block;
}
.creditbox
{
	float:left;
	margin:150px 0px 0px 100px;
	z-index:10458;
	width:200px;
	height:80px;
	border:1px solid #000;
}
</style>
<script>
function PrintContent() {
	var DocumentContainer = document.getElementById('parentbody');
   	//var WindowObject = window.open('', 'PrintWindow', 'width=750,height=650,top=150,left=150,toolbars=no,scrollbars=yes,status=no,resizable=yes');
   // WindowObject.document.writeln(DocumentContainer.innerHTML);
    //WindowObject.focus();
    //DocumentContainer.print();
	window.print(DocumentContainer);
    //WindowObject.close();
	 window.close();
}
</script>
</head>

<body>
<?php
$invoiceid;
if(isset($_GET['invoiceid'])){
	$invoiceid=$_GET['invoiceid'];
	$headerdetails="SELECT * FROM _invoice WHERE invoiceid='$invoiceid'";
	$headerrecord=mysql_query($headerdetails);
	$headerdatas=@mysql_fetch_array($headerrecord);
}
?>
    <div id="parentbody">
    <!-- Header row !-->
        <div class="printrow">
            <div class="date">
                <?php echo $headerdatas['invoiceid']; ?>
            </div>
        </div>
        <div class="printrow">
            <div class="date">
                <?php if($headerdatas['paymentmode']==1){ echo "Cash";}elseif($headerdatas['paymentmode']==2){ echo "Cheque";}elseif($headerdatas['paymentmode']==3){ echo "Credit";}?>
            </div>
        </div>
        <div class="printrow">
            <div class="date">
                 <?php echo $headerdatas['invoicedate']; ?>
            </div>
        </div>
        <div class="printrow">
            <div class="date">
                <?php echo $headerdatas['invoicedate']; ?>
            </div>
        </div>
        <!--customer row !-->
        <div class="printrow">
        	<div class="customerrow">
            	<div class="cusdetails">
                	<?php echo $headerdatas['customername']; ?>
                </div>
                <div class="cusdetails">
                	<?php echo $headerdatas['customeraddress']; ?>
                </div>
                <div class="cusdetails">
                	<?php echo $headerdatas['customertelnumber']; ?>
                </div>
            </div>
        </div>
        <!--Item row !-->
        <div class="itemrow">
        <?php
		if(isset($_GET['invoiceid'])){
			$invoiceid=$_GET['invoiceid'];
			$itemdetails="SELECT * FROM _invoiceitems WHERE invoiceid='$invoiceid'";
			$itemsrecord=mysql_query($itemdetails);
			while($itemdatas=@mysql_fetch_array($itemsrecord))
			{
		?>
        	<div class="printrow">
                <div class="modelnumber">
                    <?php echo $itemdatas['modelnumber']; ?>
                </div>
                <div class="serialnumber">
                    <?php if($itemdatas['serialnumber']==""){ echo "No Serial";} else{ echo $itemdatas['serialnumber'];} ?>
                </div>
                 <div class="description">
                    <?php echo $itemdatas['description']; ?>
                </div>
                <div class="quantity">
                    <?php echo $itemdatas['quantity']; ?>
                </div>
                <div class="unitprice">
                    <?php echo "Rs.".number_format($itemdatas['unitprice'],2,',',','); ?>
                </div>
                <div class="totalamount">
                    <?php echo "Rs.".number_format($itemdatas['total'],2,',',','); ?>
                </div>
               </div>
             <?php
			}
		}
		?>
        
        <?php
			if($headerdatas['paymentmode']==3){
		?>
        	<div class="creditbox">
            	<div style="float:left;width:100%; text-align:center; text-decoration:underline; font-weight:bold;">
                	IMPORTANT NOTICE
                </div>
            	<div style="float:left;width:100%; border-top:solid 1px #000000;border-bottom:solid 1px #000000;">
                	<div style="float:left;width:50%; text-align:right;">
                    	Advance paid :
                    </div>
                    <div style="float:left;width:50%">
                    	<?php echo "Rs.".number_format($headerdatas['advance'],2,',',','); ?>
                    </div>
                </div>
                <div style="float:left;width:100%; border-top:solid 1px #000000;border-bottom:solid 1px #000000;">
                	<div style="float:left;width:50%; text-align:right;">
                    	Balance :
                    </div>
                    <div style="float:left;width:50%">
                    	<?php echo "Rs.".number_format($headerdatas['balance'],2,',',','); ?>
                    </div>
                </div>
            </div>
        <?php
		}
		?>
        </div>
       
        <!-- footer row !-->
        <div class="footerrow">
        	<?php echo "Rs.".number_format($headerdatas['nettotal'],2,',',','); ?>
        </div>
         <div class="footerrow">
        	<?php echo "Rs.".number_format($headerdatas['discounts'],2,',',','); ?>
        </div>
        <div class="footerrow">
        	<?php echo "Rs.".number_format($headerdatas['vat'],2,',',','); ?>
        </div>
        <div class="footerrow">
        	<?php echo "Rs.".number_format($headerdatas['grandtotal'],2,',',','); ?>
        </div>
    </div>

</body>
</html>
<?php
$dabasehandle->_closeHost();
?>
<script language="javascript" type="text/javascript">
	PrintContent();
	window.location="index.php";
</script>