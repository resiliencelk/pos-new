<?php
	require_once("../includes/_handledatabase.inc");
	require_once("../includes/pathfiles.inc");
	if($_SESSION['permgrant']==false)
	{
		header("location:../index.php");
	}
	$dabasehandle=new _handledatabase();
	$dabasehandle->_connectHost();
	if(isset($_GET['chequeno']))
	{
		$dabasehandle->_recordDeletion("DELETE FROM _issuecheque WHERE chequeno='".$_GET['chequeno']."'","DELETED","ERROR");
		header("location:issuecheque.php");
		$dabasehandle->_closeHost();
	}
?>