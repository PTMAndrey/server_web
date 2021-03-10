<!DOCTYPE html>
<html>

<head>
	<title> RC PROJECT </title>
</head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>

body{
	background-color:#000015;
	color: #FFFFFF;
}

.background_form{
	background-color: #3D3D3D;
	border: 5px solid violet;
	border-radius:80px;
	padding: 35px;
	margin-top: 80px;
	margin-right: 315px;
	margin-bottom: 50px;
	margin-left:315px;
}

.fpage{
	color:white;
	text-align:center;
	position:relative;
}

.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  border-radius:50px;
  outline: none;
  font-size: 15px;
  word-wrap: break-word;
}

.active2, .collapsible:hover, .collapsible:focus {
  background-color: #555;
  outline: none;
  
  transition: max-height 0.2s ease-out;
}

.content {
  padding: 18px 18px 5px 18px;
  display: none;
  border-radius:50px;
  overflow: hidden;
  background-color: #f1f1f1;
  color:black;
  word-wrap: break-word;
}


</style>


<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <!-- Navbar content -->
	<div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">First page <span class="sr-only">(current)</span></a>
			</li>
			
			<!--<li class="nav-item"><font color="#007bff">____</font></li>-->
			<li class="nav-item">
				<a class="nav-link " style="margin-left:60px" href="private/private.php">Private page</a>
			</li>
			
			
		</ul>
	</div>
</nav>


<div class="background_form">
	
	<?php
		
		$conn = new mysqli('localhost','root','','glume');
		$row_cnt = 0;
		if($conn->connect_error){
			echo "$conn->connect_error";
			die("Conectare esuata : ". $conn->connect_error);
		} 
		else {
			
			$sql = "SELECT intrebare, raspuns FROM tabel_glume";
			$result = $conn->query($sql);
			$i = 1;
			
			if ( $result->num_rows > 0) 
			{
				echo " <h4 class='fpage'>Mai jos sunt toate ghicitorile noastre</h4> <br>";
				while($row = $result->fetch_assoc())
				{
					echo " [ " . $i++ . " ] - Ghicitoare<br> 
					<button type='button' class='collapsible' title='Apasa click pentru a vedea raspunsul'>"
						. $row['intrebare']. "<br> 
					</button> 
					<div class='content'> 
						<p>- Răspuns: " . $row['raspuns']. "</p></div><br><br>";
				}
			}
			else 
			{
				echo "<img src = 'images/sadface.png'style=' margin-left:5%; height:150px; padding-right:100px;' />
						Momentan nu există ghicitori... Ne cerem scuze";
				
			} 
			
			
			
			$conn->close();
		}

	?>
	
</div>

<!-- Javascript code for collapsible answear  -->
<script src="js/collapsible.js"></script>


</body>
</html>
