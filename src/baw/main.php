<?php
namespace baw;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\block\Block;
class main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function onWalk(PlayerMoveEvent $ev){
	
		  $bombid = 44;
		  $player = $ev->getPlayer();
		  if ($player instanceof Player){
  		  $block = $player->getLevel()->getBlock($player->floor());
  		 	 if ($block->getId() === $bombid){
  		  		$player->knockBack($player, 3, 0, 1, 1);
  		  		$player->setOnFire(3);
  		  		$player->sendMessage(TextFormat::AQUA."[BadAssWeapons]".TextFormat::RED." A Bomb went off below you!");
  		 	 }
  		 $player->getLevel()->setBlock($player, Block::get(0));
		  }
	}
	
}