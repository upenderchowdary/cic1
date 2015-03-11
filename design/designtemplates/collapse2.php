<?php  
include "../../config/database.php";
include "../../logic/collapselogic.php";
//include "../../logic/colps.php";
//$x=$data->collapselogicFun($conn, $n=1);
//print_r($x);
//exit;

if(isset($_POST['idval']))
{
	$n=$_POST['idval'];
}
else
{
	$n=1;
}

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
	<form action="../../logic/fileuploadlogic.php" method="post" enctype="multipart/form-data">
	
	Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="hiddenid" value="<?php echo $n; ?>" />
	<input type="submit" value="Upload" name="submit">
	<input type="reset" name="cancelUpload">	
	
    </form>
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
	            <?php 
			        echo $data->collapselogicFun($conn, $n);
		        ?>	
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
	        <?php 
	            include "../../config/database.php"; 
	            echo  $data->companyDetails($conn,$n); 
			?>	       
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
	        <?php  
	            include "../../config/database.php"; 
	            echo $data->customerRoles($conn, $n); 
			?>	        
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
	        <?php 
		        include "../../config/database.php";  
		        echo $data->employeeDetails($conn, $n); 
			?>	       
            </div>
        </div>
	    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        Markets Details
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
	        <?php
	            include "../../config/database.php";  
	            echo $data->marketsDetails($conn, $n); 
			?>	        
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
	        <?php  
	            include "../../config/database.php";
	            echo $data->smartSolutions($conn, $n); 
			?>
            </div>
        </div>
	    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                       Stores
                   </a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
	            <?php  
	                include "../../config/database.php";
	                echo $data->stores($conn, $n); 
				?>        
            </div>
        </div>
	    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                        Vendors System
                    </a>
                </h4>
            </div>
        <div id="collapseEight" class="panel-collapse collapse">
	        <?php  
	           include "../../config/database.php";
	           echo $data->vendorsSystem($conn, $n); 
			?>
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
