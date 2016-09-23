<?php
class Dungeon{
	private $size = "";
	private $number_of_Themes = 0;
	public $number_of_Areas = 0;
	private $builder = "";
	private $ruination = "";
	private $themes = array(); 
	public $areas = array(); 


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
		}elseif ($this->size === "Huge"){
			$this->number_of_Themes = rand(1, 6) + 2;
			$this->number_of_Areas = 4 * rand(1, 6) + 10;
		}
	}

	private function GenerateAreas(){
		for($i=1;$i<=$this->number_of_Areas;$i++){
			$this->areas[] = new Area();
		}
	}

	private function GenerateThemes(){	
		$table_Rarity = array("Mundane", "Unusual", "Extraordinary");

		$table_Mundane = array(
			"<b>Mundane:</b>\t Rot/decay", 
			"<b>Mundane:</b>\t Torture/agony", 
			"<b>Mundane:</b>\t Madness", 
			"<b>Mundane:</b>\t All is lost", 
			"<b>Mundane:</b>\t Noble sacrifice", 
			"<b>Mundane:</b>\t Savage fury", 
			"<b>Mundane:</b>\t Survival", 
			"<b>Mundane:</b>\t Criminal activity", 
			"<b>Mundane:</b>\t Secrets/treachery", 
			"<b>Mundane:</b>\t Tricks and traps", 
			"<b>Mundane:</b>\t Invasion/infestation", 
			"<b>Mundane:</b>\t Factions at war" );

		$table_Unusual = array(
			"<b>Unusual:</b>\t Creation/invention", 
			"<b>Unusual:</b>\t Element (p50)", 
			"<b>Unusual:</b>\t Knowledge/learning", 
			"<b>Unusual:</b>\t Growth/expansion", 
			"<b>Unusual:</b>\t Deepening mystery", 
			"<b>Unusual:</b>\t Transformation/change", 
			"<b>Unusual:</b>\t Chaos and destruction", 
			"<b>Unusual:</b>\t Shadowy forces", 
			"<b>Unusual:</b>\t Forbidden knowledge", 
			"<b>Unusual:</b>\t Poison/disease", 
			"<b>Unusual:</b>\t Corruption/blight", 
			"<b>Unusual:</b>\t Impending disaster" );

		$table_Extraotrinary = array(
			"<b>Extraordinary:</b>\t Scheming evil", 
			"<b>Extraordinary:</b>\t Divination/scrying", 
			"<b>Extraordinary:</b>\t Blasphemy", 
			"<b>Extraordinary:</b>\t Arcane research", 
			"<b>Extraordinary:</b>\t Occult forces", 
			"<b>Extraordinary:</b>\t An ancient curse", 
			"<b>Extraordinary:</b>\t Mutation", 
			"<b>Extraordinary:</b>\t The unquiet dead", 
			"<b>Extraordinary:</b>\t Bottomless hunger", 
			"<b>Extraordinary:</b>\t Incredible power", 
			"<b>Extraordinary:</b>\t Unspeakable horrors", 
			"<b>Extraordinary:</b>\t Holy war" );
		
		for($i=1;$i<=$this->number_of_Themes;$i++){

			$rarity = CheckTable($table_Rarity);

			if ($rarity === "Mundane")
				$this->themes[] = (CheckTable($table_Mundane));
			elseif ($rarity === "Unusual")
				$this->themes[] = (CheckTable($table_Unusual));
			elseif ($rarity === "Extraordinary")
				$this->themes[] = (CheckTable($table_Extraotrinary));
			else
				$this->themes[] = "Error";
		}
	}

	private function GenerateBuilder(){
		$table = array("Aliens/precursors", 
			"Demigod/demon",
			"Natural (caves, etc.)", 
			"Natural (caves, etc.)", 
			"Religious order/cult", 
			"humanoid (p49)", 
			"humanoid (p49)", 
			"Dwarves/gnomes", 
			"Dwarves/gnomes", 
			"Elves", 
			"Wizard/madman", 
			"Monarch/warlord");

		$this->builder= CheckTable($table);
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

		$this->ruination = CheckTable($table);
	}

	public function printDungeon(){
		$ret = "";
		
		$ret .= "<b>Size:</b> " . $this->size . "<br />";
		$ret .= "<b>Number of themes:</b> " . $this->number_of_Themes . "<br />";
		$ret .= "<b>Number of areas:</b> " . $this->number_of_Areas . "<br />";
		$ret .= "<b>Builder:</b> " . $this->builder . "<br />";
		$ret .= "<b>Ruination:</b> " . $this->ruination . "<br />";
		
		return $ret;
	}

	public function printThemes(){		
		foreach($this->themes as $theme){
			$ret .= $theme . "<br>";
		}
		return $ret;
	}

	public function printAreas(){
		echo "This is a test";
		echo($this->areas[0]->Print_Area());
		echo "End of test";
		foreach($this->areas as $area){
			$ret .= $area->Print_Area();
		}

		return $ret;
	}
		
}
?>
