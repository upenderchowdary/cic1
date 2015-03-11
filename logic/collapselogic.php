<?php
//include "../config/database.php";
class collapselogic{
function collapselogicFun($conn, $n){
	
//data getting from the database to match the user credentials

$sql = "call customer_info_cap($n,@total)";
$result = $conn->query($sql);
$content='';
$resultArray = array();

while($row = $result->fetch_assoc()) 
{
	/* print_r($row);
	exit; */
//$resultArray[]=array('company_name'=>$row["company_name"], 'company_dba_name'=>$row["company_dba_name"]);
	$resultArray['carrier_name'] = $row["carrier_name"];
	$resultArray['web_address'] = $row["web_address"];
	$resultArray['dealer_contact_details']=$row["dealer_contact_details"];
	$resultArray['point_sale_system']=$row["point_sale_system"];
	$resultArray['portals']=$row["portals"];	
	
	$resultArray['company_name']=$row["company_name"];		
	$resultArray['company_dba_name']=$row["company_dba_name"];
	$resultArray['company_logo']=$row["company_logo"];
	$resultArray['dealer_owner_name']=$row["dealer_owner_name"];
    $resultArray['phone_number']=$row["phone_number"];	
	$resultArray['decision_making_authority']=$row["decision_making_authority"];
	$resultArray['operations_point_of_contact']=$row["operations_point_of_contact"];
	$resultArray['company_org_chart']=$row["company_org_chart"];
	$resultArray['company_website_address']=$row["company_website_address"];
	$resultArray['email_id']=$row["email_id"];
	
	$resultArray['role_name']=$row["role_name"];
	$resultArray['userid']=$row["userid"];
	$resultArray['created_date']=$row["created_date"];
	
	$resultArray['employee_id']=$row["employee_id"];
	$resultArray['employee_details']=$row["employee_details"];
	
	$resultArray['number_of_markets']=$row["number_of_markets"];
	$resultArray['market_file_uploads']=$row["market_file_uploads"];
	
	$resultArray['solutions']=$row["solutions"];
	
	$resultArray['num_stores']=$row["num_stores"];
	$resultArray['calling_tree']=$row["calling_tree"];
	
	$resultArray['device_leasing_program']=$row["device_leasing_program"];
	$resultArray['trade_up_program']=$row["trade_up_program"];
	$resultArray['inventory_ordering_portal']=$row["inventory_ordering_portal"];
	$resultArray['carriers_comission_portal']=$row["carriers_comission_portal"];
	$resultArray['bill_payment_portal']=$row["bill_payment_portal"];
	
//$abc = array($company_name, $company_dba_name, $dealer_owner_name);
//echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
}
	
	return $resultArray;
	
}
}


$data=new collapselogic();
?>