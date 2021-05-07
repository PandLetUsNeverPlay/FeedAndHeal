<?php

namespace LePandiLP;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;
use pocketmine\Player;

class Main extends PluginBase{

	public function onEnable(){
		$this->getLogger()->info("FeedAndHeal is loading...");
		
		@mkdir($this->getDataFolder());
		
		$this->saveResource("config.yml");
		$this->saveDefaultConfig();
	}
		
	public function onDiable(){
		$this->getLogger()->info("FeedAndHeal is unloading...");
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
	
		switch($cmd->getName()){
		
		case "feed":
			if($sender instanceof Player){ 
			if($sender->hasPermission("feed.cmd")){
				$sender->setFood(20);
				$sender->sendMessage($this->getConfig()->get("feed-message"));
			}else{
				$sender->sendMessage($this->getConfig()->get("no-permission"));
			}
		}
		break;
		
		case "heal":
			if($sender instanceof Player){ 
			if($sender->hasPermission("heal.cmd")){
				$sender->setHealth(20);
				$sender->sendMessage($this->getConfig()->get("heal-message"));
			}else{
				$sender->sendMessage($this->getConfig()->get("no-permission"));
				return true;
			}
		}
		break;
	}
	return true;
}
}