<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainee Page</title>
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container-fluid">
<ul class="nav nav-tabs">
  <li><a href="javascript:void(0)" onclick="openTab('Profile')">View Profile</a></li>
  <li><a href="javascript:void(0)" onclick="openTab('Test')">Test</a></li>
  <li><a href="javascript:void(0)" onclick="openTab('Project')">Project Status</a></li>
  <li class="navbar-right"><a href="http://localhost/TrainingInformationSystem/index.php/trainee">Log Out</a></li>
</ul>

<div id="Profile" class="trainee row">
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
					 <?php for ($i = 0; $i < count($profile); ++$i) { ?>
						  <tr><td>Id</td><td><?php echo $profile[$i]->id; ?></td></tr>
						   <tr><td>Name</td><td><?php echo $profile[$i]->fname; ?></td></tr>
						   <tr><td>Course</td><td><?php echo $profile[$i]->course; ?></td></tr>
						   <tr><td>Test Mark</td><td><?php echo $profile[$i]->mark; ?></td></tr>
					<?php } ?>
				</tbody>
		   </table>
	  </div>
</div>

<div align="center" id="Test" class="trainee">
	<br><br><br>
	<table class="table table-striped table-hover table-bordered">
		<thead>
			 <tr>
				  <th>S No</th>
				  <th>Question</th>
				  <th>A</th>
				  <th>B</th>
				  <th>C</th>
				  <th>D</th>
				  <th>Ans</th>
			 </tr>
		</thead>
		<tbody>
			<?php $ans[] = 0; $count = count($questlist);?>
			 <?php $i =0; foreach($questlist as $ques) { ?>
				  <tr>
					   <td><?php echo $i+1; ?></td>
					   <td><?php echo $ques['ques']; ?></td>
					   <td><?php echo $ques['c1']; ?></td>
					   <td><?php echo $ques['c2']; ?></td>
					   <td><?php echo $ques['c3']; ?></td>
					   <td><?php echo $ques['c4']; $ans[$i] = $ques['ans'];?></td>
					   <td><input type='text'class="form-control" id='a<?php echo $i; ?>'/></td>
				  </tr>
			 <?php $i++;} ?>
		</tbody>
	</table>
	<button id="tsubmit" onclick="valMark()" class="btn btn-default">Submit</button>
</div>

<div id="Project" class="trainee">
	 <div class="col-lg-12 col-sm-12">
		 <br><br><br>
		   <table class="table table-striped table-hover table-bordered" >
				<thead>
					 <tr>
						  <th>Project Name</th>
						  <th>Previous Status</th>
						  <th>Date with Status</th>
					</tr>
				</thead>
				<tbody>
					 <?php for ($i = 0; $i < count($project); ++$i) { ?>
						  <tr>
							   <td><?php echo $project[$i]->pname; ?></td>
							   <td><?php echo $project[$i]->pstatus; ?></td>
							   <?php } ?>
							   <?php $attributes = array("name" => "registrationform");
									echo form_open("display/update", $attributes);?>
							   <td><input type="text" name="status" class="form-control" placeholder='DD/MM/YY - status'/></td>
							   <td><button name="submit" type="submit" class="btn btn-default">Update Status</button></td>
						  </tr><?php echo form_close(); ?>
					 
				</tbody>
		   </table>
	  </div>
</div>

</div>
</body>
<script>
	openTab('Profile');

	function openTab(tabName) {
		var i;
		var x = document.getElementsByClassName("trainee");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		document.getElementById(tabName).style.display = "block";
	}
	var mark=0;
	var ans = <?php echo json_encode($ans); ?>;
	function valMark(){
		for(i=0;i<<?php echo $count;?>;i++)
			if(document.getElementById('a'+i).value == ans[i])
				mark++;
		$.ajax({
            url:"<?php echo site_url('display/update_mark');?>/"+mark,
            success:function(data)
            {
				alert("Your answers has been submitted");
            }
       });
		
	mark=0;	
	}

</script>
</html>
