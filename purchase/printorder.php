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
	margin:0px 0px 0px 1px;
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
	border:solid 1px #999999;
}
.contentsheader
{
	float:left;
	height:4.5mm;
	width:47mm;
	margin-bottom:1mm;
	text-align:right;
	border:solid 1px #999999;
	font-weight:bold;
}
.customerrow
{
	float:left;
	width:100%;
	margin:15px 0px 0px 1px;
}
.cusdetails
{
	float:left;
	height:4.5mm;
	width:73%;
	margin-bottom:1mm;
	text-align:left;
	border:solid 1px #999999;
}

.itemrow
{
	float:left;
	width:100%;
	margin:15px 0px 15px 0px;
}
.modelnumber
{
	float:left;
	width:110px;
	text-align:left;
	/*font-size:11px;*/
	border:solid 1px #999999;
}
.serialnumber
{
	float:left;
	width:150px;
	text-align:left;
	/*font-size:11px;*/
	border:solid 1px #999999;
}
.description
{
	float:left;
	width:250px;
	text-align:center;
	/*font-size:11px;*/
	border:solid 1px #999999;
}
.quantity
{
	float:left;
	width:90px;
	text-align:center;
	/*font-size:11px;*/
	border:solid 1px #999999;
}
.unitprice
{
	float:left;
	width:95px;
	text-align:center;
	/*border:solid 1px;*/
	border:solid 1px #999999;
	text-align:right;
}
.totalamount
{
	float:left;
	width:120px;
	text-align:center;
	/*font-size:11px;*/
	border:solid 1px #999999;
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
.companyname
{
	float:left;
	width:100%;
	height:35px;
	font-size:30px;
	font-weight:bold;
}
.companynamesub
{
	float:left;
	width:100%;
	height:20px;
	font-size:14px;
	font-weight:bold;
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
$orderid;
if(isset($_GET['orderid'])){
	$orderid=$_GET['orderid'];
	$headerdetails="SELECT * FROM _purchaseorder WHERE orderid='$orderid'";
	$headerrecord=mysql_query($headerdetails);
	$headerdatas=@mysql_fetch_array($headerrecord);
}
?>
    <div id="parentbody">
    <!-- Header row !-->
    	<div class="printrow">
        	<div class="leftcolumn">
            	<div class="companyname">
                    RESILIENCE 
                </div>
                <div class="companynamesub">
                    INFORMATION SOLUTIONS (PVT) LTD.
                </div>
                <div style="width:100%; font-size:11px; font-weight:bold;">
                	403, Clock Tower Road, Jaffna, Sri Lanka.
                </div>
                <div style="width:100%; font-size:11px; font-weight:bold;">
                	Tel : 0212 21 98 28 | info@resiliencelk.com
                </div>
            </div>
            <div class="rightcolumn">
            	<div class="companynamesub">
                    PURCHASE ORDER (P.O).
                </div>
            </div>
        </div>
        <div class="printrow">
            <div class="date">
                <?php echo $headerdatas['orderid']; ?>
            </div>
            <div class="date" style="border:solid 1px #999999; text-align:right; font-weight:bold;">
            	ORDER ID : 
            </div>
        </div>
        <div class="printrow">
            <div class="date">
                 <?php echo $headerdatas['orderdate']; ?>
            </div>
            <div class="date" style="border:solid 1px #999999; text-align:right; font-weight:bold;">
            	ORDER DATE : 
            </div>
        </div>
        
        <!--customer row !-->
        <div class="printrow">
        	<div class="customerrow">
            	<div class="contentsheader">
                    SUPPLIER NAME : 
                </div>
            	<div class="cusdetails">
                	<?php echo $headerdatas['suppliername']; ?>
                </div>
                
            </div>
        </div>
        <!--Item row !-->
        <div class="itemrow">
        
        <div class="printrow">
            <div class="modelnumber">
                <b>MODEL NUMBER</b>
            </div>
             <div class="description">
                <b>ITEM NAME</b>
            </div>
            <div class="quantity">
                <b>QUANTITY</b>
            </div>
            <div class="unitprice">
                <b>UNIT PRICE</b>
            </div>
            <div class="totalamount">
               <b> TOTAL</b>
            </div>
          </div>
        
        <?php
		if(isset($_GET['orderid'])){
			$orderid=$_GET['orderid'];
			$itemdetails="SELECT * FROM _purchaseordereditems WHERE orderid='$orderid'";
			$itemsrecord=mysql_query($itemdetails);
			while($itemdatas=@mysql_fetch_array($itemsrecord))
			{
		?>
        	<div class="printrow">
                <div class="modelnumber">
                    <?php echo $itemdatas['modelnumber']; ?>
                </div>
                
                 <div class="description">
                    <?php echo $itemdatas['description']; ?>
                </div>
                <div class="quantity">
                    <?php echo $itemdatas['quantity']; ?>
                </div>
                <div class="unitprice">
                    <?php echo "Rs.".number_format($itemdatas['unitprice'],2,'.',','); ?>
                </div>
                <div class="totalamount">
                    <?php echo "Rs.".number_format($itemdatas['total'],2,'.',','); ?>
                </div>
               </div>
             <?php
			}
		}
		?>
        </div>
       
        <!-- footer row !-->
        <div class="printrow">
        	<div style="float:right; text-align:right; font-weight:bold; border:solid 1px #999999;"><?php echo "Rs.".number_format($headerdatas['nettotal'],2,'.',','); ?></div>
            <div style="float:right; text-align:right; font-weight:bold; border:solid 1px #999999;">TOTAL AMOUNT :</div>
            
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