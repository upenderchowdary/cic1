<?php  
include "../../config/database.php";
include "../../logic/collapselogic.php";


if(isset($_POST['idval']))
{
	$n=$_POST['idval'];
}
else
{
	$n=1;
}

//if user confirm, userid(customer_id) will change.
$approvalid="select id from customer_approval where customer_id=".$n;//here, instead of 
$approvalid1=$conn->query($approvalid);
while($row = $approvalid1->fetch_assoc()) {
        $id= $row["id"];
    }
	
//in the processed_file we need to insert a value, where userid coming from datatable(view). 
$sql = "INSERT INTO processed_files (approval_id,admin_id)
VALUES (".$id.", ".$n.")";
$conn->query($sql);
 
$dataArray=$data->collapselogicFun($conn, $n);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Infinite Linked Solutions</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <style type="text/css">
				#submit
				{
					margin-left:93%;
					height:30px;
					width:80px;
					background-color:#ffa500;
					font-weight: bold;
				}
				#upload
				{
					margin-left:93%;
					height:30px;
					width:80px;
					font-weight: bold;
				}
				#label
				{
					margin-left:-200%;
					height:30px;
					width:80px;
					font-weight: bold;
				}
				.anchor
				{
					height:30px;
					width:80px;
					background-color:#ffa500;
					font-weight: bold;
				}
				hr {
					-moz-border-bottom-colors: none;
					-moz-border-image: none;
					-moz-border-left-colors: none;
					-moz-border-right-colors: none;
					-moz-border-top-colors: none;
					border-color: #EEEEEE -moz-use-text-color #FFFFFF;
					border-style: solid none;
					border-width: 1px 0;
					margin: 5px 0;
				}
				.center-block
				{
					<!--margin:10px auto;-->
					margin-top:5px;
					text-align:center;
					width:80%;
				}
  </style>
