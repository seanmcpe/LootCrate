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
         $tile = $level->getTile($pos);
         $chest = Block::get(Block::CHEST);
         $items = array($this->plugin->config["contents"]);
         $contents = array_rand($items);
            $level->setBlock($pos, $chest);
            $tile->getInventory()->setContents([Item::get(Item::DIAMOND_SWORD), Item::get(Item::DIAMOND_PICKAXE)]);
//                                                              ^ ($items[$contents])
            $server->broadcastMessage("CRATE SPAWNED");
              if($chest->firstEmpty() == -1) {
                 $air = Block::get(Block::AIR);
                 $level->setBlock($pos, $air);
              }
       }
}
