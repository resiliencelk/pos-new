<?php
	require_once("../includes/_handledatabase.inc");
	require_once("../includes/pathfiles.inc");
	if($_SESSION['permgrant']==false)
	{
		header("location:../index.php");
	}
	$dabasehandle=new _handledatabase();
	$dabasehandle->_connectHost();
	if(isset($_GET['invoiceid']))
	{
		$dabasehandle->_recordDeletion("DELETE FROM _invoice WHERE invoiceid='".$_GET['invoiceid']."'","DELETED","ERROR");
		$dabasehandle->_recordDeletion("DELETE FROM _invoiceitems WHERE invoiceid='".$_GET['invoiceid']."'","DELETED","ERROR");
		
		header("location:index.php");
		$dabasehandle->_closeHost();
	}
?>