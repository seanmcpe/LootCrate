<?php

namespace Sean_M\LootCrate;

use pocketmine\utils\TextFormat;
use pocketmine\Player;
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
          $level->setBlock($pos, $chest);
    }
