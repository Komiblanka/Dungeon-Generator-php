<?php
include_once './lib/Area.php';
include_once './lib/Dungeon.php';
include_once './lib/kernel.php';
$myDungeon = new Dungeon($_GET["size"]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dungeon generator!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h2>
					Dungeon Generator	
				</h2>
				<p>
					This page generates a dungeon for Dungeon World based in Perilous Worlds
				</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h2>
				Choose Size
			</h2>
			<form>
				<select class="selectpicker" name="size">
					<option value="1">Random</option>
					<option value="2">Small</option>
					<option value="3">Medium</option>
					<option value="4">Large</option>
					<option value="5">Huge</option>
				</select>

				<input type="submit" class="btn btn-primary btn-large" href="index.php" value="Generate!">
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<h2>
				Main characteristics
			</h2>
			<p>
				<?php
				echo $myDungeon->printDungeon();
				?>
			</p>
		</div>
		<div class="col-md-6">
			<h2>
				Themes	
			</h2>
			<p>
				<?php
				echo $myDungeon->printThemes();
				?>
			</p>
		</div>
	</div>
	
	<h2>
		Areas	
	</h2>


	<?php
		for($i=0;$i<=$myDungeon->number_of_Areas -1;$i++){
			if($i % 4 == 4){
				echo("<div class=\"row\">");
			}

			echo("	<div class=\"col-md-3 well\" id=\"area\">");
			echo("	<p>");
			echo($myDungeon->areas[$i]->Print_Area());	
			echo("	</p>");
			echo("	</div>");

			if($i % 4 == 4){
				echo("	</div>");
			}
		}
	?>


</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