</head>
<body>
<div class="container">
    <div class="page-header">
	    <div class="epilogue">
	        <img style="width:300px;height:100px;" src="../images/ils.png" alt="..." class="img-responsive center-block" />    
	    </div>
	    <form method="post" action="../../index.html">
	        <div>  
               <input type="submit" id="submit" name="submit" class="btn btn-warning" value="LOGOUT" />
	        </div>
	    </form>
	<hr>
	    <form method="post" action="datatable.php">
	        <div>  
		       <input type="submit" id="anchor" name="submit" class="btn btn-warning" value="BACK" />
	        </div>
	    </form>
    <h1>Client <small>Details</small></h1>
	<!-- <form action="../../logic/fileuploadlogic.php" method="post" enctype="multipart/form-data">
	
	Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="hiddenid" value="<?php echo $n; ?>" />
	<input type="submit" value="Upload" name="submit">
	<input type="reset" name="cancelUpload">	
	
    </form> -->
    </div> 
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Carrier
                    </a>
				</h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
	       <div class="panel-body">
         <div>
	      <label class="col-sm-4 control-label">Carrier Name</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['carrier_name']; ?></label>
            </div>
       </div>
       <div>
          <label class="col-sm-4 control-label">Carrier Representatives Contact Details</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['dealer_contact_details']; ?></label>
            </div>
	   </div>
	   <div>
	      <label class="col-sm-4 control-label">Point Of Sales System</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['point_sale_system']; ?></label>
            </div>
       </div>
       <div>
          <label class="col-sm-4 control-label">Portals </label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['portals']; ?></label>
            </div>
	   </div>
       <div>
	      <label class="col-sm-4 control-label">Web Address</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['web_address']; ?></label>
            </div>
       </div>
      </div>	
            </div>
	    </div>
	    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                       Company Details
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
	         <div class="panel-body">
			<div class="container">
          <div class="row">
          <label class="col-md-4 control-label">Company DBA Name</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['company_dba_name']; ?></label>
           </div>
	   </div>
	   </div>
	   <div>
	      <label class="col-sm-4 control-label">Company Logo</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['company_logo']; ?></label>
            </div>
       </div>
       <div>
          <label class="col-sm-4 control-label">Company Name</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['company_name']; ?></label>
            </div>
		</div>
		<div>
	      <label class="col-sm-4 control-label">Company Org Chart</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['company_org_chart']; ?></label>
           </div>
        </div>
        <div>
          <label class="col-sm-4 control-label">Company Website Address</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['company_website_address']; ?></label>
            </div>
		</div>
		<div>
	      <label class="col-sm-4 control-label">Dealer Owner Name</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['dealer_owner_name']; ?></label>
            </div>
        </div>
        <div>
          <label class="col-sm-4 control-label">Decision Making Authority</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['decision_making_authority']; ?></label>
            </div>
		</div>
		<div>
          <label class="col-sm-4 control-label">Email id</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['email_id']; ?></label>
            </div>
		</div>
        <div>		
	      <label class="col-sm-4 control-label">Operation Point Of Contact</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['operations_point_of_contact']; ?></label>
            </div>
		</div>	
		<div>
	      <label class="col-sm-4 control-label">Owner Phone Number</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['phone_number']; ?></label>
            </div>
        </div>
        </div>     
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Customer Roles
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
	        <div class="panel-body">
         <div>
          <label class="col-sm-4 control-label">Roole Name</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['role_name']; ?></label>
            </div>
        </div>
        <div>
          <label class="col-sm-4 control-label">Created Date</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['created_date']; ?></label>
            </div>
	    </div>
        </div>       
            </div>
        </div>  
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        Employee Details
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
	        <div class="panel-body">
          <div>
          <label class="col-sm-4 control-label">Employee Id</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['employee_id']; ?></label>
            </div>
        </div>
        <div>
          <label class="col-sm-4 control-label">Employee Details</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['employee_details']; ?></label>
            </div>
	    </div>
        </div>      
            </div>
        </div>
	    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        Market Details
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
	                <div class="panel-body">
          <div>
          <label class="col-sm-4 control-label">Market File Uploads</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['market_file_uploads']; ?></label>
            </div>
        </div>
		
		<div>
	      <label class="col-sm-4 control-label">Number Of Markets</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['number_of_markets']; ?></label>
            </div>
	    </div>
	</div>        
            </div>
        </div>    
	    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                       Smart Solutions
                    </a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
	         <div class="panel-body">
           <div>
          <label class="col-sm-4 control-label">Solutions</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['solutions']; ?></label>
            </div>
        </div>
		<div>
          <label class="col-sm-4 control-label">User Id</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['userid']; ?></label>
            </div>
		</div>
        </div>
            </div>
        </div>
	    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                       Store Details
                   </a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
	           <div class="panel-body">
          
		<div>
          <label class="col-sm-4 control-label">Calling Tree</label>
            <div>
              <label class="col-sm-8 control-label"><a href="../../logic/<?php echo $dataArray['calling_tree']; ?>" download>download</a></label>
            </div>
        </div>
		
		<div>
	  	  <label class="col-sm-4 control-label">Number Of Stores</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['num_stores']; ?></label>
            </div>
	    </div>
		
        </div>     
            </div>
        </div>
	    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                        Vendor Systems
                    </a>
                </h4>
            </div>
        <div id="collapseEight" class="panel-collapse collapse">
	       <div class="panel-body">
          <div>
          <label class="col-sm-4 control-label">Bill Payment Portal</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['bill_payment_portal']; ?></label>
            </div>
        </div>
		<div>
          <label class="col-sm-4 control-label">Carriers Commission Portal</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['carriers_comission_portal']; ?></label>
            </div>
        </div>
        <div>		
	      <label class="col-sm-4 control-label">Device Leasing Program</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['device_leasing_program']; ?></label>
            </div>
	    </div>
		<div>
	      <label class="col-sm-4 control-label">Inventory Ordering Portal</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['inventory_ordering_portal']; ?></label>
            </div>
	    </div>
		<div>
	      <label class="col-sm-4 control-label">Trade Up Program</label>
            <div>
              <label class="col-sm-8 control-label"><?php echo $dataArray['trade_up_program']; ?></label>
            </div>
	    </div>
			
        </div>
        </div>
        </div>
		
	</div>
</div>	
	<footer class="footer">
    	<div class="text-center">
		    <p>&copy; &nbsp;ASG Group Created by 
			    <a href="http://www.InfiniteLinkedSolutions.com">
				    Infinite Linked Solutions Ltd
				</a>
		    </p>
		</div>
	</footer>
<!-- JavaScript Includes -->
<script src="../js/jquery.min.js"></script>
<script src="../js/transition.js"></script>
<script src="../js/collapse.js"></script>
<hr>
</body>
</html>
