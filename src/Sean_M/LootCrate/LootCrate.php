<?php

namespace Sean_M\LootCrate;


use pocketmine\block\Block;
use pocketmine\math\Vector3;

class LootCrate extends \pocketmine\scheduler\PluginTask {

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function onRun($currentTick) {
       $level = $this->config["level"];
       $x = $this->plugin->config["x"];
       $y = $this->plugin->config["y"];
       $z = $this->plugin->config["z"];
       $pos = new Vector3($x, $y, $z);
       $chest = $level->getTile($x, $y, $z);
       if(!$chest instanceof \pocketmine\tile\Chest){
          $items = array($this->config["contents"]);
          $contents = array_rand($items);
          $level->setBlock($pos, $chest);
          $chest->setContents($items[$contents]);
          if($chest->getContents() == []) {
              $air = Block::fromString("Air");
              $level->setBlock($pos, $air);
            }
        }
    }
}
