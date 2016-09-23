<?php
include_once './lib/Area.php';
include_once './lib/Dungeon.php';
include_once './lib/kernel.php';
$myDungeon = new Dungeon();
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
				<p>
					<a class="btn btn-primary btn-large" href="index.php">Generate again!</a>
				</p>
			</div>
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
