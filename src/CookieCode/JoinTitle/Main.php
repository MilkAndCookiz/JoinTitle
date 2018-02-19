<?php

namespace CookieCode\JoinTitle;

use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\{Config, TextFormat as TF};

use CookieCode\JoinTitle\SendTask;

//Coded and created by CookieCode.

class Main extends PluginBase implements Listener{

private $prefix = "[JoinTitle]";

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info(TF::GREEN . $this->prefix . TF::YELLOW . " Plugin enabled by CookieCode");
    $this->saveDefaultConfig();
  }

	public function onDisable() {
		$this->getServer()->getLogger()->info(TF::GREEN . $this->prefix . TF::YELLOW . " Plugin disabled by CookieCode");
	}
	
	public function onJoin(PlayerJoinEvent $event){
		$joinTask = new SendTask($this, $event->getPlayer());
		$this->getServer()->getScheduler()->scheduleDelayedTask($joinTask, 20);
	}
}
