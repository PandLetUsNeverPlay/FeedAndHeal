<?php

namespace LePandiLP;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Main extends PluginBase{

	public function onEnable(){
		$this->getLogger()->info("FeedAndHeal is loading...");
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
				$sender->sendMessage("§6You succesfully stilled your hunger!");
			}else{
				$sender->sendMessage("§cYou do not have permission to use this command!");
			}
		}
		break;
		
		case "heal":
			if($sender instanceof Player){ 
			if($sender->hasPermission("heal.cmd")){
				$sender->setHealth(20);
				$sender->sendMessage("§6You succesfully filled your healthbar!");
			}else{
				$sender->sendMessage("§cYou do not have permission to use this command!");
				return true;
			}
		}
		break;
	}
	return true;
}
}