<!DOCTYPE html>
<html>
<HEAD>
<TITLE>Dungeon Generator</TITLE>
</HEAD>
<BODY>
<?php

function CheckTable($Table){
	return $Table[rand(0, count($Table) - 1)];
}

class Area{
	private $Rarity = "Common";
	private $Discovery = "None";
	private $Danger = "None";
	private $Themed = "No";
	private $Type = array();

	public function __construct(){
		$this->AreaTypeContents();
		$this->MainGenerator();
	}
	public function Print_Area(){
		echo "<h2>AREA:</h2>";
		echo "Themed: " . $this->Themed . "<br>";
		echo "Rarity: " . $this->Rarity . "<br>";
		echo "Discovery: <br>&emsp;" . $this->Discovery . "<br>";
		echo "Danger: <br>&emsp;" . $this->Danger . "<br>";
	}

	private function AreaTypeContents(){
		$Table = array(
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

		$this->Type = CheckTable($Table);
	}

	private function MainGenerator(){
		$this->Themed = $this->Type[0];
		$this->Rarity = $this->Type[1];

		if ($this->Type[2] == "Discovery"){
			$this->GenerateDiscovery();
		}

		if ($this->Type[3] == "Danger"){
			$this->GenerateDanger();
		}
	}

	private function GenerateDiscovery(){
		$Table_Discovery_Type = [
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
			"Find"];

		$Table_Dressing = [
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
			"Dressing: Oddity (p50)"];

		$Table_Feature = [
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
			"Feature: Connection to another dungeon"];

		$Table_Find = [
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
			"Find: Roll twice"];

		$Discovery = CheckTable($Table_Discovery_Type);

		if ($Discovery == "Dressing"){
			$this->Discovery = CheckTable($Table_Dressing);
		}
		elseif ($Discovery == "Feature"){
			$this->Discovery = CheckTable($Table_Feature);
		}
		elseif ($Discovery  == "Find"){
			$this->Discovery = CheckTable($Table_Find);
		}
		else{
			$this->Discovery = "None";
		}
	}

	private function GenerateDanger(){
		$Table_Danger_Type = array(
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

		$Table_Traps = array(
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

		$Table_Creatures = array(
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

		$Table_Entity = array(
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

		$Danger = CheckTable($Table_Danger_Type);

		if ($Danger == "Trap"){
			$this->Danger = CheckTable($Table_Traps);
		}
		elseif ($Danger == "Creature (pag 49)"){
			$this->Danger = CheckTable($Table_Creatures);
		}
		elseif ($Danger  == "Entity"){
			$this->Danger = CheckTable($Table_Entity);
		}
		else{
			$this->Danger = "None";
		}
	}
}

class Dungeon{
	private $Size = "";
	private $Number_of_Themes = 0;
	private $Number_of_Areas = 0;
	private $Builder = "";
	private $Ruination = "";
	private $Themes = array(); 
	private $Areas = array(); 


	public function __construct(){
		$this->GenerateSize();
		$this->GenerateNumberOfThemesAndAreas();
		$this->GenerateBuilder();
		$this->GenerateThemes();
		$this->GenerateAreas();
		$this->GenerateRuination();
	}

	private function GenerateSize(){
		$Table = array("Small", "Medium", "Large", "Huge");
		$this->Size = CheckTable($Table) ;
	}

	private function GenerateNumberOfThemesAndAreas(){
		$DungeonSize = $this->Size;

		if ($DungeonSize == "Small"){
			$this->Number_of_Themes = rand(1, 4);
			$this->Number_of_Areas = rand(1, 6) + 2;
		}
		elseif ($DungeonSize == "Medium"){
			$this->Number_of_Themes = rand(1, 6);
			$this->Number_of_Areas = 2 * rand(1, 6) + 2;
		}
		elseif ($DungeonSize == "Large"){
			$this->Number_of_Themes = rand(1, 6) + 1;
			$this->Number_of_Areas = 3 * rand(1, 6) + 6;
		}
		elseif ($DungeonSize == "Huge"){
			$this->Number_of_Themes = rand(1, 6) + 2;
			$this->Number_of_Areas = 4 * rand(1, 6) + 10;
		}
		else
			$this->Number_of_Themes = 0;
	}

	private function GenerateAreas(){
		foreach (range(0, $this->Number_of_Areas) as $i){
			$New_Area = new Area();
			$this->Areas[] = $New_Area;
		}
	}

	private function GenerateThemes(){	
		$Table_Rarity = array("Mundane", "Unusual", "Extraordinary");

		$Table_Mundane = array(
			"Mundane:\t Rot/decay", 
			"Mundane:\t Torture/agony", 
			"Mundane:\t Madness", 
			"Mundane:\t All is lost", 
			"Mundane:\t Noble sacrifice", 
			"Mundane:\t Savage fury", 
			"Mundane:\t Survival", 
			"Mundane:\t Criminal activity", 
			"Mundane:\t Secrets/treachery", 
			"Mundane:\t Tricks and traps", 
			"Mundane:\t Invasion/infestation", 
			"Mundane:\t Factions at war" );

		$Table_Unusual = array(
			"Unusual:\t Creation/invention", 
			"Unusual:\t Element (p50)", 
			"Unusual:\t Knowledge/learning", 
			"Unusual:\t Growth/expansion", 
			"Unusual:\t Deepening mystery", 
			"Unusual:\t Transformation/change", 
			"Unusual:\t Chaos and destruction", 
			"Unusual:\t Shadowy forces", 
			"Unusual:\t Forbidden knowledge", 
			"Unusual:\t Poison/disease", 
			"Unusual:\t Corruption/blight", 
			"Unusual:\t Impending disaster" );

		$Table_Extraotrinary = array(
			"Extraordinary:\t Scheming evil", 
			"Extraordinary:\t Divination/scrying", 
			"Extraordinary:\t Blasphemy", 
			"Extraordinary:\t Arcane research", 
			"Extraordinary:\t Occult forces", 
			"Extraordinary:\t An ancient curse", 
			"Extraordinary:\t Mutation", 
			"Extraordinary:\t The unquiet dead", 
			"Extraordinary:\t Bottomless hunger", 
			"Extraordinary:\t Incredible power", 
			"Extraordinary:\t Unspeakable horrors", 
			"Extraordinary:\t Holy war" );

		foreach(range(1, $this->Number_of_Themes) as $themes){
			$Rarity = CheckTable($Table_Rarity);

			if ($Rarity == "Mundane")
				$this->Themes[] = (CheckTable($Table_Mundane));
			elseif ($Rarity == "Unusual")
				$this->Themes[] = (CheckTable($Table_Unusual));
			elseif ($Rarity == "Extraordinary")
				$this->Themes[] = (CheckTable($Table_Extraotrinary));
			else
				$this->Themes[] = "Error";
		}
	}

	private function GenerateBuilder(){
		$Table = array("aliens/precursors", 
			"demigod/demon",
			"natural (caves, etc.)", 
			"natural (caves, etc.)", 
			"religious order/cult", 
			"Humanoid (p49)", 
			"Humanoid (p49)", 
			"dwarves/gnomes", 
			"dwarves/gnomes", 
			"elves", 
			"wizard/madman", 
			"monarch/warlord");

		$this->Builder= CheckTable($Table);
	}

	private function GenerateRuination(){
		$Table = array("Arcane disaster", 
			"Damnation/curse", 
			"Earthquake/fire/flood", 
			"Plague/famine/drought", 
			"Overrun by monsters", 
			"War/invasion", 
			"Depleted resources", 
			"Better prospects elsewhere");

		$this->Ruination = CheckTable($Table);
	}

	public function printDungeon(){
		print "<h1>Dungeon Generator</h1>" . "\n";
		print "Size: " . $this->Size . "<br>";
		print "Number of themes: " . $this->Number_of_Themes . "<br>";
		print "Number of areas: " . $this->Number_of_Areas . "<br>";
		print "Builder: " . $this->Builder . "<br>";
		print "Ruination: " . $this->Ruination . "<br>";
		print "Themes: " . "<br>";
		
		foreach($this->Themes as $Theme){
			print "&emsp;" . $Theme . "<br>";
		}

		foreach($this->Areas as $Area){
			$Area->Print_Area();
		}
	}
}

$MyDungeon = new Dungeon();
$MyDungeon->printDungeon();

//$MyArea = new Area();
//$MyArea->Print_Area();
?>
</body>
</html> 
