<?php
include_once './obj/Area.php';
include_once './obj/Dungeon.php';
function CheckTable($table){
	return $table[rand(0, count($table) - 1)];
}
function _main(){
	$myDungeon = new Dungeon();
	$ret = $myDungeon->printDungeon();
	
	return $ret;
}
//$MyArea = new Area();
//$MyArea->Print_Area();
?>
