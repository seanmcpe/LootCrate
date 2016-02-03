<?php

namespace Sean_M\LootCrate;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {

    public $config;

     public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
        "time" => 10))->getAll();
        $this->getLogger()->info(TextFormat::GREEN . "LootCrate by Sean_M enabled!");
           $time = $this->config["time"];
           $this->getServer()->getScheduler()->scheduleRepeatingTask(new LootCrate($this), $time * 20);
           $this->saveDefaultConfig();
     }

     public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "LootCrate by Sean_M disabled!");
     }
}  
