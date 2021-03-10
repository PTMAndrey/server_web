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
	background-color: #000015;
	color: #FFFFFF;
}

.input-form{
	background-color: #3D3D3D;
	border: 5px solid #A85D48;
	border-radius:20px;
	padding: 15px;
	color: white;
	width:100%;
	position:relative;
}

.input-form:focus{
	border: 5px solid violet;
	box-shadow: 0 0 15px #9ecaed;
	outline:none;
	
}

.adauga_ghicitoare{
	background-color: #000015;
	text-align:center;
	position:relative;
	border: 5px solid green;
	border-radius:50px;
	padding: 35px;
	margin-top: 13%;
}


div .panel{
	margin-left:150px;
}

</style>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <!-- Navbar content -->
	<div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="../index.php">First page </a>
			</li>
			
			<!--<li class="nav-item"><font color="#007bff">____</font></li>-->
			<li class="nav-item active">
				<a class="nav-link " style="margin-left:60px" href="private.php">Private page <span class="sr-only">(current)</span></a>
			</li>
			
			
		</ul>
	</div>
</nav>
	
	<div class="container" >
	
		<div class="adauga_ghicitoare ">
			<div class="row col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">
						<h1>Adaugă ghicitoare</h1>
					</div>
					
					<div class="panel-body">
							<?php
								$rand=rand();
								$_SESSION['rand']=$rand;
							?>
						<form method="post" action="">
							
							<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
							
							<div class="form-group">
								<label for="intrebare">Ghicitoarea</label>
								<input
									type="text"
									class="form-control input-form"
									id="intrebare"
									name="intrebare"
								/>
							</div>
							
							<div class="form-group">
								<label for="raspuns">Răspunsul</label>
								<input
									type="text"
									class="form-control input-form"
									id="raspuns"
									name="raspuns"
								/>
							</div>
						  
							<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
						  
						</form>
							
						

					</div>
				
				</div>
			</div>
			<?php
				$intrebare = "";
				$raspuns = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST" && $rand==$_SESSION['rand'] ) 
				{
							
					if (empty($_POST["intrebare"])) {
						$nameErr = "<font style='color: red; font-weight: bold; float:right; margin-top:-220px; margin-right:100px; '>< ! > Text pentru câmpul Ghicitoare necesar! </font> ";
						echo $nameErr;
					}
					
					if (empty($_POST["raspuns"])) {
						$nameErr = "<font style='color: red; font-weight: bold;float:right; margin-top:-105px; margin-right:115px; margin-bottom:-600px;'>< ! > Text pentru câmpul Răspuns necesar!</font> ";
						echo $nameErr;
					} 
					
					if(! empty($_POST["intrebare"]) && !empty($_POST["raspuns"]))
					{
						$intrebare = $_POST['intrebare'];
						$raspuns = $_POST['raspuns'];
						#echo $intrebare;
						#echo $raspuns;
						$conn = new mysqli('localhost','root','','glume');
					
						if($conn->connect_error){
							echo "$conn->connect_error";
							die("Conectare eșuată : ". $conn->connect_error);
							} else {
								$stmt = $conn->prepare("insert into tabel_glume(intrebare, raspuns) values(?, ?)");
								$stmt->bind_param("ss", $intrebare, $raspuns);
								$execval = $stmt->execute();
								if( $execval == 1062) {
									echo "<font style='color: green;  font-weight: bold; float:right; margin-top:-170px; margin-right:135px'>Ghicitoarea a fost înregistrată.</font>";
								} else {
									# Do nothing...
									$intrebare = null;
									$raspuns = null;
									echo "<br><font style='color: red; font-weight: bold; float:right; margin-top:-180px; margin-right:80px;'>Această ghicitoare a fost deja adaugată în baza de date!";
								}
						
								$stmt->close();
								$conn->close();
							}
					}
				}	
			?>
    </div>
   

</body>
</html>
