<?php include 'dbcon.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Libraian</title>
	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<!-- BoxIcons v2.1.2 -->
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css'>
	<link rel='stylesheet' href='https://codepen.io/andrewrock/pen/pxroRO.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="./style.css">

	<title>Librarian</title>

	<body>
		<div class="sidebar">

			<div class="toggle">
				<i class="bx bx-chevron-right"></i>
			</div>
			<div class="logo">
				<h3>Virtual Librarian</h3>
				<img src="img\logob.png">
			</div>
			<nav>
				<ul>
					<a style="text-decoration: none;" href="search.html">
						<li class="nav-item">
							<i class="bx bx-podcast"></i>
							<span>Home</span>
						</li>
					</a>
					<a style="text-decoration: none;" href="index.html">
						<li class="nav-item ">
							<i class='bx bx-search'></i>
							<span>Search Books</span>
						</li>
					</a>
					<a style="text-decoration: none;" href="http://localhost/visai/upload.php">
						<li class="nav-item ">
							<i class='bx bxs-cloud-upload'></i>
							<span>Upload</span>
						</li>
					</a>
					<a style="text-decoration: none;" href="http://localhost/visai/keywords.php">

						<li class="nav-item  active ">
							<i class="bx bxs-bell"></i>
							<span>Documents</span>
						</li>
					</a>
					<li class="nav-item">
						<i class="bx bxs-cog"></i>
						<span>Technical Issue</span>
					</li>
				</ul>

				<hr>



			</nav>

		</div>
		<br><br>
		<div class="home-books">
			<br>
			<form method="post" enctype="multipart/form-data">
				<?php
				// If submit button is clicked
				if (isset($_POST['submit'])) {
					// get name from the form when submitted
					$name = $_POST['name'];
				}
				?>
				<div class="container">
					<div id="title" class="center">


						<div class="row">
							<div id="input" class="input-group mx-auto col-lg-6 col-md-8 col-sm-12">
								<input id="search-box" type="text" class="form-control" name="name"
									placeholder="Search Documents!...">
								<input type='submit' id="search class=" btn btn-primary" name="submit"
									value="search">Search</button>
							</div>
						</div>
					</div>
			</form>
		</div>
		<br><br><br>
		<center>
			<div class="col-lg-6 col-md-6 col-12">
				<div class="card">
					<div class="card-header text-center">
						<h4>Records from Database:</h4><br>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table>
								<thead>
									<th>ID</th>
									<th>Title</th>
									<th>FileName</th>
								</thead>
								<tbody>
									<?php


									$selectQuery = "select * from pdf_data where filename like '%$name%' OR username ='$name'";
									$squery = mysqli_query($con, $selectQuery);

									while (($result = mysqli_fetch_assoc($squery))) {
										?>
										<tr>
											<td>
												<?php echo $result['id']; ?>
											</td>
											<td>
												<?php echo $result['username']; ?>
											</td>
											<td>
												<?php echo $result['filename']; ?>
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</center>





		<div class="area">
			<ul class="circles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>




	</body>
	<!-- partial -->
	<script src="js/script.js"></script>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
		crossorigin="anonymous"></script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
	<link rel="stylesheet" href="css/style.css">


</html>