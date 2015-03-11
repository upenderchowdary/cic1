<?php 
include "../../config/database.php";
include "../../logic/datatablelogic.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="../images/ils.png">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Infinite Linked Solutions</title>
	<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../css/shCore.css">
	<link rel="stylesheet" type="text/css" href="../css/demo.css">
	<style type="text/css" class="init"></style>
	<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../js/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../js/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
    $(function(){
		$('#d_table').dataTable( { 
		} );
	}); 
    </script>
</head>
<body class="dt-example">
	<div class="container">
    <section>
		<div class="col-sm-10 col-sm-offset-1">
            <div class="epilogue">
	            <img src="../images/ils.png" alt="..." class="img-responsive center-block" />     
	        </div> 
        </div>
    </section>
    <div class="box box-color box-bordered">
    <section>
  		<table id="d_table" class="cell-border" cellspacing="0" width="100%">		
			<thead>
				<tr>
					<th>Sl. No.</th>
					<th>Company Name</th>
					<th>DBA Name</th>
					<th>Owner</th>
					<th>Status</th>
                    <th>View</th>						
                </tr>
			</thead>
			<tbody>
				<?php echo $data->datatablelogicFun($conn); ?>	
			</tbody>
		</table>
	</section>
    </div>
    <section>
		<div class="footer">
			<div>
			    <div class="epilogue">
					<p class="copyright">ASG Group Created by <a href="http://www.InfiniteLinkedSolutions.com">Infinite Linked Solutions Ltd</a> &#169; 2007-2015<br>
					ASG is licensed under the <a href="http://www.InfinitelinkedSolutions.com">MIT license</a>.</p>
				</div>
			</div>
		</div>
	</section>
    </div>
 </body>
</html>