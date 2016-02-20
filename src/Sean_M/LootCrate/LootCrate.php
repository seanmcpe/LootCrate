<?php

namespace Sean_M\LootCrate;

use pocketmine\block\Block;
use pocketmine\inventory\Inventory;
use pocketmine\level\Level;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Server;
use pocketmine\math\Vector3;

class LootCrate extends PluginTask {

      public function __construct(Main $plugin) {

      }

      public function onRun($currentTick) {
         $level = $this->getLevel();
         $x = $this->config["x"];
         $y = $this->config["y"];
         $z = $this->config["z"];
         $pos = new Vector3($x, $y, $z);
         $chest = Block::fromString("Chest");
         $items = array($this->config["contents"]);
         $contents = array_rand($items);
            $level->setBlock($pos, $chest);
            $chest->setContents($items[$contents]);
            $this->getServer()->broadcastMessage(TF::GREEN "A crate has been spawned at" . $x $y $z . "!");
               if($chest->firstEmpty() == -1) {
                  $air = Block::fromString("Air");
                  $level->setBlock($pos, $air);
             }
      }
}
