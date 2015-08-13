<?php

namespace nao20010128nao;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\level\sound\LaunchSound;

class PluginMain extends PluginBase implements Listener
{
	public const C=100;
	public const D=200;
	public const E=300;
	public const F=400;
	public const G=500;
	public const A=600;
	public const B=700;
	public function onEnable(){
		@mkdir($this->getDataFolder());
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function onDisable(){
	}
	public function playForAll($pitch){
		foreach($this->getServer()->getOnlinePlayers() as $player){
			$pos=$player->getPosition();
			$level=$pos->getLevel();
			$level->addSound(new LaunchSound($pos,$pitch));
		}
	}
	public function playFor($pitch,$players){
		if(!is_array($players))
			$players=array($players);
		foreach($players as $player){
			$pos=$player->getPosition();
			$level=$pos->getLevel();
			$level->addSound(new LaunchSound($pos,$pitch));
		}
	}
}