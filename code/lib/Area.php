<?php
class Area{
	private $rarity = "Common";
	private $discovery = "None";
	private $danger = "None";
	private $themed = "No";
	private $type = array();
	
	public function __construct(){
		$this->AreaTypeContents();
		$this->MainGenerator();
	}
	
	public function Print_Area(){
		$ret = "";
		
		$ret .= "<h2>AREA:</h2>";
		$ret .= "Themed: " . $this->themed . "<br />";
		$ret .= "Rarity: " . $this->rarity . "<br />";
		$ret .= "Discovery: <br>&emsp;" . $this->discovery . "<br />";
		$ret .= "Danger: <br>&emsp;" . $this->danger . "<br />";
		
		//echo($ret);
		return $ret;
	}
	
	private function AreaTypeContents(){
		$table = array(
			array("Unthemed", "Common", "", ""), 
			array("Unthemed", "Common", "", "Danger"), 
			array("Unthemed", "Common", "Discovery", "Danger"), 
			array("Unthemed", "Common", "Discovery", "Danger"), 
			array("Unthemed", "Common", "Discovery", ""), 
			array("Unthemed", "Common", "Discovery", ""), 
			array("Themed", "Common", "", "Danger"), 
			array("Themed", "Common", "Discovery", "Danger"), 
			array("Themed", "Common", "Discovery", ""), 
			array("Themed", "Unique", "", "Danger"), 
			array("Themed", "Unique", "Discovery", "Danger"), 
			array("Themed", "Unique", "Discovery", ""));
			
		$this->type = CheckTable($table);
	}
	
	private function MainGenerator(){
		$this->themed = $this->type[0];
		$this->rarity = $this->type[1];
		
		if ($this->type[2] === "Discovery"){
			$this->GenerateDiscovery();
		}
		
		if ($this->type[3] === "Danger"){
			$this->GenerateDanger();
		}
	}
	
	private function GenerateDiscovery(){
		$table_Discovery_Type = array(
			"Dressing", 
			"Dressing", 
			"Dressing", 
			"Feature", 
			"Feature", 
			"Feature", 
			"Feature", 
			"Feature", 
			"Feature", 
			"Find",
			"Find",
			"Find");
			
		$table_Dressing = array(
			"Dressing: Junk/debris", 
			"Dressing: Tracks/marks", 
			"Dressing: Signs of battle", 
			"Dressing: Writing/carving", 
			"Dressing: Warning", 
			"Dressing: Dead Creature (p49)", 
			"Dressing: Bones/remains", 
			"Dressing: Book/scroll/map", 
			"Dressing: Broken door/wall", 
			"Dressing: Breeze/wind/smell", 
			"Dressing: Lichen/moss/fungus", 
			"Dressing: Oddity (p50)");
			
		$table_Feature = array(
			"Feature: Cave-in/collapse", 
			"Feature: Pit/shaft/chasm", 
			"Feature: Pillars/columns", 
			"Feature: Locked door/gate", 
			"Feature: Alcoves/niches", 
			"Feature: Bridge/stairs/ramp", 
			"Feature: Fountain/well/pool", 
			"Feature: Puzzle", 
			"Feature: Altar/dais/platform", 
			"Feature: Statue/idol", 
			"Feature: Magic pool/statue/idol", 
			"Feature: Connection to another dungeon");
			
		$table_Find = array(
			"Find: Trinkets", 
			"Find: Tools", 
			"Find: Weapons/armor", 
			"Find: Supplies/trade goods", 
			"Find: Coins/gems/jewelry", 
			"Find: Poisons/potions", 
			"Find: Adventurer/captive", 
			"Find: Magic item", 
			"Find: Scroll/book", 
			"Find: Magic weapon/armor", 
			"Find: Artifact", 
			"Find: Roll twice");
			
		$discovery = CheckTable($table_Discovery_Type);
		$this->discovery = "None";
		
		if ($discovery === "Dressing"){
			$this->discovery = CheckTable($table_Dressing);
		}elseif ($discovery === "Feature"){
			$this->discovery = CheckTable($table_Feature);
		}elseif ($Discovery  === "Find"){
			$this->discovery = CheckTable($table_Find);
		}
	}
	
	private function GenerateDanger(){
		$table_Danger_Type = array(
			"Trap", 
			"Trap", 
			"Trap", 
			"Trap", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Creature (pag 49)", 
			"Entity");
			
		$table_Traps = array(
			"Trap: Alarm", 
			"Trap: Ensnaring/paralyzing", 
			"Trap: Pit", 
			"Trap: Crushing", 
			"Trap: Piercing/puncturing", 
			"Trap: Chopping/slashing", 
			"Trap: Confusing (maze, etc.)", 
			"Trap: Gas (poison, etc.)", 
			"Trap: element (p50)", 
			"Trap: Ambush", 
			"Trap: Magical", 
			"Trap: Roll twice");
			
		$table_Creatures = array(
			"Creature: Waiting in ambush", 
			"Creature: Fighting/squabbling", 
			"Creature: Prowling/on patrol", 
			"Creature: Looking for food", 
			"Creature: Eating/resting", 
			"Creature: Guarding", 
			"Creature: On the move", 
			"Creature: Searching/scavenging", 
			"Creature: Returning to den", 
			"Creature: Making plans", 
			"Creature: Sleeping", 
			"Creature: Dying");
			
		$table_Entity = array(
			"Entity: Alien interloper", 
			"Entity: Vermin lord", 
			"Entity: Criminal mastermind", 
			"Entity: Warlord", 
			"Entity: High priest", 
			"Entity: Oracle", 
			"Entity: Wizard/witch/alchemist", 
			"Entity: Monster lord (p49)", 
			"Entity: Evil spirit/ghost", 
			"Entity: Undead lord (lich, etc.)", 
			"Entity: Demon", 
			"Entity: Dark god");
			
		$danger = CheckTable($table_Danger_Type);
		$this->danger = "None";
		
		if ($danger === "Trap"){
			$this->danger = CheckTable($table_Traps);
		}elseif ($danger === "Creature (pag 49)"){
			$this->danger = CheckTable($table_Creatures);
		}elseif ($danger  === "Entity"){
			$this->danger = CheckTable($table_Entity);
		}
	}
}
?>
