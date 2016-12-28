<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainee Page</title>
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container-fluid">
<ul class="nav nav-tabs">
  <li><a href="javascript:void(0)" onclick="openTab('Profile')">View Profile</a></li>
  <li><a href="javascript:void(0)" onclick="openTab('Test')">Test</a></li>
  <li><a href="javascript:void(0)" onclick="openTab('Project')">Project Status</a></li>
  <li class="navbar-right"><a href="http://localhost/StudentAssessmentSystem/index.php/student">Log Out</a></li>
</ul>

<div id="Profile" class="student row">
	  <div class="col-md-7 col-md-offset-3">
		  <br><br><br>
		   <table class="table table-striped table-hover table-bordered" align="center">
				<thead>
					 <tr>
						  <th>Field</th>
						  <th>Value</th>
					</tr>
				</thead>
				<tbody>
					 <?php for ($i = 0; $i < count($marklist); ++$i) { ?>
						  <tr><td>Id</td><td><?php echo $marklist[$i]->id; ?></td></tr>
						   <tr><td>Subject 1</td><td><?php echo $marklist[$i]->s1; ?></td></tr>
						   <tr><td>Subject 2</td><td><?php echo $marklist[$i]->s2; ?></td></tr>
						   <tr><td>Subject 3</td><td><?php echo $marklist[$i]->s3; ?></td></tr>
						   <tr><td>Subject 4</td><td><?php echo $marklist[$i]->s4; ?></td></tr>
					 <?php } ?>
				</tbody>
		   </table>
	  </div>
</div>
<div id="Test" class="student">
	 <div class="col-lg-12 col-sm-12">
		 <br><br><br>
		   <table class="table table-striped table-hover table-bordered" >
				<thead>
					 <tr>
						  <th>Project Name</th>
						  <th>Status</th>
					</tr>
				</thead>
				<tbody>
					 <?php for ($i = 0; $i < count($deptlist); ++$i) { ?>
						  <tr>
							   <td><?php echo $deptlist[$i]->pname; ?></td>
							   <td><?php echo $deptlist[$i]->pstatus; ?></td>
							   <?php } ?>
							   <?php $attributes = array("name" => "registrationform");
									echo form_open("assignment/register", $attributes);?>
							   <td><textarea name="ans" class="form-control" rows='3' placeholder='Type your Status ...'></textarea></td>
							   <td><button name="submit" type="submit" class="btn btn-default">Update Status</button></td>
						  </tr><?php echo form_close(); ?>
					 
				</tbody>
		   </table>
	  </div>
</div>
<div align="center" id="Project" class="student">
	<br><br><br>
	<table class="table table-striped table-hover table-bordered">
		<thead>
			 <tr>
				  <th>S No</th>
				  <th>File Name</th>
				  <th>Date</th>
				  <th>Link</th>
			 </tr>
		</thead>
		<tbody>
			 <?php for ($i = 0; $i < count($filelist); ++$i) { ?>
				  <tr>
					   <td><?php echo $filelist[$i]->sno; ?></td>
					   <td><?php echo $filelist[$i]->filename; ?></td>
					   <td><?php echo $filelist[$i]->modified; ?></td>
					   <td><a href="/StudentAssessmentSystem/uploads/<?php echo $filelist[$i]->filename ?>" target="_blank">view file</a></td>
				  </tr>
			 <?php } ?>
		</tbody>
	</table>
</div>

</div>
</body>
<script>
	openTab('Marks');

	function openTab(tabName) {
		var i;
		var x = document.getElementsByClassName("student");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		document.getElementById(tabName).style.display = "block";
	}
	

</script>
</html>
