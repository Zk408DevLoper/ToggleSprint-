<?php

namespace ToggleSprint;

use pocketmine\plugin\PluginBase as PB;
use pocketmine\event\Listener as L;

use pocketmine\event\player\PlayerMoveEvent;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\Server;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class ToggleSprint extends PB implements L{
	
	private $sprint = []; #Array UwU

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);      
		$this->getLogger()->info("§bCreated By Skiddy");
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
          switch($command->getName()){
               case "togglesprint":
                     if($sender->hasPermission("tgsprint.toggle")){ #Check Player If Player Has Perms UwU
                      if(!isset($args[0])){
           $sender->sendMessage("§8[§bToggleSprint§8] §cError Please Do /togglesprint on/off");
               return true;              
           }
                    switch($args[0]){
              case "on":
          $this->sprint[strtolower($sender->getName())] = $args[0]; //Putting Player To Array
          $sender->sendMessage("§8[§bToggleSprint§8] §aEnabled");
             return true;
              case "off":
         unset($this->sprint[strtolower($sender->getName())]); //Removing Player Into Array
         $sender->sendMessage("§8[§bToggleSprint§8] §cDisabled");
             return true;
             case "info":
         $sender->sendMessage("§bCreated By §cSkiddy");
            return true;
            }
         }
      }
   }
public function onMove(PlayerMoveEvent $event){
		$player = $event->getPlayer();
	if(isset($this->sprint[strtolower($player->getName())])){ //Checking If The Player Is On Array
		$player->setSprinting(!null);
	}
  }
}
		
