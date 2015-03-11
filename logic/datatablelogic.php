<?php
class datatablelogic{
function datatablelogicFun($conn){
//data getting from the database to match the user credentials
//$sql = "SELECT userid,company_name,company_dba_name,dealer_owner_name FROM  company_details";
$sql="select userid,company_name, company_dba_name, dealer_owner_name from company_details where userid IN (select userid from users where role='user')";

$result = $conn->query($sql);
$content='';
$i=0;
    while($row = $result->fetch_assoc()) {
		
			 
		 $userid=$row["userid"];
		 $company_name=$row["company_name"];
		 $company_dba_name=$row["company_dba_name"];
		 $dealer_owner_name=$row["dealer_owner_name"];
		 
		 $sts="select status from customer_approval where customer_id=".$userid;
		 
		$r1=$conn->query($sts);
		$count=0;
		while($row1 = $r1->fetch_assoc()) 
		{
			$status=$row1['status'];
			$count++;
		}
		//if condition, for the instance created,approved and filling forms status.
		 if($count>0)
		 {
			if($status==1)
           {
	         $comment="instance created"; 
           }
           else
           {
	         $comment="approved"; 
           }
		 }		 
		 else {
			 $comment="filling forms";
		 }
		 
		 
		 //if condition, for the completed(released) status from the users table
		 
		 
		 //if condition, for the completed(released) status.
		 /* if($status==1)
		 {
		 $sts1="select path from processed_files where admin_id=".$userid;
		 $r2=$conn->query($sts1);
		  $count1=0;
		while($row2 = $r2->fetch_assoc()) 
		{   
	        $state=$row1['path'];  
             $count1++;			
				
		}
		//if($state!='')
			if($count1>0)
			 $comment="released";
		 }
		  */
				  
		  {
		 $sts1="select status,URL from users where userid=".$userid;
		 $r2=$conn->query($sts1);
		  $count1=0;
		while($row2 = $r2->fetch_assoc()) 
		{   
	        $state1=$row2['status'];  
			$state2=$row2['URL']; 
/* echo "UP1".$state1;
echo "UP2".$state2;
exit; */			
             //$count1++;			
				
		}
		if($state1==1 && $state2=!'')
			//if($count1>0)
			 $comment="released";
		 }
		 		  
		 
		 $content.='<tr><td>'.++$i.'</td>
		       <td>'.$company_name.'</td>
			   <td>'.$company_dba_name.'</td>	
			   <td>'.$dealer_owner_name.'</td>
			   <td>'.$comment.'</td>
			   <td><form action="t1.php" method="post">
			   <input type="hidden" value="'.$userid.'"  name="idval" >
			   <input type="submit" value="View"></form>
			   </td>                          						
		       </tr>';
		 
	}
	$conn->close();
	  return $content;

}
}
$data=new datatablelogic();
?>