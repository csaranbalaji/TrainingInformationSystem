<?php

//get password from file
$myfile = fopen("/var/www/html/pass.txt", "r") or die("Unable to open file!");
$password = fread($myfile,filesize("/var/www/html/pass.txt"));
fclose($myfile);

//connection
$con = mysqli_connect("localhost","root",$password) or die("error in database connection" . mysql_error());
mysqli_select_db($con ,"patient") or die("error to select the db" . mysql_error());

//data insertion
$query = `insert into trainee values(1,'saran','saran@gmail.com','pass','Git & SVN',3);
insert into trainee values(1,'balaji','balaji@gmail.com','pass','Git & SVN');
insert into project values(1,'WebAPP','12/01/17 - Started Module 1');`

//exec the query
$result=mysqli_query($con,$query) or die("<p1><center>error in inserting data in db</center></p1>" . mysql_error());
echo "Populated the Database";
?>
