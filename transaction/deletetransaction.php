<?php
	require_once("../includes/_handledatabase.inc");
	require_once("../includes/pathfiles.inc");
	if($_SESSION['permgrant']==false)
	{
		header("location:../index.php");
	}
	$dabasehandle=new _handledatabase();
	$dabasehandle->_connectHost();
	if(isset($_GET['transactionid']))
	{
		$dabasehandle->_recordDeletion("DELETE FROM _transactions WHERE id='".$_GET['transactionid']."'","DELETED","ERROR");
		header("location:index.php");
		$dabasehandle->_closeHost();
	}
?>