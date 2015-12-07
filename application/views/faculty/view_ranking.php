<!DOCTYPE html>
<html>
<head>
	<title>
		TNHS

	</title>
	<link href="../assets/css/bootstrap.css" rel="stylesheet">
	    <link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet">
	    <link href="../assets/css/navbar-fixed-top.css" rel="stylesheet">
	    <link href="../assets/css/font-awesome.css" rel="stylesheet">
	    <link href="../assets/css/datepicker.css" rel="stylesheet">
	    <link href="../assets/css/user.css" rel="stylesheet">
	    <link href="../assets/css/admin.css" rel="stylesheet">
	    <link href="../assets/css/dashboard.css" rel="stylesheet">


	    <link href="../assets/css/dashboard.css" rel="stylesheet" type="text/css">
	    <link href="../assets/css/navbar-static-top.css" rel="stylesheet" type="text/css">
	    <link href="../assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
		<nav class="navbar navbar-default navbar-fixed-top tobehide">
    <div class="container-fluid">
<!--        <div class="container">-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="../assets/images/tnhs_logo.jpg" style="border-radius:15px;box-shadow: 0px 0px 10px white" class="pull-left navbar-brand-image">
                <span class="navbar-brand">TNHS <small style="font-size: 12px; font-weight: bold">Tanauan National High School Online Class</span>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                        <li style="padding-top:10px">
                         <button class="btn btn-info" style="padding-top:10;padding-right:5px" onclick="window.print()"> <span class="fa fa-print">Print</span></button>
                        </li>
                        <li style="padding-top:10px;padding-right:5px;padding-left:5px;">
                         <button href="/faculty_class" class="btn btn-success" style="padding-top:10" id="backs"> <span class="fa fa-arrow-left">Back</span></button>
                        </li>
                      
                    
                </ul>
            </div>

    </div>
</nav>

	<?php 
		$ranks = $this->facultymd->get_examid($classid);
		$counter = 0;
	 ?>

	
	<div class="col-md-8 col-md-offset-2" style="margin-top:10px">
	 <div class="col-md-12">
	 	<center><p style="font-size:15px">CLASS RANKING</p></center>

	 </div>
		<table class="table table-bordered">
			<thead style="font-size:12px">
				<th style="width:10px">No.</th>
				<th style="text-align:center">Name</th>
				<th>Points</th>
			</thead>
			<tbody style="font-size:10px">
				<?php foreach ($ranks as $key => $ex): ?>
						<tr>
							<td><?php echo $counter += 1; ?></td>
							<td><?php echo strtoupper($ex['fname']) ?></td>
							<td><?php echo $ex['p']?></td>
						</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
	<script src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#backs').click(function(){
				location.href = '/faculty_class'
			});
		});

	</script>
</html>