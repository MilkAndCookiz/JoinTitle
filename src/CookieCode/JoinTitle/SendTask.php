<?php

namespace CookieCode\JoinTitle;

use pocketmine\{Player, Server};
use pocketmine\scheduler\PluginTask;
use pocketmine\event\Listener;

use CookieCode\JoinTitle\Main;

//Developped by CookieCode.

class SendTask extends PluginTask implements Listener{

	public function __construct(Main $main, Player $player){
		parent::__construct($main);
		$this->main = $main;
		$this->player = $player;
	}

	public function onRun($currentTick){
		$this->player->addTitle($this->main->getConfig()->get("main_title"), $this->main->getConfig()->get("down_title"), "20", $this->main->getConfig()->get("time_title"), "40");
	}
} 