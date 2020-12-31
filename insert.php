<?php
    
	$db_host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "test_db";
	
	$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	
	if(!$conn)
	{
		die("Connection Failed");
	}
	echo "Connection Successfully <hr>";
	
	if(isset($_REQUEST['submit'])){
		if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") ||
			($_REQUEST['address'] == "")){
				echo "<small>Fill All Fields..</small><hr>";
			}
		else{
			$name = $_REQUEST['name'];
			$roll = $_REQUEST['roll'];
			$address = $_REQUEST['address'];
			$sql = "INSERT INTO student (name, roll, address)
			 VALUES('$name','$roll','$address')";
			 if(mysqli_query($conn, $sql)){
				 echo "New Record Inserted Successfully.";
			 }
			 else{
				 echo "Unable Inserted.";
			 }
		}
	}
	
	
	/*$sql = "INSERT INTO student (name, roll, address) 
	VALUES('Ram','12','meerut 3')";
	
	if(mysqli_query($conn, $sql))
	{
		echo "New Record Inserted Successfully";
	}
	else
	{
		echo "Unable Insert";
	}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert form </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Enter a data to insert.</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="roll">Roll no.</label>
      <input type="text" class="form-control" id="roll" placeholder="Enter roll no." name="roll">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
  <div>
      <?php
	     #print tables.
	     $sql = "SELECT * FROM student"; #empty file name student2
	     $result = mysqli_query($conn, $sql);
	
	     if(mysqli_num_rows($result) > 0) # fech is not empty
	     {
             echo '<table class="table">';
			   echo "<thead>";
			     echo "<tr>";
				    echo "<th>ID</th>";
				    echo "<th>Name</th>";
				    echo "<th>Roll</th>";
				    echo "<th>Address</th>";
				  echo "</tr>";
				echo "</thead>";
			  echo "<tbody>";
			      while($row = mysqli_fetch_assoc($result))
				  {
					  echo "<tr>";
					     echo "<td>" . $row["id"] . "</td>";
						 echo "<td>" . $row["name"] . "</td>";
						 echo "<td>" . $row["roll"] . "</td>";
						 echo "<td>" . $row["address"] . "</td>";
					  echo "</tr>";
				  }
		 }
	     else
	     {
		    echo "0 Result";
	     }
	   ?>
  </div>
</div>

</body>
</html>
