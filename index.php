<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title></title>
</head>
<body>
	<div class="bar">
		<div class="cont"><h2>my favorite books</h2></div>
		<div class="container">
			
		</div>
		<div class="cont"><h2>list of books</h2></div>
		<div class="container">
			<?php
			require "phpCode/connect.php";
			$rt = "SELECT * FROM `books1`";
			$start = mysqli_query($connect, $rt);
			while ($privet = mysqli_fetch_array($start)) {
				echo "<a href='?id=$privet[id]' style='text-decoration: none;'><p class='draggable' draggable='true'>$privet[title]</p></a>";
			}

			?>
		</div>
		<div class="cont"><h2>add book</h2></div>
		<div class="add_ways">
			<div class="tabs">
  				<input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
  				<label for="tab-btn-1">write to yourself</label><br>
  				<input type="radio" name="tab-btn" id="tab-btn-2" value="">
  				<label for="tab-btn-2">load from file</label>
  				<div id="content-1"><h3>new book</h3>
  				<form method="POST"> 
				<p>name</p>
				<input type="text" name="first" class="name_1"><br>
				<p>author</p>
				<input type="text" name="first" class="name_2"><br>
				<p>content</p>
				<textarea class="name_3" cols="36" rows="23" placeholder="write your book" name="second" style="width: 170px; height: auto;"></textarea><br>
				<button type="button" class="random" onclick="reload_interval(2000);"><span>add</span></button>
  				</div>
  				<div id="content-2"><h3>name</h3>
  				<form method="POST" enctype="multipart/form-data" id="23"> 
				<input type="text" name="" class="name_b"><br>
				<input type="file" name="files[]" multiple style="width: 170px;"><br>
				<input type="submit" name="submit" value="add"></form>
  				</div>
  			</div>
  		</div>
	</div>
	<div class="content">
		<div class="open_book"><h2>open book for reading</h2></div>
		<div id="results"></div>
		<?php
			require "phpCode/connect.php";
			$id = $_GET['id'];
    		$sql = "SELECT * FROM books1 WHERE id = '$id'";
			$gg = mysqli_query($connect, $sql);
			while ($id= mysqli_fetch_array($gg)) {
				echo "<p class='main1' draggable='true'>$id[title]</p>";
				echo "<p class='main2' draggable='true'>$id[auther]</p>";
				echo "<p class='main3' draggable='true'>$id[content]</p>";
			}
		?>
	</div>
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/upload.js"></script>
	<script src="js/upload1.js"></script>
	<script src="js/script.js"></script>
</body>
</html>