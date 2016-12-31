<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Page</title>
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container-fluid">
<ul class="nav nav-tabs">
  <li><a href="javascript:void(0)" onclick="openTab('Profile')">View Students</a></li>
  <li><a href="javascript:void(0)" onclick="openTab('Test')">Questions</a></li>
  <li><a href="javascript:void(0)" onclick="openTab('Project')">Project Status</a></li>
  <li class="navbar-right"><a href="http://localhost/TrainingInformationSystem/index.php/trainer">Log Out</a></li>
</ul>

<div id="Profile" class="trainer row">
	  <div class="col-md-7 col-md-offset-3">
		  <br><br><br>
		   <table class="table table-striped table-hover table-bordered" align="center">
				<thead>
					 <tr>
						  <th>ID</th>
						  <th>Name</th>
						  <th>Course</th>
					</tr>
				</thead>
				<tbody>
					 <?php for ($i = 0; $i < count($studlist); ++$i) { ?>
						  <tr><td><?php echo $studlist[$i]->id; ?></td>
						  <td><?php echo $studlist[$i]->fname; ?></td>
						  <td><?php echo $studlist[$i]->course; ?></td></tr>
					<?php } ?>
				</tbody>
		   </table>
	  </div>
</div>

<div id="Test" class="trainer">
	<br>
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Questions Entry</h4>
            </div>
            <div class="panel-body">
                <?php $attributes = array("name" => "postform");
                echo form_open("entry/addQues", $attributes);?>
                
                <div class="form-group">
                    <label for="course">Course</label>
                    <input class="form-control" name="course" placeholder="Course" type="text" />
                    <span class="text-danger"><?php echo form_error('course'); ?></span>
                </div>


                <div class="form-group">
                    <label for="ques">Question</label>
                    <textarea class="form-control" name="ques" placeholder="type here ..." rows="4" ></textarea>
                    <span class="text-danger"><?php echo form_error('ques'); ?></span>
                </div>
                
                
                <div class="form-group">
                    <label for="op1">Option 1</label>
                    <input class="form-control" name="op1" placeholder="Option 1" type="text" />
                    <span class="text-danger"><?php echo form_error('op1'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="op2">Option 2</label>
                    <input class="form-control" name="op2" placeholder="Option 2" type="text" />
                    <span class="text-danger"><?php echo form_error('op2'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="op3">Option 3</label>
                    <input class="form-control" name="op3" placeholder="Option 3" type="text" />
                    <span class="text-danger"><?php echo form_error('op3'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="op4">Option 4</label>
                    <input class="form-control" name="op4" placeholder="Option 4" type="text" />
                    <span class="text-danger"><?php echo form_error('op4'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="ans">Answer</label>
                    <select class="form-control" name="ans">
						<option value="">Select...</option>
						<option value="a">Option 1</option>
						<option value="b">Option 2</option>
						<option value="c">Option 3</option>
						<option value="d">Option 4</option>
					</select>
                    <span class="text-danger"><?php echo form_error('ans'); ?></span>
                </div>
                
                <div class="form-group">
                    <button name="post" type="submit" class="btn btn-default">Add Question</button>
                    <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
                </div>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
</div>

<div id="Project" class="trainer">
	 <div class="col-md-7 col-md-offset-3">
		 <br><br><br>
		   <table class="table table-striped table-hover table-bordered" >
				<thead>
					 <tr>
						  <th>Project Name</th>
						  <th>Status</th>
						  
					</tr>
				</thead>
				<tbody>
					 <?php for ($i = 0; $i < count($project); ++$i) { ?>
						  <tr>
							   <td><?php echo $project[$i]->pname; ?></td>
							   <td><?php echo $project[$i]->pstatus; ?></td>
							   <?php } ?>
						  </tr>
					 
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
		var x = document.getElementsByClassName("trainer");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		document.getElementById(tabName).style.display = "block";
	}
</script>
</html>
