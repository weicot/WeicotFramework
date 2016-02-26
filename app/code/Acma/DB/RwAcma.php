<?php
Weicot::getCore('DB');
class RwAcma extends DB {
	function setAcma($account_id,$useid,$website,$user_name,$mail,$password,$websitename,$note,$date){
		$sql="insert into useracma (account_id,acmaid,useid,website,user_name,mail,password,websitename,note,date)
         values ('$account_id','','$useid','$website','$user_name','$mail','$password','$websitename','$note','$date')";
		 DB::in($sql);
	}
	function getAcma($account_id){
		$sql="SELECT * FROM  useracma WHERE 	account_id='$account_id'";
		return DB::data($sql);
	}
}
?>