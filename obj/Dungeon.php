<?php
class Dungeon{
	private $size = "";
	private $number_of_Themes = 0;
	private $number_of_Areas = 0;
	private $builder = "";
	private $ruination = "";
	private $themes = array(); 
	private $areas = array(); 


	public function __construct(){
		$this->GenerateSize();
		$this->GenerateNumberOfThemesAndAreas();
		$this->GenerateBuilder();
		$this->GenerateThemes();
		$this->GenerateAreas();
		$this->GenerateRuination();
	}

	private function GenerateSize(){
		$this->size = CheckTable(array("Small", "Medium", "Large", "Huge"));
	}

	private function GenerateNumberOfThemesAndAreas(){
		$this->number_of_Themes = 0;
		
		if ($this->size === "Small"){
			$this->number_of_Themes = rand(1, 4);
			$this->number_of_Areas = rand(1, 6) + 2;
		}elseif ($this->size === "Medium"){
			$this->number_of_Themes = rand(1, 6);
			$this->number_of_Areas = 2 * rand(1, 6) + 2;
		}elseif ($this->size === "Large"){
			$this->number_of_Themes = rand(1, 6) + 1;
			$this->number_of_Areas = 3 * rand(1, 6) + 6;
		}elseif ($this->Size === "Huge"){
			$this->number_of_Themes = rand(1, 6) + 2;
			$this->number_of_Areas = 4 * rand(1, 6) + 10;
		}
	}

	private function GenerateAreas(){
		//foreach (range(0, $this->Number_of_Areas) as $i){
		for($i=0;$i<count($this->number_of_Areas)-1;$i++){
			$this->Areas[] = new Area();
		}
	}

	private function GenerateThemes(){	
		//$table_Rarity = array("Mundane", "Unusual", "Extraordinary");

		$table_Mundane = array(
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

		$table_Unusual = array(
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

		$table_Extraotrinary = array(
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

		//foreach(range(1, $this->Number_of_Themes) as $themes){
		for($i=1;$i<count($this->number_of_Themes)-1;$i++){
			//$rarity = CheckTable($table_Rarity);
			$rarity = CheckTable(array("Mundane", "Unusual", "Extraordinary"));
			$this->themes[] = "Error";

			if ($rarity === "Mundane")
				$this->themes[] = (CheckTable($table_Mundane));
			elseif ($rarity === "Unusual")
				$this->themes[] = (CheckTable($table_Unusual));
			elseif ($rarity === "Extraordinary")
				$this->themes[] = (CheckTable($table_Extraotrinary));
		}
	}

	private function GenerateBuilder(){
		$table = array("aliens/precursors", 
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

		$this->Builder= CheckTable($table);
	}

	private function GenerateRuination(){
		$table = array("Arcane disaster", 
			"Damnation/curse", 
			"Earthquake/fire/flood", 
			"Plague/famine/drought", 
			"Overrun by monsters", 
			"War/invasion", 
			"Depleted resources", 
			"Better prospects elsewhere");

		$this->Ruination = CheckTable($table);
	}

	public function printDungeon(){
		$ret = "";
		
		$ret .= "<h1>Dungeon Generator</h1>" . "\n";
		$ret .= "Size: " . $this->Size . "<br />";
		$ret .= "Number of themes: " . $this->Number_of_Themes . "<br />";
		$ret .= "Number of areas: " . $this->Number_of_Areas . "<br />";
		$ret .= "Builder: " . $this->Builder . "<br />";
		$ret .= "Ruination: " . $this->Ruination . "<br />";
		$ret .= "Themes: " . "<br />";
		
		foreach($this->themes as $theme){
			$ret .= "&emsp;" . $theme . "<br>";
		}

		foreach($this->areas as $area){
			$ret .= $area->Print_Area();
		}
		
		//echo($ret);
		
		return $ret;
	}
}
?>
