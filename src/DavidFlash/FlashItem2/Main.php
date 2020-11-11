<?php

declare(strict_types=1);

namespace DavidFlash\FlashItem2;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\SchedulerTask;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use DavidFlash\FlashItem2\libs\jojoe77777\FormAPI\SimpleForm;
use pocketmine\item\ItemFactory;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if(!is_file($this->getDataFolder() . "config.yml")){
			        $this->saveResource('/config.yml');
		      }
        }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
      if($command->getName() === "flashitem"){
        $item = $this->getConfig()->getNested("item");
        $name = $this->getConfig()->getNested("name");

          $flashitem = ItemFactory::get($item);
          $flashitem->setCustomName($name);
        $sender->getInventory()->addItem($flashitem);
        return true;
      }
      if($command->getName() === "openflashitem"){
          $this->openFlashItemMenu($sender);
        return true;
      }
      return true;
    }
    public function onJoin(PlayerJoinEvent $event){
          $player = $event->getPlayer();
      if($this->getConfig()->getNested("enabled") === true){
        $item = $this->getConfig()->getNested("item");
        $name = $this->getConfig()->getNested("name");

          $flashitem = ItemFactory::get($item);
          $flashitem->setCustomName($name);
        $player->getInventory()->addItem($flashitem);
      }
    }
    public function onInteraction(PlayerInteractEvent $event){

			$player = $event->getPlayer();
			$item = $this->getConfig()->get("item");
			$name = $this->getConfig()->get("name");

			if($event->getItem()->getId()==$item){
				if($event->getItem()->getCustomName() === $name){

          $this->openFlashItemMenu($player);
					return true;
				}
		}
	}
    public function openFlashItemMenu(Player $player){
      $form = new SimpleForm(function (Player $sender,  $data) {
        if($data === null){
            return true;
        }
        switch($data) {
        case 0:
            $item = $this->getConfig()->get("item");
            $name = $this->getConfig()->get("name");

            $minigame1 = $this->getConfig()->get("minigame1");

            $command1 = $this->getConfig()->get("command1");

          $item = ItemFactory::get($item, 0, 1);
          $item->setCustomName("$name");

        $sender->getInventory()->removeItem($item);
        $sender->sendMessage("Transfering to $minigame1..");
        $this->getServer()->dispatchCommand($sender, $command1);
        break;
        case 1:
            $item = $this->getConfig()->get("item");
            $name = $this->getConfig()->get("name");

            $minigame2 = $this->getConfig()->get("minigame2");

            $command2 = $this->getConfig()->get("command2");

          $item = ItemFactory::get($item, 0, 1);
          $item->setCustomName("$name");

        $sender->getInventory()->removeItem($item);
        $sender->sendMessage("Transfering to $minigame2..");
        $this->getServer()->dispatchCommand($sender, $command2);
        break;
        case 2:
            $item = $this->getConfig()->get("item");
            $name = $this->getConfig()->get("name");

            $minigame3 = $this->getConfig()->get("minigame3");

            $command3 = $this->getConfig()->get("command3");

          $item = ItemFactory::get($item, 0, 1);
          $item->setCustomName("$name");

        $sender->getInventory()->removeItem($item);
        $sender->sendMessage("Transfering to $minigame3..");
        $this->getServer()->dispatchCommand($sender, $command3);
        break;
        case 3:
            $item = $this->getConfig()->get("item");
            $name = $this->getConfig()->get("name");

            $minigame4 = $this->getConfig()->get("minigame4");

            $command4 = $this->getConfig()->get("command4");

          $item = ItemFactory::get($item, 0, 1);
          $item->setCustomName("$name");

        $sender->getInventory()->removeItem($item);
        $sender->sendMessage("Transfering to $minigame4..");
        $this->getServer()->dispatchCommand($sender, $command4);
        break;
        case 4:
            $item = $this->getConfig()->get("item");
            $name = $this->getConfig()->get("name");

            $minigame5 = $this->getConfig()->get("minigame5");

            $command5 = $this->getConfig()->get("command5");

          $item = ItemFactory::get($item, 0, 1);
          $item->setCustomName("$name");

        $sender->getInventory()->removeItem($item);
        $sender->sendMessage("Transfering to $minigame5..");
        $this->getServer()->dispatchCommand($sender, $command5);
        break;
        case 5:
            $item = $this->getConfig()->get("item");
            $name = $this->getConfig()->get("name");

            $minigame6 = $this->getConfig()->get("minigame6");

            $command6 = $this->getConfig()->get("command6");

          $item = ItemFactory::get($item, 0, 1);
          $item->setCustomName("$name");

        $sender->getInventory()->removeItem($item);
        $sender->sendMessage("Transfering to $minigame6..");
        $this->getServer()->dispatchCommand($sender, $command6);
        break;

        }
        });

        $minigame1 = $this->getConfig()->get("minigame1");
        $minigame2 = $this->getConfig()->get("minigame2");
        $minigame3 = $this->getConfig()->get("minigame3");
        $minigame4 = $this->getConfig()->get("minigame4");
        $minigame5 = $this->getConfig()->get("minigame5");
        $minigame6 = $this->getConfig()->get("minigame6");

      $form->setTitle("Minigames");
      $form->setContent("Choose location");
      $form->addButton("$minigame1\n§7Click to Manage");
      $form->addButton("$minigame2\n§7Click to Open Shop");
      $form->addButton("$minigame3\n§7Click to Teleport!");
      $form->addButton("$minigame4\n§710000 SBCOINS");
      $form->addButton("$minigame5\n§7Click to teleport!");
      $form->addButton("$minigame6\n§7Click to teleport!");
      $form->sendToPlayer($player);
      return true;
    }
}
