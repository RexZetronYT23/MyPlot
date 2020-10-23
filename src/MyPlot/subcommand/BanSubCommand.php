<?php

namespace MyPlot\subcommand;

use MyPlot\subcommand\Subcommand;
use MyPlot\MyPlot;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class BanSubCommand extends Subcommand {
   public function canUse(CommandSender $sender) {
      return ($sender instanceof Player);
   }
   public function execute(CommandSender $sender, string $label, array $args) : bool {
      $plot = $this->getPlugin()->getPlotByPosition($sender);
      if ($plot === null) {
          $sender->sendMessage($this->translateString("notinplot"));
          return true;
      }
      if (!$plot->owner !== $sender) {
         $sender->sendMessage($this->translateString("notowner"));
         return true;
      }
      
   }
}
