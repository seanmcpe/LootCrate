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
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML)->getAll();
        if(!$this->getServer()->isLevelGenerated($config['level'])){
            $this->getLogger()->error("The Level you used on config doesn't exist!");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
        if(!$this->getServer()->isLevelLoaded($level)){
            $this->getServer()->loadLevel($level);
        }
        
        $this->getLogger()->info(TextFormat::GREEN . "LootCrate by Sean_M enabled!");
           $this->getServer()->getScheduler()->scheduleRepeatingTask(new LootCrate($this), $config['time']);
           $this->saveDefaultConfig();
     }

     public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "LootCrate by Sean_M disabled!");
     }
}  
