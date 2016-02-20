<?php

namespace Sean_M\LootCrate;

use pocketmine\block\Block;
use pocketmine\inventory\Inventory;
use pocketmine\level\Level;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Server;
use pocketmine\math\Vector3;

class LootCrate extends PluginTask {

   public $plugin;

      public function __construct(Main $plugin) {
         parent::__construct($plugin);
         $this->plugin = $plugin;
      }

      public function onRun($currentTick) {
         $server = Server::getInstance();
         $level = $server->getDefaultLevel();
         $x = $this->plugin->config["x"];
         $y = $this->plugin->config["y"];
         $z = $this->plugin->config["z"];
         $pos = new Vector3($x, $y, $z);
         $chest = Block::fromString("Chest");
         $items = array($this->plugin->config["contents"]);
         $contents = array_rand($items);
            $level->setBlock($pos, $chest);
            $chest->setContents($items[$contents]);
            $server->broadcastMessage("CRATE SPAWNED");
               if($chest->firstEmpty() == -1) {
                  $air = Block::fromString("Air");
                  $level->setBlock($pos, $air);
             }
      }
}
