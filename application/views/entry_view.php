<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Page</title>
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container-fluid">
<ul class="nav nav-tabs">
  <li><a href="javascript:void(0)" onclick="openTab('Marks')">Marks Entry</a></li>
  <li><a href="javascript:void(0)" onclick="openTab('Assignment')">Assignment</a></li>
  <li><a href="javascript:void(0)" onclick="openTab('File')">File Upload</a></li>
  <li class="navbar-right"><a href="http://localhost/StudentAssessmentSystem/index.php/staff">Log Out</a></li>
</ul>

<div id="Marks" class="staff row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Marks Entry Form</h4>
            </div>
            <div class="panel-body">
                <?php $attributes = array("name" => "registrationform");
                echo form_open("entry/register", $attributes);?>
                <div class="form-group">
                    <label for="name">Student ID</label>
                    <input class="form-control" name="sid" placeholder="ID Number" type="number" />
                    <span class="text-danger"><?php echo form_error('sid'); ?></span>
                </div>

               
                <div class="form-group">
                    <label for="subject">Subject 1</label>
                    <input class="form-control" name="s1" placeholder="Mark 1" type="number" />
                    <span class="text-danger"><?php echo form_error('s1'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Subject 2</label>
                    <input class="form-control" name="s2" placeholder="Mark 2" type="number" />
                    <span class="text-danger"><?php echo form_error('s2'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Subject 3</label>
                    <input class="form-control" name="s3" placeholder="Mark 3" type="number" />
                    <span class="text-danger"><?php echo form_error('s3'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject 4</label>
                    <input class="form-control" name="s4" placeholder="Mark 4" type="number" />
                    <span class="text-danger"><?php echo form_error('s4'); ?></span>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-default">Go</button>
                    <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
                </div>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
</div>
<div id="Assignment" class="staff">
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Assignment Entry</h4>
            </div>
            <div class="panel-body">
                <?php $attributes = array("name" => "postform");
                echo form_open("entry/post", $attributes);?>
                <div class="form-group">
                    <label for="class">Class</label>
                    <select class="form-control" name="class">
						<option value="">Select...</option>
						<option value="ug1">UG 1</option>
						<option value="ug2">UG 2</option>
						<option value="pg">PG</option>
					</select>
                    <span class="text-danger"><?php echo form_error('class'); ?></span>
                </div>

               
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input class="form-control" name="subject" placeholder="Subject" type="text" />
                    <span class="text-danger"><?php echo form_error('subject'); ?></span>
                </div>

                <div class="form-group">
                    <label for="ques">Question</label>
                    <textarea class="form-control" name="ques" placeholder="type here ..." rows="4" ></textarea>
                    <span class="text-danger"><?php echo form_error('ques'); ?></span>
                </div>

                <div class="form-group">
                    <button name="post" type="submit" class="btn btn-default">Post</button>
                    <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
                </div>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
</div>
<div align="center" id="File" class="staff">
	<br><br><br>
	<?php echo form_open_multipart('entry/do_upload');?>
	<form action="" method="">
	<label class="btn btn-primary btn-file" style="margin-left:auto;margin-right:auto;display:block;width:50%">
		Click to Add Documents<input id="uploadInput" style="display:none" type="file" name="myfile" onchange="updateSize();" ><strong style="color: orange"> File Size: <span id="fileSize">0</span></strong>
	</label>
	<br>
	<button name="fileup" type="submit" class="btn btn-success" style="margin-left:auto;margin-right:auto;display:block;"><span class="glyphicon glyphicon-cloud-upload"></span> Upload</button>
	</form><br>
	<p style="color: red">*Only gif,jpg,png,doc,pdf,html files allowed</p>
</div>

</div>
</body>
<script>
	openTab('Marks');

	function openTab(tabName) {
		var i;
		var x = document.getElementsByClassName("staff");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		document.getElementById(tabName).style.display = "block";
	}
	
	function updateSize() {
	  var nBytes = 0,
		  oFiles = document.getElementById("uploadInput").files,
		  nFiles = oFiles.length;
	  for (var nFileId = 0; nFileId < nFiles; nFileId++) {
		nBytes += oFiles[nFileId].size;
	  }
	  var sOutput = nBytes + " bytes";
	  // optional code for multiples approximation
	  for (var aMultiples = ["KiB", "MiB", "GiB", "TiB", "PiB", "EiB", "ZiB", "YiB"], nMultiple = 0, nApprox = nBytes / 1024; nApprox > 1; nApprox /= 1024, nMultiple++) {
		sOutput = nApprox.toFixed(3) + " " + aMultiples[nMultiple] + " (" + nBytes + " bytes)";
	  }
	  // end of optional code
	  //document.getElementById("fileNum").innerHTML = nFiles;
	  document.getElementById("fileSize").innerHTML = sOutput;
	}
</script>
</html>
