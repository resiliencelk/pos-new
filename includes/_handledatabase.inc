<?php
ob_start();
session_start();

class _handledatabase{
	public $server="localhost";
	public $username="root";//"resilie3_admin";
	public $password="root";//"QXAWS75RT87";
	public $database="resiliencepos";//"resilie3_pos";
	public $connection;
	public $genNumber;
		
	public function __construct(){
		date_default_timezone_set('UTC');
		//date_default_timezone_set('America/Los_Angeles');
		//echo date_default_timezone_get();
		
	}
	function _connectHost(){
		try{
			$this->connection=mysql_connect($this->server,$this->username,$this->password);
			if($this->connection){
				if(!mysql_select_db($this->database,$this->connection)){
					die("ERROR : ".mysql_error());
				}
			}
			else{
				die("ERROR : ".mysql_error());
			}
			
		}catch(Exception $ex){
			die ("ERROR : ".$ex->getMessage());
		}
	}
	
	function _recordInsertion($sql,$successMessage,$errorMessage){
		try{
			if(mysql_query($sql)){
				return "<span style='color:#060'>".$successMessage."</span>";
			}
			else{
				return "<span style='color:#900'".$errorMessage."</span>";
			}
			
		}catch(Exception $ex){
			die("ERROR : ".$ex->getMessage());
		}
	}
	
	function _invisibleRecordInsertion($sql){
		try{
			mysql_query($sql);
		}catch(Exception $ex){
			die("ERROR : ".$ex->getMessage());
		}
	}
	
	function _recordDeletion($sql,$successsession,$errorsession){
		try{
			if(mysql_query($sql)){
				$_SESSION[$successsession]="Deleted Successfully";
			}
			else{
				$_SESSION[$errorsession]="Some Error in delete.. please check";
			}
			
		}catch(Exception $ex){
			die("ERROR : ".$ex->getMessage());
		}
	}
	
	function _newGeneration($sql,$prefix,$field){
		try{
			$records=mysql_query($sql);
			$numrows=mysql_num_rows($records);
			$data=@mysql_fetch_array($records);
			if($numrows<0){
				$genID=1;
			}
			else{
				$genID=($data[$field]+1);
			}
			if($genID<10){
				$this->genNumber=$prefix."0"/*."0000"*/.$genID;	
			}
			elseif($genID<100){
				$this->genNumber=$prefix."0"/*."000"*/.$genID;	
			}
			elseif($genID<1000){
				$this->genNumber=$prefix."0"/*."00"*/.$genID;	
			}
			elseif($genID<10000){
				$this->genNumber=$prefix."0"/*."0"*/.$genID;	
			}
			return $this->genNumber;
		}catch(Exception $ex){
			die("ERROR : ".$ex->getMessage());
		}
	}
	
	function _getInfo($sql,$field){
		try{
			$records=mysql_query($sql);
			if(mysql_num_rows($records)){
				 $data=@mysql_fetch_array($records);
				 return $data[$field];
			}
		}catch(Exception $ex){
			die("ERROR :".$x->getMessage());
		}
	}
	
	function _uploadImage($control,$itemid,$directory){
		try{
			$name=$_FILES[$control]['name'];
			$size=$_FILES[$control]['size'];
			$type=$_FILES[$control]['type'];
			$tempfile=$_FILES[$control]['tmp_name'];
			$image_extension=substr($type,6);
			$imagename=md5($itemid)."-itm-".$itemid.".".$image_extension;
			$namesub=md5(substr($name,1,3));		
			$todayis=date("m.d.y");
			$imageuploadto="../images/".$directory;
			if((($type="images/jpg")||($type="images/jpeg")) && ($size<=1024000)){
				if (move_uploaded_file($tempfile, ($imageuploadto."/".$imagename))){
					return $imageuploadto."/".$imagename;
					
				}
				else{
					return false;
				}
			}
			else{
				return "INVALID IMAGE SIZE";
				return false;
			}
		}catch(Exception $ex){
			die("ERROR :".$x->getMessage());
		}
	}
	function _closeHost(){
		try{
			if($this->connection==true){
				mysql_close($this->connection);
			}
		}catch(Exception $ex){
			die("ERROR : ".$ex->getMessage());
		}
	}
}
?>