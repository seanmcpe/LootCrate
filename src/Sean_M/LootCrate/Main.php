<?php

namespace Sean_M\LootCrate;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Main extends PluginBase implements Listener {
    public $config;

     public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->config = $this->getConfig()->getAll();
        $this->getLogger()->info(TextFormat::GREEN . "LootCrate by Sean_M enabled!");
     }

     public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "LootCrate by Sean_M disabled!");
     }
// soon
}  
