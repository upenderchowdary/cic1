<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<ul id="myTab" class="nav nav-tabs">

   <li class="active"><a href="#home" data-toggle="tab">
      Tutorial Point Home</a>
   </li>
   <li><a href="#ios" data-toggle="tab">iOS</a></li>
  </ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="home">
      <!--<p>-->
	  
	  <div id="main">
			<div class="container-fluid">
				
				<div class="row">
					<div class="">
						<?php
						include "collapse.php";
						?>
						<!-- <iframe src="collapse.php" width="1300"  height="750"></iframe> -->
					</div>
				</div>
				
			</div>
		</div>
	  
	<!--</p>-->
		
   </div>
   <div class="tab-pane fade" id="ios">
      <!-- <p>iOS is a mobile operating system developed and distributed by Apple 
         Inc. Originally released in 2007 for the iPhone, iPod Touch, and 
         Apple TV. iOS is derived from OS X, with which it shares the 
         Darwin foundation. iOS is Apple's mobile version of the 
         OS X operating system used on Apple computers.</p> -->
		 
		 <form action="../../logic/fileuploadlogic.php" method="post" enctype="multipart/form-data">
	
	Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="hiddenid" value="<?php echo $n; ?>" />
	<input type="submit" value="Upload" name="submit">
	<input type="reset" name="cancelUpload">	
	
    </form>
		 
   </div>
   <div class="tab-pane fade" id="jmeter">
      <p>jMeter is an Open Source testing software. It is 100% pure 
      Java application for load and performance testing.</p>
   </div>
   <div class="tab-pane fade" id="ejb">
      <p>Enterprise Java Beans (EJB) is a development architecture 
         for building highly scalable and robust enterprise level    
         applications to be deployed on J2EE compliant 
         Application Server such as JBOSS, Web Logic etc.
      </p>
   </div>
</div>
<script>
   $(function () {
      $('#myTab li:eq(0) a').tab('show');
   });
</script>

</html>

