<?php

namespace Sean_M\LootCrate;

use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\inventory\Inventory;
use pocketmine\block\Block;
use pocketmine\level\Level;
use pocketmine\math\Vector3;

    public function __construct(Main $plugin) {

    }

    public function onRun($currentTick) {
       $level = $this->getLevel();
       $player = $this->player;
       $x = $this->config["x"];
       $y = $this->config["y"];
       $z = $this->config["z"];
       $pos = new Vector3($x, $y, $z);
       $chest = Block::fromString("Chest");
       $items = array($this->config["contents"]);
       $contents = array_rand($items);
          $level->setBlock($pos, $chest);
          $chest->setContents($items[$contents]);
             if($chest->firstEmpty() == -1) {
                $air = Block::fromString("Air");
                $level->setBlock($pos, $air);
             }
    }
