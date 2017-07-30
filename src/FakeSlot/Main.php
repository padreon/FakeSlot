<?php

namespace FakeSlot;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
	
	
	public function onEnable(){
		$this->saveDefaultConfig();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info(TextFormat::GREEN."FakeSlot Enabled");
		$this->cfg = $this->getConfig();
	}
	public function onFakeSlot(QueryRegenerateEvent $ev){
		$min = $this->getConfig()->get("Min_Player");
		$max = $this->getConfig()->get("Max");
		$maxplayer = $this->getConfig()->get("Max_Player");
		$minplayer = rand($min,$max);
		$ev->setMaxPlayerCount($maxplayer);
		$ev->setPlayerCount($minplayer);
	}
}